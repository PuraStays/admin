<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stayprogramsgroup'), ['action' => 'edit', $stayprogramsgroup->Id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stayprogramsgroup'), ['action' => 'delete', $stayprogramsgroup->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $stayprogramsgroup->Id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stayprogramsgroups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stayprogramsgroup'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stayprogramsgroups view large-9 medium-8 columns content">
    <h3><?= h($stayprogramsgroup->Id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Group Name') ?></th>
            <td><?= h($stayprogramsgroup->Group_Name) ?></td>
        </tr>
        <tr>
            <th><?= __('Activities') ?></th>
            <td><?= h($stayprogramsgroup->Activities) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($stayprogramsgroup->Id) ?></td>
        </tr>
        <tr>
            <th><?= __('DOC') ?></th>
            <td><?= h($stayprogramsgroup->DOC) ?></td>
        </tr>
        <tr>
            <th><?= __('DOU') ?></th>
            <td><?= h($stayprogramsgroup->DOU) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $stayprogramsgroup->Status ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
