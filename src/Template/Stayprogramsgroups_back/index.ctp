<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stayprogramsgroup'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stayprogramsgroups index large-9 medium-8 columns content">
    <h3><?= __('Stayprogramsgroups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Id') ?></th>
                <th><?= $this->Paginator->sort('Group_Name') ?></th>
                <th><?= $this->Paginator->sort('activities_id') ?></th>
                <th><?= $this->Paginator->sort('qty') ?></th>
                <th><?= $this->Paginator->sort('Status') ?></th>
                <th><?= $this->Paginator->sort('DOC') ?></th>
                <th><?= $this->Paginator->sort('DOU') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stayprogramsgroups as $stayprogramsgroup): ?>
            <tr>
                <td><?= $this->Number->format($stayprogramsgroup->Id) ?></td>
                <td><?= h($stayprogramsgroup->Group_Name) ?></td>
                <td><?= $stayprogramsgroup->has('activity') ? $this->Html->link($stayprogramsgroup->activity->Id, ['controller' => 'Activities', 'action' => 'view', $stayprogramsgroup->activity->Id]) : '' ?></td>
                <td><?= $this->Number->format($stayprogramsgroup->qty) ?></td>
                <td><?= h($stayprogramsgroup->Status) ?></td>
                <td><?= h($stayprogramsgroup->DOC) ?></td>
                <td><?= h($stayprogramsgroup->DOU) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $stayprogramsgroup->Id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stayprogramsgroup->Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stayprogramsgroup->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $stayprogramsgroup->Id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
