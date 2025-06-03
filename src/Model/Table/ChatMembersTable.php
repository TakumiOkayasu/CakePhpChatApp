<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChatMembers Model
 *
 * @property \App\Model\Table\ChatsTable&\Cake\ORM\Association\BelongsTo $Chats
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ChatMember newEmptyEntity()
 * @method \App\Model\Entity\ChatMember newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ChatMember> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ChatMember get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ChatMember findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ChatMember patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ChatMember> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ChatMember|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ChatMember saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ChatMember>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ChatMember>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ChatMember>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ChatMember> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ChatMember>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ChatMember>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ChatMember>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ChatMember> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ChatMembersTable extends Table
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

        $this->setTable('chat_members');
        $this->setDisplayField(['chat_id', 'user_id']);
        $this->setPrimaryKey(['chat_id', 'user_id']);

        $this->belongsTo('Chats', [
            'foreignKey' => 'chat_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->dateTime('joined_at')
            ->notEmptyDateTime('joined_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['chat_id'], 'Chats'), ['errorField' => 'chat_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
