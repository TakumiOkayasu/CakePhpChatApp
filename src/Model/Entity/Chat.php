<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chat Entity
 *
 * @property int $id
 * @property string|null $name
 * @property bool $is_group
 * @property \Cake\I18n\DateTime $created_at
 *
 * @property \App\Model\Entity\ChatMember[] $chat_members
 * @property \App\Model\Entity\Message[] $messages
 */
class Chat extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'is_group' => true,
        'created_at' => true,
        'chat_members' => true,
        'messages' => true,
    ];
}
