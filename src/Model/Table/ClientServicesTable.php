<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClientServices Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\ServicesTable|\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\ClientService get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClientService newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClientService[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClientService|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClientService|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClientService patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClientService[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClientService findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientServicesTable extends Table
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

        $this->setTable('client_services');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id'
			
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id'			
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
            ->integer('discount')
            ->allowEmptyString('discount');

        $validator
            ->boolean('is_percentage')
            ->allowEmptyString('is_percentage');

        $validator
            ->boolean('is_safety_sensitive')
            ->allowEmptyString('is_safety_sensitive');

        $validator
            ->boolean('is_safety_nonsensitive')
            ->allowEmptyString('is_safety_nonsensitive');

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
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['service_id'], 'Services'));

        return $rules;
    }
}
