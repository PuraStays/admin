<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('customers', $this->paginate($this->Customers));
        $this->set('_serialize', ['customers']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $user = $this->Customers->get($id, [
            'contain' => ['UserTypes']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $user = $this->Customers->newEntity();
        if ($this->request->is('post')) {
           
            $user = $this->Customers->patchEntity($user, $this->request->data);
           
            if ($this->Customers->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $Image = $this->Customers->Images->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        $User_Image = $this->Customers->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        
        $this->set(compact('customer', 'Image', 'User_Image'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $user = $this->Customers->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Customers->patchEntity($user, $this->request->data);
            


            if ($this->Customers->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
         $Image = $this->Customers->Images->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        $User_Image = $this->Customers->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        
        $this->set(compact('user', 'Image', 'User_Image'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Customers->get($id);
        if ($this->Customers->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function login()
    {
       $this->viewBuilder()->layout('login'); 
       
    }
}
