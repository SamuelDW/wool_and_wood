<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $uuid
 * @property string $customer_id
 * @property string $status
 * @property float $sub_total
 * @property float $shipping
 * @property float $tax
 * @property float $total
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\OrderItem[] $order_items
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Order extends Entity
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
        'uuid' => true,
        'customer_id' => true,
        'status' => true,
        'sub_total' => true,
        'shipping' => true,
        'tax' => true,
        'total' => true,
        'comment' => true,
        'created' => true,
        'modified' => true,
        'customer' => true,
        'order_items' => true,
        'transactions' => true,
    ];
}
