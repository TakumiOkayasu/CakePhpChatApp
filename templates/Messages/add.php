<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 * @var \Cake\Collection\CollectionInterface|string[] $chats
 * @var \Cake\Collection\CollectionInterface|string[] $senders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Messages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="messages form content">
            <?= $this->Form->create($message) ?>
            <fieldset>
                <legend><?= __('Add Message') ?></legend>
                <?php
                    echo $this->Form->control('chat_id', ['options' => $chats]);
                    echo $this->Form->control('sender_id', ['options' => $senders, 'empty' => true]);
                    echo $this->Form->control('content');
                    echo $this->Form->control('created_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
