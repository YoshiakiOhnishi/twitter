<?php
namespace App\Controller;
 
use App\Controller\AppController;
 
class DatasController extends AppController {

    public $paginate = [
        'limit' => 10,
        'order' => [
            'Datas.created' => 'Desc'
        ]
    ];

    public $helpers = [
        'Paginator' => ['templates' => 
            'paginator-templates']
    ];

    public function tweet()
    {
        $this->viewBuilder()->layout('sample');
        
        // セッションオブジェクトの取得
        $session = $this->request->session();
        // セッションデータの書き込み
        //$session->write('username', $_POST["username"]);*/
        // セッションデータの読み込み
        $this->set('name1', $session->read('username'));

        $data = $this->Datas->newEntity();
        $this->set('data', $data);
        if ($this->request->is('post')) {
            $data = $this->Datas->patchEntity($data, $this->request->data);                    
            if ($this->Datas->save($data)) {
                //return $this->redirect(['action' => 'register']);
            } 
            if ($data->errors()){
                $this->Flash->error('please check entered values...');
            }
        }
        $this->set('tweets', $this->paginate());

        $new = $this->Datas->find()->where(["username" => $session->read('username')])->order(["created" => "Desc"])->select(["message", "created"])->first();
        $this->set("new", $new);

        $msgcount = $this->Datas->find()->where(["username" => $session->read('username')])->count();
        $this->set("msgcount", $msgcount);
    }

}
?>