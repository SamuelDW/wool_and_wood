<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Cell;

use App\View\Cell\ProductCardCell;
use Cake\TestSuite\TestCase;

/**
 * App\View\Cell\ProductCardCell Test Case
 */
class ProductCardCellTest extends TestCase
{
    /**
     * Request mock
     *
     * @var \Cake\Http\ServerRequest|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $request;

    /**
     * Response mock
     *
     * @var \Cake\Http\Response|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $response;

    /**
     * Test subject
     *
     * @var \App\View\Cell\ProductCardCell
     */
    protected $ProductCard;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->request = $this->getMockBuilder('Cake\Http\ServerRequest')->getMock();
        $this->response = $this->getMockBuilder('Cake\Http\Response')->getMock();
        $this->ProductCard = new ProductCardCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductCard);

        parent::tearDown();
    }

    /**
     * Test display method
     *
     * @return void
     * @uses \App\View\Cell\ProductCardCell::display()
     */
    public function testDisplay(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
