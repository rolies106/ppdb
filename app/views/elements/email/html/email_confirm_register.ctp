<p>Hallo, <?php echo $User['Registration']['nama']; ?>,<br /><br />
<?php echo $message['message']; ?> <br /><br />
<?php echo $message['text_verifikasi']; ?></p>

<?php if ($message['passed_by_register'] == 1): ?>
    <p>
        Silahkan membawa dokumen di bawah ini untuk keperluan verifikasi data :<br/></br>
        <a href="<?php echo Router::url('/', true); ?>registrations/cetakDocPendaftaran/<?php echo $message['nisn']; ?>"><?php __('Formulir Pendaftaran'); ?></a> | 
        <a href="<?php echo Router::url('/', true); ?>registrations/cetakDocPernyataan/<?php echo $message['nisn']; ?>"><?php __('Surat Pernyataan'); ?></a> | 
        <a href="<?php echo Router::url('/', true); ?>registrations/cetakDocNilai/<?php echo $message['nisn']; ?>"><?php __('Nilai Raport'); ?></a> | 
        <a href="<?php echo Router::url('/', true); ?>registrations/printKartuPeserta/<?php echo $message['nisn']; ?>"><?php __('Kartu Peserta'); ?></a>
    </p>
<?php endif; ?>

<br/><br/>
<p>Terima Kasih</p>