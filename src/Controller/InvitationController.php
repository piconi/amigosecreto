<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Invitation Controller
 *
 * @property \App\Model\Table\InvitationTable $Invitation
 *
 * @method \App\Model\Entity\Invitation[] paginate($object = null, array $settings = [])
 */
class InvitationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Groups']
        ];
        $invitation = $this->paginate($this->Invitation);

        $this->set(compact('invitation'));
        $this->set('_serialize', ['invitation']);
    }

    /**
     * View method
     *
     * @param string|null $id Invitation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invitation = $this->Invitation->get($id, [
            'contain' => ['Users', 'Groups']
        ]);

        $this->set('invitation', $invitation);
        $this->set('_serialize', ['invitation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invitation = $this->Invitation->newEntity();
        if ($this->request->is('post')) {
            $invitation = $this->Invitation->patchEntity($invitation, $this->request->getData());
            if ($this->Invitation->save($invitation)) {
                $this->Flash->success(__('The invitation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invitation could not be saved. Please, try again.'));
        }
        $users = $this->Invitation->Users->find('list', ['limit' => 200]);
        $groups = $this->Invitation->Groups->find('list', ['limit' => 200]);
        $this->set(compact('invitation', 'users', 'groups'));
        $this->set('_serialize', ['invitation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Invitation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invitation = $this->Invitation->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invitation = $this->Invitation->patchEntity($invitation, $this->request->getData());
            if ($this->Invitation->save($invitation)) {
                $this->Flash->success(__('The invitation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invitation could not be saved. Please, try again.'));
        }
        $users = $this->Invitation->Users->find('list', ['limit' => 200]);
        $groups = $this->Invitation->Groups->find('list', ['limit' => 200]);
        $this->set(compact('invitation', 'users', 'groups'));
        $this->set('_serialize', ['invitation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Invitation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invitation = $this->Invitation->get($id);
        if ($this->Invitation->delete($invitation)) {
            $this->Flash->success(__('The invitation has been deleted.'));
        } else {
            $this->Flash->error(__('The invitation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
