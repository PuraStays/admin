<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Type'), ['action' => 'edit', $userType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Type'), ['action' => 'delete', $userType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userTypes view large-9 medium-8 columns content">
    <h3><?= h($userType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User Type Name') ?></th>
            <td><?= h($userType->User_Type_Name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($userType->Description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($userType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('DOC') ?></th>
            <td><?= h($userType->DOC) ?></td>
        </tr>
        <tr>
            <th><?= __('DOU') ?></th>
            <td><?= h($userType->DOU) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $userType->Status ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($userType->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Mobile') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('User Type Id') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('DOC') ?></th>
                <th><?= __('DOU') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userType->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->Image) ?></td>
                <td><?= h($users->Name) ?></td>
                <td><?= h($users->Mobile) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->user_type_id) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->Status) ?></td>
                <td><?= h($users->DOC) ?></td>
                <td><?= h($users->DOU) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
