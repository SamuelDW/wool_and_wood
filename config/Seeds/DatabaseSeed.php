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

        // Don't seed in production
        if (Configure::read('debug')) {
        }
    }
}
