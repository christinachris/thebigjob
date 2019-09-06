<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Candidates Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\HasMany $Applications
 * @property \App\Model\Table\JobHistoriesTable|\Cake\ORM\Association\HasMany $JobHistories
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\PostsTable|\Cake\ORM\Association\HasMany $Posts
 * @property \App\Model\Table\QualificationsTable|\Cake\ORM\Association\HasMany $Qualifications
 * @property \App\Model\Table\SkillsTable|\Cake\ORM\Association\HasMany $Skills
 *
 * @method \App\Model\Entity\Candidate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Candidate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Candidate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Candidate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Candidate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Candidate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Candidate findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CandidatesTable extends Table
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

        $this->setTable('candidates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Applications', [
            'foreignKey' => 'candidate_id'
        ]);
        $this->hasMany('JobHistories', [
            'foreignKey' => 'candidate_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'candidate_id'
        ]);
        $this->hasMany('Posts', [
            'foreignKey' => 'candidate_id'
        ]);
        $this->hasMany('Qualifications', [
            'foreignKey' => 'candidate_id'
        ]);
        $this->hasMany('Skills', [
            'foreignKey' => 'candidate_id'
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
            ->maxLength('first_name', 100)
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 100)
            ->notEmpty('last_name');

        $validator
            ->email('email')
            ->notEmpty('email');

        $validator
            ->scalar('phone_no')
            ->maxLength('phone_no', 15)
            ->allowEmpty('phone_no');

        $validator
            ->scalar('state')
            ->maxLength('state', 100)
            ->allowEmpty('state');

        $validator
            ->scalar('country')
            ->maxLength('country', 100)
            ->notEmpty('country');

        $validator
            ->scalar('postname')
            ->maxLength('postname', 255)
            ->allowEmpty('postname');

        $validator
            ->scalar('postpath')
            ->maxLength('postpath', 500)
            ->allowEmpty('postpath');
        $validator
            ->scalar('link')
            ->maxLength('link', 225)
            ->allowEmpty('link');

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

        return $rules;
    }
}
