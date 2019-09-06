<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Qualifications Model
 *
 * @method \App\Model\Entity\Qualification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Qualification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Qualification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Qualification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Qualification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Qualification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Qualification findOrCreate($search, callable $callback = null, $options = [])
 */
class QualificationsTable extends Table
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

        $this->setTable('qualifications');
        $this->setDisplayField('candidate_id');
        $this->setPrimaryKey('id');
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
            ->integer('candidate_id')
            ->allowEmpty('candidate_id', 'create');

        $validator
            ->scalar('degree_name')
            ->maxLength('degree_name', 255)
            ->requirePresence('degree_name', 'create')
            ->notEmpty('degree_name')
            ->add('degree_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('degree_level')
            ->maxLength('degree_level', 255)
            ->allowEmpty('degree_level')
            ->add('degree_level', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->date('expected_graduation_date')
            ->requirePresence('expected_graduation_date', 'create')
            ->notEmpty('expected_graduation_date');

        $validator
            ->scalar('gpa')
            ->maxLength('gpa', 10)
            ->allowEmpty('gpa');

        $validator
            ->scalar('major')
            ->maxLength('major', 255)
            ->allowEmpty('major');

        $validator
            ->scalar('institution')
            ->maxLength('institution', 255)
            ->requirePresence('institution', 'create')
            ->notEmpty('institution');

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


        return $rules;
    }
}
