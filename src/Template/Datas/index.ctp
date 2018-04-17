<div>
    <h3>Users</h3>
    <table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->username ?></td>
            <td><?= h($user->password) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>