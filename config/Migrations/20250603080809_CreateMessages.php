<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateMessages extends BaseMigration
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
        // messages テーブル
        $this->table('messages')
            ->addColumn('chat_id', 'integer')
            ->addColumn('sender_id', 'integer')
            ->addColumn('content', 'text')
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey('chat_id', 'chats', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('sender_id', 'users', 'id', ['delete' => 'SET NULL', 'update' => 'NO_ACTION'])
            ->create();
    }
}
