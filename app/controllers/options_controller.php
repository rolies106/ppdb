<?php

/**
 * options controller
 * @copyright 2011
 */
 
class OptionsController extends AppController {
    var $name = 'Options';
    
    function profileSekolah(){
        $this->set('title_for_layout',__('Profile Sekolah | PPDB Online '.$this->Option->getValue('nama_sekolah'),true));
        $data['nama_sekolah'] = $this->Option->getValue('nama_sekolah');
        $data['alamat'] = $this->Option->getValue('alamat');
        $data['kodepos'] = $this->Option->getValue('kodepos');
		$data['kecamatan'] = $this->Option->getValue('kecamatan');
		$data['kota'] = $this->Option->getValue('kota');
		$data['propinsi'] = $this->Option->getValue('propinsi');
        $data['no_telp'] = $this->Option->getValue('no_telp');
        $data['no_faks'] = $this->Option->getValue('no_faks');
        $data['email'] = $this->Option->getValue('email');
        $data['waktu_persekolahan'] = $this->Option->getValue('waktu_persekolahan');
        $data['akreditasi'] = $this->Option->getValue('akreditasi');
        $data['jenjang'] = $this->Option->getValue('jenjang');
        $data['status'] = $this->Option->getValue('status');
        $data['website'] = $this->Option->getValue('website');
        $data['text_pembuka_profile'] = $this->Option->getValue('text_pembuka_profile');
        
        $this->set(compact('data'));
    }
    
    function admin_profileSekolah(){
        if(!empty($this->data)) {
            foreach ($this->data['Option'] as $key => $value) {
                $this->Option->insertValue($key, $value, 'profile');
            }
            $this->Session->setFlash(__('Data berhasil di simpan.',true),'flash_success');
            $this->redirect(array('admin'=>true,'controller'=>'options','action'=>'profileSekolah'));
        } else {
            $data['nama_sekolah'] = $this->Option->getValue('nama_sekolah');
            $data['alamat'] = $this->Option->getValue('alamat');
            $data['kodepos'] = $this->Option->getValue('kodepos');
			$data['kecamatan'] = $this->Option->getValue('kecamatan');
			$data['kota'] = $this->Option->getValue('kota');
			$data['propinsi'] = $this->Option->getValue('propinsi');
            $data['no_telp'] = $this->Option->getValue('no_telp');
            $data['no_faks'] = $this->Option->getValue('no_faks');
            $data['email'] = $this->Option->getValue('email');
            $data['waktu_persekolahan'] = $this->Option->getValue('waktu_persekolahan');
            $data['akreditasi'] = $this->Option->getValue('akreditasi');
            $data['jenjang'] = $this->Option->getValue('jenjang');
            $data['status'] = $this->Option->getValue('status');
            $data['website'] = $this->Option->getValue('website');
            $data['text_pembuka_profile'] = $this->Option->getValue('text_pembuka_profile');
            $data['kepsek'] = $this->Option->getValue('kepsek');
            $data['kepsek_nip'] = $this->Option->getValue('kepsek_nip');            
        }
        $this->set(compact('data'));
    }
    
    function admin_setting(){
        if(!empty($this->data)) {
            foreach ($this->data['Option'] as $key => $value) {
                $this->Option->insertValue($key, $value, 'setting');
            }
            $this->Session->setFlash(__('Data berhasil di simpan.',true),'flash_success');
            $this->redirect(array('admin'=>true,'controller'=>'options','action'=>'admin_setting'));
        } else {
			$data['nama_aplikasi'] = $this->Option->getValue('nama_aplikasi');
            $data['tanggal_mulai_pendaftaran'] = $this->Option->getValue('tanggal_mulai_pendaftaran');
            $data['tanggal_selesai_pendaftaran'] = $this->Option->getValue('tanggal_selesai_pendaftaran');
            $data['tanggal_mulai_verifikasi'] = $this->Option->getValue('tanggal_mulai_verifikasi');
            $data['tanggal_selesai_verifikasi'] = $this->Option->getValue('tanggal_selesai_verifikasi');
            $data['kelompok_jumlah_siswa'] = $this->Option->getValue('kelompok_jumlah_siswa');
            $data['nilai_rata_horizontal'] = $this->Option->getValue('nilai_rata_horizontal');
            $data['nilai_rata_vertical'] = $this->Option->getValue('nilai_rata_vertical');
            $data['nilai_minimal_mapel'] = $this->Option->getValue('nilai_minimal_mapel');
            $data['nilai_minimal_test'] = $this->Option->getValue('nilai_minimal_test');
            $data['tahun_pelajaran'] = $this->Option->getValue('tahun_pelajaran');
            $data['text_pembuka_pengumuman'] = $this->Option->getValue('text_pembuka_pengumuman');
            $data['panitia'] = $this->Option->getValue('panitia');
            $data['tanggal_seleksi_akademik'] = $this->Option->getValue('tanggal_seleksi_akademik');
            $data['tanggal_psikotes'] = $this->Option->getValue('tanggal_psikotes');
            $data['tanggal_hasil_seleksi'] = $this->Option->getValue('tanggal_hasil_seleksi');
        }
        $this->set(compact('data'));
    }
}
