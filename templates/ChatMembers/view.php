<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChatMember $chatMember
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Chat Member'), ['action' => 'edit', $chatMember->chat_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Chat Member'), ['action' => 'delete', $chatMember->chat_id], ['confirm' => __('Are you sure you want to delete # {0}?', $chatMember->chat_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Chat Members'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Chat Member'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="chatMembers view content">
            <h3><?= h($chatMember->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Chat') ?></th>
                    <td><?= $chatMember->hasValue('chat') ? $this->Html->link($chatMember->chat->name, ['controller' => 'Chats', 'action' => 'view', $chatMember->chat->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $chatMember->hasValue('user') ? $this->Html->link($chatMember->user->username, ['controller' => 'Users', 'action' => 'view', $chatMember->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Joined At') ?></th>
                    <td><?= h($chatMember->joined_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>