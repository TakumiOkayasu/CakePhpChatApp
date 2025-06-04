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
            <?= $this->Html->link(__('Edit Chat'), ['action' => 'edit', $chat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Chat'), ['action' => 'delete', $chat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chat->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Chats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Chat'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="chats view content">
            <h3><?= h($chat->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($chat->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($chat->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($chat->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Group') ?></th>
                    <td><?= $chat->is_group ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Chat Members') ?></h4>
                <?php if (!empty($chat->chat_members)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Chat Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Joined At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($chat->chat_members as $chatMember) : ?>
                        <tr>
                            <td><?= h($chatMember->chat_id) ?></td>
                            <td><?= h($chatMember->user_id) ?></td>
                            <td><?= h($chatMember->joined_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ChatMembers', 'action' => 'view', $chatMember->chat_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ChatMembers', 'action' => 'edit', $chatMember->chat_id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'ChatMembers', 'action' => 'delete', $chatMember->chat_id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $chatMember->chat_id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Messages') ?></h4>
                <?php if (!empty($chat->messages)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Chat Id') ?></th>
                            <th><?= __('Sender Id') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($chat->messages as $message) : ?>
                        <tr>
                            <td><?= h($message->id) ?></td>
                            <td><?= h($message->chat_id) ?></td>
                            <td><?= h($message->sender_id) ?></td>
                            <td><?= h($message->content) ?></td>
                            <td><?= h($message->created_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Messages', 'action' => 'view', $message->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Messages', 'action' => 'edit', $message->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Messages', 'action' => 'delete', $message->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $message->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>