<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class InitSql extends BaseMigration
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
    }

    public function up(): void
    {
        // users テーブル
        $this->table('users')
            ->addColumn('username', 'string', ['limit' => 50, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('password_hash', 'text', ['null' => false])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addIndex(['username'], ['unique' => true])
            ->addIndex(['email'], ['unique' => true])
            ->create();

        // chats テーブル
        $this->table('chats')
            ->addColumn('name', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('is_group', 'boolean', ['default' => false])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();

        // chat_members テーブル（中間テーブル）
        $this->table('chat_members')
            ->addColumn('chat_id', 'integer')
            ->addColumn('user_id', 'integer')
            ->addColumn('joined_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addPrimaryKey(['chat_id', 'user_id'])
            ->addForeignKey('chat_id', 'chats', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();

        // messages テーブル
        $this->table('messages')
            ->addColumn('chat_id', 'integer')
            ->addColumn('sender_id', 'integer')
            ->addColumn('content', 'text')
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey('chat_id', 'chats', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('sender_id', 'users', 'id', ['delete' => 'SET NULL', 'update' => 'NO_ACTION'])
            ->create();

        /*
        CREATE TABLE users (
          id SERIAL PRIMARY KEY,
          username VARCHAR(50) UNIQUE NOT NULL,
          email VARCHAR(100) UNIQUE NOT NULL,
          password_hash TEXT NOT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE chats (
          id SERIAL PRIMARY KEY,
          name VARCHAR(100), -- グループチャット名（1対1チャットならNULL）
          is_group BOOLEAN DEFAULT FALSE,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE chat_members (
          chat_id INTEGER REFERENCES chats(id) ON DELETE CASCADE,
          user_id INTEGER REFERENCES users(id) ON DELETE CASCADE,
          joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (chat_id, user_id)
        );

        CREATE TABLE messages (
          id SERIAL PRIMARY KEY,
          chat_id INTEGER REFERENCES chats(id) ON DELETE CASCADE,
          sender_id INTEGER REFERENCES users(id),
          content TEXT,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        */
    }
}
