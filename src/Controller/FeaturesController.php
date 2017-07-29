<?php
namespace App\Controller;


use App\Controller\AppController;

/**
 * Features Controller
 *
 * @property \App\Model\Table\FeaturesTable $Features
 */
class FeaturesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->paginate = [
            'contain' => [],
        ];
        $this->set('features', $this->Features->find('all'));
        $this->set('_serialize', ['features']);
    }

    /**
     * View method
     *
     * @param string|null $id Feature id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $feature = $this->Features->get($id, [
            'contain' => ['Tags']
        ]);

        $feature->Tags = explode(", ", $feature->Tags);
        $this->set('feature', $feature);
        $this->set('_serialize', ['feature']);

        $Tags = $this->Features->Tags->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);
        
        $Image = $this->Features->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);


        $this->set(compact('feature', 'Tags', 'Image'));
        $this->set(compact('feature'));
        $this->set('_serialize', ['feature']);
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $feature = $this->Features->newEntity();
        if ($this->request->is('post')) {

            $feature = $this->Features->patchEntity($feature, $this->request->data);

            foreach ($this->request->data['Tags'] as $Tag)
                $feature['Tags'] = $feature['Tags']. $Tag.', ' ;

            if ($this->Features->save($feature)) {
                $this->Flash->success(__('The feature has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The feature could not be saved. Please, try again.'));
            }
        }

        $Tags = $this->Features->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

        $Image = $this->Features->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);

        $this->set(compact('feature', 'Tags', 'Image'));
        $this->set('_serialize', ['feature']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Feature id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $feature = $this->Features->get($id, [
            'contain' => []
        ]);
        //$feature->Tags = explode(", ", $feature->Tags);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $feature = $this->Features->patchEntity($feature, $this->request->data);
            
            /*
                  foreach ($this->request->data['Tags'] as $Tag)
                    $feature['Tags'] = $feature['Tags']. $Tag.', ' ;
            */
                    
            if ($this->Features->save($feature)) {
                $this->Flash->success(__('The feature has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The feature could not be saved. Please, try again.'));
            }
        }
        $Tags = $this->Features->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

            $Image = $this->Features->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);

        $this->set(compact('feature', 'Tags', 'Image'));
        $this->set('_serialize', ['feature']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Feature id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $feature = $this->Features->get($id);
        if ($this->Features->delete($feature)) {
            $this->Flash->success(__('The feature has been deleted.'));
        } else {
            $this->Flash->error(__('The feature could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
