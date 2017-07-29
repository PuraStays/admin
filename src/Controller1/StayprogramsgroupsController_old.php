<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stayprogramsgroups Controller
 *
 * @property \App\Model\Table\StayprogramsgroupsTable $Stayprogramsgroups
 */
class StayprogramsgroupsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Activities']
        ];
        $this->set('stayprogramsgroups', $this->paginate($this->Stayprogramsgroups));
        $this->set('_serialize', ['stayprogramsgroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Stayprogramsgroup id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stayprogramsgroup = $this->Stayprogramsgroups->get($id, [
            'contain' => ['Activities']
        ]);
        $this->set('stayprogramsgroup', $stayprogramsgroup);
        $this->set('_serialize', ['stayprogramsgroup']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stayprogramsgroup = $this->Stayprogramsgroups->newEntity();
        if ($this->request->is('post')) {
            $stayprogramsgroup = $this->Stayprogramsgroups->patchEntity($stayprogramsgroup, $this->request->data);
            if ($this->Stayprogramsgroups->save($stayprogramsgroup)) {
                $this->Flash->success(__('The stayprogramsgroup has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stayprogramsgroup could not be saved. Please, try again.'));
            }
        }
        $activities = $this->Stayprogramsgroups->Activities->find('list', ['limit' => 200]);
        $this->set(compact('stayprogramsgroup', 'activities'));
        $this->set('_serialize', ['stayprogramsgroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stayprogramsgroup id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stayprogramsgroup = $this->Stayprogramsgroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stayprogramsgroup = $this->Stayprogramsgroups->patchEntity($stayprogramsgroup, $this->request->data);
            if ($this->Stayprogramsgroups->save($stayprogramsgroup)) {
                $this->Flash->success(__('The stayprogramsgroup has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stayprogramsgroup could not be saved. Please, try again.'));
            }
        }
        $activities = $this->Stayprogramsgroups->Activities->find('list', ['limit' => 200]);
        $this->set(compact('stayprogramsgroup', 'activities'));
        $this->set('_serialize', ['stayprogramsgroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stayprogramsgroup id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stayprogramsgroup = $this->Stayprogramsgroups->get($id);
        if ($this->Stayprogramsgroups->delete($stayprogramsgroup)) {
            $this->Flash->success(__('The stayprogramsgroup has been deleted.'));
        } else {
            $this->Flash->error(__('The stayprogramsgroup could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
