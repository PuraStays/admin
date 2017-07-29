<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
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
            'contain' => ['UserTypes']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
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
        $user = $this->Users->get($id, [
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
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
           
            $user = $this->Users->patchEntity($user, $this->request->data);
           
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $Image = $this->Users->Images->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        $User_Image = $this->Users->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        $userTypes = $this->Users->UserTypes->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'User_Type_Name']);

        $this->set(compact('user', 'userTypes', 'Image', 'User_Image'));
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
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            


            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
         $Image = $this->Users->Images->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        $User_Image = $this->Users->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        $userTypes = $this->Users->UserTypes->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'User_Type_Name']);

        $this->set(compact('user', 'userTypes', 'Image', 'User_Image'));
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
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
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
