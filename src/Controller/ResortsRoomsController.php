<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ResortsRooms Controller
 *
 * @property \App\Model\Table\ResortsRoomsTable $ResortsRooms
 */
class ResortsRoomsController extends AppController
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
            'contain' => ['Resorts', 'Features', 'Images'],
            'limit' =>5000
        ];
        $this->set('resortsRooms', $this->paginate($this->ResortsRooms));

        $this->set('_serialize', ['resortsRooms']);
    }

    /**
     * View method
     *
     * @param string|null $id Resorts Room id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $resortsRoom = $this->ResortsRooms->get($id, [
            'contain' => ['Resorts', 'Features', 'Images']
        ]);
        $this->set('resortsRoom', $resortsRoom);
        $this->set('_serialize', ['resortsRoom']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $resortsRoom = $this->ResortsRooms->newEntity();
        if ($this->request->is('post')) {
            $resortsRoom = $this->ResortsRooms->patchEntity($resortsRoom, $this->request->data);
            
            $resortsRoom->feature_id = "";
            $resortsRoom->gallery_id = "";
            
            if(count($this->request->data['feature_id'])>0){

            foreach ($this->request->data['feature_id'] as $feature)
                    $resortsRoom->feature_id = $resortsRoom->feature_id. $feature.', ' ;
            
            foreach ($this->request->data['image_id'] as $image)
                    $resortsRoom->image_id = $resortsRoom->image_id. $image.', ' ;
            }
            


            if ($this->ResortsRooms->save($resortsRoom)) {
                $this->Flash->success(__('The resorts room has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The resorts room could not be saved. Please, try again.'));
            }
        }
        $resorts = $this->ResortsRooms->Resorts->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Resort_Name']);

        $features = $this->ResortsRooms->Features->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);
        
        $images = $this->ResortsRooms->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $this->set(compact('resortsRoom', 'resorts', 'features', 'images'));
        $this->set('_serialize', ['resortsRoom']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Resorts Room id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $resortsRoom = $this->ResortsRooms->get($id, [
            'contain' => []
        ]);
        $resortsRoom->image_id = explode(", ", $resortsRoom->image_id);
        $resortsRoom->feature_id = explode(", ", $resortsRoom->feature_id);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $resortsRoom = $this->ResortsRooms->patchEntity($resortsRoom, $this->request->data);
            
            foreach ($this->request->data['feature_id'] as $feature)
                    $resortsRoom->feature_id = $resortsRoom->feature_id. $feature.', ' ;
            
            foreach ($this->request->data['image_id'] as $image)
                    $resortsRoom->image_id = $resortsRoom->image_id. $image.', ' ;
            
            
            if ($this->ResortsRooms->save($resortsRoom)) {
                $this->Flash->success(__('The resorts room has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The resorts room could not be saved. Please, try again.'));
            }
        }
        $resorts = $this->ResortsRooms->Resorts->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Resort_Name']);

        $features = $this->ResortsRooms->Features->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);
        
        $images = $this->ResortsRooms->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $this->set(compact('resortsRoom', 'resorts', 'features', 'images'));
        $this->set('_serialize', ['resortsRoom']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Resorts Room id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $resortsRoom = $this->ResortsRooms->get($id);
        if ($this->ResortsRooms->delete($resortsRoom)) {
            $this->Flash->success(__('The resorts room has been deleted.'));
        } else {
            $this->Flash->error(__('The resorts room could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
