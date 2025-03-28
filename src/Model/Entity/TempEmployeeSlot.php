<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TempEmployeeSlot Entity
 *
 * @property int $id
 * @property int $contractor_id
 * @property int|null $slot
 * @property string|null $price
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property int $created_by
 * @property int|null $modified_by
 */
class TempEmployeeSlot extends Entity
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
        'contractor_id ' => true,
        'slot' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true
    ];
}
