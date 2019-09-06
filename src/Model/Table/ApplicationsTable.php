<?php
namespace App\Model\Table;

use App\Model\Entity\Application;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Applications Model
 *
* <<<<<<< HEAD
 * @property |\Cake\ORM\Association\BelongsTo $Jobs
 * @property |\Cake\ORM\Association\BelongsTo $Candidates
 *
 * @method Application get($primaryKey, $options = [])
 * @method Application newEntity($data = null, array $options = [])
 * @method Application[] newEntities(array $data, array $options = [])
 * @method Application|bool save(EntityInterface $entity, $options = [])
 * @method Application patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Application[] patchEntities($entities, array $data, array $options = [])
 * @method Application findOrCreate($search, callable $callback = null, $options = [])
* >>>>>>> 897b5161c46cfe7588e8c6f1a12c281795a12605
 */
class ApplicationsTable extends Table
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

        $this->setTable('applications');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id'
        ]);
        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidate_id'
        ]);
        $this->belongsTo('Employer', [
            'joinTable' => 'jobs',
            'through' => 'Jobs'
        ]);
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));
        $rules->add($rules->existsIn(['candidate_id'], 'Candidates'));

        return $rules;
    }
}
