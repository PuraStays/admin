<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HotelogixDetails Controller
 *
 * @property \App\Model\Table\HotelogixDetailsTable $HotelogixDetails
 */
class HotelogixDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('hotelogixDetails', $this->HotelogixDetails->find('all'));
        $this->set('_serialize', ['hotelogixDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Hotelogix Detail id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $hotelogixDetail = $this->HotelogixDetails->get($id, [
            'contain' => ['Resorts']
        ]);
        $this->set('hotelogixDetail', $hotelogixDetail);
        $this->set('_serialize', ['hotelogixDetail']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $hotelogixDetail = $this->HotelogixDetails->newEntity();
        if ($this->request->is('post')) {
            $hotelogixDetail = $this->HotelogixDetails->patchEntity($hotelogixDetail, $this->request->data);
            if ($this->HotelogixDetails->save($hotelogixDetail)) {
                $this->Flash->success(__('The hotelogix detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hotelogix detail could not be saved. Please, try again.'));
            }
        }
        $resorts = $this->HotelogixDetails->Resorts->find('list', ['limit' => 200]);
        $this->set(compact('hotelogixDetail', 'resorts'));
        $this->set('_serialize', ['hotelogixDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hotelogix Detail id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $hotelogixDetail = $this->HotelogixDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hotelogixDetail = $this->HotelogixDetails->patchEntity($hotelogixDetail, $this->request->data);
            if ($this->HotelogixDetails->save($hotelogixDetail)) {
                $this->Flash->success(__('The hotelogix detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hotelogix detail could not be saved. Please, try again.'));
            }
        }
        $resorts = $this->HotelogixDetails->Resorts->find('list', ['limit' => 200]);
        $this->set(compact('hotelogixDetail', 'resorts'));
        $this->set('_serialize', ['hotelogixDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hotelogix Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $hotelogixDetail = $this->HotelogixDetails->get($id);
        if ($this->HotelogixDetails->delete($hotelogixDetail)) {
            $this->Flash->success(__('The hotelogix detail has been deleted.'));
        } else {
            $this->Flash->error(__('The hotelogix detail could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
