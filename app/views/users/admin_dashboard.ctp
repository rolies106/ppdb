<div class="grid_8">
    <div class="data_box rounded_small css3pie">
        <h2>Ringkasan Data Pendaftar</h2>
        
        <p>Siswa yang terdaftar:</p>
        
        <ul class="list_underline">
            <li>
                <span class="left"><?php __('Pendaftar Laki-laki')?></span>
                <span class="right"><?php echo $data['jml_laki']; ?> Orang</span>
            </li>
            <li>
                <span class="left"><?php __('Pendaftar Perempuan')?></span>
                <span class="right"><?php echo $data['jml_perempuan']; ?> Orang</span>
            </li>
            <li>
                <span class="left"><?php __('Lulus Tahap Register')?></span>
                <span class="right"><?php echo $data['lulus']; ?> Orang</span>
            </li>
            <li>
                <span class="left"><?php __('Tidak Lulus Tahap Register')?></span>
                <span class="right"><?php echo $data['gagal']?> Orang</span>
            </li>
            <li>
                <span class="left"><?php __('Total Pendaftar')?></span>
                <span class="right"><?php echo $data['total']?> Orang</span>
            </li>
            <li>
                <?php echo $this->Html->link(__('lebih detail',true),array('admin'=>true,'controller'=>'registrations','action'=>'dataSiswa'),array('class'=>'right btn_more rounded_small css3pie'));?>
                
            </li>
        </ul>
    </div>
</div>
<div class="grid_8">
    <div class="data_box rounded_small css3pie">
        <h2>Ringkasan Data Sekolah</h2>
    </div>
</div>
<div class="grid_8">
    <div class="data_box rounded_small css3pie">
        <h2>Ringkasan Data Pendidik / Guru</h2>
    </div>
</div>
<div class="clear"></div>