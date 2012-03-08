<style type="text/css">
table{
    border-collapse: collapse;
    border-spacing: 0;    
}
table td{
    vertical-align:middle;
}
.center{text-align:center;}
h1{text-align:center;text-transform:uppercase;}
.tes_box{
    border-style: solid solid solid solid;
    border-width: 1px 1px 1px 1px;
    border-color: #EEEEEE #EEEEEE #EEEEEE #EEEEEE;
    width:140px;
    height:60px;
    display:block;
}

tr.test_box {
	height: 30px;
}

.pas_photo{
    border-style: solid solid solid solid;
    border-width: 1px 1px 1px 1px;
    border-color: #EEEEEE #EEEEEE #EEEEEE #EEEEEE;
    height: 50px;
    padding: 10px;
    text-align: center;
    width: 70px;
}
.header td{
    height:10px;
    text-transform:uppercase;
}
.content tr, .content td{
    vertical-align: top;
    height:15px;
}
.content .label{
    width:130px;
}
.hypen{width:20px;}
p.space { margin-bottom: 10px;}
.label {width: 30px; display: inline-block;}
</style>

<table class="header">
    <tr>
        <td width="100%" class="center"><?php __('Kartu Peserta Seleksi') ?></td>
    </tr>
    <tr>
        <td width="100%" class="center"><?php __('Peserta Didik Baru '.$option['nama_sekolah'])?></td>
    </tr>
    <tr>
        <td width="100%" class="center"><?php __('Tahun Pelajaran '.$option['tahunPelajaran'].' / '.$option['nextTahunPelajaran'])?></td>
    </tr>
</table>
<hr />
<p class="space"></p>
<table class="content">
    <tr>
        <td class="label"><?php __('Nomor Tes Seleksi')?></td>
        <td class="hypen">:</td>
        <td class="value" width="300px"><?php e($data['Registration']['id'])?></td>
    </tr>
    <tr>
        <td class="label"><?php __('NISN')?></td>
        <td class="hypen">:</td>
        <td class="value"><?php e($data['Registration']['nisn'])?></td>
    </tr>
    <tr>
        <td class="label"><?php __('Nama Peserta')?></td>
        <td class="hypen">:</td>
        <td class="value"><?php e($data['Registration']['nama'])?></td>
    </tr>
    <tr>
        <td class="label"><?php __('Asal Sekolah')?></td>
        <td char="hypen">:</td>
        <td class="value"><?php e($data['Registration']['asal_sekolah'])?></td>
    </tr>
    <tr class="test_box">
        <td class="label"><?php __('Ruang Tes')?></td>
        <td class="hypen">:</td>
        <td class="tes_box"><br /><br /><br /></td>
    </tr>
</table>

<p>&nbsp;</p>

<table>
    <tr>
		<td width="70px"></td>
        <td class="pas_photo"><br /><br /><br /><br />Pas Photo<br />3x4</td>
        <td width="180px" align="center">
			<?php echo $option['kecamatan']; ?>, ...............................<?php echo date('Y');?><br />
			Panitia PPDB Online TP. <?php echo $option['tahunPelajaran'].'/'.$option['nextTahunPelajaran']; ?>
			<br /><br /><br /><br /><br />
            <?php echo $option['panitia']; ?>
        </td>
    </tr>
</table>
<p>&nbsp;</p>
<p>Catatan :</p>
<table>
    <tr>
        <td width="18px">1.</td>
        <td width="350px"><?php __('Kartu peserta harap dibawa pada saat verifikasi, tes, lapor diri & pengambilan berkas')?></td>
    </tr>
    <tr>
        <td>2.</td>
        <td><?php __('Tes seleksi akademik tgl, '.$option['tanggal_seleksi_akademik'])?></td>
    </tr>
    <tr>
        <td>3.</td>
        <td><?php __('Psikotes dilaksanakan tgl, '.$option['tanggal_psikotes'])?></td>
    </tr>
    <tr>
        <td>4.</td>
        <td><?php __('Pengumuman hasil seleksi akademik tgl, '.$dateFormat->changeDateFormat($option['tanggal_hasil_seleksi']))?></td>
    </tr>
</table>