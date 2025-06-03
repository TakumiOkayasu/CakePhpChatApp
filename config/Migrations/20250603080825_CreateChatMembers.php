<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateChatMembers extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function up(): void
    {
        // chat_members テーブル（中間テーブル）
        $this->table('chat_members')
            ->addColumn('chat_id', 'integer')
            ->addColumn('user_id', 'integer')
            ->addColumn('joined_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addPrimaryKey(['chat_id', 'user_id'])
            ->addForeignKey('chat_id', 'chats', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
