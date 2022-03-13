<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'job_title' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'password_reset_token' => 'Lorem ipsum dolor sit amet',
                'password_reset_expiry' => 'Lorem ipsum dolor sit amet',
                'password_bypass_hash' => 'Lorem ipsum dolor sit amet',
                'is_archived' => 1,
                'is_admin' => 1,
                'is_wool_and_wood' => 1,
                'created' => '2022-03-13 20:37:43',
                'modified' => '2022-03-13 20:37:43',
            ],
        ];
        parent::init();
    }
}
