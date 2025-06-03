<h2>チャットルーム</h2>

<div id="chat-box" style="border:1px solid #ccc; padding:10px; max-height:300px; overflow-y:auto;">
	<?php foreach ($messages as $message): ?>
		<div>
			<strong><?= h($message->sender->username) ?>:</strong>
			<?= h($message->content) ?>
			<small><?= $message->created->format('Y-m-d H:i') ?></small>
		</div>
	<?php endforeach; ?>
</div>

<?= $this->Form->create(null, ['url' => ['controller' => 'Messages', 'action' => 'send']]) ?>
<?= $this->Form->hidden('chat_id', ['value' => $chat->id]) ?>
<?= $this->Form->hidden('sender_id', ['value' => $currentUser->id]) ?>
<?= $this->Form->control('content', ['label' => false, 'placeholder' => 'メッセージを入力']) ?>
<?= $this->Form->button('送信') ?>
<?= $this->Form->end() ?>

<p><?= $this->Html->link('← チャット一覧に戻る', ['controller' => 'Chats', 'action' => 'index']) ?></p>