<?php $javascript->link('wizards/jquery.processPanel.packed', false); ?>
<?php $javascript->link('mylibs/bindWithDelay', false); ?>
<?php $javascript->link('wizards/app_wizards', false); ?>

        <div class="block_content grid_23 pal">
		
			<h2 class="page-title">Form Pendaftaran Siswa Baru</h2>
            <input type="hidden" id="passing_url" value="<?php echo Router::url(array('controller' => 'registrations','action' => 'checkAvailableNisn', 'member' => false)); ?>" />
            <input type="hidden" id="checkuser_url" value="<?php echo Router::url(array('controller' => 'users','action' => 'checkAvailableUser', 'member' => false)); ?>" />
            <input type="hidden" id="status_nis" value="" />
            <input type="hidden" id="status_username" value="" />
            <?php echo $this->Form->create('Registration',array('class'=>'dspp_panel')); ?>
            

				<a href='#content1' label='1'><?php __('Input Data Pribadi') ?></a>
				<a href='#content2' label='2'><?php __('Input Nilai') ?></a>
                <a href='#content3' label='3'><?php __('Login Detail')?></a>
				<a href='#content4' label='4'><?php __('Konfirmasi')?></a>
				<fieldset id='content1'>
                    <h2 class="title helvetica">
                        <?php __('Pastikan Nomor Induk Siswa Nasional (NISN) Anda benar dan isikan data dengan benar, Hanya data-data yang diisi dengan benar dan yang memenuhi persyaratan yang akan kami proses ke tahap berikutnya.')?>
                    </h2>
					
                    <?php echo $this->element('data_pribadi'); ?>
					
                </fieldset><!-- /fieldset 1-->
				
                <fieldset id='content2'>
                    <h2 class="title helvetica">
                        <?php __('Pastikan nilai yang Anda masukan benar !')?>
                    </h2>
					
                    <h3 class="grid_6 helvetica txtright size24bold"><?php __('Mata Pelajaran')?></h3>
                    <h3 class="grid_5 helvetica center fsize18bold mli"><?php __('Kelas 4') ?></h3>
                    <h3 class="grid_4 helvetica center fsize18bold"><?php __('Kelas 5') ?></h3>
                    <h3 class="grid_3 helvetica center fsize18bold"><?php __('Kelas 6') ?></h3>
                    <div class="clear"></div>
                    
                    <div class="input">
                        <label>&nbsp;</label>
                        <div class="grid_2 center helvetica fsize18bold semester-title">SMT 1</div>
                        <div class="grid_2 center helvetica fsize18bold semester-title">SMT 2</div>
                        <div class="grid_2 center helvetica fsize18bold semester-title">SMT 1</div>
                        <div class="grid_2 center helvetica fsize18bold semester-title">SMT 2</div>
                        <div class="grid_2 center helvetica fsize18bold semester-title">SMT 1</div>
                    </div>
                    
                    <?php echo $this->element('input_nilai'); ?>
                    
                </fieldset><!-- /fieldset 2-->
                
                <fieldset id='content3'>
                    <h2 class="title helvetica">
                        <?php __('Informasi detail untuk login (digunakan saat melakukan pengecekan kelulusan)')?>
                    </h2>
                                        
                    <?php echo $this->element('input_user'); ?>
                    
                </fieldset><!-- /fieldset 3-->

				<fieldset id='content4'>
                    <h2 class="title helvetica">
                        <?php __('Pernyataan Persetujuan')?>
                    </h2>
					
                    <div class="grid_18 prefix_1 suffix_1 mbl message fsize14 mbl">
                        Demikian saya telah membaca dan mengisi data-data tersebut dengan sebenar-benarnya, dan apabila ada kekeliruan yang disebabkan dan atau kesalahan yang disengaja dalam pengisian data dan nilai tersebut saya bersedia dinyatakan gugur dan tidak dapat diikutsertakan pada tahapan seleksi selanjutnya.
                    </div>
                    <div class="clear"></div>
                    
                    <div class="grid_6 prefix_8 mb40">
                        <input type="submit" class="btn_blue helvetica fsize18" value="<?php __('Daftar')?>" />
                    </div>
                    <div class="clear"></div>
                </fieldset><!-- /fieldset 4-->
            </form> 
            
        </div><!-- /block_content -->
