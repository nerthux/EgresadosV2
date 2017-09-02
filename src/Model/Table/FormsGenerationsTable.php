<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormsGenerations Model
 *
 * @property \App\Model\Table\FormsTable|\Cake\ORM\Association\BelongsTo $Forms
 * @property \App\Model\Table\GenerationsTable|\Cake\ORM\Association\BelongsTo $Generations
 *
 * @method \App\Model\Entity\FormsGeneration get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormsGeneration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormsGeneration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormsGeneration|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormsGeneration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormsGeneration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormsGeneration findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FormsGenerationsTable extends Table
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

        $this->setTable('forms_generations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Forms', [
            'foreignKey' => 'form_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Generations', [
            'foreignKey' => 'generation_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['form_id'], 'Forms'));
        $rules->add($rules->existsIn(['generation_id'], 'Generations'));

        return $rules;
    }
}
