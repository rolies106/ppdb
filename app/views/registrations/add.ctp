<?php $javascript->link('wizards/jquery.processPanel.packed', false); ?>
<?php $javascript->link('mylibs/bindWithDelay', false); ?>
<?php $javascript->link('wizards/app_wizards', false); ?>

        <div class="block_content grid_22 prefix_1 suffix_1">
		
			<h2 class="page-title">Form Pendaftaran Siswa Baru</h2>
		
        <input type="hidden" id="passing_url" value="<?php echo Router::url(array('controller' => 'registrations','action' => 'checkAvailableNisn', 'member' => false)); ?>" />
        <input type="hidden" id="status_nis" value="" />
            <?php echo $this->Form->create('Registration',array('class'=>'dspp_panel')); ?>
            

				<a href='#content1' label='1'><?php __('Input Data Pribadi') ?></a>
				<a href='#content2' label='2'><?php __('Input Nilai') ?></a>
				<a href='#content3' label='3'><?php __('Konfirmasi')?></a>
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
                    <h3 class="grid_10 helvetica center size24bold"><?php __('Semester') ?></h3>
                    <div class="clear"></div>
                    
                    <div class="input">
                        <label>&nbsp;</label>
                        <div class="grid_2 center helvetica size24bold semester-title">1</div>
                        <div class="grid_2 center helvetica size24bold semester-title">2</div>
                        <div class="grid_2 center helvetica size24bold semester-title">3</div>
                        <div class="grid_2 center helvetica size24bold semester-title">4</div>
                        <div class="grid_2 center helvetica size24bold semester-title">5</div>
                    </div>
                    
                    <?php echo $this->element('input_nilai'); ?>
                    
                </fieldset><!-- /fieldset 2-->
                
				<fieldset id='content3'>
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
                </fieldset><!-- /fieldset 3-->
            </form> 
            
        </div><!-- /block_content -->
