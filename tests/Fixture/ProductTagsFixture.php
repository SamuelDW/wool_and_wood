<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductTagsFixture
 */
class ProductTagsFixture extends TestFixture
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
                'product_id' => 'Lorem ipsum dolor sit amet',
                'tag_id' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-21 22:51:01',
                'modified' => '2022-04-21 22:51:01',
            ],
        ];
        parent::init();
    }
}
