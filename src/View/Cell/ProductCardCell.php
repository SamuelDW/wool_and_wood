<?php
declare(strict_types=1);

namespace App\View\Cell;

use App\Model\Entity\Product;
use Cake\View\Cell;

/**
 * ProductCard cell
 */
class ProductCardCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    protected $ProductReviews;

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
        $this->ProductReviews = $this->fetchTable('ProductReviews');
    }

    /**
     * Default display method.
     *
     * @param \App\Model\Entity\Product $product the product entity
     *
     * @return void
     */
    public function display(Product $product)
    {
        $productReviews = $this->ProductReviews->findAverageReviewScoreByProductId($product->id);
        $this->set(compact('product', 'productReviews'));
    }
}
