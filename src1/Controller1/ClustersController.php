<?php
namespace App\Controller;

use App\Controller\AppController;
/**
 * Clusters Controller
 *
 * @property \App\Model\Table\ClustersTable $Clusters
 */
class ClustersController extends AppController
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('clusters', $this->paginate($this->Clusters));
        $this->set('_serialize', ['clusters']);
    }

    public function index1()
        {
            $this->viewBuilder()->layout('json');
            $this->set('clusters', $this->paginate($this->Clusters));
            $this->set('_serialize', ['clusters']);

        }

    /**
     * View method
     *
     * @param string|null $id Cluster id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $cluster = $this->Clusters->get($id, [
            'contain' => []
        ]);
        
        $this->set('cluster', $cluster);
        $this->set('_serialize', ['cluster']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $cluster = $this->Clusters->newEntity();
        if ($this->request->is('post')) {
            $cluster = $this->Clusters->patchEntity($cluster, $this->request->data);

            //convet array to sting for Resorts
            if(count($this->request->data['Resorts'])>0)
            {
                foreach ($this->request->data['Resorts'] as $Resort)
                    $cluster->Resorts = $cluster->Resorts. $Resort.', ' ;
            }

            //convet array to sting for Activities
            if(count($this->request->data['Activities'])>0)
            {
            foreach ($this->request->data['Activities'] as $Activity)
                $cluster->Activities = $cluster->Activities. $Activity.', ' ;
            }
            
            
            //convet array to sting for Activities
            if(count($this->request->data['Tags'])>0)
            {
            foreach ($this->request->data['Tags'] as $Tag)
                $cluster->Tags = $cluster->Tags. $Tag.', ' ;
            }
            


            if ($this->Clusters->save($cluster)) {
                $this->Flash->success(__('The cluster has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cluster could not be saved. Please, try again.'));
            }
        }

           $Resorts = $this->Clusters->Resorts->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Resort_Name']);
        
            $Activities = $this->Clusters->Activities->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Activity_Name']);
            
            $Banner_Image = $this->Clusters->Images->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

            $Banner_Video = $this->Clusters->Videos->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
            
            $Tags = $this->Clusters->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

        $this->set(compact('cluster', 'Resorts', 'Activities', 'Banner_Image', 'Banner_Video', 'Tags'));
        $this->set('_serialize', ['cluster']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cluster id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $cluster = $this->Clusters->get($id, [
            'contain' => []
        ]);
        
        $cluster->Resorts = explode(", ", $cluster->Resorts);
        $cluster->Activities = explode(", ", $cluster->Activities);
        $cluster->Tags = explode(", ", $cluster->Tags);



        if ($this->request->is(['patch', 'post', 'put'])) {
            $cluster = $this->Clusters->patchEntity($cluster, $this->request->data);

            //convet array to sting for Resorts
            if(count($this->request->data['Resorts'])>0)
            {
                foreach ($this->request->data['Resorts'] as $Resort)
                    $cluster->Resorts = $cluster->Resorts. $Resort.', ' ;
            }

            //convet array to sting for Activities
            if(count($this->request->data['Activities'])>0)
            {
                foreach ($this->request->data['Activities'] as $Activity)
                    $cluster->Activities = $cluster->Activities. $Activity.', ' ;
            }
            
            //convet array to sting for Tags
            if(count($this->request->data['Tags'])>0)
            {
                foreach ($this->request->data['Tags'] as $Tag)
                    $cluster->Tags = $cluster->Tags. $Tag.', ' ;
            }

            if ($this->Clusters->save($cluster)) {
                $this->Flash->success(__('The cluster has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cluster could not be saved. Please, try again.'));
            }
        }


        

        $Resorts = $this->Clusters->Resorts->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Resort_Name']);
        
            $Activities = $this->Clusters->Activities->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Activity_Name']);
            
            $Banner_Image = $this->Clusters->Images->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

            $Banner_Video = $this->Clusters->Videos->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

             $Tags = $this->Clusters->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);


        $this->set(compact('cluster', 'Resorts', 'Activities', 'Banner_Image', 'Banner_Video', 'Tags'));
        $this->set('_serialize', ['cluster']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cluster id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $cluster = $this->Clusters->get($id);
        if ($this->Clusters->delete($cluster)) {
            $this->Flash->success(__('The cluster has been deleted.'));
        } else {
            $this->Flash->error(__('The cluster could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
