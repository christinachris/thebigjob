<?php
namespace App\Model\Table;

use App\Model\Entity\ArticleView;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticleViews Model
 *
 * @property UsersTable|BelongsTo $Users
 * @property ArticlesTable|BelongsTo $Articles
 *
 * @method ArticleView get($primaryKey, $options = [])
 * @method ArticleView newEntity($data = null, array $options = [])
 * @method ArticleView[] newEntities(array $data, array $options = [])
 * @method ArticleView|bool save(EntityInterface $entity, $options = [])
 * @method ArticleView patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method ArticleView[] patchEntities($entities, array $data, array $options = [])
 * @method ArticleView findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin TimestampBehavior
 */
class ArticleViewsTable extends Table
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

        $this->setTable('article_views');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['article_id'], 'Articles'));

        return $rules;
    }
}
