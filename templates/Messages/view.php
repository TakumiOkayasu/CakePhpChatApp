<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Messages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Message'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="messages view content">
            <h3><?= h($message->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Chat') ?></th>
                    <td><?= $message->hasValue('chat') ? $this->Html->link($message->chat->name, ['controller' => 'Chats', 'action' => 'view', $message->chat->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sender') ?></th>
                    <td><?= $message->hasValue('sender') ? $this->Html->link($message->sender->username, ['controller' => 'Users', 'action' => 'view', $message->sender->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($message->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($message->created_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($message->content)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>