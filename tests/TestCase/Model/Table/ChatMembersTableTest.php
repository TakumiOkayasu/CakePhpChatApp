<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChatMembersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChatMembersTable Test Case
 */
class ChatMembersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChatMembersTable
     */
    protected $ChatMembers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ChatMembers',
        'app.Chats',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ChatMembers') ? [] : ['className' => ChatMembersTable::class];
        $this->ChatMembers = $this->getTableLocator()->get('ChatMembers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ChatMembers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ChatMembersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ChatMembersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
