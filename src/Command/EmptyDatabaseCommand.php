<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Datasource\ConnectionManager;
use Cake\Datasource\Exception\MissingDatasourceConfigException;

class EmptyDatabaseCommand extends Command
{
    /**
     * The DB connection
     *
     * @var \Cake\Datasource\ConnectionInterface $db Connection Interface
     */
    private $db;

    /**
     * The name of the connection to lookup, e.g. 'default'
     *
     * @var string 'default'
     */
    private $connection = 'default';

    /**
     * Toggle handling emptying tables rather than dropping
     *
     * @var bool false
     */
    private $isTruncate = false;

    /**
     * ConsoleIo
     *
     * @var \Cake\Console\ConsoleIo
     */
    private $io;

    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        parent::initialize();
    }

    /**
     * Set the database options based on the connection name
     *
     * @param string $connection Connection name e.g. default
     * @return void
     */
    private function setDb(string $connection)
    {
        $this->connection = $connection;
        try {
            $this->db = ConnectionManager::get($this->connection);
        } catch (MissingDatasourceConfigException $ex) {
            $this->io->error($ex->getMessage());
        }
    }

    /**
     * Collect options for the command
     * --connection=alternative use to specify a database other than 'default'
     * --models (-m) do only remove model files found in src/Model
     * --truncate (-t) truncate tables instead of dropping
     *
     * @param \Cake\Console\ConsoleOptionParser $parser The option parser
     * @return \Cake\Console\ConsoleOptionParser The modified option parser
     */
    protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser->addOption('models', [
            'short' => 'm',
            'help' => 'Remove only tables in the Model directory and leave any other tables in the database alone',
            'boolean' => true,
        ]);

        $parser->addOption('connection', [
            'help' => 'The connection to use if not \'default\'',
            'required' => false,
        ]);

        $parser->addOption('truncate', [
            'short' => 't',
            'help' => 'Truncate instead of drop tables',
            'boolean' => true,
        ]);

        return $parser;
    }

    /**
     * Removes all tables from the database
     * Using the Cake default database credentials
     *
     * @param \Cake\Console\Arguments $args currently unused
     * @param \Cake\Console\ConsoleIo $io handle input/output
     * @return int|null|void
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $this->io = $io;

        $connection = $args->getOption('connection');
        if ($connection) {
            // Set custom connection
            $this->setDb((string)$connection);
        } else {
            // Fallback, set default connection here rather than initialize in case app never uses 'default'
            $this->setDb($this->connection);
        }

        // Check if we should empty rather than drop tables
        $truncate = $args->getOption('truncate');
        if ($truncate) {
            $this->isTruncate = true;
        }

        $models = $args->getOption('models');
        if ($models) {
            return $this->removeModels();
        }

        // Fallback behavior
        $this->io->out('No options provided, removing all tables in database', 1, ConsoleIo::VERBOSE);

        $this->removeAll();
    }

    /**
     * Removes all tables from the database
     * Using the Cake default database credentials
     *
     * @return int Number of affected tables
     * @throws \Exception
     */
    private function removeAll(): int
    {
        $tables = TableHandler::getAllTables($this->connection);

        return $this->process($tables);
    }

    /**
     * Remove data from models only
     *
     * @return int Number of affected tables
     */
    private function removeModels(): int
    {
        $tables = TableHandler::getModelTables($this->connection);
        $this->io->out('Removing model specific tables only', 1, ConsoleIo::VERBOSE);

        return $this->process($tables);
    }

    /**
     * Generic handler for dropping or truncating an array of tables
     *
     * @param array $tables table names to drop/truncate
     * @return int Number of affected tables
     */
    private function process(array $tables): int
    {
        if (empty($tables)) {
            $this->io->out('No tables found', 1, ConsoleIo::VERBOSE);

            return 0;
        }

        $command = 'DROP ';
        if ($this->isTruncate) {
            $command = 'TRUNCATE ';
        }

        // Later: Add this as a --keys flag
        $this->db->execute('SET foreign_key_checks = 0');

        $affectedTables = 0;
        foreach ($tables as $table) {
            $sql = $command . 'TABLE `' . $table . '`';
            $this->io->out($sql, 1, ConsoleIo::VERBOSE);
            $this->db->execute($sql);
            $affectedTables++;
        }

        $this->db->execute('SET foreign_key_checks = 1');

        return $affectedTables;
    }
}
