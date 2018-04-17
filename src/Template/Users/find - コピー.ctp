<div>
    <h3>Find Person</h3>
    <?= $this->Form->create("Users") ?>
    <fieldset>
    <?php
        echo $this->Form->input('findusers', array('type'=>'text;','style'=>'width:300px; height:30px;',"label" => "誰を検索しますか？"));
        echo "ユーザーや名前で検索　　　";
        echo $this->Form->button('検索');
    ?>
    </fieldset>
    <?= $this->Form->end() ?>
    <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($findusers as $finduser): ?>
                    <tr>
                        <td><?= h($finduser->username)?></td>
                        <td><?php
                                $this->Form->create();
                                echo $this->Form->button('Follow');
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
