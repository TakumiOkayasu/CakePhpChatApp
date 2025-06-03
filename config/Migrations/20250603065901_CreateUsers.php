<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateUsers extends BaseMigration
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
    // users テーブル
    $this->table('users')
      ->addColumn('username', 'string', ['limit' => 50, 'null' => false])
      ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
      ->addColumn('password_hash', 'text', ['null' => false])
      ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
      ->addIndex(['username'], ['unique' => true])
      ->addIndex(['email'], ['unique' => true])
      ->create();
  }
}
