<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BenchmarkCategory Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $client_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int|null $created_by
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\Client $client
 */
class BenchmarkCategory extends Entity
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
        'client_id' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'client' => true
    ];
}
