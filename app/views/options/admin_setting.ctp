<?php $javascript->link('ckeditor/ckeditor', false); ?>
<div class="grid_24 overhidden">
<?php
    echo $this->Form->create('Option');
    echo $this->Form->input('Option.nama_aplikasi', array('label'=>__('Nama Aplikasi',true),'value' => $data['nama_aplikasi']));
	echo $this->Form->input('Option.tanggal_mulai_pendaftaran', array('label'=>__('Tanggal mulai pendaftaran',true),'value' => $data['tanggal_mulai_pendaftaran'], 'class' => 'datepicker'));
    echo $this->Form->input('Option.tanggal_selesai_pendaftaran', array('label'=>__('Tanggal selesai pendaftaran',true),'value' => $data['tanggal_selesai_pendaftaran'], 'class' => 'datepicker'));
    echo $this->Form->input('Option.tanggal_mulai_verifikasi', array('label'=>__('Tanggal mulai verifikasi berkas',true),'value' => $data['tanggal_mulai_verifikasi'], 'class' => 'datepicker'));
    echo $this->Form->input('Option.tanggal_selesai_verifikasi', array('label'=>__('Tanggal selesai verifikasi berkas',true),'value' => $data['tanggal_selesai_verifikasi'], 'class' => 'datepicker'));
    echo $this->Form->input('Option.kelompok_jumlah_siswa', array('label'=>__('Pengelompokan jumlah siswa',true),'value' => $data['kelompok_jumlah_siswa']));
    echo $this->Form->input('Option.nilai_rata_horizontal', array('label'=>__('Nilai rata-rata semua semester',true),'value' => $data['nilai_rata_horizontal']));
    echo $this->Form->input('Option.nilai_rata_vertical',array('label'=>__('Nilai rata-rata per semester',true),'value'=>$data['nilai_rata_vertical']));
    echo $this->Form->input('Option.nilai_minimal_mapel',array('label'=>__('Nilai minimal mata pelajaran penting di setiap semester',true),'value'=>$data['nilai_minimal_mapel']));
    echo $this->Form->input('Option.nilai_minimal_test',array('label'=>__('Nilai test terendah',true),'value'=>$data['nilai_minimal_test']));
    echo $this->Form->input('Option.tahun_pelajaran',array('label'=>__('Tahun Pelajaran',true),'value'=>$data['tahun_pelajaran']));
    echo $this->Form->input('Option.panitia',array('label'=>__('Panitia PPDB Online',true),'value'=>$data['panitia']));
    echo $this->Form->input('Option.tanggal_seleksi_akademik',array('label'=>__('Tanggal Seleksi Akademik',true),'value'=>$data['tanggal_seleksi_akademik'], 'class' => 'datepicker'));
    echo $this->Form->input('Option.tanggal_psikotes',array('label'=>__('Tanggal Psikotes',true),'value'=>$data['tanggal_psikotes'], 'class' => 'datepicker'));
    echo $this->Form->input('Option.tanggal_hasil_seleksi',array('label'=>__('Tanggal Hasil Seleksi',true),'value'=>$data['tanggal_hasil_seleksi'], 'class' => 'datepicker'));
    echo $this->Form->input('Option.text_pembuka_pengumuman',array('value'=>$data['text_pembuka_pengumuman'], 'type'=>'textarea', 'label'=>'Text Pembuka Pada Halaman Pengumuman', 'class'=>'ckeditor'));

    echo $this->Form->input('Option.link_cara_mendaftar',array('label'=>__('Link Post Cara Mendaftar',true),'value'=>$data['link_cara_mendaftar'], 'class' => ''));
    echo $this->Form->input('Option.link_syarat_mendaftar',array('label'=>__('Link Post Syarat Pendaftaran',true),'value'=>$data['link_syarat_mendaftar'], 'class' => ''));
    echo $this->Form->input('Option.link_berita_sekolah',array('label'=>__('Link Post Berita Sekolah',true),'value'=>$data['link_berita_sekolah'], 'class' => ''));
    echo $this->Form->input('Option.link_event',array('label'=>__('Link Post Event',true),'value'=>$data['link_event'], 'class' => ''));
    echo $this->Form->input('Option.link_media',array('label'=>__('Link Post Media',true),'value'=>$data['link_media'], 'class' => ''));

    echo $this->Form->input('Option.link_misi',array('label'=>__('Link Post Visi dan Misi',true),'value'=>$data['link_misi'], 'class' => ''));
    echo $this->Form->input('Option.link_struktur_organisasi',array('label'=>__('Link Post Struktur Organisasi',true),'value'=>$data['link_struktur_organisasi'], 'class' => ''));
    echo $this->Form->input('Option.link_sambutan_kepsek',array('label'=>__('Link Post Sambutan Kepsek',true),'value'=>$data['link_sambutan_kepsek'], 'class' => ''));
    
    echo $this->Form->input('Option.social_fb',array('label'=>__('Link Facebook',true),'value'=>$data['social_fb'], 'class' => ''));
    echo $this->Form->input('Option.social_twitter',array('label'=>__('Link Twitter',true),'value'=>$data['social_fb'], 'class' => ''));
    echo $this->Form->input('Option.social_feed',array('label'=>__('Link Feed',true),'value'=>$data['social_feed'], 'class' => ''));

    echo $this->Form->end('Save Settings');
?>
</div>
<div class="clear"></div>
