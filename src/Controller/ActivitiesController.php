<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Activities Controller
 *
 * @property \App\Model\Table\ActivitiesTable $Activities
 */
class ActivitiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('activities', $this->Activities->find('all'));
        $this->set('_serialize', ['activities']);
    }

    /**
     * View method
     *
     * @param string|null $id Activity id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
     $this->viewBuilder()->layout('dashboard');
        $activity = $this->Activities->get($id, [
            'contain' => []
        ]);
        $activity->Tags = explode(", ", $activity->Tags);
        $activity->testimonial_id = explode(", ", $activity->testimonial_id);
        $activity->gallery_id = explode(", ", $activity->gallery_id);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            
            if(!empty($this->request->data['Tags'])){
                foreach ($this->request->data['Tags'] as $Tag)
                    $activity->Tags = $activity->Tags. $Tag.', ' ;
            }
            else
            {
                $activity->Tags="";
            }

            if(!empty($this->request->data['testimonial_id'])){
                foreach ($this->request->data['testimonial_id'] as $testimonial)
                    $activity->testimonial_id = $activity->testimonial_id. $testimonial.', ' ;
            }
            else
            {
                $activity->testimonial_id="";
            }

            if(!empty($this->request->data['gallery_id'])){
                foreach ($this->request->data['gallery_id'] as $gallery)
                    $activity->gallery_id = $activity->gallery_id. $gallery.', ' ;
            }
            else
            {
                $activity->gallery_id="";
            }

            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity could not be saved. Please, try again.'));
            }
        }

        $Tags = $this->Activities->Tags->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $testimonials = $this->Activities->testimonials->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $galleries = $this->Activities->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

         $Icon = $this->Activities->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $Banner_Image = $this->Activities->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $Banner_Video = $this->Activities->Videos->find('list', 
            ['keyField' => 'Video',
            'valueField' => 'Title']);


        $this->set(compact('activity', 'Tags', 'testimonials', 'galleries', 'Banner_Image', 'Banner_Video', 'Icon'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $activity = $this->Activities->newEntity();
        

        if ($this->request->is('post')) {

            $activity = $this->Activities->patchEntity($activity, $this->request->data);

            foreach ($this->request->data['Tags'] as $Tag)
                $activity->Tags = $activity->Tags. $Tag.', ' ;
        
            foreach ($this->request->data['testimonial_id'] as $testimonial)
                $activity->testimonial_id = $activity->testimonial_id. $testimonial.', ' ;
        
            foreach ($this->request->data['gallery_id'] as $gallery)
                $activity->gallery_id = $activity->gallery_id. $gallery.', ' ;
        
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity could not be saved. Please, try again.'));
            }
        }
        
        $Tags = $this->Activities->Tags->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $testimonials = $this->Activities->testimonials->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);
        
        $galleries = $this->Activities->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $Icon = $this->Activities->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $Banner_Image = $this->Activities->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);


        $Banner_Video = $this->Activities->Videos->find('list', 
            ['keyField' => 'Video',
            'valueField' => 'Title']);

        $this->set(compact('activity', 'Tags', 'testimonials', 'galleries', 'Banner_Image', 'Banner_Video', 'Icon'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $activity = $this->Activities->get($id, [
            'contain' => []
        ]);
        $activity->Tags = explode(", ", $activity->Tags);
        $activity->testimonial_id = explode(", ", $activity->testimonial_id);
        $activity->gallery_id = explode(", ", $activity->gallery_id);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            $activity->Tags="";
            

            if(!empty($this->request->data['Tags'])){
                foreach ($this->request->data['Tags'] as $Tag)
                    $activity->Tags = $activity->Tags. $Tag.', ' ;
            }
            else
            {
                $activity->Tags="";
            }
            
            if(!empty($this->request->data['testimonial_id'])){
                foreach ($this->request->data['testimonial_id'] as $testimonial)
                    $activity->testimonial_id = $activity->testimonial_id. $testimonial.', ' ;
            }
            else
            {
                $activity->testimonial_id="";
            }

            if(!empty($this->request->data['gallery_id'])){
                foreach ($this->request->data['gallery_id'] as $gallery)
                    $activity->gallery_id = $activity->gallery_id. $gallery.', ' ;
            }
            else
            {
                $activity->gallery_id="";
            }

            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity could not be saved. Please, try again.'));
            }
        }

        

        $Tags = $this->Activities->Tags->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $testimonials = $this->Activities->testimonials->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $galleries = $this->Activities->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $Icon = $this->Activities->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);


        $Banner_Image = $this->Activities->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $Banner_Video = $this->Activities->Videos->find('list', 
            ['keyField' => 'Video',
            'valueField' => 'Title']);

        $this->set(compact('activity', 'Tags', 'testimonials', 'galleries', 'Banner_Image', 'Banner_Video', 'Icon'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $activity = $this->Activities->get($id);
        if ($this->Activities->delete($activity)) {
            $this->Flash->success(__('The activity has been deleted.'));
        } else {
            $this->Flash->error(__('The activity could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
