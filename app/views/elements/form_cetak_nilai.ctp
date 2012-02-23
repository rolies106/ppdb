<style type="text/css">
.center{text-align: center;}
.capitalize{text-transform:uppercase;}
.mbl{margin-bottom: 100px;}
table{border-collapse: collapse;border-spacing: 0;}
.nilai td{height:30px;vertical-align:middle;}
.underline{border-bottom: 1px solid #333333;}
</style>
<div align="right"><?php echo date('d-m-Y H:i:s') . ' ID ' . $dataNilai['data']['Registration']['id']?></div>
<h1 class="center">DAFTAR NILAI CALON SISWA/I</h1>

<table class="mbl">
    <tr>
        <td><?php __('NISN')?></td>
        <td>: <strong class="capitalize"><?php e($dataNilai['data']['Registration']['nisn'])?></strong></td>
    </tr>
    <tr>
        <td><?php __('Nama Lengkap')?></td>
        <td>: <strong class="capitalize"><?php e($dataNilai['data']['Registration']['nama'])?></strong></td>
    </tr>
    <tr>
        <td><?php __('Sekolah Asal')?></td>
        <td>: <strong class="capitalize"><?php e($dataNilai['data']['Registration']['asal_sekolah'])?></strong></td>
    </tr>
</table>

<p>&nbsp;</p>

<table class="nilai">
    <tr>
        <td rowspan="2" valign="middle" align="center" width="250"><strong><?php __('Mata Pelajaran')?></strong></td>
        <td colspan="4" align="center"><strong><?php __('Semester')?></strong></td>
		<td></td>
    </tr>
    <tr>
        <td width="80" align="center"><strong>1</strong></td>
        <td width="80" align="center"><strong>2</strong></td>
        <td width="80" align="center"><strong>3</strong></td>
        <td width="80" align="center"><strong>4</strong></td>
        <td width="80" align="center"><strong>5</strong></td>
    </tr>
    
    <?php foreach($dataNilai['data']['RegistrationScore'] as $n): ?>
    <tr>
        <td><?php echo $dataNilai['mapel'][$n['mapel_id']]; ?></td>
        <td align="center"><?php echo $n['semester_1']; ?></td>
        <td align="center"><?php echo $n['semester_2']; ?></td>
        <td align="center"><?php echo $n['semester_3']; ?></td>
        <td align="center"><?php echo $n['semester_4']; ?></td>
        <td align="center"><?php echo $n['semester_5']; ?></td>
    </tr>
    <?php endforeach; ?>
    
</table>