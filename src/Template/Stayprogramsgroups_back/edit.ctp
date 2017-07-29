<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $stayprogramsgroup->Id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stayprogramsgroup->Id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stayprogramsgroups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stayprogramsgroups form large-9 medium-8 columns content">
    <?= $this->Form->create($stayprogramsgroup) ?>
    <fieldset>
        <legend><?= __('Edit Stayprogramsgroup') ?></legend>
        <?php
            echo $this->Form->input('Group_Name');
            echo $this->Form->input('activities_id', ['options' => $activities]);
            echo $this->Form->input('qty');
            echo $this->Form->input('Status');
            echo $this->Form->input('DOC');
            echo $this->Form->input('DOU');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
