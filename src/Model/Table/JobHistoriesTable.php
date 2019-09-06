<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobHistories Model
 *
 * @method \App\Model\Entity\JobHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobHistory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobHistory findOrCreate($search, callable $callback = null, $options = [])
 */
class JobHistoriesTable extends Table
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

        $this->setTable('job_histories');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title')
            ->add('title', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('company')
            ->maxLength('company', 255)
            ->requirePresence('company', 'create')
            ->notEmpty('company')
            ->add('company', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('job_description')
            ->maxLength('job_description', 255)
            ->allowEmpty('job_description');

        $validator
            ->date('date_start')
            ->requirePresence('date_start', 'create')
            ->notEmpty('date_start');

        $validator
            ->date('date_finish')
            ->allowEmpty('date_finish');

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
        $rules->add($rules->isUnique(['title']));
        $rules->add($rules->isUnique(['company']));
        $rules->add($rules->isUnique(['date_start']));

        return $rules;
    }
}
