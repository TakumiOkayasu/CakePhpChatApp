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
    public function change(): void
    {
        $table = $this->table('chat_members', ['id' => false, 'primary_key' => ['chat_id', 'user_id']]);

        $table
            ->addColumn('chat_id', 'integer')
            ->addColumn('user_id', 'integer')
            ->addColumn('joined_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey('chat_id', 'chats', 'id', ['delete' => 'CASCADE'])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
            ->create();
    }


    public function down(): void
    {
        $this->table('chat_members')->drop()->save();
    }
}
