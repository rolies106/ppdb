<style type="text/css">
table{border-collapse: collapse;border-spacing: 0;}
table td{height:25px;vertical-align:middle;}
table td.photo{border: 1px solid #333333; text-align:center; }
</style>
<h1 align="center"><?php __('Bukti Formulir Pendaftaran Online') ?></h1>

<p>&nbsp;</p>
<table>
	<tr>
		<td width="20px"></td>
		<td class="photo" width="110px" height="130px">
			<div align="center">
				<br /><br /><br />
				Pas Photo<br />
				3 x 4
			</div>
		</td>
		<td></td>
	</tr>
</table>
<p>&nbsp;</p>

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
    <td colspan="2">: <?php e($dateFormat->changeDateFormat($dataSiswa['Registration']['tanggal_lahir']))?></td>
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
    <td><?php __('Nama Orangtua / Wali Siswa')?></td>
    <td colspan="2">: <?php e($dataSiswa['Registration']['nama_ortu'])?></td>
</tr>
<tr>
    <td width="220px"></td>
    <td></td>
	<td width="220px"></td>
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
	<td></td>
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

