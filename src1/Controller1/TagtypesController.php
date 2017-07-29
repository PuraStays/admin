<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tagtypes Controller
 *
 * @property \App\Model\Table\TagtypesTable $Tagtypes
 */
class TagtypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('tagtypes', $this->paginate($this->Tagtypes));
        $this->set('_serialize', ['tagtypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Tagtype id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $tagtype = $this->Tagtypes->get($id, [
            'contain' => []
        ]);
        $this->set('tagtype', $tagtype);
        $this->set('_serialize', ['tagtype']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $tagtype = $this->Tagtypes->newEntity();
        if ($this->request->is('post')) {
            $tagtype = $this->Tagtypes->patchEntity($tagtype, $this->request->data);
            if ($this->Tagtypes->save($tagtype)) {
                $this->Flash->success(__('The tagtype has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tagtype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tagtype'));
        $this->set('_serialize', ['tagtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tagtype id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $tagtype = $this->Tagtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tagtype = $this->Tagtypes->patchEntity($tagtype, $this->request->data);
            if ($this->Tagtypes->save($tagtype)) {
                $this->Flash->success(__('The tagtype has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tagtype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tagtype'));
        $this->set('_serialize', ['tagtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tagtype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $tagtype = $this->Tagtypes->get($id);
        if ($this->Tagtypes->delete($tagtype)) {
            $this->Flash->success(__('The tagtype has been deleted.'));
        } else {
            $this->Flash->error(__('The tagtype could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
