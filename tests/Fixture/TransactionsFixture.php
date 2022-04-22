<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsFixture
 */
class TransactionsFixture extends TestFixture
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
                'order_id' => 'Lorem ipsum dolor sit amet',
                'customer_id' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor sit amet',
                'verification_code' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-21 23:10:31',
                'modified' => '2022-04-21 23:10:31',
            ],
        ];
        parent::init();
    }
}
