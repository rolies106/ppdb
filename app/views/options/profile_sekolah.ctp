<div class="block_content grid_23 pal">
<h2 class="page-title"><?php __('Profile Sekolah')?></h2>

<div class="profile-desc">
	<?php echo $html->image("logo.png",array('alt' => 'SMAN 1 Tambun Selatan')); ?>
	<p><?php echo $data['text_pembuka_profile']?></p>
</div>

<div class="profile-info">
	<h3><?php __('Info Sekolah')?></h3>
	<table class="listing">
	    <tbody>
		   <tr>
		       <td width="150px"><?php __('Nama')?></td>
		       <td class="dark"><?php echo $data['nama_sekolah']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Alamat')?></td>
		       <td class="dark"><?php echo $data['alamat']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Kecamatan')?></td>
		       <td class="dark"><?php echo $data['kecamatan']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Kotamadya / Kabupaten')?></td>
		       <td class="dark"><?php echo $data['kota']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Propinsi')?></td>
		       <td class="dark"><?php echo $data['propinsi']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Kodepos')?></td>
		       <td class="dark"><?php echo $data['kodepos']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Nomor Telephone')?></td>
		       <td class="dark"><?php echo $data['no_telp']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Nomor Faks')?></td>
		       <td class="dark"><?php echo $data['no_faks']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Nama Kepala Sekolah')?></td>
		       <td class="dark"><?php echo $data['kepsek']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Email')?></td>
		       <td class="dark"><a href="mailto:<?php echo $data['email']?>"><?php echo $data['email']?></a></td>
		   </tr>
		   <tr>
		       <td><?php __('Waktu Persekolahan')?></td>
		       <td class="dark"><?php echo $data['waktu_persekolahan']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Akreditasi')?></td>
		       <td class="dark"><?php echo $data['akreditasi']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Jenjang')?></td>
		       <td class="dark"><?php echo $data['jenjang']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Status')?></td>
		       <td class="dark"><?php echo $data['status']?></td>
		   </tr>
		   <tr>
		       <td><?php __('Website')?></td>
		       <td class="dark"><a href="<?php echo $data['website']?>" target="_blank"><?php echo $data['website']?></a></td>
		   </tr>
	    </tbody>
	</table>
</div>
</div>
<div class="clear"></div>
