<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmployeeContractor Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int|null $contractor_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property int $created_by
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Contractor $contractor
 */
class EmployeeContractor extends Entity
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
        'employee_id' => true,
        'contractor_id' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'employee' => true,
        'contractor' => true
    ];
}
