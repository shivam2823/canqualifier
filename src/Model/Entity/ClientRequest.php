<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClientRequest Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $contractor_id
 * @property int|null $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property int|null $created_by
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Contractor $contractor
 */
class ClientRequest extends Entity
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
        'client_id' => true,
        'contractor_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'client' => true,
        'contractor' => true,
        'subject' => true,
        'message' => true
    ];
}
