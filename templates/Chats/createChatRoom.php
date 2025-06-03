<h2>新しいチャットルーム作成</h2>

<?= $this->Form->create($chat) ?>
<?= $this->Form->control('name', ['label' => 'チャット名（省略可）']) ?>
<?= $this->Form->control('is_group', ['type' => 'checkbox', 'label' => 'グループチャット']) ?>
<?= $this->Form->submit('作成') ?>
<?= $this->Form->end() ?>