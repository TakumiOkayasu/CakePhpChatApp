<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Message> $messages
 */
?>
<div class="messages index content">
    <?= $this->Html->link(__('New Message'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Messages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('chat_id') ?></th>
                    <th><?= $this->Paginator->sort('sender_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($messages as $message): ?>
                <tr>
                    <td><?= $this->Number->format($message->id) ?></td>
                    <td><?= $message->hasValue('chat') ? $this->Html->link($message->chat->name, ['controller' => 'Chats', 'action' => 'view', $message->chat->id]) : '' ?></td>
                    <td><?= $message->hasValue('sender') ? $this->Html->link($message->sender->username, ['controller' => 'Users', 'action' => 'view', $message->sender->id]) : '' ?></td>
                    <td><?= h($message->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $message->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $message->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $message->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $message->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>