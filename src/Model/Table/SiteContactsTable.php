<?php
namespace App\Model\Table;use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;/**
 * SiteContacts Model
 *
 * @property \App\Model\Table\ContractorsTable|\Cake\ORM\Association\BelongsTo $Contractors
 * @property \App\Model\Table\ContractorSiteContactsTable|\Cake\ORM\Association\HasMany $ContractorSiteContacts
 *
 * @method \App\Model\Entity\SiteContact get($primaryKey, $options = [])
 * @method \App\Model\Entity\SiteContact newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SiteContact[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SiteContact|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteContact|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteContact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SiteContact[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SiteContact findOrCreate($search, callable $callback = null, $options = [])
 */
class SiteContactsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);        $this->setTable('site_contacts');        $this->setDisplayField('name');        $this->setPrimaryKey('id');
        $this->belongsTo('Contractors', [
            'foreignKey' => 'contractor_id'
        ]);
        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id'
        ]);
        $this->hasMany('ContractorSiteContacts', [
            'foreignKey' => 'site_contact_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): \Cake\Validation\Validator
    {        $validator->integer('id')->allowEmptyString('id', 'create');        $validator->scalar('name')->maxLength('name', 100)->allowEmptyString('name');        $validator->email('email')->allowEmptyString('email');        $validator->scalar('phone')->maxLength('phone', 100)->allowEmptyString('phone');        return $validator;
    }
    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): \Cake\ORM\RulesChecker
    {       $rules->add($rules->existsIn(['contractor_id'], 'Contractors'));
        return $rules;
    }
}
