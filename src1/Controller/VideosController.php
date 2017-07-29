<?php
namespace App\Controller;
use App\Controller\AppController;
use S3;

class VideosController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('videos', $this->paginate($this->Videos));
        $this->set('_serialize', ['videos']);
    }

    /**
     * View method
     *
     * @param string|null $id Video id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $video = $this->Videos->get($id, [
            'contain' => []
        ]);
        $video->Tags = explode(", ", $video->Tags);
        $this->set('video', $video);
        $this->set('_serialize', ['video']);

        $Tags = $this->Videos->Tags->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $this->set(compact('video', 'Tags'));
        $this->set(compact('video'));
        $this->set('_serialize', ['video']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('dashboard');
        $video = $this->Videos->newEntity();
        if ($this->request->is('post')) {

            $video = $this->Videos->patchEntity($video, $this->request->data); 

            //start of upload video
             if (!empty($this->request->data['Video']['name'])) {
                 //upload Video by aws starts here
                        require_once(ROOT .DS. "Vendor" . DS  . "S3" . DS . "S3.php");
                        
                        //AWS access info
                        if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJXWJX4EXE3ZZPGMQ');
                        if (!defined('awsSecretKey')) define('awsSecretKey', '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');
                        
                        //instantiate the class
                        $s3 = new S3(awsAccessKey, awsSecretKey);
                        
                        //retreive post variables
                        $fileName = $this->request->data['Video']['name'];
                        $fileTempName = $this->request->data['Video']['tmp_name'];
                        
                        //create a new bucket
                        $s3->putBucket("mybuccketsfdfsdfs", S3::ACL_PUBLIC_READ);
                        

                        $file = $this->request->data['Video']; 
                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('vob', 'flv', 'mkv', 'gif', 'avi', 'mov', 'yuv', 'rmvb', 'mp4'); //set allowed extensions
                        $setNewFileName = time() . "_" . rand(000000, 999999);
                        
                        $videoFileName = $setNewFileName.'.'.$ext;
                        
                        if (in_array($ext, $arr_ext)) {
                            //move the file
                            if ($s3->putObjectFile($fileTempName, "mybuccketsfdfsdfs", $videoFileName, S3::ACL_PUBLIC_READ)) {
                                echo "<strong>We successfully uploaded your file.</strong>";
                            }else{
                                echo "<strong>Something went wrong while uploading your file... sorry.</strong>";
                            }
                        }
                        //upload Video by aws ends here

            }
            $video['Video'] = $videoFileName;
            
            if($this->request->data['Tags']!="")
                {
                    foreach ($this->request->data['Tags'] as $Tag)
                        $video['Tags'] = $video['Tags']. $Tag.', ' ;
                }

            if ($this->Videos->save($video)) {
                $this->Flash->success(__('The video has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The video could not be saved. Please, try again.'));
            }
        }

        $Tags = $this->Videos->Tags->find('list', 
            ['keyField' => 'Id',
            'valueField' => 'Title']);

        $this->set(compact('video', 'Tags'));
        $this->set(compact('video'));
        $this->set('_serialize', ['video']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Video id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('dashboard');
        $video = $this->Videos->get($id, [
            'contain' => []
        ]);
        $video->Tags = explode(", ", $video->Tags);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $video = $this->Videos->patchEntity($video, $this->request->data);

            $videoFileName = "";
            //start of upload video
            if (!empty($this->request->data['Video']['name'])) {
              //upload Video by aws starts here
                        require_once(ROOT .DS. "Vendor" . DS  . "S3" . DS . "S3.php");
                        
                        //AWS access info
                        if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJXWJX4EXE3ZZPGMQ');
                        if (!defined('awsSecretKey')) define('awsSecretKey', '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');
                        
                        //instantiate the class
                        $s3 = new S3(awsAccessKey, awsSecretKey);
                        
                        //retreive post variables
                        $fileName = $this->request->data['Video']['name'];
                        $fileTempName = $this->request->data['Video']['tmp_name'];
                        
                        //create a new bucket
                        $s3->putBucket("mybuccketsfdfsdfs", S3::ACL_PUBLIC_READ);
                        

                        $file = $this->request->data['Video']; 
                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('vob', 'flv', 'mkv', 'gif', 'avi', 'mov', 'yuv', 'rmvb', 'mp4'); //set allowed extensions
                        $setNewFileName = time() . "_" . rand(000000, 999999);
                        
                        $videoFileName = $setNewFileName.'.'.$ext;

                        $video['Video'] = $videoFileName;
                        
                        if (in_array($ext, $arr_ext)) {
                            //move the file
                            if ($s3->putObjectFile($fileTempName, "mybuccketsfdfsdfs", $videoFileName, S3::ACL_PUBLIC_READ)) {
                                echo "<strong>We successfully uploaded your file.</strong>";
                            }else{
                                echo "<strong>Something went wrong while uploading your file... sorry.</strong>";
                            }
                        }
                        else
                        {
                            unset($video['Video']);
                        }
                //upload Video by aws ends here
                }
            //end of upload video
            if($this->request->data['Tags']!="")
                {
                foreach ($this->request->data['Tags'] as $Tag)
                    $video['Tags'] = $video['Tags']. $Tag.', ' ;
                }
            
            if ($this->Videos->save($video)) {
                $this->Flash->success(__('The video has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The video could not be saved. Please, try again.'));
            }
        }
        
            $Tags = $this->Videos->Tags->find('list', 
                ['keyField' => 'Id',
                'valueField' => 'Title']);

            $this->set(compact('video', 'Tags'));

            $this->set(compact('video'));
            $this->set('_serialize', ['video']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Video id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $video = $this->Videos->get($id);
        if ($this->Videos->delete($video)) {
            $this->Flash->success(__('The video has been deleted.'));
        } else {
            $this->Flash->error(__('The video could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
