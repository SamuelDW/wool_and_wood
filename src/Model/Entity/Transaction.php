<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property string $order_id
 * @property string $customer_id
 * @property string $status
 * @property string $type
 * @property string $verification_code
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Customer $customer
 */
class Transaction extends Entity
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
        'order_id' => true,
        'customer_id' => true,
        'status' => true,
        'type' => true,
        'verification_code' => true,
        'created' => true,
        'modified' => true,
        'order' => true,
        'customer' => true,
    ];
}
