<?php
class AppController extends Controller {
    var $components = array('Auth','Session','Email','RequestHandler','Upload');
    var $helpers = array('Html','Form','Javascript','Menu','Ajax','Session', 'DateFormat');
    var $paginate = array(
        'limit' => 10
    );
    
    function beforeFilter(){

        $this->Auth->allow('index','display','add','share','cetakDocPendaftaran','cetakDocPernyataan','cetakDocNilai', 'printKartuPeserta', 'checkAvailableNisn','checkAvailableUser','login', 'listAll','profileSekolah','view','inactive');
        $this->Auth->userScope = array('User.status'=>1);
        $this->Auth->loginAction = array('admin' => false,'controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard');

        if ($this->Auth->user('level') == 1) {        
            
            $this->Auth->logoutRedirect = array('admin' => false,'controller' => 'posts', 'action' => 'index');                            

        } else if ($this->Auth->user('level') == 4) {

            $this->Auth->logoutRedirect = array('member' => false,'controller' => 'posts', 'action' => 'index');                            
                        
        }

        $this->Auth->authorize = 'controller';
        //$this->Auth->autoRedirect = false;

    }

    function isAuthorized() {
        if (!empty($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            if ($this->Auth->user('level') != 1) {
                return false;
            }
        }
        return true;
    }
    
    function beforeRender() {
        if(isset($this->params['prefix']) && $this->params['prefix'] == 'admin'){
            $this->layout = 'admin';
            $this->loadModel('Option');
            
            $options = array(
                'nama_aplikasi' => $this->Option->getValue('nama_aplikasi'),
                'nama_sekolah' => $this->Option->getValue('nama_sekolah'),
                'alamat' => $this->Option->getValue('alamat'),
                'kecamatan' => $this->Option->getValue('kecamatan'),
                'kota' => $this->Option->getValue('kota'),
                'propinsi' => $this->Option->getValue('propinsi'),
                'kodepos' => $this->Option->getValue('kodepos'),
                'no_telp' => $this->Option->getValue('no_telp'),
                'no_faks' => $this->Option->getValue('no_faks'),
                'email' => $this->Option->getValue('email'),
                'website' => $this->Option->getValue('website'),
                'tahun_pelajaran' => $this->Option->getValue('tahun_pelajaran'),                                                                                
            );
            
            if($this->RequestHandler->isAjax()){
                $this->layout = 'ajax';
            }
            
            $this->set(compact('options'));
        } else {
            $this->loadModel('Option');

            $options = array(
                'nama_aplikasi' => $this->Option->getValue('nama_aplikasi'),
                'nama_sekolah' => $this->Option->getValue('nama_sekolah'),
                'alamat' => $this->Option->getValue('alamat'),
                'kecamatan' => $this->Option->getValue('kecamatan'),
                'kota' => $this->Option->getValue('kota'),
                'propinsi' => $this->Option->getValue('propinsi'),
                'kodepos' => $this->Option->getValue('kodepos'),
                'no_telp' => $this->Option->getValue('no_telp'),
                'no_faks' => $this->Option->getValue('no_faks'),
                'email' => $this->Option->getValue('email'),
                'website' => $this->Option->getValue('website'),
                'tahun_pelajaran' => $this->Option->getValue('tahun_pelajaran'),                                                                                
            );
            
            $this->set(compact('options'));
        }
        
        $this->set('userLoggedIn',$this->Auth->user('username'));
    }
}
?>