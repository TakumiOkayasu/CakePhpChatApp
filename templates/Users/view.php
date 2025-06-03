<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($user->created_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Password Hash') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->password_hash)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Chat Members') ?></h4>
                <?php if (!empty($user->chat_members)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Chat Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Joined At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->chat_members as $chatMember) : ?>
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
        </div>
    </div>
</div>