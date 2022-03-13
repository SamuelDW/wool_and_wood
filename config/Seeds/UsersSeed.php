<?php
declare(strict_types=1);

use Cake\Auth\DefaultPasswordHasher as DefaultPasswordHasher;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'email' => 'w@woolandwood.co.uk',
                'first_name' => 'Samuel',
                'last_name' => 'Walker',
                'job_title' => 'Chief Technical Officer',
                'password' => (new DefaultPasswordHasher())->hash('hello'),
                'password_reset_token' => '',
                'password_reset_expiry' => '',
                'password_bypass_hash' => '',
                'is_archived' => false,
                'is_admin' => true,
                'is_wool_and_wood' => true,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
