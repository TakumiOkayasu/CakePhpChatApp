<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChatMember Entity
 *
 * @property int $chat_id
 * @property int $user_id
 * @property \Cake\I18n\DateTime $joined_at
 *
 * @property \App\Model\Entity\Chat $chat
 * @property \App\Model\Entity\User $user
 */
class ChatMember extends Entity
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
        'joined_at' => true,
        'chat' => true,
        'user' => true,
    ];
}
