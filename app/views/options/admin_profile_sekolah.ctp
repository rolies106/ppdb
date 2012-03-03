<?php $javascript->link('ckeditor/ckeditor', false); ?>
<div class="grid_24">
    <?php
    echo $this->Form->create('Option');
    echo $this->Form->input('Option.nama_sekolah', array('value' => $data['nama_sekolah']));
    echo $this->Form->input('Option.kepsek',array('value'=>$data['kepsek'], 'label' => 'Kepala Sekolah'));
    echo $this->Form->input('Option.kepsek_nip',array('value'=>$data['kepsek_nip'], 'label' => 'NIP Kepala Sekolah'));
    echo $this->Form->input('Option.alamat',array('type'=>'textarea','value'=>$data['alamat']));
    echo $this->Form->input('Option.kecamatan',array('value'=>$data['kecamatan']));	
	echo $this->Form->input('Option.kota',array('value'=>$data['kota'],'label' => 'Kotamadya / Kabupaten'));
	echo $this->Form->input('Option.propinsi',array('value'=>$data['propinsi']));
    echo $this->Form->input('Option.kodepos',array('value'=>$data['kodepos']));
    echo $this->Form->input('Option.no_telp',array('value'=>$data['no_telp']));
    echo $this->Form->input('Option.no_faks',array('value'=>$data['no_faks']));
    echo $this->Form->input('Option.email',array('value'=>$data['email']));
    echo $this->Form->input('Option.waktu_persekolahan',array('value'=>$data['waktu_persekolahan']));
    echo $this->Form->input('Option.akreditasi',array('value'=>$data['akreditasi']));
    echo $this->Form->input('Option.jenjang',array('value'=>$data['jenjang']));
    echo $this->Form->input('Option.status',array('value'=>$data['status']));
    echo $this->Form->input('Option.website',array('value'=>$data['website']));
    echo $this->Form->input('Option.text_pembuka_profile',array('value'=>$data['text_pembuka_profile'], 'type'=>'textarea', 'label'=>'Text Pembuka Pada Profil Sekolah', 'class'=>'ckeditor'));
    echo $this->Form->end('Save');
    ?>
</div>
<div class="clear"></div>
