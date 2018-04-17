<div>
    <h3>いまなにしてる？</h3>
    <?= $this->Form->create($data) ?>
    <fieldset>
        <?= $this->Form->hidden('username', ["value" => $name1]); ?>
        <?= $this->Form->input('message', ["style"=>'height:30px;']); ?>
        <?php echo ("最新のつぶやき：".$new->message."　".$new->created) ?>
        <?= $this->Form->button('投稿する', ["class" => "right"]) ?>
        <?= $this->Form->end() ?>
    </fieldset>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Message</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tweets as $tweet): ?>
                    <tr>
                        <td><?= h($tweet->username) ?></td>
                        <td><?= h($tweet->message) ?></td>
                        <td><?= h($tweet->created) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <aside>
        <h5>
            <?php echo "ユーザー名：".$name1 ?><br>
            <?php echo "投稿数：".$msgcount ?><br>
        </h5>
    </aside>
</div>