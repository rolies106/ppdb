<?php $javascript->link(array('mylibs/jquery.form'), false); ?>

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

<?php echo $this->Form->create(null,array('url'=>array('admin' => true, 'controller' => 'registrations', 'action'=>'dataSiswa'), 'class' => 'filterform subform')) ?>
<?php echo $this->Form->input('nisn'); ?>
<?php echo $this->Form->input('nama', array('label' => __('Nama Calon', true))); ?>
<?php echo $this->Form->input('asal_sekolah'); ?>
<div class="input">
    <label for="RegistrationPassedByRegister">Lolos tahap registrasi</label>
    <?php echo $this->Form->select('passed_by_register', 
                                   array('1'=>__('Lolos',true), '0' => __('Tidak Lolos',true)));
    ?>
</div>
<?php echo $this->Form->end('Search'); ?>


    <div id="testFormMessages" class="message none"></div>

    <table class="display listing dataSiswaTable">
        <thead>
            <tr>
                <th><?php __('No.')?></th>
                <th><?php echo $this->Paginator->sort(__('No. Peserta', true), 'id', array('url'=>array($url))); ?></th>
                <th><?php echo $this->Paginator->sort(__('NISN', true), 'nisn', array('url'=>array($url))); ?></th>
                <th><?php echo $this->Paginator->sort(__('Nama Calon Siswa', true), 'nama', array('url'=>array($url))); ?></th>
                <th><?php echo $this->Paginator->sort(__('Asal Sekolah', true), 'asal_sekolah', array('url'=>array($url))); ?></th>
                <th><?php echo $this->Paginator->sort(__('Jenis Kelamin', true), 'gender', array('url'=>array($url))); ?></th>
                <th><?php echo $this->Paginator->sort(__('Tanggal Verifikasi', true), 'tanggal_verifikasi', array('url'=>array($url))); ?></th>
                <th><?php __('Edit')?></th>
                <th><?php __('Delete')?></th>
            </tr>
        </thead>
        
        <tbody>
            <?php $no = ($page * 10) - 9; ?>
    		<?php
    			if (!empty($studentsReg)) {
    				foreach($studentsReg as $data) {
    		?>
    					<tr>
    						<td><?php echo $no; ?></td>
    						<td><?php echo $data['Registration']['id']?></td>
                            <td><?php echo $data['Registration']['nisn']; ?></td>
    						<td class="link textleft">
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

<div class="navigation">
    <?php echo $this->Paginator->prev('« Previous', array('url'=>array($url)), null, array('class' => 'disabled')); ?>
    <?php echo $this->Paginator->numbers(array('url'=>array($url))); ?>
    <?php echo $this->Paginator->next('Next »', array('url'=>array($url)), null, array('class' => 'disabled')); ?>
    <div class="page-counter">
        Page <?php echo $this->Paginator->counter(); ?>
    </div>
</div>
</div>
<div class="clear"></div>
