<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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
        $this->setDisplayField('name');
        $this->setPrimaryKey('username');

        $this->hasMany('Datas', [
            'foreignKey' => 'username'
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
        ->scalar('username')
        ->lengthBetween('username', [4, 20],'ユーザIDは4文字以上20文字以下で入力してください．')
        ->requirePresence('username', 'create')
        ->notEmpty('username', 'ユーザIDを入力してください．')
        ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => '既に使用されている名前です．'])
        ->add('username','alphaNumeric',['rule'=>'alphaNumeric', 'message' =>'ユーザIDは半角英数字で入力してください．']);

        $validator
        ->scalar('password')
        ->lengthBetween('password', [4, 100],'パスワードは4文字以上8文字以内にしてください．')
        ->requirePresence('password', 'create')
        ->notEmpty('password', 'パスワードを入力してください．')
        ->add('password','alphaNumeric',['rule'=>'alphaNumeric', 'message' =>'パスワードは半角英数字で入力してください．']);


        $validator
            ->scalar('name')
            ->lengthBetween('name', [4, 20],'名前は4文字以上20文字以下で入力してください．')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('mail')
            ->maxLength('mail', 100)
            ->requirePresence('mail', 'create')
            ->notEmpty('mail');

        $validator
            ->boolean('secret')
            ->requirePresence('secret', 'create')
            ->notEmpty('secret');

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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
