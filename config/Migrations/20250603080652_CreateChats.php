<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateChats extends BaseMigration
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
        // chats テーブル
        $this->table('chats')
            ->addColumn('name', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('is_group', 'boolean', ['default' => false])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
