<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductTagsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductTagsTable Test Case
 */
class ProductTagsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductTagsTable
     */
    protected $ProductTags;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductTags',
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
        $config = $this->getTableLocator()->exists('ProductTags') ? [] : ['className' => ProductTagsTable::class];
        $this->ProductTags = $this->getTableLocator()->get('ProductTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductTags);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProductTagsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProductTagsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
