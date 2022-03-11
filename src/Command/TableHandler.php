<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Datasource\Exception\MissingDatasourceConfigException;

class TableHandler
{
    /**
     * Get a list of all the tables found in the database based on the
     * specified connection name
     *
     * @param string $connection Name of the connection to use
     * @return array All tables found in the database
     */
    public static function getAllTables(string $connection): array
    {
        try {
            $db = ConnectionManager::get($connection);
        } catch (MissingDatasourceConfigException $ex) {
            return [];
        }

        return $db->getSchemaCollection()->listTables();
    }

    /**
     * Get a list of tables that have been defined in the src/Model/Table folder
     * and belong to the specified connection
     *
     * @param string $connection Name of the connection to use
     * @return array The filtered tables
     */
    public static function getModelTables(string $connection): array
    {
        $models_folder = APP . 'Model' . DS . 'Table';
        $files = scandir($models_folder);
        if (!$files) {
            return [];
        }

        // Remove anything that is not following CakePHP Table convention naming
        foreach ($files as $key => $file) {
            if (substr($file, -9) !== 'Table.php') {
                unset($files[$key]);
            }
        }

        $tables = [];
        foreach ($files as $filename) {
            $name = rtrim($filename, '.php');
            $namespace = Configure::read('App.namespace');
            $className = $namespace . '\\Model\\Table\\' . $name;

            // Confirm class is valid before trying to instantiate
            if (!class_exists($className)) {
                continue;
            }

            $class = new $className();
            // If either of these two essential methods are missing: skip the file
            if (!method_exists($class, 'defaultConnectionName') || !method_exists($class, 'getTable')) {
                continue;
            }

            // Only return table names assigned to the specified connection
            if ($class->defaultConnectionName() === $connection) {
                $tables[] = $class->getTable();
            }

            unset($class);
        }

        return $tables;
    }
}
