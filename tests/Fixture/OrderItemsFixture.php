<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderItemsFixture
 */
class OrderItemsFixture extends TestFixture
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
                'product_id' => 'Lorem ipsum dolor sit amet',
                'quantity' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-21 23:10:23',
                'modified' => '2022-04-21 23:10:23',
            ],
        ];
        parent::init();
    }
}
