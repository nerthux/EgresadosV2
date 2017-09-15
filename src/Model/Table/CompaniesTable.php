<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Companies Model
 *
 * @property \App\Model\Table\SectorsTable|\Cake\ORM\Association\BelongsTo $Sectors
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Company get($primaryKey, $options = [])
 * @method \App\Model\Entity\Company newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Company[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Company|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Company[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Company findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompaniesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('companies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sectors', [
            'foreignKey' => 'sector_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'companies_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'companies_users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->scalar('phone')
            ->allowEmpty('phone');

        $validator
            ->scalar('location')
            ->allowEmpty('location');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['sector_id'], 'Sectors'));

        return $rules;
    }
    //FINDERS
    public function findName(Query $query, $options)
    {
        return $query->where(['name' => $options['name']]);
    }

    public function findSearchName(Query $query, $options)
    {
        return $query->where(['name LIKE' => "%".$options['name']."%"]);
    }

    //METHODS
    public function getOrCreate($name)
    {
        $company = $this->find('name', ['name' => $name])->first();
        
        if(!$company){
            $company = $this->newEntity();
            $company->name = $name;
            $this->save($company);
         }

        return $company; 
    }

    public function getCompaniesNames($name)
    {
        $companies = $this->find('searchName', ['name' => $name])->select('name')->toArray();
        $companies = array_column($companies, 'name');
        return $companies;
    }
}
