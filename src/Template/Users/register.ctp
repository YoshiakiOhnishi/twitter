<div>
<?php if(empty($_POST["username"])): ?>
    <main>
    <h3>ついったーに参加しましょう</h3>
    <?= $this->Form->create($user) ?>
    <fieldset>
    <?php
        echo $this->Form->input('name', array('type'=>'text;','style'=>'width:300px; height:30px;',"label" => "名前"));
        echo $this->Form->input('username', array('type'=>'text;','style'=>'width:300px; height:30px;',"label" => "ユーザ名"));
        echo $this->Form->input('password', array('style'=>'width:300px; height:30px;',"label" => "パスワード"));
        //echo $this->Form->input('password', array('style'=>'width:300px; height:30px;'));
        echo $this->Form->input('mail', array('type'=>'text;','style'=>'width:300px; height:30px;',"label" => "メールアドレス"));
        echo $this->Form->checkbox('secret',['id'=>'secret', "label" => "secret"]) ;
        echo $this->Form->label('check','つぶやきを非公開にする');
        echo nl2br("\n");
        echo $this->Form->button('アカウントを作成する');
    ?>
    </fieldset>
    <?= $this->Form->end() ?>
    </main>
    <aside>
        <h6>もうツイッターに登録していますか？<a href="http://localhost/cakephp/users/login">ログイン</a></h6>
    </aside>
    <?php elseif(!empty($_POST["username"])): ?>
    <h3>ついったーに参加しました</h3>
    <?= $this->Form->create() ?>
    <fieldset>
    <?php
        echo $_POST["username"]."さんはついったーに参加されました．";
        echo nl2br("\n");
        echo "ログインをクリックしてログインしてつぶやいてください．";
        echo nl2br("\n");
    ?>
    <button type="button">
    <a href="http://localhost/cakephp/users/login">twitterにログイン</a>
    </button>
    </fieldset>
    <?= $this->Form->end() ?>
    <?php endif; ?>
</div>