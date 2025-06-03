<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ChatMembers Controller
 *
 * @property \App\Model\Table\ChatMembersTable $ChatMembers
 */
class ChatMembersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ChatMembers->find()
            ->contain(['Chats', 'Users']);
        $chatMembers = $this->paginate($query);

        $this->set(compact('chatMembers'));
    }

    /**
     * View method
     *
     * @param string|null $id Chat Member id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chatMember = $this->ChatMembers->get($id, contain: ['Chats', 'Users']);
        $this->set(compact('chatMember'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chatMember = $this->ChatMembers->newEmptyEntity();
        if ($this->request->is('post')) {
            $chatMember = $this->ChatMembers->patchEntity($chatMember, $this->request->getData());
            if ($this->ChatMembers->save($chatMember)) {
                $this->Flash->success(__('The chat member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chat member could not be saved. Please, try again.'));
        }
        $chats = $this->ChatMembers->Chats->find('list', limit: 200)->all();
        $users = $this->ChatMembers->Users->find('list', limit: 200)->all();
        $this->set(compact('chatMember', 'chats', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chat Member id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chatMember = $this->ChatMembers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chatMember = $this->ChatMembers->patchEntity($chatMember, $this->request->getData());
            if ($this->ChatMembers->save($chatMember)) {
                $this->Flash->success(__('The chat member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chat member could not be saved. Please, try again.'));
        }
        $chats = $this->ChatMembers->Chats->find('list', limit: 200)->all();
        $users = $this->ChatMembers->Users->find('list', limit: 200)->all();
        $this->set(compact('chatMember', 'chats', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chat Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chatMember = $this->ChatMembers->get($id);
        if ($this->ChatMembers->delete($chatMember)) {
            $this->Flash->success(__('The chat member has been deleted.'));
        } else {
            $this->Flash->error(__('The chat member could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
