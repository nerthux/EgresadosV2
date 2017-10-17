<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\GenerationsTable|\Cake\ORM\Association\BelongsTo $Generations
 * @property \App\Model\Table\CareersTable|\Cake\ORM\Association\BelongsTo $Careers
 * @property \App\Model\Table\AchievementsTable|\Cake\ORM\Association\BelongsToMany $Achievements
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsToMany $Companies
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsToMany $Questions
 * @property \App\Model\Table\SkillsTable|\Cake\ORM\Association\BelongsToMany $Skills
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Generations', [
            'foreignKey' => 'generation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Careers', [
            'foreignKey' => 'career_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Achievements', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'achievement_id',
            'joinTable' => 'achievements_users'
        ]);
        $this->belongsToMany('Companies', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'companies_id',
            'joinTable' => 'companies_users'
        ]);
        $this->belongsToMany('Questions', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'question_id',
            'joinTable' => 'questions_users'
        ]);
        $this->belongsToMany('Skills', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'skill_id',
            'joinTable' => 'skills_users'
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
            ->scalar('first_name')
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email',
			'validEmail', [ 'rule' => ['email'], 'message' => 'Ingresa una dirección de email válida!'], 
			'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->allowEmpty('password');

        $validator
            ->scalar('student_id_number')
            ->allowEmpty('student_id_number');

        $validator
            ->integer('email_validation_code')
            ->allowEmpty('email_validation_code');

        $validator
            ->boolean('email_verified')
            ->allowEmpty('email_verified');

        $validator
            ->scalar('mobile_phone_number')
            ->allowEmpty('mobile_phone_number');

        $validator
            ->integer('sms_validation_code')
            ->allowEmpty('sms_validation_code');

        $validator
            ->boolean('sms_verified')
            ->allowEmpty('sms_verified');

        $validator
            ->scalar('password_recovery_hash')
            ->allowEmpty('password_recovery_hash');

        $validator
            ->scalar('role')
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        $validator
            ->date('date_of_birth')
            ->allowEmpty('date_of_birth');

        $validator
            ->boolean('have_title')
            ->allowEmpty('have_title');

        $validator
            ->scalar('gender')
            ->allowEmpty('gender');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['generation_id'], 'Generations'));
        $rules->add($rules->existsIn(['career_id'], 'Careers'));

        return $rules;
    }
    //finders
    public function findEmailVerification(Query $query, $options = [])
    {
        return $query->where(['id' => $options['id'], 'email_validation_code' => $options['code']]);
    }

    public function findSmsVerification(Query $query, $options = [])
    {
        return $query->where(['id' => $options['id'], 'sms_validation_code' => $options['code']]);
    }
}
