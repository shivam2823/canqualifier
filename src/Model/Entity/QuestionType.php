<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

/**
 * QuestionType Entity
 *
 * @property int $id
 * @property string|null $name
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property \Cake\I18n\DateTime|null $deleted
 * @property int|null $created_by
 * @property int|null $modified_by
 * @property int|null $deleted_by
 *
 * @property \App\Model\Entity\Question[] $questions
 */
class QuestionType extends Entity
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
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'questions' => true,
        'created_by' => true,
        'modified_by' => true
    ];
}
