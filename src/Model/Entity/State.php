<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

/**
 * State Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $country_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Country $country
 */
class State extends Entity
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
        'name' => true,
        'country_id' => true,
        'created' => true,
        'modified' => true,
        'country' => true,
        'created_by' => true,
        'modified_by' => true
    ];
}
