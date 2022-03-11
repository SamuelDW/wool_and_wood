<?php

use Cake\Core\Configure;
use Migrations\AbstractSeed;

/**
 * Seeder for the whole database
 */
class DatabaseSeed extends AbstractSeed
{
    /**
     * Run Method. Delegates to individual seeders in a specified order
     * which can avoid foreign key constraint problems.
     *
     * Allows us to comment out seeds not required in production
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersSeed');

        // Don't seed in production
        if (Configure::read('debug')) {
            $this->call('CustomersSeed');
            $this->call('ProductsSeed');
            $this->call('TagsSeed');
            $this->call('CategoriesSeed');
            $this->call('ProductTagsSeed');
            $this->call('OrdersSeed');
            $this->call('ProductCategoriesSeed');
            $this->call('TransactionsSeed');
            $this->call('OrderItemsSeed');
            $this->call('ProductReviewsSeed');
        }
    }
}
