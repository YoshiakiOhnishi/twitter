<div>
    <h3>ログイン</h3>
    <main>
    <?= $this->Form->create() ?>
    <fieldset>
    <?php
        echo $this->Form->input('username', array('style'=>'width:300px; height:30px;',"label" => "ユーザID"));
        echo $this->Form->input('password', array('style'=>'width:300px; height:30px;',"label" => "パスワード"));
        echo $this->Form->button('ログイン');
    ?>
    </fieldset>
    <?= $this->Form->end() ?>
    </main>
    <aside>
        ユーザ登録（無料）
        <button type="button">
    <a href="http://localhost/cakephp/users/register">ユーザ登録</a>
    </button>
    </aside>
</div>