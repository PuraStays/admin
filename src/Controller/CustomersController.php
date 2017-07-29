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
        $this->set('customers', $this->Customers->find('all'));
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
        
        $requestStr = '{"userid":"'.$id.'"}';

        $actionUrl = "http://api.purastays.com/booking-history-user-profile";
        $request = curl_init($actionUrl);
        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($request, CURLOPT_POSTFIELDS, $requestStr);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
        $post_response = curl_exec($request);
        

        $bookings = json_decode($post_response);
        if(!$bookings)
        {
          $bookings = json_decode($post_response.']}');
        }
        curl_close ($request);
        $this->set('bookings', $bookings);
        //$this->set('_serialize', ['customer']);
    }
    public function details($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        
        $requestStr = '{"accesskey":"'.$id.'"}';

        $actionUrl = "http://api.purastays.com/booking-history-user-profile-access";
        $request = curl_init($actionUrl);
        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($request, CURLOPT_POSTFIELDS, $requestStr);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
        $post_response = curl_exec($request);
        
        if(!is_object($post_response))
        {
            $post_response = $post_response . '}}';
        }

        $details = json_decode($post_response);

        
        curl_close ($request);
        $this->set('details', $details);
        $this->set('_serialize', ['details']);
    }


    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
           
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
           
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }

        $Image = $this->Customers->Images->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        $Customer_Image = $this->Customers->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        
        $this->set(compact('customer', 'Image', 'Customer_Image'));
        $this->set('_serialize', ['customer']);
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
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);

            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
         $Image = $this->Customers->Images->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        $Customer_Image = $this->Customers->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        
        $this->set(compact('customer', 'Image', 'Customer_Image'));
        $this->set('_serialize', ['customer']);
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
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function login()
    {
       $this->viewBuilder()->layout('login'); 
       
    }
    //abhinav
    public function Conformed()
    {
        $this->viewBuilder()->layout('dashboard');
    }
    public function conformednot()
    {
        $this->viewBuilder()->layout('dashboard');
    }
    
}
