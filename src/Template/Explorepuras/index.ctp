<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Explorepura'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="explorepuras index large-9 medium-8 columns content">
    <h3><?= __('Explorepuras') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Id') ?></th>
                <th><?= $this->Paginator->sort('Meta_Keyword') ?></th>
                <th><?= $this->Paginator->sort('Meta_Title') ?></th>
                <th><?= $this->Paginator->sort('Tags') ?></th>
                <th><?= $this->Paginator->sort('Banner_Title') ?></th>
                <th><?= $this->Paginator->sort('Stay_Title') ?></th>
                <th><?= $this->Paginator->sort('Stay_Gallery') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($explorepuras as $explorepura): ?>
            <tr>
                <td><?= $this->Number->format($explorepura->Id) ?></td>
                <td><?= h($explorepura->Meta_Keyword) ?></td>
                <td><?= h($explorepura->Meta_Title) ?></td>
                <td><?= h($explorepura->Tags) ?></td>
                <td><?= h($explorepura->Banner_Title) ?></td>
                <td><?= h($explorepura->Stay_Title) ?></td>
                <td><?= h($explorepura->Stay_Gallery) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $explorepura->Id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $explorepura->Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $explorepura->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $explorepura->Id)]) ?>
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
