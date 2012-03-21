<?php $javascript->link('home/datatables_app', false); ?>

<div class="block_content grid_23 pal">

<h2 class="page-title"><?php __('List Calon Siswa'); ?></h2>

<div class="opening-text">
<?php echo $option['text_pembuka_pengumuman'] ?>
</div>

<?php $nextYear = $option['tahunPelajaran'] + 1;?>
<h4><?php __('Tabel Calon Siswa Tahun Ajaran ' . $option['tahunPelajaran'] . '/' . $nextYear); ?></h4>
<table class="listing">
	<thead>
		<tr>
			<th><?php __('No'); ?></th>
			<th><?php __('NISN'); ?></th>
			<th><?php __('Nama'); ?></th>
			<th><?php __('L/P'); ?></th>
			<th><?php __('Asal Sekolah'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php
			if (!empty($studentsReg)) {
				foreach($studentsReg as $data) {
		?>
					<tr>
						<td align="center"><?php echo $no; ?></td>
						<td><?php echo $data['Registration']['nisn']; ?></td>
						<td><?php echo $data['Registration']['nama']; ?></td>
						<td align="center"><?php echo $data['Registration']['gender']; ?></td>
						<td><?php echo $data['Registration']['asal_sekolah']; ?></td>
					</tr>
		<?php
				$no++;
				}
			}
		?>
	</tbody>
</table>
</div>
