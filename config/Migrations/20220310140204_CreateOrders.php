<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateOrders extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('orders');
        $table->addColumn('uuid', 'string', [
            'default' => null,
            'limit' => 36,
            'null' => false,
        ]);
        $table->addColumn('customer_id', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('status', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('sub_total', 'float', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('shipping', 'float', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('tax', 'float', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('total', 'float', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('comment', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
