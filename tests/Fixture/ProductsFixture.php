<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'title' => 'Lorem ipsum dolor sit amet',
                'summary' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-22 11:33:48',
                'modified' => '2022-04-22 11:33:48',
            ],
        ];
        parent::init();
    }
}
