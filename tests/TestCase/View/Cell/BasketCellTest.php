<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Cell;

use App\View\Cell\BasketCell;
use Cake\TestSuite\TestCase;

/**
 * App\View\Cell\BasketCell Test Case
 */
class BasketCellTest extends TestCase
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
     * @var \App\View\Cell\BasketCell
     */
    protected $Basket;

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
        $this->Basket = new BasketCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Basket);

        parent::tearDown();
    }

    /**
     * Test display method
     *
     * @return void
     * @uses \App\View\Cell\BasketCell::display()
     */
    public function testDisplay(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
