<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChatMember $chatMember
 * @var \Cake\Collection\CollectionInterface|string[] $chats
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Chat Members'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="chatMembers form content">
            <?= $this->Form->create($chatMember) ?>
            <fieldset>
                <legend><?= __('Add Chat Member') ?></legend>
                <?php
                    echo $this->Form->control('joined_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
