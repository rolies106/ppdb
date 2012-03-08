<?php

/**
 * registration controller
 * @copyright 2011
 */
 
class RegistrationsController extends AppController {
    var $name = 'Registrations';
    var $components = array('Filter'); 

    function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
	
    function index(){
        $this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'add'));
    }
    
    function inactive(){
        $this->loadModel('Option');
        $this->set('title_for_layout',__('Pendaftaran Belum dibuka | PPDB Online '.$this->Option->getValue('nama_sekolah'),true));

        if($this->Registration->isRegistrationOpened(array('date1' => $this->Option->getValue('tanggal_mulai_pendaftaran'), 'date2' => $this->Option->getValue('tanggal_selesai_pendaftaran')))){
            $this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'add'));
        }
        
        $data = array(
            'tanggal_mulai' => $this->Option->getValue('tanggal_mulai_pendaftaran'),
            'tanggal_selesai' => $this->Option->getValue('tanggal_selesai_pendaftaran')
        );
        
        $this->set(compact('data'));
        
    }
    
    function add(){
        # Load Date Format Helper
		App::import('Helper', 'DateFormat');
		$dateFormat = new DateFormatHelper();
                
        $this->loadModel('Option');
        $this->set('title_for_layout',__('Pendaftaran Siswa Baru | PPDB Online '.$this->Option->getValue('nama_sekolah'),true));
        $this->Session->delete('registered');

        if(!$this->Registration->isRegistrationOpened(array('date1' => $this->Option->getValue('tanggal_mulai_pendaftaran'), 'date2' => $this->Option->getValue('tanggal_selesai_pendaftaran')))){
            $this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'inactive'));
        }
        
        if(!empty($this->data)) {
            
            # User extra data
            $this->data['User']['level'] = 4;
            $this->data['User']['status'] = 1;
            $this->data['User']['register_date'] = date('Y-m-d H:i:s');

            $options = array(
                'nilai_per_semester' => $this->Option->getValue('nilai_rata_vertical'),
                'nilai_semua_semester' => $this->Option->getValue('nilai_rata_horizontal'),
                'nilai_minimal_mapel' => $this->Option->getValue('nilai_minimal_mapel')
            );
            
            if($this->Registration->validateNilai($this->data,$options)){
                $this->data['Registration']['passed_by_register'] = 1;
                
                // set tanggal verifikasi
                $this->data['Registration']['tanggal_verifikasi'] = $this->Registration->setVerificationDate(array('date1' => $this->Option->getValue('tanggal_mulai_verifikasi'), 'date2' => $this->Option->getValue('tanggal_selesai_verifikasi')),$this->Option->getValue('kelompok_jumlah_siswa'));
                
                $this->Session->write('tgl_verify',$this->data['Registration']['tanggal_verifikasi']);
                $this->Session->write('passed_register',1);
            }
            else{
                $this->data['Registration']['passed_by_register'] = 0;
                $this->Session->write('passed_register',0);
            }
            $this->data['Registration']['register_date'] = date('Y-m-d H:i:s');
            $this->data['Registration']['tahun_pelajaran'] = $this->Option->getValue('tahun_pelajaran');
            $this->Registration->create();
            
            if($this->Registration->saveAll($this->data)){
                
                $this->Session->write('registered',$this->data['Registration']['nisn']);
                
                // send mail to user
                $nextYear = $this->Option->getValue('tahun_pelajaran') + 1;
                $text = ($this->data['Registration']['passed_by_register'] == 1) ? __('Selamat Anda dapat melanjutkan proses untuk mengikuti sebagai calon siswa PPDB '.$this->Option->getValue('nama_sekolah').' Tahun Pelajaran '.$this->Option->getValue('tahun_pelajaran').'/'.$nextYear.'.',true) : __('Maaf Anda tidak dapat melanjutkan proses untuk mengikuti sebagai calon siswa pada PPDB '.$this->Option->getValue('nama_sekolah').' Tahun Pelajaran '.$this->Option->getValue('tahun_pelajaran').'/'.$nextYear.', dikarenakan nilai rata-rata anda kurang dari '.$this->Option->getValue('nilai_rata_vertical').', Terima kasih.',true);
                $text_verifikasi = ($this->data['Registration']['passed_by_register'] == 1) ? __('Tanggal verifikasi : ', true).$dateFormat->changeDateFormat($this->data['Registration']['tanggal_verifikasi']): '';
                
                # Text Account
                $text_account = 'Anda dapat login ke akun anda menggunakan detail berikut : <br/><br/>';
                $text_account .= 'Username : ' . $this->data['Registration']['nisn'] . '<br/>';
                $text_account .= 'Password : ' . $this->data['User']['secretword'];

                $mail_options = array(
                    'message' => $text,
                    'text_verifikasi' => $text_verifikasi,
                    'text_account' => $text_account,
                    'nisn' => $this->data['Registration']['nisn'],
                );
                
                $this->_sendNewUserMail($this->data['Registration']['nisn'],$mail_options);
                
                // redirect page
                $this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'share'));
            }
        }
    }
    
    function share(){
	
		$this->loadModel('Option');
			$option = array(
                'nama_sekolah' => $this->Option->getValue('nama_sekolah'),
                'nama_aplikasi' => $this->Option->getValue('nama_aplikasi'),
				'tahunPelajaran' => $this->Option->getValue('tahun_pelajaran'),
				'nilai_rata_vertical' => $this->Option->getValue('nilai_rata_vertical')
            );

		$next_year = $option['tahunPelajaran'] + 1;
			
        $this->set('title_for_layout',__('Share with your friends in social media | PPDB Online '. $option['nama_sekolah'],true));
        if(!$this->Session->read('registered')){
            $this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'add'));
        }
        
		# Load Date Format Helper
		App::import('Helper', 'DateFormat');
		$dateFormat = new DateFormatHelper();
		
        if($this->Session->read('passed_register') == 1){
        $msg = __('Selamat Anda dapat melanjutkan proses untuk mengikuti sebagai calon siswa ' . $option['nama_sekolah'] . ' Tahun Pelajaran ' . $option['tahunPelajaran'] . '/' . $next_year . ', Silahkan melakukan verifikasi langsung ke ' . $option['nama_sekolah'] . ' pada tanggal <strong>'. $dateFormat->changeDateFormat($this->Session->read('tgl_verify')) . '</strong>. <br />Tekan tombol Cetak/Print sebagai data verifikasi', true);
        }
        else{
            #$msg = __('Maaf Anda tidak dapat melanjutkan proses untuk mengikuti sebagai calon siswa pada ' . $option['nama_sekolah'] . ' Tahun Pelajaran ' . $option['tahunPelajaran'] . '/' . $next_year . ', dikarenakan nilai rata-rata anda kurang dari ' . $option['nilai_rata_vertical'] . ', Terima kasih.', true);
            $msg = __('Maaf Anda tidak dapat melanjutkan proses untuk mengikuti sebagai calon siswa pada ' . $option['nama_sekolah'] . ' Tahun Pelajaran ' . $option['tahunPelajaran'] . '/' . $next_year . ', dikarenakan nilai Anda tidak masuk dalam Ketentuan PPDB yang telah ditetapkan, Terima kasih.', true);
        }
        
        $pass = $this->Session->read('passed_register');
        
        $this->set(compact('msg','pass','option'));
    }
    
    function cetakDocPendaftaran($id = null){
        $this->layout = 'pdf'; //this will use the pdf.ctp layout

		$this->loadModel('Option');
			$option = array(
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
				'tahunPelajaran' => $this->Option->getValue('tahun_pelajaran'),																				
            );

		$next_year = $option['tahunPelajaran'] + 1;

		define('PDF_HEADER_TITLE_C', $option['nama_aplikasi']);
		define('PDF_HEADER_STRING_C', $option['nama_sekolah'] . " \nTahun Pelajaran " . $option['tahunPelajaran'] . ' - ' .  $next_year . " \n" . $option['alamat'] . " Tel/Fax " . $option['no_telp'] . "/" . $option['no_faks'] . " " . $option['kecamatan'] . " " . $option['kodepos'] . " \n" . $option['kota'] . " " . $option['propinsi']);
        
        if (!$this->Session->read('registered') && $id == NULL)
        {
            $this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'add'));
        }
        
        $nisn = ($this->Session->read('registered')) ? $this->Session->read('registered') : $id;

        $dataSiswa = $this->Registration->find('first',array('conditions'=>array('Registration.nisn'=> $nisn)));
        $this->set(compact('dataSiswa', 'option'));
    }
    
    function cetakDocPernyataan(){
        $this->layout = 'pdf'; //this will use the pdf.ctp layout

		$this->loadModel('Option');
			$option = array(
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
				'tahunPelajaran' => $this->Option->getValue('tahun_pelajaran'),																				
            );

		$next_year = $option['tahunPelajaran'] + 1;

		define('PDF_HEADER_TITLE_C', $option['nama_aplikasi']);
		define('PDF_HEADER_STRING_C', $option['nama_sekolah'] . " \nTahun Pelajaran " . $option['tahunPelajaran'] . ' - ' .  $next_year . " \n" . $option['alamat'] . " Tel/Fax " . $option['no_telp'] . "/" . $option['no_faks'] . " " . $option['kecamatan'] . " " . $option['kodepos'] . " \n" . $option['kota'] . " " . $option['propinsi']);

        if (!$this->Session->read('registered') && $id == NULL)
        {
            $this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'add'));
        }
        
        $nisn = ($this->Session->read('registered')) ? $this->Session->read('registered') : $id;

        $dataSiswa = $this->Registration->find('first',array('conditions'=>array('Registration.nisn'=>$nisn)));
        $this->set(compact('dataSiswa', 'option'));
    }
    
    function member_cetakDocHasilTest($nisn = NULL){
        $this->layout = 'pdf'; //this will use the pdf.ctp layout

        $this->loadModel('Option');
            $option = array(
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
                'tahunPelajaran' => $this->Option->getValue('tahun_pelajaran'),
                'nilai_minimal_test' => $this->Option->getValue('nilai_minimal_test'),
                'kepsek' => $this->Option->getValue('kepsek'),
                'kepsek_nip' => $this->Option->getValue('kepsek_nip'),
                'tanggal_mulai_verifikasi' => $this->Option->getValue('tanggal_mulai_verifikasi'),
                'tanggal_selesai_verifikasi' => $this->Option->getValue('tanggal_selesai_verifikasi'),

            );

        $next_year = $option['tahunPelajaran'] + 1;

        define('PDF_HEADER_TITLE_C', $option['nama_aplikasi']);
        define('PDF_HEADER_STRING_C', $option['nama_sekolah'] . " \nTahun Pelajaran " . $option['tahunPelajaran'] . ' - ' .  $next_year . " \n" . $option['alamat'] . " Tel/Fax " . $option['no_telp'] . "/" . $option['no_faks'] . " " . $option['kecamatan'] . " " . $option['kodepos'] . " \n" . $option['kota'] . " " . $option['propinsi']);

        if ($this->Session->check('Auth.User.id') == false)
        {
            $this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'add'));
        }
        
        $dataSiswa = $this->Registration->find('first',array('recursive' => 1, 'conditions'=>array('Registration.nisn'=>$nisn)));
        $totalNilai = $dataSiswa['TestScore']['academic'] + $dataSiswa['TestScore']['english'] + $dataSiswa['TestScore']['computer'] + $dataSiswa['TestScore']['interview'] + $dataSiswa['TestScore']['uasbn'];

        $this->set(compact('dataSiswa', 'option', 'next_year', 'totalNilai'));
    }
        
    function cetakDocNilai($id = NULL){
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        
        if (!$this->Session->read('registered') && $id == NULL)
        {
            $this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'add'));
        }

		$this->loadModel('Option');
		$option = array(
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
			'tahunPelajaran' => $this->Option->getValue('tahun_pelajaran'),																				
		);
        
		$next_year = $option['tahunPelajaran'] + 1;

		define('PDF_HEADER_TITLE_C', $option['nama_aplikasi']);
		define('PDF_HEADER_STRING_C', $option['nama_sekolah'] . " \nTahun Pelajaran " . $option['tahunPelajaran'] . ' - ' .  $next_year . " \n" . $option['alamat'] . " Tel/Fax " . $option['no_telp'] . "/" . $option['no_faks'] . " " . $option['kecamatan'] . " " . $option['kodepos'] . " \n" . $option['kota'] . " " . $option['propinsi']);

        $nisn = ($this->Session->read('registered')) ? $this->Session->read('registered') : $id;

        $data = $this->Registration->find('first',array('conditions'=>array('Registration.nisn'=>$nisn)));
        $label = $this->Session->read('registered');
        $mapel = array(1 => 'Pendidikan Agama','Pendidikan Kewarganegaraan', 'Bahasa Indonesia', 'Bahasa Inggris','Matematika','IPA','IPS','Seni dan Budaya','Pendidikan Jasmani dan Kesehatan','Teknologi Informasi dan Komunikasi');
        $dataNilai = compact('data','mapel','label');
        $this->set(compact('dataNilai', 'option'));
    }
    
    function printKartuPeserta($id = NULL){
        $this->loadModel('Option');
        
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        
        if (!$this->Session->read('registered') && $id == NULL)
        {
            $this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'add'));
        }
        
        $option = array(
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
			'tahunPelajaran' => $this->Option->getValue('tahun_pelajaran'),
            'nextTahunPelajaran' => $this->Option->getValue('tahun_pelajaran') + 1,
            'panitia' => $this->Option->getValue('panitia'),
            'tanggal_seleksi_akademik' => $this->Option->getValue('tanggal_seleksi_akademik'),
            'tanggal_psikotes' => $this->Option->getValue('tanggal_psikotes'),
            'tanggal_hasil_seleksi' => $this->Option->getValue('tanggal_hasil_seleksi'),
            'email' => $this->Option->getValue('email'),
            'web' => $this->Option->getValue('website')
		);
        
		$next_year = $option['tahunPelajaran'] + 1;

		define('PDF_HEADER_TITLE_C', 'PEMERINTAH ' . strtoupper($option['kota']));		
		define('PDF_HEADER_STRING_C', "DINAS PENDIDIKAN \n" . strtoupper($option['nama_sekolah']) . " \n" . $option['alamat'] . " Tel/Fax " . $option['no_telp'] . "/" . $option['no_faks'] . " " . $option['kecamatan'] . " " . $option['kodepos'] . " \n" . $option['kota'] . " " . $option['propinsi'] . " \nemail: " . $option['email'] . " website: " . $option['web']);
    	define('PDF_PAGE_FORMAT_C', 'A6');
		define('PDF_MARGIN_LEFT_C', '5');
		define('PDF_MARGIN_RIGHT_C', '5');
		define('PDF_HEADER_LOGO_WIDTH_C', '20');
		define('PDF_FONT_SIZE_MAIN_C', '7');
		define('PDF_MARGIN_BOTTOM_C', '10');
		
        // read data
        $nisn = ($this->Session->read('registered')) ? $this->Session->read('registered') : $id;
        $data = $this->Registration->find('first',array('conditions'=>array('Registration.nisn'=>$nisn)));
        
        $this->set(compact('option','data'));
    }
    
    function _sendNewUserMail($nisn, $options) {
        $this->loadModel('Option');
        
        $User = $this->Registration->find('first',array('conditions'=>array('Registration.nisn'=>$nisn)));
        $message = $options;
        $this->Email->to = $User['Registration']['email'];
        $this->Email->bcc = array($this->Option->getValue('email'));  
        $this->Email->subject = 'Terima kasih telah mendaftar di '.$this->Option->getValue('nama_sekolah');
        $this->Email->replyTo = $this->Option->getValue('email');
        $this->Email->from = 'PPDB '.$this->Option->getValue('nama_sekolah').' <'.$this->Option->getValue('email').'>';
        $this->Email->template = 'email_confirm_register'; // note no '.ctp'
        //Send as 'html', 'text' or 'both' (default is 'text')
        $this->Email->sendAs = 'both'; // because we like to send pretty mail
        //Set view variables as normal
        $this->set(compact('User','message'));
        //Do not pass any args to send()
        $this->Email->send();
    }

	function listAll() {
		$this->loadModel('Option');
		$option['tahunPelajaran'] = $this->Option->getValue('tahun_pelajaran');
		$option['text_pembuka_pengumuman'] = $this->Option->getValue('text_pembuka_pengumuman');
	
		$conditionsReg = array('Registration.tahun_pelajaran' => $option['tahunPelajaran']);
		$studentsReg = $this->Registration->find('all', array('conditions' => $conditionsReg, 'recursive' => 1, 'order'=> array('Registration.register_date' => 'DESC')));
		
		$this->set(compact('studentsReg', 'option'));
	}
    
    function admin_dataSiswa() {
		$this->loadModel('Option');
		$option['tahunPelajaran'] = $this->Option->getValue('tahun_pelajaran');

        $conditionsReg = array('Registration.tahun_pelajaran' => $option['tahunPelajaran']);
		#$studentsReg = $this->Registration->find('all', array('conditions' => $conditionsReg, 'recursive' => 1, 'order'=> array('Registration.register_date' => 'DESC')));
		#$studentsReg = $this->paginate('Registration', array('conditions' => $conditionsReg, 'recursive' => 1, 'order'=> array('Registration.register_date' => 'DESC')));

        $this->paginate = array(
            'conditions' => $conditionsReg,
            'recursive' => 1,
            'limit' => 10
        );

        $filter = $this->Filter->process($this);  
        $this->set('url',$this->Filter->url);  

        $studentsReg = $this->paginate('Registration', $filter);
		
        $this->set(compact('studentsReg'));
	}
     
    function checkAvailableNisn(){
        $this->layout = 'ajax';
        if($this->RequestHandler->isAjax()){
			$id = $_POST['nis'];
            $count = $this->Registration->find('count',array('conditions'=>array('Registration.nisn'=>$id)));
            if($count < 1){
                echo 'available';
            }
            else{
                echo 'exist';
            }
            die();
		}else{
			$this->redirect(array('admin'=>false,'controller'=>'registrations','action'=>'add'));
		}
    }

	function admin_detailCalonSiswa($id = NULL) {

		if (!empty($id)) {
			$conditionDetail = array('Registration.id' => $id);
			$studentDetail = $this->Registration->find('first', array('conditions' => $conditionDetail, 'recursive' => 1));		

			$label = $this->Session->read('registered');
			$mapel = array(1 => 'Pendidikan Agama','Pendidikan Kewarganegaraan', 'Bahasa Indonesia', 'Bahasa Inggris','Matematika','IPA','IPS','Seni dan Budaya','Pendidikan Jasmani dan Kesehatan','Teknologi Informasi dan Komunikasi');
			$dataNilai = compact('studentDetail', 'mapel','label');
		} else {
			$studentDetail = NULL;
		}
		
		$this->set(compact('studentDetail','dataNilai'));
	}
    
    function admin_exportXls(){
        $this->loadModel('Option');
		$option['tahunPelajaran'] = $this->Option->getValue('tahun_pelajaran');
        $option['creator'] = $this->Option->getValue('nama_sekolah');
        $option['title'] = __('Data Siswa Document',true);
        $option['description'] = $this->Option->getValue('nama_aplikasi');
        $option['keywords'] = __('PPDB, Online, PSB',true);
        $option['category'] = __('Hasil Data Siswa',true);
        
        $conditionsReg = array('Registration.tahun_pelajaran' => $option['tahunPelajaran']);

        # Registration status
        if ($this->data['Registration']['status'] == 'Y') {
            $addCond = array('Registration.passed_by_register' => 1);
        } else if ($this->data['Registration']['status'] == 'N') {
            $addCond = array('Registration.passed_by_register' => 0);
        } else if ($this->data['Registration']['status'] == 'A') {
            $addCond = array();
        } else {
            $addCond = array();
        }

        # Registration date
        $dateCond = array();
        if (!empty($this->data['Registration']['start_date'])) {
            $dateCondStart = array('Registration.register_date >=' => $this->data['Registration']['start_date']);
        }

        if (isset($dateCondStart)) {
            $dateCond = array_merge($dateCond, $dateCondStart);   
        }

        if (!empty($this->data['Registration']['end_date'])) {
            $dateCondEnd = array('Registration.register_date <=' => $this->data['Registration']['end_date']);
        }

        if (isset($dateCondEnd)) {
            $dateCond = array_merge($dateCond, $dateCondEnd);   
        }

        $conditionsReg = array_merge($conditionsReg, $addCond, $dateCond);

		$data = $this->Registration->find('all', array('conditions' => $conditionsReg, 'fields' => array('Registration.id','Registration.nisn','Registration.nama','Registration.asal_sekolah','Registration.gender','Registration.tanggal_verifikasi','Registration.passed_by_register'),'recursive' => -1, 'order'=> array('Registration.id' => 'ASC')));
		
        $this->set(compact('data','option'));
        $this->render('','excel','admin_export_xls');
    }
    
    function admin_edit($id = null){
        $mapel = array(1 => 'Pendidikan Agama','Pendidikan Kewarganegaraan', 'Bahasa Indonesia', 'Bahasa Inggris','Matematika','IPA','IPS','Seni dan Budaya','Pendidikan Jasmani dan Kesehatan','Teknologi Informasi dan Komunikasi');
        $this->loadModel('RegistrationScore');
        $this->Registration->id = $id;
        
        if(empty($this->data)){
            $this->data = $this->Registration->read();
        }
        else{
            if($this->Registration->saveAll($this->data,array('validate'=>false))){
                $this->Session->setFlash('Data calon siswa telah di update.','flash_success');
                $this->redirect(array('admin'=>true,'controller'=>'registrations','action'=>'dataSiswa'));
            }
        }
        $this->set(compact('mapel'));    
    }
    
    function admin_delete($id) {
    	if ($this->Registration->delete($id)) {
    		$this->Session->setFlash('Calon siswa dengan id: ' . $id . ' telah di hapus.','flash_success');
    		$this->redirect(array('admin'=>true,'controller'=>'registrations','action'=>'dataSiswa'));
    	}
    }
    
    function admin_printDocPendaftaran($id = null){
        $this->loadModel('Option');
			$option = array(
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
				'tahunPelajaran' => $this->Option->getValue('tahun_pelajaran'),																				
            );

		$next_year = $option['tahunPelajaran'] + 1;

		define('PDF_HEADER_TITLE_C', $option['nama_aplikasi']);
		define('PDF_HEADER_STRING_C', $option['nama_sekolah'] . " \nTahun Pelajaran " . $option['tahunPelajaran'] . ' - ' .  $next_year . " \n" . $option['alamat'] . " Tel/Fax " . $option['no_telp'] . "/" . $option['no_faks'] . " " . $option['kecamatan'] . " " . $option['kodepos'] . " \n" . $option['kota'] . " " . $option['propinsi']);
        
        $dataSiswa = $this->Registration->find('first',array('conditions'=>array('Registration.nisn'=>$id)));
        $this->set(compact('dataSiswa', 'option'));
        $this->render('','pdf','cetak_doc_pendaftaran');
    }
    
    function admin_printDocPernyataan($id = null){
        $this->loadModel('Option');
			$option = array(
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
				'tahunPelajaran' => $this->Option->getValue('tahun_pelajaran'),																				
            );

		$next_year = $option['tahunPelajaran'] + 1;

		define('PDF_HEADER_TITLE_C', $option['nama_aplikasi']);
		define('PDF_HEADER_STRING_C', $option['nama_sekolah'] . " \nTahun Pelajaran " . $option['tahunPelajaran'] . ' - ' .  $next_year . " \n" . $option['alamat'] . " Tel/Fax " . $option['no_telp'] . "/" . $option['no_faks'] . " " . $option['kecamatan'] . " " . $option['kodepos'] . " \n" . $option['kota'] . " " . $option['propinsi']);
        
        $dataSiswa = $this->Registration->find('first',array('conditions'=>array('Registration.nisn'=>$id)));
        $this->set(compact('dataSiswa', 'option'));
        $this->render('','pdf','cetak_doc_pernyataan');
    }
    
    function admin_printDocNilai($id = null){
        $this->loadModel('Option');
		$option = array(
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
			'tahunPelajaran' => $this->Option->getValue('tahun_pelajaran'),																				
		);
        
		$next_year = $option['tahunPelajaran'] + 1;

		define('PDF_HEADER_TITLE_C', $option['nama_aplikasi']);
		define('PDF_HEADER_STRING_C', $option['nama_sekolah'] . " \nTahun Pelajaran " . $option['tahunPelajaran'] . ' - ' .  $next_year . " \n" . $option['alamat'] . " Tel/Fax " . $option['no_telp'] . "/" . $option['no_faks'] . " " . $option['kecamatan'] . " " . $option['kodepos'] . " \n" . $option['kota'] . " " . $option['propinsi']);

        $data = $this->Registration->find('first',array('conditions'=>array('Registration.nisn'=>$id)));
        $label = $id;
        $mapel = array(1 => 'Pendidikan Agama','Pendidikan Kewarganegaraan', 'Bahasa Indonesia', 'Bahasa Inggris','Matematika','IPA','IPS','Seni dan Budaya','Pendidikan Jasmani dan Kesehatan','Teknologi Informasi dan Komunikasi');
        $dataNilai = compact('data','mapel','label');
        $this->set(compact('dataNilai', 'option'));
        $this->render('','pdf','cetak_doc_nilai');
    }
    
    function admin_printKartuPeserta($id = null){
        $this->loadModel('Option');
        
        $option = array(
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
			'tahunPelajaran' => $this->Option->getValue('tahun_pelajaran'),
            'nextTahunPelajaran' => $this->Option->getValue('tahun_pelajaran') + 1,
            'panitia' => $this->Option->getValue('panitia'),
            'tanggal_seleksi_akademik' => $this->Option->getValue('tanggal_seleksi_akademik'),
            'tanggal_psikotes' => $this->Option->getValue('tanggal_psikotes'),
            'tanggal_hasil_seleksi' => $this->Option->getValue('tanggal_hasil_seleksi'),
            'email' => $this->Option->getValue('email'),
            'web' => $this->Option->getValue('website')
		);
        
		$next_year = $option['tahunPelajaran'] + 1;

		define('PDF_HEADER_TITLE_C', 'PEMERINTAH ' . strtoupper($option['kota']));		
		define('PDF_HEADER_STRING_C', "DINAS PENDIDIKAN \n" . strtoupper($option['nama_sekolah']) . " \n" . $option['alamat'] . " Tel/Fax " . $option['no_telp'] . "/" . $option['no_faks'] . " " . $option['kecamatan'] . " " . $option['kodepos'] . " \n" . $option['kota'] . " " . $option['propinsi'] . " \nemail: " . $option['email'] . " website: " . $option['web']);
    	define('PDF_PAGE_FORMAT_C', 'A6');
		define('PDF_MARGIN_LEFT_C', '5');
		define('PDF_MARGIN_RIGHT_C', '5');
		define('PDF_HEADER_LOGO_WIDTH_C', '20');
		define('PDF_FONT_SIZE_MAIN_C', '7');
		define('PDF_MARGIN_BOTTOM_C', '10');
		
        // read data
        $data = $this->Registration->find('first',array('conditions'=>array('Registration.nisn'=>$id)));
        
        $this->set(compact('option','data'));
        
        $this->render('','pdf','print_kartu_peserta');
    }

    function member_profile() {

        $this->loadModel('User');
        $id = $this->Auth->user('id');
        if (!empty($id)) {
            $conditionDetail = array('Registration.user_id' => $id);
            $studentDetail = $this->Registration->find('first', array('conditions' => $conditionDetail, 'recursive' => 1));     

            $label = $this->Session->read('registered');
            $mapel = array(1 => 'Pendidikan Agama','Pendidikan Kewarganegaraan', 'Bahasa Indonesia', 'Bahasa Inggris','Matematika','IPA','IPS','Seni dan Budaya','Pendidikan Jasmani dan Kesehatan','Teknologi Informasi dan Komunikasi');
            $dataNilai = compact('studentDetail', 'mapel','label');
        } else {
            $studentDetail = NULL;
        }
        
        $this->set(compact('studentDetail','dataNilai'));

/*        if (empty($this->data)) {
            $this->data = $this->User->read();
        } else {
            if(empty($this->data['User']['secretword']) && empty($this->data['User']['resecretword'])){
                unset($this->data['User']['secretword']);
                unset($this->data['User']['resecretword']);
            }
            if($this->User->save($this->data)){
                $this->Session->setFlash('User has been updated.','flash_success');
                $this->redirect(array('admin'=>true,'controller'=>'users','action'=>'index'));
            }
        }
*/
    }

}