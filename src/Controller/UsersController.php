<?php
namespace App\Controller;
 
use App\Controller\AppController;
 
class UsersController extends AppController {

  public $paginate = [
    'limit' => 10,
];

public $helpers = [
    'Paginator' => ['templates' => 
        'paginator-templates']
];

  /**
     * 認証不要なアクションを定義
     */
  public function beforeFilter(\Cake\Event\Event $event) {
    parent::beforeFilter($event);
    $this->Auth->allow(['register']);
  }

  public function login()
{
	if($this->request->is('post')){
		$user = $this->Auth->identify();
		if($user){
      $this->Auth->setUser($user);

      // セッションオブジェクトの取得
      $this->request->session();
      // セッションデータの書き込み
      $this->request->session()->write('username', $_POST["username"]);
      // セッションデータの読み込み
      //$this->request->session()->set('name1', $session->read('username'));

			return $this->redirect($this->Auth->redirectUrl());
		}
		$this->Flash->error('ユーザー名かパスワードが間違っています');
	}
}

  public function logout()
  {
    $this->Flash->success('ログアウトしました');
    $this->viewBuilder()->layout('sample');
    return $this->redirect($this->Auth->logout());
  }

  public function register()
  {
    $user = $this->Users->newEntity();
    $this->set('user', $user);
    if ($this->request->is('post')) {
        $user = $this->Users->patchEntity($user, $this->request->data);                    
        if ($this->Users->save($user)) {
            //return $this->redirect(['action' => 'register']);
        } 
        if ($user->errors()){
            $this->Flash->error('please check entered values...');
            unset($_POST["username"]);
        }
    }
  }
  
    
  public function find() {
    if ($this->request->is('post')) {
      //$conditions = ["fields" => ["username", "name"], "username like" => "%".$_POST["findusers"]."%"];
      //$findusers = $this->paginate($conditions);
      $findusers = $this->Users->find()->where(["username like" => "%".$_POST["findusers"]."%"])->orWhere(["name like" => "%". $_POST["findusers"]."%"])->select(["username", "name"]);
      $this->set("findusers", $findusers);
      //$user = $this->Users->get($_POST["findusers"], ['contain' => ['Datas']]);
      //$this->set('user', $user);
     // $this->set('_serialize', ['user']);}
    //} else {
    //  $findusers = [];
    }
  }

}
?>