<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property int $chat_id
 * @property int|null $sender_id
 * @property string $content
 * @property \Cake\I18n\DateTime $created_at
 *
 * @property \App\Model\Entity\Chat $chat
 * @property \App\Model\Entity\User $sender
 */
class Message extends Entity
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
        'chat_id' => true,
        'sender_id' => true,
        'content' => true,
        'created_at' => true,
        'chat' => true,
        'sender' => true,
    ];
}
