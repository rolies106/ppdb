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
    echo $this->Form->input('Option.nilai_rata_total', array('label'=>__('Nilai rata-rata semua nilai',true),'value' => $data['nilai_rata_total']));
    echo $this->Form->input('Option.tahun_pelajaran',array('label'=>__('Tahun Pelajaran',true),'value'=>$data['tahun_pelajaran']));
    echo $this->Form->input('Option.panitia',array('label'=>__('Panitia PPDB Online',true),'value'=>$data['panitia']));
    echo $this->Form->input('Option.tanggal_seleksi_akademik',array('label'=>__('Tanggal Seleksi Akademik',true),'value'=>$data['tanggal_seleksi_akademik']));
    echo $this->Form->input('Option.tanggal_psikotes',array('label'=>__('Tanggal Psikotes',true),'value'=>$data['tanggal_psikotes']));
    echo $this->Form->input('Option.tanggal_hasil_seleksi',array('label'=>__('Tanggal Hasil Seleksi',true),'value'=>$data['tanggal_hasil_seleksi'], 'class' => 'datepicker'));
    echo $this->Form->input('Option.text_pembuka_pengumuman',array('value'=>$data['text_pembuka_pengumuman'], 'type'=>'textarea', 'label'=>'Text Pembuka Pada Halaman Pengumuman', 'class'=>'ckeditor'));
    echo $this->Form->end('Save Settings');
?>
</div>
<div class="clear"></div>
