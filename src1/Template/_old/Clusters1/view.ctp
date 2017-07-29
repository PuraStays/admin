<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cluster'), ['action' => 'edit', $cluster->Id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cluster'), ['action' => 'delete', $cluster->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $cluster->Id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clusters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cluster'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clusters view large-9 medium-8 columns content">
    <h3><?= h($cluster->Id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Meta Keyword') ?></th>
            <td><?= h($cluster->Meta_Keyword) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($cluster->Title) ?></td>
        </tr>
        <tr>
            <th><?= __('Resorts') ?></th>
            <td><?= h($cluster->Resorts) ?></td>
        </tr>
        <tr>
            <th><?= __('Clusters') ?></th>
            <td><?= h($cluster->Activitys) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($cluster->Id) ?></td>
        </tr>
        <tr>
            <th><?= __('Banner Image') ?></th>
            <td><?= $this->Number->format($cluster->Banner_Image) ?></td>
        </tr>
        <tr>
            <th><?= __('Banner Video') ?></th>
            <td><?= $this->Number->format($cluster->Banner_Video) ?></td>
        </tr>
        <tr>
            <th><?= __('DOC') ?></th>
            <td><?= h($cluster->DOC) ?></td>
        </tr>
        <tr>
            <th><?= __('DOU') ?></th>
            <td><?= h($cluster->DOU) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $cluster->Status ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Meta Title') ?></h4>
        <?= $this->Text->autoParagraph(h($cluster->Meta_Title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Meta Description') ?></h4>
        <?= $this->Text->autoParagraph(h($cluster->Meta_Description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($cluster->Description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Banner Title') ?></h4>
        <?= $this->Text->autoParagraph(h($cluster->Banner_Title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Banner Description') ?></h4>
        <?= $this->Text->autoParagraph(h($cluster->Banner_Description)); ?>
    </div>
</div>
