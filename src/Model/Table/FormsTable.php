<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Forms Model
 *
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\HasMany $Questions
 * @property \App\Model\Table\QuestionsUsersTable|\Cake\ORM\Association\HasMany $QuestionsUsers
 * @property \App\Model\Table\CareersTable|\Cake\ORM\Association\BelongsToMany $Careers
 * @property \App\Model\Table\GenerationsTable|\Cake\ORM\Association\BelongsToMany $Generations
 *
 * @method \App\Model\Entity\Form get($primaryKey, $options = [])
 * @method \App\Model\Entity\Form newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Form[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Form|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Form patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Form[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Form findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FormsTable extends Table
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

        $this->setTable('forms');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Questions', [
            'foreignKey' => 'form_id'
        ]);
        $this->hasMany('QuestionsUsers', [
            'foreignKey' => 'form_id'
        ]);
        $this->belongsToMany('Careers', [
            'foreignKey' => 'form_id',
            'targetForeignKey' => 'career_id',
            'joinTable' => 'careers_forms'
        ]);
        $this->belongsToMany('Generations', [
            'foreignKey' => 'form_id',
            'targetForeignKey' => 'generation_id',
            'joinTable' => 'forms_generations'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('editor')
            ->allowEmpty('editor');

        $validator
            ->scalar('status')
            ->allowEmpty('status');

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
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
