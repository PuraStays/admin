<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Testimonials Controller
 *
 * @property \App\Model\Table\TestimonialsTable $Testimonials
 */
class TestimonialsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('testimonials', $this->Testimonials->find('all'));
        $this->set('_serialize', ['testimonials']);
    }

    /**
     * View method
     *
     * @param string|null $id Testimonial id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $testimonial = $this->Testimonials->get($id, [
            'contain' => ['Tags']
        ]);

        $testimonial->Tags = explode(", ", $testimonial->Tags);
        $this->set('testimonial', $testimonial);
        $this->set('_serialize', ['testimonial']);

        $Tags = $this->Testimonials->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

        $Image = $this->Testimonials->Images->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        
        $resort_id = $this->Testimonials->Resorts->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Resort_Name']);

        if(count($this->request->data['gallery_id'])>0){
                foreach ($this->request->data['gallery_id'] as $gallery)
                    $testimonial->gallery_id = $testimonial->gallery_id. $gallery.', ' ;
            }

        $this->set(compact('testimonial', 'Tags', 'Image', 'resort_id'));
        $this->set('_serialize', ['testimonial']);
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $testimonial = $this->Testimonials->newEntity();
        if ($this->request->is('post')) {

            $testimonial->gallery_id = "";
            $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->data);
            if($this->request->data['Tags']!="")
            {
            foreach ($this->request->data['Tags'] as $Tag)
                $testimonial['Tags'] = $testimonial['Tags']. $Tag.', ' ;
            }
            if ($this->Testimonials->save($testimonial)) {
                $this->Flash->success(__('The testimonial has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The testimonial could not be saved. Please, try again.'));
            }
        }

        $Tags = $this->Testimonials->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

        $Image = $this->Testimonials->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        
        $Banner_Image = $this->Testimonials->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);

        $Banner_Video = $this->Testimonials->Videos->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        
        $resort_id = $this->Testimonials->Resorts->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Resort_Name']);
        
        $User_Image = $this->Testimonials->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);

        $galleries = $this->Testimonials->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $Testimonial_For_Image = $this->Testimonials->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);


        $this->set(compact('testimonial', 'Tags', 'Image', 'resort_id', 'Banner_Image', 'Banner_Video', 'User_Image', 'Testimonial_For_Image'));
        $this->set('_serialize', ['testimonial']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Testimonial id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $testimonial = $this->Testimonials->get($id, [
            'contain' => []
        ]);
        $testimonial->Tags = explode(", ", $testimonial->Tags);
        $testimonial->gallery_id = explode(", ", $testimonial->gallery_id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->data);
            $testimonial->gallery_id = "";

            if($this->request->data['Tags']!="")
            {
                foreach ($this->request->data['Tags'] as $Tag)
                $testimonial['Tags'] = $testimonial['Tags']. $Tag.', ' ;

                if(count($this->request->data['gallery_id'])>0){
                    foreach ($this->request->data['gallery_id'] as $gallery)
                        $testimonial->gallery_id = $testimonial->gallery_id. $gallery.', ' ;
                        
                }
            }
            if ($this->Testimonials->save($testimonial)) {
                $this->Flash->success(__('The testimonial has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The testimonial could not be saved. Please, try again.'));
            }
        }
        
        $Tags = $this->Testimonials->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

        $Image = $this->Testimonials->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        $Banner_Image = $this->Testimonials->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);

        $Banner_Image = $this->Testimonials->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);

        $Banner_Video = $this->Testimonials->Videos->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        
        $galleries = $this->Testimonials->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $resort_id = $this->Testimonials->Resorts->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Resort_Name']);
        
        $User_Image = $this->Testimonials->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);

        $Testimonial_For_Image = $this->Testimonials->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);


        $this->set(compact('testimonial', 'Tags', 'gallery_id', 'Image', 'resort_id', 'Banner_Image', 'Banner_Video', 'User_Image', 'Testimonial_For_Image'));

        $this->set('_serialize', ['testimonial']);
    }

     /**
     * Delete method
     *
     * @param string|null $id Testimonial id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $testimonial = $this->Testimonials->get($id);
        if ($this->Testimonials->delete($testimonial)) {
            $this->Flash->success(__('The testimonial has been deleted.'));
        } else {
            $this->Flash->error(__('The testimonial could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}