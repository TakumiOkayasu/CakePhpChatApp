<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ChatMember> $chatMembers
 */
?>
<div class="chatMembers index content">
    <?= $this->Html->link(__('New Chat Member'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Chat Members') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('chat_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('joined_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chatMembers as $chatMember): ?>
                <tr>
                    <td><?= $chatMember->hasValue('chat') ? $this->Html->link($chatMember->chat->name, ['controller' => 'Chats', 'action' => 'view', $chatMember->chat->id]) : '' ?></td>
                    <td><?= $chatMember->hasValue('user') ? $this->Html->link($chatMember->user->username, ['controller' => 'Users', 'action' => 'view', $chatMember->user->id]) : '' ?></td>
                    <td><?= h($chatMember->joined_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $chatMember->chat_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chatMember->chat_id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $chatMember->chat_id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $chatMember->chat_id),
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