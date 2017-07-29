<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Explorepura'), ['action' => 'edit', $explorepura->Id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Explorepura'), ['action' => 'delete', $explorepura->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $explorepura->Id)]) ?> </li>
        <li><?= $this->Html->link(__('List Explorepuras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Explorepura'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="explorepuras view large-9 medium-8 columns content">
    <h3><?= h($explorepura->Id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Meta Keyword') ?></th>
            <td><?= h($explorepura->Meta_Keyword) ?></td>
        </tr>
        <tr>
            <th><?= __('Meta Title') ?></th>
            <td><?= h($explorepura->Meta_Title) ?></td>
        </tr>
        <tr>
            <th><?= __('Tags') ?></th>
            <td><?= h($explorepura->Tags) ?></td>
        </tr>
        <tr>
            <th><?= __('Banner Title') ?></th>
            <td><?= h($explorepura->Banner_Title) ?></td>
        </tr>
        <tr>
            <th><?= __('Stay Title') ?></th>
            <td><?= h($explorepura->Stay_Title) ?></td>
        </tr>
        <tr>
            <th><?= __('Stay Gallery') ?></th>
            <td><?= h($explorepura->Stay_Gallery) ?></td>
        </tr>
        <tr>
            <th><?= __('Cafe Title') ?></th>
            <td><?= h($explorepura->Cafe_Title) ?></td>
        </tr>
        <tr>
            <th><?= __('Cafe Gallery') ?></th>
            <td><?= h($explorepura->Cafe_Gallery) ?></td>
        </tr>
        <tr>
            <th><?= __('Experiences Title') ?></th>
            <td><?= h($explorepura->Experiences_Title) ?></td>
        </tr>
        <tr>
            <th><?= __('Experiences Gallery') ?></th>
            <td><?= h($explorepura->Experiences_Gallery) ?></td>
        </tr>
        <tr>
            <th><?= __('Operations Title') ?></th>
            <td><?= h($explorepura->Operations_Title) ?></td>
        </tr>
        <tr>
            <th><?= __('Operations Gallery') ?></th>
            <td><?= h($explorepura->Operations_Gallery) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($explorepura->Id) ?></td>
        </tr>
        <tr>
            <th><?= __('DOC') ?></th>
            <td><?= h($explorepura->DOC) ?></td>
        </tr>
        <tr>
            <th><?= __('DOU') ?></th>
            <td><?= h($explorepura->DOU) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $explorepura->Status ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Meta Description') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Meta_Description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Banner Description') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Banner_Description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Banner Image') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Banner_Image)); ?>
    </div>
    <div class="row">
        <h4><?= __('Banner Video') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Banner_Video)); ?>
    </div>
    <div class="row">
        <h4><?= __('Stay Details') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Stay_Details)); ?>
    </div>
    <div class="row">
        <h4><?= __('Stay Description') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Stay_Description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Cafe Details') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Cafe_Details)); ?>
    </div>
    <div class="row">
        <h4><?= __('Cafe Description') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Cafe_Description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Experiences Details') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Experiences_Details)); ?>
    </div>
    <div class="row">
        <h4><?= __('Experiences Description') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Experiences_Description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Operations Details') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Operations_Details)); ?>
    </div>
    <div class="row">
        <h4><?= __('Operations Description') ?></h4>
        <?= $this->Text->autoParagraph(h($explorepura->Operations_Description)); ?>
    </div>
</div>
