<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerRepresentative Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\CustomerRepresentative get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomerRepresentative newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomerRepresentative[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomerRepresentative|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomerRepresentative|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomerRepresentative patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomerRepresentative[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomerRepresentative findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustomerRepresentativeTable extends Table
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

        $this->setTable('customer_representative');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
         $this->hasMany('Contractors', [
            'foreignKey' => 'customer_representative_id'
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
            ->scalar('pri_contact_fn')
            ->maxLength('pri_contact_fn', 45)
            ->allowEmptyString('pri_contact_fn');

        $validator
            ->scalar('pri_contact_ln')
            ->maxLength('pri_contact_ln', 45)
            ->allowEmptyString('pri_contact_ln');

        $validator
            ->scalar('pri_contact_pn')
            ->maxLength('pri_contact_pn', 45)
            ->allowEmptyString('pri_contact_pn');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
