<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChatMember $chatMember
 * @var string[]|\Cake\Collection\CollectionInterface $chats
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $chatMember->chat_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $chatMember->chat_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Chat Members'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="chatMembers form content">
            <?= $this->Form->create($chatMember) ?>
            <fieldset>
                <legend><?= __('Edit Chat Member') ?></legend>
                <?php
                    echo $this->Form->control('joined_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
