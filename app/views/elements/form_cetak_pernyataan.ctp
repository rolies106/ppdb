<style type="text/css">
table{border-collapse: collapse;border-spacing: 0;}
table td{height:25px;vertical-align:middle;}
h1{color:#3B65BF;}
p{text-align: justify; line-height:50px;}
span{font-size:30px;}
</style>
<div align="right"><?php echo date('d-m-Y H:i:s') . ' ID ' . $dataSiswa['Registration']['id']?></div>
<h1><?php __('Surat Pernyataan') ?></h1>

<table>
<tr>
    <td><?php __('Nomor Induk Siswa Nasional')?></td>
    <td colspan="2">: <?php e($dataSiswa['Registration']['nisn'])?></td>
</tr>
<tr>
    <td><?php __('Nama Lengkap')?></td>
    <td colspan="2">: <?php e($dataSiswa['Registration']['nama'])?></td>
</tr>
<tr>
    <td><?php __('Tempat Lahir')?></td>
    <td colspan="2">: <?php e($dataSiswa['Registration']['tempat_lahir'])?></td>
</tr>
<tr>
    <td><?php __('Tanggal Lahir')?></td>
    <td colspan="2">: <?php e($dateFormat->changeDateFormat($dataSiswa['Registration']['tanggal_lahir'], 'dateFormat=d-m-Y'))?></td>
</tr>
<tr>
    <td><?php __('Jenis Kelamin')?></td>
    <td colspan="2">: <?php if ($dataSiswa['Registration']['gender'] == 'P') { e('Perempuan'); } else { e('Laki - laki'); } ?></td>
</tr>
<tr>
    <td><?php __('Agama')?></td>
    <td colspan="2">: <?php e($dataSiswa['Registration']['agama'])?></td>
</tr>
<tr>
    <td><?php __('Sekolah Asal')?></td>
    <td colspan="2">: <?php e($dataSiswa['Registration']['asal_sekolah'])?></td>
</tr>
<tr>
    <td><?php __('Kebangsaan')?></td>
    <td colspan="2">: <?php e($dataSiswa['Registration']['kebangsaan'])?></td>
</tr>
<tr>
    <td><?php __('Alamat Calon Siswa')?></td>
    <td colspan="2">: <?php e(nl2br($dataSiswa['Registration']['alamat_calon']))?></td>
</tr>
<tr>
    <td width="220px"></td>
    <td></td>
	<td width="220px"></td>
</tr>
<tr>
    <td colspan="3">
	<p><?php __('Demikian saya telah membaca dan mengisi data-data tersebut dengan sebenar-benarnya, dan apabila ada kekeliruan yang disebabkan dan atau kesalahan yang disengaja dalam pengisian data dan nilai tersebut saya bersedia dinyatakan gugur dan tidak dapat diikutsertakan pada tahapan seleksi selanjutnya.')?></p>
	<p>&nbsp;</p>
	</td>
</tr>
<tr>
    <td></td>
    <td></td>
	<td align="right">..................................., <?php e($option['tahunPelajaran']);?></td>
</tr>
<tr>
    <td align="center"><?php e('Orang Tua/Wali'); ?></td>
    <td></td>
	<td align="center"><?php e('Calon Siswa/i'); ?></td>
</tr>
<tr>
    <td></td>
    <td></td>
	<td></td>
</tr>
<tr>
    <td></td>
    <td></td>
	<td align="center"><span class="small">Materai Rp. 6.000,-</span></td>
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
    <td align="center">...................................................</td>
    <td></td>
	<td align="center">...................................................</td>
</tr>
<tr>
    <td align="center">( <?php e($dataSiswa['Registration']['nama_ortu'])?> )</td>
    <td></td>
	<td align="center">( <?php e($dataSiswa['Registration']['nama'])?> )</td>
</tr>
</table>