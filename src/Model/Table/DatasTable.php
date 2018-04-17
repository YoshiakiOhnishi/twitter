<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Datas Model
 *
 * @method \App\Model\Entity\Data get($primaryKey, $options = [])
 * @method \App\Model\Entity\Data newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Data[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Data|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Data patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Data[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Data findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DatasTable extends Table
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

        $this->setTable('datas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('tweetid');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'username',
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
            ->integer('tweetid')
            ->allowEmpty('tweetid', 'create');
        
        $validator
        ->scalar('username')
        ->lengthBetween('username', [4, 20],'ユーザIDは4文字以上20文字以下で入力してください．')
        ->requirePresence('username', 'create')
        ->notEmpty('username', 'ユーザIDを入力してください．')
        ->add('username','alphaNumeric',['rule'=>'alphaNumeric', 'message' =>'ユーザIDは半角英数字で入力してください．']);
    

        $validator
            ->scalar('message')
            ->maxLength('message', 140)
            ->requirePresence('message', 'create')
            ->notEmpty('message');

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
        //$rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['username'], 'Users'));

        return $rules;
    }
}
