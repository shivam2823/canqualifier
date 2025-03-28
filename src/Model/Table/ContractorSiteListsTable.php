<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContractorSiteLists Model
 *
 * @property \App\Model\Table\ContractorsTable|\Cake\ORM\Association\BelongsTo $Contractors
 *
 * @method \App\Model\Entity\ContractorSiteList get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContractorSiteList newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContractorSiteList[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContractorSiteList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContractorSiteList|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContractorSiteList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContractorSiteList[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContractorSiteList findOrCreate($search, callable $callback = null, $options = [])
 */
class ContractorSiteListsTable extends Table
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

        $this->setTable('contractor_site_lists');

        $this->belongsTo('Contractors', [
            'foreignKey' => 'contractor_id'
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
            ->scalar('sites')
            ->allowEmptyString('sites');

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
