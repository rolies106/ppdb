<h2 class="page-title"><?php __('Edit Data Calon Siswa'); ?></h2>

<?php 
    echo $this->Form->create('Registration');
    echo $this->Form->input('Registration.id', array('type'=>'hidden'));
?>

<div class="detail-profile">
	<fieldset><legend><?php __('Data Pribadi'); ?></legend>
		<?php 
            echo $this->Form->input('Registration.nisn', array('label'=>__('NISN:',true),'maxlength' => 10, 'class'=>''));
            echo $this->Form->input('Registration.nama', array('label'=>__('Nama Lengkap:',true), 'class'=>''));
            echo $this->Form->input('Registration.asal_sekolah', array('label'=>__('Asal Sekolah:',true), 'class'=>''));
            echo $this->Form->input('Registration.email', array('label'=>__('Alamat Email:',true), 'class'=>''));
            echo $this->Form->input('Registration.tempat_lahir', array('label'=>__('Tempat Lahir:',true), 'class'=>''));
            echo $this->Form->input('Registration.tanggal_lahir', array('label'=>__('Tanggal Lahir:',true)));    
        ?>
		<div class="input_radio">
        <label class="label"><?php __('Jenis Kelamin')?></label>
        <?php echo $this->Form->radio('Registration.gender', 
                            array('L'=>__('Laki-laki',true), 'P' => __('Perempuan',true)),
                            array('legend'=>false));
        ?>
        </div>
        <?php 
            echo $this->Form->input('Registration.alamat_calon', array('label'=>__('Alamat Calon:',true),'type'=>'textarea','class'=>''));
            echo $this->Form->input('Registration.pendidikan_terakhir', array('label'=>__('Pendidikan Terakhir:',true),'class'=>''));
            echo $this->Form->input('Registration.tahun', array('label'=>__('Tahun Pendidikan:',true),'type'=>'text','class'=>''));
            echo $this->Form->input('Registration.agama', array('label'=>__('Agama:',true),'class'=>''));
            echo $this->Form->input('Registration.kebangsaan', array('label'=>__('Kebangsaan:',true),'class'=>''));
            echo $this->Form->input('Registration.nama_ortu', array('label'=>__('Nama Orang Tua:',true),'class'=>''));
            echo $this->Form->input('Registration.alamat_ortu', array('label'=>__('Alamat Orang Tua:',true),'type'=>'textarea','class'=>''));
            echo $this->Form->input('Registration.telephone', array('label'=>__('Telephone:',true),'class'=>''));
            echo $this->Form->input('Registration.prestasi', array('label'=>__('Prestasi:',true),'type'=>'textarea','class'=>''));
        ?>
	</fieldset>
	
	<fieldset><legend><?php __('Nilai Raport'); ?></legend>
		<table class="listing">
			<thead>
				<tr>
					<th rowspan="2" valign="middle" align="center" width="250"><strong><?php __('Mata Pelajaran')?></strong></th>
					<th colspan="5" align="center"><strong><?php __('Semester')?></strong></th>
				</tr>
				<tr>
					<th width="80" align="center"><strong>1</strong></th>
					<th width="80" align="center"><strong>2</strong></th>
					<th width="80" align="center"><strong>3</strong></th>
					<th width="80" align="center"><strong>4</strong></th>
					<th width="80" align="center"><strong>5</strong></th>
				</tr>
			</thead>
			<tbody>
				
                <?php foreach($this->data['RegistrationScore'] as $k => $nilai): ?>
                
				<tr>
					<td>
                        <input type="hidden" name="data[RegistrationScore][<?php echo $k;?>][id]" value="<?php echo $nilai['id']; ?>" />
                        <input type="hidden" name="data[RegistrationScore][<?php echo $k;?>][mapel_id]" value="<?php echo $nilai['mapel_id']; ?>" />
                        <?php echo $mapel[$nilai['mapel_id']]; ?>
                    </td>
					<td align="center">
						<input type="text" name="data[RegistrationScore][<?php echo $k; ?>][semester_1]" value="<?php echo $nilai['semester_1']; ?>" />
					</td>
					<td align="center">
						<input type="text" name="data[RegistrationScore][<?php echo $k; ?>][semester_2]" value="<?php echo $nilai['semester_2']; ?>" />
					</td>
					<td align="center">
						<input type="text" name="data[RegistrationScore][<?php echo $k; ?>][semester_3]" value="<?php echo $nilai['semester_3']; ?>" />
					</td>
					<td align="center">
						<input type="text" name="data[RegistrationScore][<?php echo $k; ?>][semester_4]" value="<?php echo $nilai['semester_4']; ?>" />
					</td>
					<td align="center">
						<input type="text" name="data[RegistrationScore][<?php echo $k; ?>][semester_5]" value="<?php echo $nilai['semester_5']; ?>" />
					</td>
				</tr>
                
				<?php endforeach; ?>
                
			</tbody>
		</table>
	</fieldset>
</div>

<?php
    echo $this->Form->end('Update');
?>

<div class="page-nav">
	<?php echo $this->Html->link(__('Kembali',true),array('admin'=>true,'controller'=>'registrations','action'=>'dataSiswa'),array('class' => 'css3pie')); ?>
</div>
<div class="clear"></div>