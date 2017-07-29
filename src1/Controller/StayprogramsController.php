<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stayprograms Controller
 *
 * @property \App\Model\Table\StayprogramsTable $Stayprograms
 */
class StayprogramsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('stayprograms', $this->paginate($this->Stayprograms));
        $this->set('_serialize', ['stayprograms']);
    }

    /**
     * View method
     *
     * @param string|null $id Stayprogram id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
       $this->viewBuilder()->layout('dashboard');
        $stayprogram = $this->Stayprograms->get($id, [
            'contain' => []
        ]);
        $stayprogram->Mood = explode(", ", $stayprogram->Mood);
        $stayprogram->Program_Gallery = explode(", ", $stayprogram->Program_Gallery);
        $stayprogram->Group1 = explode(", ", $stayprogram->Group1);
        $stayprogram->Group2 = explode(", ", $stayprogram->Group2);
        $stayprogram->Group3 = explode(", ", $stayprogram->Group3);
        $stayprogram->Group4 = explode(", ", $stayprogram->Group4);
        $stayprogram->Group5 = explode(", ", $stayprogram->Group5);

         $Mood = $this->Stayprograms->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        $Program_Gallery = $this->Stayprograms->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        $Group1 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group2 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group3 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group4 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group5 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);

        $this->set(compact('stayprogram', 'Mood', 'Program_Gallery', 'Group1', 'Group2', 'Group3', 'Group4', 'Group5'));
        $this->set('_serialize', ['stayprogram']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $stayprogram = $this->Stayprograms->newEntity();
        if ($this->request->is('post')) {
            $stayprogram = $this->Stayprograms->patchEntity($stayprogram, $this->request->data);

            if($this->request->data['Mood']!="")
                {
                    foreach ($this->request->data['Mood'] as $Mood1)
                        $stayprogram->Mood = $stayprogram->Mood. $Mood1.', ' ;
                }
            if($this->request->data['Program_Gallery']!="")
                {
                    foreach ($this->request->data['Program_Gallery'] as $Program_Gallery1)
                        $stayprogram->Program_Gallery = $stayprogram->Program_Gallery. $Program_Gallery1.', ' ;
                }
            if($this->request->data['Group1']!="")
                {
                    foreach ($this->request->data['Group1'] as $Group11)
                        $stayprogram->Group1 = $stayprogram->Group1. $Group11.', ' ;
                }
            if($this->request->data['Group2']!="")
                {
                    foreach ($this->request->data['Group2'] as $Group21)
                        $stayprogram->Group2 = $stayprogram->Group2. $Group21.', ' ;
                }
            if($this->request->data['Group3']!="")
                {
                    foreach ($this->request->data['Group3'] as $Group31)
                        $stayprogram->Group3 = $stayprogram->Group3. $Group31.', ' ;
                }
            if($this->request->data['Group4']!="")
                {
                    foreach ($this->request->data['Group4'] as $Group41)
                        $stayprogram->Group4 = $stayprogram->Group4. $Group41.', ' ;
                }
            if($this->request->data['Group5']!="")
                {
                    foreach ($this->request->data['Group5'] as $Group51)
                        $stayprogram->Group5 = $stayprogram->Group5. $Group51.', ' ;
                }

            if ($this->Stayprograms->save($stayprogram)) {
                $this->Flash->success(__('The stayprogram has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stayprogram could not be saved. Please, try again.'));
            }
        }

        $Mood = $this->Stayprograms->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        $Program_Gallery = $this->Stayprograms->Images->find('list', 
                ['keyField' => 'Image',
                'valueField' => 'Title']);
        $Group1 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group2 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group3 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group4 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group5 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);

        $this->set(compact('stayprogram', 'Mood', 'Program_Gallery', 'Group1', 'Group2', 'Group3', 'Group4', 'Group5'));
        $this->set('_serialize', ['stayprogram']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stayprogram id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $stayprogram = $this->Stayprograms->get($id, [
            'contain' => []
        ]);
        $stayprogram->Mood = explode(", ", $stayprogram->Mood);
        $stayprogram->Program_Gallery = explode(", ", $stayprogram->Program_Gallery);
        $stayprogram->Group1 = explode(", ", $stayprogram->Group1);
        $stayprogram->Group2 = explode(", ", $stayprogram->Group2);
        $stayprogram->Group3 = explode(", ", $stayprogram->Group3);
        $stayprogram->Group4 = explode(", ", $stayprogram->Group4);
        $stayprogram->Group5 = explode(", ", $stayprogram->Group5);



        if ($this->request->is(['patch', 'post', 'put'])) {
            $stayprogram = $this->Stayprograms->patchEntity($stayprogram, $this->request->data);

            if($this->request->data['Mood']!="")
                {
                    foreach ($this->request->data['Mood'] as $Mood1)
                        $stayprogram->Mood = $stayprogram->Mood. $Mood1.', ' ;
                }
            if($this->request->data['Program_Gallery']!="")
                {
                    foreach ($this->request->data['Program_Gallery'] as $Program_Gallery1)
                        $stayprogram->Program_Gallery = $stayprogram->Program_Gallery. $Program_Gallery1.', ' ;
                }
            if($this->request->data['Group1']!="")
                {
                    foreach ($this->request->data['Group1'] as $Group11)
                        $stayprogram->Group1 = $stayprogram->Group1. $Group11.', ' ;
                }
            if($this->request->data['Group2']!="")
                {
                    foreach ($this->request->data['Group2'] as $Group21)
                        $stayprogram->Group2 = $stayprogram->Group2. $Group21.', ' ;
                }
            if($this->request->data['Group3']!="")
                {
                    foreach ($this->request->data['Group3'] as $Group31)
                        $stayprogram->Group3 = $stayprogram->Group3. $Group31.', ' ;
                }
            if($this->request->data['Group4']!="")
                {
                    foreach ($this->request->data['Group4'] as $Group41)
                        $stayprogram->Group4 = $stayprogram->Group4. $Group41.', ' ;
                }
            if($this->request->data['Group5']!="")
                {
                    foreach ($this->request->data['Group5'] as $Group51)
                        $stayprogram->Group5 = $stayprogram->Group5. $Group51.', ' ;
                }
            if ($this->Stayprograms->save($stayprogram)) {
                $this->Flash->success(__('The stayprogram has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stayprogram could not be saved. Please, try again.'));
            }
        }
         $Mood = $this->Stayprograms->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        $Program_Gallery = $this->Stayprograms->Images->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);
        $Group1 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group2 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group3 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group4 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);
        $Group5 = $this->Stayprograms->Stayprogramsgroups->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Group_Name']);

        $this->set(compact('stayprogram', 'Mood', 'Program_Gallery', 'Group1', 'Group2', 'Group3', 'Group4', 'Group5'));
        $this->set('_serialize', ['stayprogram']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stayprogram id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $this->request->allowMethod(['post', 'delete']);
        $stayprogram = $this->Stayprograms->get($id);
        if ($this->Stayprograms->delete($stayprogram)) {
            $this->Flash->success(__('The stayprogram has been deleted.'));
        } else {
            $this->Flash->error(__('The stayprogram could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
