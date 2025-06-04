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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $chat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $chat->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Chats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="chats form content">
            <?= $this->Form->create($chat) ?>
            <fieldset>
                <legend><?= __('Edit Chat') ?></legend>
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
