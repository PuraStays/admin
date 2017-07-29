<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Explorepuras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="explorepuras form large-9 medium-8 columns content">
    <?= $this->Form->create($explorepura) ?>
    <fieldset>
        <legend><?= __('Add Explorepura') ?></legend>
        <?php
            echo $this->Form->input('Meta_Keyword');
            echo $this->Form->input('Meta_Title');
            echo $this->Form->input('Meta_Description');
            echo $this->Form->input('Tags');
            echo $this->Form->input('Banner_Title');
            echo $this->Form->input('Banner_Description');
            echo $this->Form->input('Banner_Image');
            echo $this->Form->input('Banner_Video');
            echo $this->Form->input('Stay_Title');
            echo $this->Form->input('Stay_Details');
            echo $this->Form->input('Stay_Description');
            echo $this->Form->input('Stay_Gallery');
            echo $this->Form->input('Cafe_Title');
            echo $this->Form->input('Cafe_Details');
            echo $this->Form->input('Cafe_Description');
            echo $this->Form->input('Cafe_Gallery');
            echo $this->Form->input('Experiences_Title');
            echo $this->Form->input('Experiences_Details');
            echo $this->Form->input('Experiences_Description');
            echo $this->Form->input('Experiences_Gallery');
            echo $this->Form->input('Operations_Title');
            echo $this->Form->input('Operations_Details');
            echo $this->Form->input('Operations_Description');
            echo $this->Form->input('Operations_Gallery');
            echo $this->Form->input('Status');
            echo $this->Form->input('DOC');
            echo $this->Form->input('DOU');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
