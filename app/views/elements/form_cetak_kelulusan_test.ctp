<style type="text/css">
    table{border-collapse: collapse;border-spacing: 0;}
    table td{height:25px;vertical-align:middle;}
    h1{color:#3B65BF;}
    h2{color:#7F3000;}
    p{text-align: justify;}
    span{font-size:30px;}
    b{font-weight: bold;}
</style>
<div align="center"><?php __('No. ..........................................') ?></div>
<h1><?php __('Pengumuman Hasil Seleksi') ?></h1>

<table>
<tr>
    <td colspan="3">
        <p>
            <?php __('Berdasarkan hasil seleksi Penerimaan Peserta Didik Baru Rintisan Sekolah Bertaraf Internasional Tahun Pelajaran ' . $option['tahunPelajaran'] . '/' .  $next_year . ', Kepala ' . $option['nama_sekolah'] . ' Kabupaten ' . $option['kota'] . ' menerangkan bahwa :'); ?>
        </p>
    </td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td><?php __('Nomor Induk Siswa Nasional')?></td>
    <td colspan="2">: <?php e($dataSiswa['Registration']['nisn'])?></td>
</tr>
<tr>
    <td><?php __('Nama Lengkap')?></td>
    <td colspan="2">: <?php e($dataSiswa['Registration']['nama'])?></td>
</tr>
<tr>
    <td><?php __('Nomor Registrasi')?></td>
    <td colspan="2">: <?php e($dataSiswa['Registration']['id'])?></td>
</tr>
<tr>
    <td><?php __('Total Nilai')?></td>
    <td colspan="2">: <b><?php e(number_format($totalNilai, 2)); ?></b></td>
</tr>
<tr>
    <td><?php __('Dinyatakan')?></td>
    <td colspan="2">: </td>
</tr>
<tr>
    <td colspan="3">
        <?php if ($totalNilai >= $option['nilai_minimal_test']): ?>
            <h1 align="center"><?php __('DITERIMA'); ?></h1>
        <?php else: ?>
            <h2 align="center"><?php __('TIDAK DITERIMA'); ?></h2>
        <?php endif; ?>
    </td>
</tr>
<tr>
    <td colspan="3">
    <p><?php __('Menjadi siswa Kelas VII ' . $option['nama_sekolah'] . ' Kabupaten ' . $option['kota'] . ' Tahun Pelajaran ' . $option['tahunPelajaran'] . '/' .  $next_year . '.')?></p>
    <p>&nbsp;</p>
    </td>
</tr>
<tr>
    <td><?php __('Batas nilai terendah yang diterima')?></td>
    <td colspan="2">: <b><?php echo $option['nilai_minimal_test']; ?></b></td>
</tr>
<tr>
    <td width="220px"></td>
    <td></td>
	<td width="220px"></td>
</tr>
<tr>
    <td></td>
    <td></td>
	<td align="right"><?php e($option['kota']); ?>, ..................................., <?php e($option['tahunPelajaran']);?></td>
</tr>
<tr>
    <td align="center"></td>
    <td></td>
	<td align="center"><?php e('Kepala Sekolah'); ?></td>
</tr>
<tr>
    <td></td>
    <td></td>
	<td></td>
</tr>
<tr>
    <td></td>
    <td></td>
	<td></td>
</tr>
<tr>
    <td align="center"></td>
    <td></td>
	<td align="center">...................................................</td>
</tr>
<tr>
    <td align="center"></td>
    <td></td>
	<td align="center">
        <?php e($option['kepsek'])?><br/>
        NIP. <?php e($option['kepsek_nip'])?>
    </td>
</tr>
<tr>
    <td colspan="3">
    <p>
        <small><?php __('Catatan :')?><br/>
        <ol>
            <li>Bagi siswa yang dinyatakan diterima agar :<ol><li>Mendaftar Ulang yang dimulai dari tanggal <?php e($dateFormat->changeDateFormat($option['tanggal_mulai_verifikasi'], 'dateFormat=d-m-Y')); ?> s.d <?php e($dateFormat->changeDateFormat($option['tanggal_selesai_verifikasi'], 'dateFormat=d-m-Y')); ?>, Pkl 08.00 s.d 14.00 WIB</li><li>Melengkapi persyaratan sebagaimana terdapat pada lampiran ini</li></ol></li>
            <li>Bagi siswa yang dinyatakan diterima tetapi tidak mendaftar ulang pada waktu yang ditentukan dianggap mengundurkan diri.</li>
        </ol>
        </small>
    </p>
    </td>
</tr>
</table>