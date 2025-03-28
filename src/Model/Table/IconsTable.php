<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Icons Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\ContractorsTable|\Cake\ORM\Association\BelongsTo $Contractors
 * @property \App\Model\Table\OverallIconsTable|\Cake\ORM\Association\BelongsTo $OverallIcons
 *
 * @method \App\Model\Entity\Icon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Icon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Icon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Icon|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Icon|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Icon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Icon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Icon findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IconsTable extends Table
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

        $this->setTable('icons');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id'
        ]);
        $this->belongsTo('Contractors', [
            'foreignKey' => 'contractor_id'
        ]);
        $this->belongsTo('OverallIcons', [
            'foreignKey' => 'overall_icon_id'
        ]);
        $this->belongsTo('BenchmarkTypes', [
            'foreignKey' => 'benchmark_type_id'
        ]);
        $this->belongsTo('BenchmarkCategories', [
            'foreignKey' => 'category'
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
            ->scalar('bench_type')
            ->maxLength('bench_type', 155)
            ->allowEmptyString('bench_type');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 155)
            ->allowEmptyString('icon');

        $validator
            ->integer('category')
            ->allowEmptyString('category');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        $validator
            ->boolean('is_forced')
            ->allowEmptyString('is_forced');

        $validator
            ->scalar('documents')
            ->allowEmptyString('documents');

        $validator
            ->scalar('notes')
            ->allowEmptyString('notes');

        $validator
            ->boolean('show_to_contractor')
            ->allowEmptyString('show_to_contractor');

        $validator
            ->boolean('show_to_clients')
            ->allowEmptyString('show_to_clients');

        $validator
            ->integer('icon_from')
            ->allowEmptyString('icon_from');

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
        $rules->add($rules->existsIn(['contractor_id'], 'Contractors'));
        $rules->add($rules->existsIn(['overall_icon_id'], 'OverallIcons'));

        return $rules;
    }
}
