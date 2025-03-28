<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

/**
 * Review Entity
 *
 * @property int $id
 * @property string|null $reviewtxt
 * @property int|null $rating
 * @property int $client_id
 * @property int $contractor_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property int $created_by
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Contractor $contractor
 */
class Review extends Entity
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
        'reviewtxt' => true,
        'rating' => true,
        'client_id' => true,
        'contractor_id' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'client' => true,
        'contractor' => true,
		'doc_1' =>true,
		'doc_2' =>true,
		'doc_3' =>true
    ];
}
