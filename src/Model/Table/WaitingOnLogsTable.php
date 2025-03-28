<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WaitingOnLogs Model
 *
 * @property \App\Model\Table\ContractorsTable|\Cake\ORM\Association\BelongsTo $Contractors
 *
 * @method \App\Model\Entity\WaitingOnLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\WaitingOnLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WaitingOnLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WaitingOnLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WaitingOnLog|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WaitingOnLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WaitingOnLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WaitingOnLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WaitingOnLogsTable extends Table
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

        $this->setTable('waiting_on_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Contractors', [
            'foreignKey' => 'contractor_id',
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
            ->scalar('from_status')
            ->maxLength('from_status', 45)
            ->allowEmptyString('from_status');

        $validator
            ->scalar('to_status')
            ->maxLength('to_status', 45)
            ->allowEmptyString('to_status');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->allowEmptyString('created_by', false);

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

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

        return $rules;
    }
}
