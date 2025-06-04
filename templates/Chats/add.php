<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chat $chat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Chats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="chats form content">
            <?= $this->Form->create($chat) ?>
            <fieldset>
                <legend><?= __('Add Chat') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('is_group');
                    echo $this->Form->control('created_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
