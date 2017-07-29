<?php
namespace App\Controller;
use App\Controller\AppController;

/**
 * Explorepuras Controller
 *
 * @property \App\Model\Table\ExplorepurasTable $Explorepuras
 */
class ExplorepurasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('explorepuras', $this->paginate($this->Explorepuras));
        $this->set('_serialize', ['explorepuras']);
    }

    /**
     * View method
     *
     * @param string|null $id Explorepura id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $explorepura = $this->Explorepuras->get($id, [
            'contain' => []
        ]);
        $this->set('explorepura', $explorepura);
        $this->set('_serialize', ['explorepura']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $explorepura = $this->Explorepuras->newEntity();
        if ($this->request->is('post')) {
            $explorepura = $this->Explorepuras->patchEntity($explorepura, $this->request->data);
            if ($this->Explorepuras->save($explorepura)) {
                $this->Flash->success(__('The explorepura has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The explorepura could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('explorepura'));
        $this->set('_serialize', ['explorepura']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Explorepura id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $explorepura = $this->Explorepuras->get($id, [
            'contain' => []
        ]);

        $explorepura->Tags = explode(", ", $explorepura->Tags);
        $explorepura->Stay_Gallery = explode(", ", $explorepura->Stay_Gallery);
        $explorepura->Cafe_Gallery = explode(", ", $explorepura->Cafe_Gallery);
        $explorepura->Experiences_Gallery = explode(", ", $explorepura->Experiences_Gallery);
        $explorepura->Operations_Gallery = explode(", ", $explorepura->Operations_Gallery);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $explorepura = $this->Explorepuras->patchEntity($explorepura, $this->request->data);

             //convet array to sting for Tags
                if($this->request->data['Tags']!="")
                {
                    foreach ($this->request->data['Tags'] as $Tag)
                        $explorepura->Tags = $explorepura->Tags. $Tag.', ' ;
                }

             //convet array to sting for Stay_Gallery
                if($this->request->data['Stay_Gallery']!="")
                {
                    foreach ($this->request->data['Stay_Gallery'] as $Stay_Galler)
                        $explorepura->Stay_Gallery = $explorepura->Stay_Gallery. $Stay_Galler.', ' ;
                }

             //convet array to sting for Cafe_Gallery
                if($this->request->data['Cafe_Gallery']!="")
                {
                    foreach ($this->request->data['Cafe_Gallery'] as $Cafe_Galler)
                        $explorepura->Cafe_Gallery = $explorepura->Cafe_Gallery. $Cafe_Galler.', ' ;
                }

             //convet array to sting for Experiences_Gallery
                if($this->request->data['Experiences_Gallery']!="")
                {
                    foreach ($this->request->data['Experiences_Gallery'] as $Experiences_Galler)
                        $explorepura->Experiences_Gallery = $explorepura->Experiences_Gallery. $Experiences_Galler.', ' ;
                }

             //convet array to sting for Operations_Gallery
                if($this->request->data['Operations_Gallery']!="")
                {
                    foreach ($this->request->data['Operations_Gallery'] as $Operations_Galler)
                        $explorepura->Operations_Gallery = $explorepura->Operations_Gallery. $Operations_Galler.', ' ;
                }

            if ($this->Explorepuras->save($explorepura)) {
                $this->Flash->success(__('The explorepura has been saved.'));
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The explorepura could not be saved. Please, try again.'));
            }
        }
           
            $Banner_Image = $this->Explorepuras->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);

            $Banner_Video = $this->Explorepuras->Videos->find('list', 
                ['keyField' => 'Video',
                'valueField' => 'Title']);

            $Stay_Gallery = $this->Explorepuras->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
            $Cafe_Gallery = $this->Explorepuras->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
            $Experiences_Gallery = $this->Explorepuras->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
            $Operations_Gallery = $this->Explorepuras->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
            
            $Tags = $this->Explorepuras->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

        $this->set(compact('explorepura', 'Banner_Image', 'Banner_Video', 'Tags', 'Stay_Gallery', 'Cafe_Gallery', 'Experiences_Gallery', 'Operations_Gallery'));
        $this->set('_serialize', ['explorepura']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Explorepura id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $explorepura = $this->Explorepuras->get($id);
        if ($this->Explorepuras->delete($explorepura)) {
            $this->Flash->success(__('The explorepura has been deleted.'));
        } else {
            $this->Flash->error(__('The explorepura could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
