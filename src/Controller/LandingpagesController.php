<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Landingpages Controller
 *
 * @property \App\Model\Table\LandingpagesTable $Landingpages
 */
class LandingpagesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        //$this->set('landingpages', $this->paginate($this->Landingpages));
        $this->set('landingpages', $this->Landingpages->find('all'));
        $this->set('_serialize', ['landingpages']);
    }

    /**
     * View method
     *
     * @param string|null $id Landingpage id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $landingpage = $this->Landingpages->get($id, [
            'contain' => []
        ]);
        $this->set('landingpage', $landingpage);
        $this->set('_serialize', ['landingpage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $landingpage = $this->Landingpages->newEntity();
        if ($this->request->is('post')) {
            $landingpage = $this->Landingpages->patchEntity($landingpage, $this->request->data);
            if ($this->Landingpages->save($landingpage)) {
                $this->Flash->success(__('The landingpage has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The landingpage could not be saved. Please, try again.'));
            }
        }
        $Banner_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery1_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery2_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery3_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery4_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery5_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery6_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        
        $this->set(compact('landingpage', 'Banner_Image', 'Gallery1_Image', 'Gallery2_Image', 'Gallery3_Image', 'Gallery4_Image', 'Gallery5_Image', 'Gallery6_Image'));
        $this->set('_serialize', ['landingpage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Landingpage id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $landingpage = $this->Landingpages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $landingpage = $this->Landingpages->patchEntity($landingpage, $this->request->data);
            if ($this->Landingpages->save($landingpage)) {
                $this->Flash->success(__('The landingpage has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The landingpage could not be saved. Please, try again.'));
            }
        }
        $Banner_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery1_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery2_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery3_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery4_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery5_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        $Gallery6_Image = $this->Landingpages->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        
        $this->set(compact('landingpage', 'Banner_Image', 'Gallery1_Image', 'Gallery2_Image', 'Gallery3_Image', 'Gallery4_Image', 'Gallery5_Image', 'Gallery6_Image'));
        $this->set('_serialize', ['landingpage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Landingpage id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $landingpage = $this->Landingpages->get($id);
        if ($this->Landingpages->delete($landingpage)) {
            $this->Flash->success(__('The landingpage has been deleted.'));
        } else {
            $this->Flash->error(__('The landingpage could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
