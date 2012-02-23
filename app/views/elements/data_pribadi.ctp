<?php 
    echo $this->Form->input('Registration.nisn', array('label'=>__('NISN:',true),'maxlength' => 10, 'class'=>'field titleHintBox','after'=>'<span class="red">*</span>','title'=>'Masukan 10 digit NISN Anda.'));
    echo $this->Form->input('Registration.nama', array('label'=>__('Nama Lengkap:',true), 'class'=>'field','after'=>'<span class="red">*</span>'));
    echo $this->Form->input('Registration.asal_sekolah', array('label'=>__('Asal Sekolah:',true), 'class'=>'field','after'=>'<span class="red">*</span>'));
    echo $this->Form->input('Registration.email', array('label'=>__('Alamat Email:',true), 'class'=>'field titleHintBox','after'=>'<span class="red">*</span>','title'=>'Alamat email harus masih aktif.'));
    echo $this->Form->input('Registration.tempat_lahir', array('label'=>__('Tempat Lahir:',true), 'class'=>'field','after'=>'<span class="red">*</span>'));
    echo $this->Form->input('Registration.tanggal_lahir', array('label'=>__('Tanggal Lahir:',true),'after'=>'<span class="red fnone">*</span>'));
?>
<div class="input_radio">
<label class="label"><?php __('Jenis Kelamin')?></label>
<?php echo $this->Form->radio('Registration.gender', 
                    array('L'=>__('Laki-laki',true), 'P' => __('Perempuan <span class="red fnone">*</span>',true)),
                    array('value'=>'L', 'legend'=>false));
?>
</div>
<?php echo $this->Form->input('Registration.alamat_calon', array('label'=>__('Alamat Calon:',true),'type'=>'textarea','class'=>'field titleHintBox','after'=>'<span class="red">*</span>','title'=>'Mohon alamat diisi dengan lengkap.')); ?>
<div class="input double_field">
    <label><?php __('Pendidikan Terakhir/Tahun:')?></label>
    <input type="text" name="data[Registration][pendidikan_terakhir]" class="field_long field" />
    <input type="text" name="data[Registration][tahun]" class="field_short field" /> <span class="red">*</span>
</div>
<div class="input double_field">
    <label><?php __('Agama/Kebangsaan:')?></label>
    <input type="text" name="data[Registration][agama]" class="field_long field" />
    <input type="text" name="data[Registration][kebangsaan]" class="field_short field" /> <span class="red">*</span>
</div>
<?php echo $this->Form->input('Registration.nama_ortu', array('label'=>__('Nama Orang Tua / Wali:',true), 'class'=>'field','after'=>'<span class="red">*</span>')); ?>
<?php echo $this->Form->input('Registration.alamat_ortu', array('label'=>__('Alamat Orang Tua / Wali:',true),'type'=>'textarea','class'=>'field titleHintBox','after'=>'<span class="red">*</span>','title'=>'Mohon alamat diisi dengan lengkap.')); ?>
<?php echo $this->Form->input('Registration.telephone', array('label'=>__('No. Telp/HP:',true)));?>
<?php echo $this->Form->input('Registration.prestasi', array('label'=>__('Prestasi akademis atau Ekstrakurikuler yang pernah diraih:',true),'type'=>'textarea')); ?>
<div class="input">
( <span class="red pln fnone">*</span> ) <strong>Wajib diisi</strong>
</div>