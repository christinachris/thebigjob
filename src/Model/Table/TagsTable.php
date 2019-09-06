<?php
namespace App\Model\Table;

use App\Model\Entity\Tag;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Association\BelongsToMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tags Model
 *
 * @property ArticlesTable|BelongsToMany $Articles
 *
 * @method Tag get($primaryKey, $options = [])
 * @method Tag newEntity($data = null, array $options = [])
 * @method Tag[] newEntities(array $data, array $options = [])
 * @method Tag|bool save(EntityInterface $entity, $options = [])
 * @method Tag patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Tag[] patchEntities($entities, array $data, array $options = [])
 * @method Tag findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin TimestampBehavior
 */
class TagsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {


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
            ->scalar('title')
            ->maxLength('title', 191)
            ->allowEmpty('title')
            ->add('title', 'unique', ['rule' => 'validateUnique', 'provider' => 'table',
                'message' => 'This tag already exists, please enter a different title for the tag']);

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
        $rules->add($rules->isUnique(['title']));

        return $rules;
    }
}
