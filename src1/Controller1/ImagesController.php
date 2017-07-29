<?php
namespace App\Controller;
use App\Controller\AppController;
use S3;

class ImagesController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('images', $this->Images->find('all'));
        $this->set('_serialize', ['images']);
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        $image->Tags = explode(", ", $image->Tags);
        $this->set('image', $image);
        $this->set('_serialize', ['image']);

        $Tags = $this->Images->Tags->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $this->set(compact('image', 'Tags'));
        $this->set(compact('image'));
        $this->set('_serialize', ['image']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $image = $this->Images->newEntity();
        if ($this->request->is('post')) {

                $file = $this->request->data['Image'];              
                //start of upload image
                 if (!empty($this->request->data['Image']['name'])) {

                        //upload image by aws starts here
                        require_once(ROOT .DS. "Vendor" . DS  . "S3" . DS . "S3.php");
                        
                        //AWS access info
                        if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJXWJX4EXE3ZZPGMQ');
                        if (!defined('awsSecretKey')) define('awsSecretKey', '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');
                        
                        //instantiate the class
                        $s3 = new S3(awsAccessKey, awsSecretKey);
                        
                        //retreive post variables
                        $fileName = $this->request->data['Image']['name'];
                        $fileTempName = $this->request->data['Image']['tmp_name'];
                        
                        //create a new bucket
                        $s3->putBucket("mybuccketsfdfsdfs", S3::ACL_PUBLIC_READ);
                        

                        $file = $this->request->data['Image']; 
                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
                        $setNewFileName = time() . "_" . rand(000000, 999999);
                        
                        $fileName = $setNewFileName.'.'.$ext;
                        
                        if (in_array($ext, $arr_ext)) {
                            //move the file
                            if ($s3->putObjectFile($fileTempName, "mybuccketsfdfsdfs", $fileName, S3::ACL_PUBLIC_READ)) {
                                echo "<strong>We successfully uploaded your file.</strong>";
                            }else{
                                echo "<strong>Something went wrong while uploading your file... sorry.</strong>";
                            }
                        }
                        //upload image by aws ends here

                    }


            $image = $this->Images->patchEntity($image, $this->request->data);
            $image['Image'] = "http://mybuccketsfdfsdfs.s3.amazonaws.com/".$fileName;
            
            if($this->request->data['Tags'] > 0)
            {
                foreach ($this->request->data['Tags'] as $Tag)
                $image['Tags'] = $image['Tags']. $Tag.', ' ;
            }
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The image could not be saved. Please, try again.'));
            }
        }

        $Tags = $this->Images->Tags->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $this->set(compact('image', 'Tags'));
        $this->set(compact('image'));
        $this->set('_serialize', ['image']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        $image->Tags = explode(", ", $image->Tags);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $image = $this->Images->patchEntity($image, $this->request->data);

            
            $imageFileName = "";
            //start of upload image
            if (!empty($this->request->data['Image']['name'])) {
                
                //upload image by aws starts here
                        require_once(ROOT .DS. "Vendor" . DS  . "S3" . DS . "S3.php");
                        
                        //AWS access info
                        if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJXWJX4EXE3ZZPGMQ');
                        if (!defined('awsSecretKey')) define('awsSecretKey', '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');
                        
                        //instantiate the class
                        $s3 = new S3(awsAccessKey, awsSecretKey);
                        
                        //retreive post variables
                        $fileName = $this->request->data['Image']['name'];
                        $fileTempName = $this->request->data['Image']['tmp_name'];
                        
                        //create a new bucket
                        $s3->putBucket("mybuccketsfdfsdfs", S3::ACL_PUBLIC_READ);
                        

                        $file = $this->request->data['Image']; 
                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
                        $setNewFileName = time() . "_" . rand(000000, 999999);
                        
                        $fileName = $setNewFileName.'.'.$ext;
                        if (in_array($ext, $arr_ext)) {
                            //move the file
                            if ($s3->putObjectFile($fileTempName, "mybuccketsfdfsdfs", $fileName, S3::ACL_PUBLIC_READ)) {
                                echo "<strong>We successfully uploaded your file.</strong>";
                            }else{
                                echo "<strong>Something went wrong while uploading your file... sorry.</strong>";
                            }
                        }

                    $image['Image'] = "http://mybuccketsfdfsdfs.s3.amazonaws.com/".$fileName;
                
                }
                else
                {
                    unset($image['Image']);
                }
                

            //end of upload image
                
               foreach ($this->request->data['Tags'] as $Tag)
                $image['Tags'] = $image['Tags']. $Tag.', ' ;

            
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The image could not be saved. Please, try again.'));
            }
        }
        
            $Tags = $this->Images->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

            $this->set(compact('image', 'Tags'));

            $this->set(compact('image'));
            $this->set('_serialize', ['image']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
