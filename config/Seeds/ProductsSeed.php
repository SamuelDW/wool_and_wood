<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Products seed.
 */
class ProductsSeed extends AbstractSeed
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
                'title' => 'Wool Tree',
                'summary' => 'Hand woven tree, of various colours',
                'price' => 5.99,
                'status' => 'active',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ], [
                'id' => 2,
                'title' => 'Stitch',
                'summary' => 'Hand woven stitch for kids and lovers of the show',
                'price' => 10.99,
                'status' => 'active',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('products');
        $table->insert($data)->save();
    }
}
