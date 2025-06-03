<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChatMembersFixture
 */
class ChatMembersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'chat_id' => 1,
                'user_id' => 1,
                'joined_at' => 1748944006,
            ],
        ];
        parent::init();
    }
}
