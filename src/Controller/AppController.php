<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Flashコンポーネント。エラーメッセージの表示などに使用
        $this->loadComponent('RequestHandler'); // RequestHandlerコンポーネント。入力されたデータの取得などに使用
        $this->loadComponent('Paginator');
        $this->loadComponent('Auth', [ // Authコンポーネントの読み込み
            'authenticate' => [
                'Form' => [ // 認証の種類を指定。Form,Basic,Digestが使える。デフォルトはForm
                    'fields' => [ // ユーザー名とパスワードに使うカラムの指定。省略した場合はusernameとpasswordになる
                        'username' => 'username', // ユーザー名のカラムを指定
                        'password' => 'password' //パスワードに使うカラムを指定
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [ // ログイン後に遷移するアクションを指定
                'controller' => 'Datas',
                'action' => 'tweet'
            ],
            'logoutRedirect' => [ // ログアウト後に遷移するアクションを指定
                'controller' => 'Users',
                'action' => 'login',
            ],
            'authError' => 'ログインできませんでした。ログインしてください。', // ログインに失敗したときのFlashメッセージを指定(省略可)
        ]);
    }
}
