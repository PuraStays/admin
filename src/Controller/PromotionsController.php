<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Promotions Controller
 *
 * @property \App\Model\Table\PromotionsTable $Promotions
 */
class PromotionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('promotions', $this->paginate($this->Promotions));
        $this->set('_serialize', ['promotions']);
    }

    /**
     * View method
     *
     * @param string|null $id Promotion id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $promotion = $this->Promotions->get($id, [
            'contain' => []
        ]);
        $this->set('promotion', $promotion);
        $this->set('_serialize', ['promotion']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $promotion = $this->Promotions->newEntity();
        
        if ($this->request->is('post')) {
            $promotion = $this->Promotions->patchEntity($promotion, $this->request->data);
            $promotion->Active_From = $promotion->Active_From1;
            $promotion->Active_To = $promotion->Active_To1;

            //convet array to sting for Resorts
            if($this->request->data['Show_Resorts']!="")
            {
                foreach ($this->request->data['Show_Resorts'] as $Resort)
                    $promotion->Show_Resorts = $promotion->Show_Resorts. $Resort.', ' ;
            }
            
            if ($this->Promotions->save($promotion)) {

            
                $this->Flash->success(__('The promotion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('promotion'));
        $Background = $this->Promotions->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        
        $Resorts = $this->Promotions->Resorts->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Resort_Name']);
        $this->set(compact('promotion', 'Resorts', 'Background'));

        $this->set('_serialize', ['promotion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Promotion id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $promotion = $this->Promotions->get($id, [
            'contain' => []
        ]);
        
        $promotion->Show_Resorts = explode(", ", $promotion->Show_Resorts);
        $promotion->Active_From = $promotion->Active_From1;
        $promotion->Active_To = $promotion->Active_To1;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotion = $this->Promotions->patchEntity($promotion, $this->request->data);
       
            $promotion->Active_From = $promotion->Active_From1;
            $promotion->Active_To = $promotion->Active_To1;
     
            //convet array to sting for Resorts
            if($this->request->data['Show_Resorts']!="")
            {
                foreach ($this->request->data['Show_Resorts'] as $Resort)
                    $promotion->Show_Resorts = $promotion->Show_Resorts. $Resort.', ' ;
            }
            

            if ($this->Promotions->save($promotion)) {
                $this->Flash->success(__('The promotion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
            }
        }
        
        $this->set(compact('promotion'));
        $Background = $this->Promotions->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        
        $Resorts = $this->Promotions->Resorts->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Resort_Name']);

        $this->set(compact('promotion', 'Resorts', 'Background'));
        $this->set('_serialize', ['promotion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $promotion = $this->Promotions->get($id);
        if ($this->Promotions->delete($promotion)) {
            $this->Flash->success(__('The promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The promotion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
