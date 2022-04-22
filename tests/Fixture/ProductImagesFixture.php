<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductImagesFixture
 */
class ProductImagesFixture extends TestFixture
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
                'file_location' => 'Lorem ipsum dolor sit amet',
                'product_id' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-22 11:09:25',
                'modified' => '2022-04-22 11:09:25',
            ],
        ];
        parent::init();
    }
}
