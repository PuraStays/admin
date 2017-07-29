<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nearbyplaces Controller
 *
 * @property \App\Model\Table\NearbyplacesTable $Nearbyplaces
 */
class NearbyplacesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('nearbyplaces', $this->Nearbyplaces->find('all'));
        $this->set('_serialize', ['nearbyplaces']);
    }

    /**
     * View method
     *
     * @param string|null $id Nearbyplace id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $this->viewBuilder()->layout('dashboard');
        $nearbyplace = $this->Nearbyplaces->get($id, [
            'contain' => []
        ]);
       
        $Tags = $this->Nearbyplaces->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

        $Image = $this->Nearbyplaces->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);


        $this->set(compact('nearbyplace', 'Tags', 'Image'));
        $this->set('_serialize', ['nearbyplace']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $nearbyplace = $this->Nearbyplaces->newEntity();
        if ($this->request->is('post')) {

            $nearbyplace = $this->Nearbyplaces->patchEntity($nearbyplace, $this->request->data);
            
            foreach ($this->request->data['Tags'] as $Tag)
                $nearbyplace['Tags'] = $nearbyplace['Tags']. $Tag.', ' ;

            if ($this->Nearbyplaces->save($nearbyplace)) {
                $this->Flash->success(__('The nearbyplace has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nearbyplace could not be saved. Please, try again.'));
            }
        }

        $Tags = $this->Nearbyplaces->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

        $Image = $this->Nearbyplaces->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);


        $this->set(compact('nearbyplace', 'Tags', 'Image'));
        $this->set('_serialize', ['nearbyplace']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nearbyplace id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $nearbyplace = $this->Nearbyplaces->get($id, [
            'contain' => []
        ]);
        //$nearbyplace->Tags = explode(", ", $nearbyplace->Tags);

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $nearbyplace = $this->Nearbyplaces->patchEntity($nearbyplace, $this->request->data);
            
        /*       
            foreach ($this->request->data['Tags'] as $Tag)
                $nearbyplace['Tags'] = $nearbyplace['Tags']. $Tag.', ' ;
        */

            if ($this->Nearbyplaces->save($nearbyplace)) {
                $this->Flash->success(__('The nearbyplace has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nearbyplace could not be saved. Please, try again.'));
            }
        }
        
        $Tags = $this->Nearbyplaces->Tags->find('list', 
        ['keyField' => 'Id',
        'valueField' => 'Title']);

        $Image = $this->Nearbyplaces->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);

        $this->set(compact('nearbyplace', 'Tags', 'Image'));
        $this->set('_serialize', ['nearbyplace']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nearbyplace id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $nearbyplace = $this->Nearbyplaces->get($id);
        if ($this->Nearbyplaces->delete($nearbyplace)) {
            $this->Flash->success(__('The nearbyplace has been deleted.'));
        } else {
            $this->Flash->error(__('The nearbyplace could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
