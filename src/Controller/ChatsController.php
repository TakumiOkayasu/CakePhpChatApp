<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\Query\SelectQuery;
use Cake\Datasource\Exception\RecordNotFoundException;

class ChatsController extends AppController
{
	public function initialize(): void
	{
		parent::initialize();
		$this->fetchTable('chats');
		$this->fetchTable('chat_members');
		$this->fetchTable('users');
		$this->fetchTable('messages');
	}

	/**
	 * チャットルーム一覧（現在ログイン中のユーザーが参加しているもの）
	 */
	public function index()
	{
		// 認証ユーザー取得（Authenticationプラグインが必要）
		$user = $this->request->getAttribute('identity');

		$chatIds = $this->ChatMembers
			->find()
			->select(['chat_id'])
			->where(['user_id' => $user->get('id')]);

		$chats = $this->Chats
			->find()
			->where(['id IN' => $chatIds])
			->order(['created_at' => 'DESC'])
			->all();

		$this->set(compact('chats'));
	}

	/**
	 * 新しいチャットルーム作成
	 */
	public function add()
	{
		$chat = $this->Chats->newEmptyEntity();

		if ($this->request->is('post')) {
			$chat = $this->Chats->patchEntity($chat, $this->request->getData());

			if ($this->Chats->save($chat)) {
				// 作成者を chat_members に追加
				$user = $this->request->getAttribute('identity');

				$member = $this->ChatMembers->newEntity([
					'chat_id' => $chat->id,
					'user_id' => $user->get('id')
				]);

				$this->ChatMembers->save($member);

				$this->Flash->success(__('チャットルームを作成しました'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('チャットルームの作成に失敗しました。'));
		}

		$this->set(compact('chat'));
	}

	/**
	 * チャットに参加しているメンバーの一覧表示
	 */
	public function members(int $chatId)
	{
		try {
			$chat = $this->Chats->get($chatId, [
				'contain' => ['ChatMembers' => ['Users']]
			]);

			$this->set(compact('chat'));
		} catch (RecordNotFoundException $e) {
			$this->Flash->error(__('チャットが見つかりません。'));
			return $this->redirect(['action' => 'index']);
		}
	}

	/**
	 * チャット削除（管理機能など）
	 */
	public function delete(int $id)
	{
		$this->request->allowMethod(['post', 'delete']);

		$chat = $this->Chats->get($id);
		if ($this->Chats->delete($chat)) {
			$this->Flash->success(__('チャットを削除しました。'));
		} else {
			$this->Flash->error(__('チャットの削除に失敗しました。'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
