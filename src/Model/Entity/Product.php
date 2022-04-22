<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $title
 * @property string $summary
 * @property float $price
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\OrderItem[] $order_items
 * @property \App\Model\Entity\ProductCategory[] $product_categories
 * @property \App\Model\Entity\ProductReview[] $product_reviews
 * @property \App\Model\Entity\ProductTag[] $product_tags
 * @property \App\Model\Entity\ProductImage[] $product_images
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'summary' => true,
        'price' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'order_items' => true,
        'product_categories' => true,
        'product_reviews' => true,
        'product_tags' => true,
        'product_images' => true,
    ];
}
