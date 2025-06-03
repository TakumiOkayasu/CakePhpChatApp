<?php
?>

<h2>チャットルーム一覧</h2>

<ul>
	<?php foreach ($chats as $chat): ?>
		<li>
			<?= $this->Html->link(
				$chat->is_group ? h($chat->name) : '1対1チャット',
				['controller' => 'Messages', 'action' => 'index', $chat->id]
			) ?>
		</li>
	<?php endforeach; ?>
</ul>

<p><?= $this->Html->link('新しいチャットを作成', ['action' => 'add']) ?></p>