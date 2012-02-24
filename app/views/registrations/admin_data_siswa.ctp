<div class="grid_24">
    <h2>
        <?php __('Data Calon Siswa yang mendaftar:')?>
        <?php #echo $this->Html->link(__('Export to excel',true),array('admin'=>true,'controller'=>'registrations','action'=>'exportXls'),array('class' => 'button rounded_small add-new-h2 right css3pie')); ?>
    </h2>
    
    <div id="exportForm" class="dropdown">
        <a href="#"><?php __('Export To Excel')?></a>
        <?php echo $this->Form->create(null, array('url' => array('controller' => 'registrations', 'action' => 'exportXls'))); ?>
            <div class="input_radio">
                <label class="label"><?php __('Status :')?></label>
                <?php echo $this->Form->radio('status', 
                                    array('Y'=>__('Lolos',true), 'N' => __('Tidak Lolos',true), 'A' => __('Semua',true)),
                                    array('value'=>'Y', 'legend'=>false));
                ?>
            </div>
            <?php
                echo $this->Form->input('start_date', array('label'=>__('Tanggal mulai pendaftaran',true), 'class' => 'datepicker'));
                echo $this->Form->input('end_date', array('label'=>__('Tanggal selesai pendaftaran',true), 'class' => 'datepicker'));
            ?>

            <input type="submit" class="btn_blue helvetica fsize18" value="<?php __('Export')?>" />
        </form>
    </div>

    <table id="dataSiswaTable" class="display">
        <thead>
            <tr>
                <th><?php __('No.')?></th>
                <th><?php __('No. Peserta')?>
                <th><?php __('NISN')?></th>
                <th><?php __('Nama Calon Siswa')?></th>
                <th><?php __('Asal Sekolah')?></th>
                <th><?php __('Jenis Kelamin')?></th>
                <th><?php __('Tanggal Verifikasi')?></th>
                <th><?php __('Edit')?></th>
                <th><?php __('Delete')?></th>
            </tr>
        </thead>
        
        <tbody>
            <?php $no = 1; ?>
    		<?php
    			if (!empty($studentsReg)) {
    				foreach($studentsReg as $data) {
    		?>
    					<tr>
    						<td><?php echo $no; ?></td>
    						<td><?php echo $data['Registration']['id']?></td>
                            <td><?php echo $data['Registration']['nisn']; ?></td>
    						<td class="link">
								<?php echo $this->Html->link($data['Registration']['nama'],array('admin'=>true,'controller'=>'registrations','action'=>'detailCalonSiswa', $data['Registration']['id'])); ?>
							</td>
                            <td><?php echo $data['Registration']['asal_sekolah']; ?></td>
                            <td><?php echo $data['Registration']['gender']; ?></td>
    						<td><?php echo ($data['Registration']['tanggal_verifikasi'] == '0000-00-00') ? '-' : $dateFormat->changeDateFormat($data['Registration']['tanggal_verifikasi'],'dateFormat=d-m-Y'); ?></td>
    					    <td><?php echo $this->Html->link(__('edit',true),array('admin'=>true,'controller'=>'registrations','action'=>'edit',$data['Registration']['id'])); ?></td>
                            <td><?php echo $this->Html->link('delete',array('admin'=>true,'controller'=>'registrations','action'=>'delete',$data['Registration']['id']),array('class' => 'js-confirm-delete', 'title' => __('Delete Calon siswa dengan NISN '.$data['Registration']['nisn'].' ?',true))); ?></td>
                        </tr>
    		<?php
    				$no++;
    				}
    			}
    		?>
        </tbody>
    </table>
    
</div>
<div class="clear"></div>
