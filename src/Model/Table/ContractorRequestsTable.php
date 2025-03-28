<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContractorRequests Model
 *
 * @property \App\Model\Table\ContractorsTable|\Cake\ORM\Association\BelongsTo $Contractors
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\BelongsTo $Employees
 *
 * @method \App\Model\Entity\ContractorRequest get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContractorRequest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContractorRequest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContractorRequest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContractorRequest|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContractorRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContractorRequest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContractorRequest findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContractorRequestsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contractor_requests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Contractors', [
            'foreignKey' => 'contractor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): \Cake\Validation\Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 155)
            ->allowEmptyString('subject');

        $validator
            ->scalar('message')
            ->allowEmptyString('message');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): \Cake\ORM\RulesChecker
    {
        $rules->add($rules->existsIn(['contractor_id'], 'Contractors'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
