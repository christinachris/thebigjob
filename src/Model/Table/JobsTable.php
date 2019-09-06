<?php
namespace App\Model\Table;

use App\Model\Entity\Job;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
 * @property ApplicationsTable|HasMany $Applications
 *
 * @method Job get($primaryKey, $options = [])
 * @method Job newEntity($data = null, array $options = [])
 * @method Job[] newEntities(array $data, array $options = [])
 * @method Job|bool save(EntityInterface $entity, $options = [])
 * @method Job patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Job[] patchEntities($entities, array $data, array $options = [])
 * @method Job findOrCreate($search, callable $callback = null, $options = [])
 */
class JobsTable extends Table
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

        $this->addBehavior('Timestamp');
        $this->setTable('jobs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Applications', [
            'foreignKey' => 'job_id'
        ]);

        $this->belongsTo('Employers',[
            'foreignKey' => 'employer_id'
        ]);



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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('contract_type')
            ->maxLength('contract_type', 255)
            ->requirePresence('contract_type', 'create')
            ->notEmpty('contract_type');

        $validator
            ->scalar('job_details')
            ->maxLength('job_details', 255)
            ->allowEmpty('job_details');

        $validator
            ->scalar('salary')
            ->maxLength('salary', 255)
            ->allowEmpty('salary');

        $validator
            ->integer('classification_id')
            ->notEmpty('classification');

        return $validator;
    }

    public function publish(EntityInterface $entity, $options = [])
    {
        $options = new ArrayObject((array)$options + [
                'atomic' => true,
                'checkRules' => true,
                '_primary' => true,
            ]);

        $success = $this->_executeTransaction(function () use ($entity, $options) {
            return $this->_processDelete($entity, $options);
        }, $options['atomic']);

        if ($success && $this->_transactionCommitted($options['atomic'], $options['_primary'])) {
            $this->dispatchEvent('Model.afterDeleteCommit', [
                'entity' => $entity,
                'options' => $options
            ]);
        }

        return $success;
    }

}
