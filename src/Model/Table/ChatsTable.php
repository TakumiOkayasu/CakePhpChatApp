<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chats Model
 *
 * @property \App\Model\Table\ChatMembersTable&\Cake\ORM\Association\HasMany $ChatMembers
 * @property \App\Model\Table\MessagesTable&\Cake\ORM\Association\HasMany $Messages
 *
 * @method \App\Model\Entity\Chat newEmptyEntity()
 * @method \App\Model\Entity\Chat newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Chat> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chat get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Chat findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Chat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Chat> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chat|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Chat saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Chat>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Chat>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Chat>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Chat> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Chat>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Chat>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Chat>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Chat> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ChatsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('chats');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ChatMembers', [
            'foreignKey' => 'chat_id',
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'chat_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->allowEmptyString('name');

        $validator
            ->boolean('is_group')
            ->notEmptyString('is_group');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        return $validator;
    }
}
