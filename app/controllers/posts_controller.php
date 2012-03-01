<?php

/**
 * Posts controller
 * @copyright 2011
 */
 
class PostsController extends AppController {
    var $name = 'Posts';
    
    function index(){
        $this->loadModel('Option');
        $this->set('title_for_layout',__('Home | PPDB Online '.$this->Option->getValue('nama_sekolah'),true));
        $posts = $this->Post->find('all',array('conditions'=>array('Post.post_type'=>'post','Post.publish'=>'Y'),'order'=>array('Post.post_date DESC'), 'limit' => 8, 'offset' => 1));
        $latestpost = $this->Post->find('first',array('conditions'=>array('Post.post_type'=>'post','Post.publish'=>'Y'),'order'=>array('Post.post_date DESC'), 'limit' => 1));
        $features = $this->Post->find('all',array('conditions'=>array('Post.post_type'=>'feature','Post.publish'=>'Y'),'order'=>array('Post.post_date DESC')));
        $this->set(compact('posts','features', 'latestpost'));
    }
    
    function view($id = null) {
    	$this->Post->id = $id;
        $this->set('post', $this->Post->read());
    }

    
    function admin_index(){
        $this->set('posts', $this->Post->find('all'));
    }
    
    function admin_add(){
        if (!empty($this->data)) {
            $this->data['Post']['user_id'] = $this->Session->read('Auth.User.id');
            $this->data['Post']['post_date'] = date('Y-m-d H:i:s');
            $this->Post->create();
            
            // set the upload destination folder
			$destination = realpath('../../app/webroot/img/uploads/') . '/';

			// grab the file
			$file = $this->data['Post']['post_image'];

			// upload the image using the upload component
			$result = $this->Upload->upload($file, $destination, null,null,null);
            
            if (!$result){
				$this->data['Post']['post_image'] = $this->Upload->result;
			} 
            else {
				// display error
				$errors = $this->Upload->errors;
   
				// piece together errors
				if(is_array($errors)){ $errors = implode("<br />",$errors); }
   
					$this->Session->setFlash($errors);
					$this->redirect(array('admin'=>true,'controller'=>'posts','action'=>'add'));
					exit();
			}
            
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash('Your post has been saved.','flash_success');
				$this->redirect(array('admin'=>true,'controller'=>'posts','action'=>'index'));
			}
		}
    }
    
    function admin_edit($id = null) {
    	$this->Post->id = $id;
    	if (empty($this->data)) {
    		$this->data = $this->Post->read();
            $image_exist_value = $this->data['Post']['post_image'];
            if(!empty($this->data['Post']['post_image'])){
                $img_path = Router::url('/',true).'img/uploads/'.$this->data['Post']['post_image'];
                $exist_image = '<img src="'.$img_path.'" alt="'.$this->data['Post']['post_title'].'" />';   
            }
            else{
                $exist_image = '';
            }
            $this->set(compact('exist_image','image_exist_value'));
            
    	} else {
            if(empty($this->data['Post']['post_image']['name'])){
                unset($this->data['Post']['post_image']);
            }
            else{
                // set the upload destination folder
    			$destination = realpath('../../app/webroot/img/uploads/') . '/';
    
    			// grab the file
    			$file = $this->data['Post']['post_image'];
    
    			// upload the image using the upload component
    			$result = $this->Upload->upload($file, $destination, null,null,null);
                
                if (!$result){
    				$this->data['Post']['post_image'] = $this->Upload->result;
                    // delete existing image
                    if(!empty($this->data['Post']['existing_image'])){
                        unlink($destination.$this->data['Post']['existing_image']);    
                    }
    			} 
                else {
    				// display error
    				$errors = $this->Upload->errors;
       
    				// piece together errors
    				if(is_array($errors)){ $errors = implode("<br />",$errors); }
       
    					$this->Session->setFlash($errors);
    					$this->redirect(array('admin'=>true,'controller'=>'posts','action'=>'add'));
    					exit();
    			}
            }
            // save data
    		if ($this->Post->save($this->data)) {
    			$this->Session->setFlash('Your post has been updated.','flash_success');
    			$this->redirect(array('admin'=>true,'controller'=>'posts','action'=>'index'));
    		}
    	}
    }
    
    function admin_delete($id) {
    	if ($this->Post->delete($id)) {
    		$this->Session->setFlash('The post with id: ' . $id . ' has been deleted.','flash_success');
    		$this->redirect(array('admin'=>true,'controller'=>'posts','action'=>'index'));
    	}
    }

}