<?php
namespace App\Controller;
use App\Controller\AppController;

/**
 * Resorts Controller
 * @property \App\Model\Table\ResortsTable Resorts
 */
class ResortsController extends AppController
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
            'contain' => ['Features']
        ];
        $this->set('resorts', $this->paginate($this->Resorts));
        $this->set('_serialize', ['resorts']);
    }

    /**
     * View method
     *
     * @param string|null $id Resort id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $resort = $this->Resorts->get($id, [
            'contain' => ['Features', 'Testimonials', 'Images']
        ]);
        $this->set('resort', $resort);
        $this->set('_serialize', ['resort']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $resort = $this->Resorts->newEntity();
        

        if ($this->request->is('post')) {

            $resort = $this->Resorts->patchEntity($resort, $this->request->data);
            
            $resort->Tags = "";
            $resort->feature_id = "";
            $resort->gallery_id = "";
            $resort->Our_Room_Gallery = "";
            $resort->things_to_do_id = "";
            $resort->nearbyplaces_id = "";
            $resort->programs_id = "";


            if(count($this->request->data['Tags'])>0){
                foreach ($this->request->data['Tags'] as $Tag)
                    $resort->Tags = $resort->Tags. $Tag.', ' ;
            }

            if(count($this->request->data['feature_id'])>0){
                foreach ($this->request->data['feature_id'] as $feature)
                    $resort->feature_id = $resort->feature_id. $feature.', ' ;
            }
            
             if(count($this->request->data['Our_Room_Gallery'])>0){
                foreach ($this->request->data['Our_Room_Gallery'] as $gallery)
                    $resort->Our_Room_Gallery = $resort->Our_Room_Gallery. $gallery.', ' ;
            }

            if(count($this->request->data['programs_id'])>0){
                foreach ($this->request->data['programs_id'] as $program)
                    $resort->programs_id = $resort->programs_id. $program.', ' ;
            }
            
            if(count($this->request->data['gallery_id'])>0){
                foreach ($this->request->data['gallery_id'] as $gallery)
                    $resort->gallery_id = $resort->gallery_id. $gallery.', ' ;
            }
          
            if(count($this->request->data['things_to_do_id'])>0){
                foreach ($this->request->data['things_to_do_id'] as $things)
                    $resort->things_to_do_id = $resort->things_to_do_id. $things.', ' ;
            }
            
            if(count($this->request->data['nearbyplaces_id'])>0){
                foreach ($this->request->data['nearbyplaces_id'] as $nearbyplace)
                    $resort->nearbyplaces_id = $resort->nearbyplaces_id. $nearbyplace.', ' ;
            }
        
            if ($this->Resorts->save($resort)) {
                $this->Flash->success(__('The resort has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The resort could not be saved. Please, try again.'));
            }
        }
        
        $features = $this->Resorts->features->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $testimonials = array();

        $testimonials = $this->Resorts->testimonials->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $galleries = $this->Resorts->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $things_to_do_id = $this->Resorts->Activities->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'About_Activity_Title']);

        $nearbyplaces_id = $this->Resorts->Nearbyplaces->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $Banner_Image = $this->Resorts->Images->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);
        
        $Cafe_Gallery = $this->Resorts->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        
        $Our_Room_Gallery = $this->Resorts->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $Banner_Video = $this->Resorts->Videos->find('list', 
            ['keyField' => 'Video',
            'valueField' => 'Title']);
        
        $Tags = $this->Resorts->Tags->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $programs_id = $this->Resorts->Stayprograms->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Program_Title']);

        $this->set(compact('resort', 'features', 'testimonials', 'galleries', 'things_to_do_id', 'nearbyplaces_id', 'Banner_Image', 'Banner_Video', 'Tags', 'Our_Room_Gallery', 'programs_id', 'Cafe_Gallery'));
        $this->set('_serialize', ['resort']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Resort id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $resort = $this->Resorts->get($id, [
            'contain' => []
        ]);
        $resort->feature_id = explode(", ", $resort->feature_id);
        //$resort->testimonial_id = explode(", ", $resort->testimonial_id);
        $resort->gallery_id = explode(", ", $resort->gallery_id);
        $resort->things_to_do_id = explode(", ", $resort->things_to_do_id);
        $resort->nearbyplaces_id = explode(", ", $resort->nearbyplaces_id);
        $resort->Our_Room_Gallery = explode(", ", $resort->Our_Room_Gallery);
        $resort->programs_id = explode(", ", $resort->programs_id);
        
        $resort->Tags = explode(", ", $resort->Tags);

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $resort->Tags = "";
            $resort->feature_id = "";
            $resort->gallery_id = "";
            $resort->Our_Room_Gallery = "";
            $resort->things_to_do_id = "";
            $resort->nearbyplaces_id = "";
            $resort->programs_id = "";

            $resort = $this->Resorts->patchEntity($resort, $this->request->data);
            
            if(count($this->request->data['feature_id'])>0){
                foreach ($this->request->data['feature_id'] as $feature)
                    $resort->feature_id = $resort->feature_id. $feature.', ' ;
            }
            
            /*
            if(count($this->request->data['testimonial_id'])>0){
                foreach ($this->request->data['testimonial_id'] as $testimonial)
                    $resort->testimonial_id = $resort->testimonial_id. $testimonial.', ' ;
            }
            */
            if(count($this->request->data['programs_id'])>0){
                foreach ($this->request->data['programs_id'] as $program)
                    $resort->programs_id = $resort->programs_id. $program.', ' ;
            }

            if(count($this->request->data['gallery_id'])>0){
                foreach ($this->request->data['gallery_id'] as $gallery)
                    $resort->gallery_id = $resort->gallery_id. $gallery.', ' ;
                    
            }
            if(count($this->request->data['Our_Room_Gallery'])>0){
                foreach ($this->request->data['Our_Room_Gallery'] as $gallery)
                    $resort->Our_Room_Gallery = $resort->Our_Room_Gallery. $gallery.', ' ;
                    
            }

            if(count($this->request->data['things_to_do_id'])>0){
                foreach ($this->request->data['things_to_do_id'] as $things)
                    $resort->things_to_do_id = $resort->things_to_do_id. $things.', ' ;
            }
            
            if(count($this->request->data['nearbyplaces_id'])>0){
                foreach ($this->request->data['nearbyplaces_id'] as $nearbyplace)
                    $resort->nearbyplaces_id = $resort->nearbyplaces_id. $nearbyplace.', ' ;
            }
            
            if(count($this->request->data['Tags'])>0){
                foreach ($this->request->data['Tags'] as $Tag)
                    $resort->Tags = $resort->Tags. $Tag.', ' ;
            }

            if ($this->Resorts->save($resort)) {
                $this->Flash->success(__('The resort has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The resort could not be saved. Please, try again.'));
            }
        }

        $features = $this->Resorts->features->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $testimonials = $this->Resorts->testimonials->find('list', 
            [
            'keyField' => 'Id',
            'valueField' => 'Title',
            'conditions' => ['Testimonials.resort_id =' => $id, 'Testimonials.Status =' => 1 ],
            ]);
        
        $galleries = $this->Resorts->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);
        
        $programs_id = $this->Resorts->Stayprograms->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Program_Title']);

        $things_to_do_id = $this->Resorts->Activities->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'About_Activity_Title']);

        $nearbyplaces_id = $this->Resorts->Nearbyplaces->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $Banner_Image = $this->Resorts->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $Cafe_Gallery = $this->Resorts->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);

        $Banner_Video = $this->Resorts->Videos->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

       $Tags = $this->Resorts->Tags->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

       $Our_Room_Gallery = $this->Resorts->Images->find('list', 
            ['keyField' => 'Image',
            'valueField' => 'Title']);


        $this->set(compact('resort', 'features', 'testimonials', 'galleries', 'things_to_do_id', 'nearbyplaces_id', 'Banner_Image', 'Banner_Video', 'Tags', 'Our_Room_Gallery', 'programs_id', 'Cafe_Gallery'));

        $this->set('_serialize', ['resort']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Resort id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $resort = $this->Resorts->get($id);
        if ($this->Resorts->delete($resort)) {
            $this->Flash->success(__('The resort has been deleted.'));
        } else {
            $this->Flash->error(__('The resort could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
