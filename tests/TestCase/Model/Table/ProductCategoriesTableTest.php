<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductCategoriesTable Test Case
 */
class ProductCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductCategoriesTable
     */
    protected $ProductCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductCategories',
        'app.Products',
        'app.Tags',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProductCategories') ? [] : ['className' => ProductCategoriesTable::class];
        $this->ProductCategories = $this->getTableLocator()->get('ProductCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductCategories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProductCategoriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProductCategoriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
