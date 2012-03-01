<div class="block_content grid_22 prefix_1 suffix_1">
<h2 class="page-title"><?php __('Keterangan Kelulusan')?></h2>

<div class="profile-desc">
    
</div>

<div class="profile-info">
    <div class="detail-profile">
        <fieldset><legend><?php __('Data Pribadi'); ?></legend>
            <div class="row">
                <span><?php __('NISN'); ?></span> : <?php echo $studentDetail['Registration']['nisn']; ?>
            </div>
            <div class="row">
                <span><?php __('Nama Calon Siswa/i'); ?></span> : <?php echo $studentDetail['Registration']['nama']; ?>
            </div>
            <div class="row">
                <span><?php __('Asal Sekolah'); ?></span> : <?php echo $studentDetail['Registration']['asal_sekolah']; ?>
            </div>
            <div class="row">
                <span><?php __('Alamat email'); ?></span> : <a href="mailto:<?php echo $studentDetail['Registration']['email']; ?>"><?php echo $studentDetail['Registration']['email']; ?></a>
            </div>
            <div class="row">
                <span><?php __('Tempat Lahir'); ?></span> : <?php echo $studentDetail['Registration']['tempat_lahir']; ?>
            </div>
            <div class="row">
                <span><?php __('Tanggal Lahir'); ?></span> : <?php echo $dateFormat->changeDateFormat($studentDetail['Registration']['tanggal_lahir']); ?>
            </div>
            <div class="row">
                <span><?php __('Jenis Kelamin'); ?></span> : <?php if ($studentDetail['Registration']['gender'] == 'L') { echo 'Laki - laki'; } else { echo 'Perempuan'; } ?>
            </div>
            <div class="row">
                <span><?php __('Alamat Calon Siswa/i'); ?></span> : <br />
                <p><?php echo nl2br($studentDetail['Registration']['alamat_calon']); ?></p>
            </div>
            <div class="row">
                <span><?php __('Pendidikan Terakhir'); ?></span> : <?php echo $studentDetail['Registration']['pendidikan_terakhir']; ?>
            </div>
            <div class="row">
                <span><?php __('Tahun Pendidikan'); ?></span> : <?php echo $studentDetail['Registration']['tahun']; ?>
            </div>
            <div class="row">
                <span><?php __('Agama'); ?></span> : <?php echo $studentDetail['Registration']['agama']; ?>
            </div>
            <div class="row">
                <span><?php __('Kebangsaan'); ?></span> : <?php echo $studentDetail['Registration']['kebangsaan']; ?>
            </div>
            <div class="row">
                <span><?php __('Nama Orang Tua'); ?></span> : <?php echo $studentDetail['Registration']['nama_ortu']; ?>
            </div>
            <div class="row">
                <span><?php __('Alamat Orang Tua'); ?></span> : <br />
                <p><?php echo nl2br($studentDetail['Registration']['alamat_ortu']); ?></p>
            </div>
            <div class="row">
                <span><?php __('Telephone'); ?></span> : <?php echo ($studentDetail['Registration']['telephone']) ? $studentDetail['Registration']['telephone'] : '-'; ?>
            </div>
            <div class="row">
                <span><?php __('Prestasi'); ?></span> : <br />
                <p><?php echo ($studentDetail['Registration']['prestasi']) ? nl2br($studentDetail['Registration']['prestasi']) : '-'; ?></p>
            </div>
        </fieldset>
                
        <?php if (!empty($dataNilai['studentDetail']['RegistrationScore'])) : ?>
        <fieldset><legend><?php __('Nilai Raport'); ?></legend>
            <table class="listing">
                <thead>
                    <tr>
                        <th rowspan="2" valign="middle" align="center" width="250"><strong><?php __('Mata Pelajaran')?></strong></th>
                        <th colspan="5" align="center"><strong><?php __('Semester')?></strong></th>
                        <th rowspan="2"><strong><?php __('Nilai Rata - Rata')?></strong></th>
                    </tr>
                    <tr>
                        <th width="60" align="center"><strong>1</strong></th>
                        <th width="60" align="center"><strong>2</strong></th>
                        <th width="60" align="center"><strong>3</strong></th>
                        <th width="60" align="center"><strong>4</strong></th>
                        <th width="60" align="center"><strong>5</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $total1 = 0;
                        $total2 = 0;
                        $total3 = 0;
                        $total4 = 0;
                        $total5 = 0;                    
                        foreach($dataNilai['studentDetail']['RegistrationScore'] as $n):
                    ?>
                    <tr>
                        <td><?php echo $dataNilai['mapel'][$n['mapel_id']]; ?></td>
                        <td align="center">
                            <?php
                                echo $n['semester_1'];
                                $total1 += $n['semester_1'];
                            ?>
                        </td>
                        <td align="center">
                            <?php
                                echo $n['semester_2'];
                                $total2 += $n['semester_2'];
                            ?>
                        </td>
                        <td align="center">
                            <?php
                                echo $n['semester_3'];
                                $total3 += $n['semester_3'];
                            ?>
                        </td>
                        <td align="center">
                            <?php
                                echo $n['semester_4'];
                                $total4 += $n['semester_4'];
                            ?>
                        </td>
                        <td align="center">
                            <?php
                                echo $n['semester_5'];
                                $total5 += $n['semester_5'];
                            ?>
                        </td>
                        <td align="center" class="grey">
                            <strong>
                                <?php
                                    $totalSmstr = $n['semester_1'] + $n['semester_2'] + $n['semester_3'] + $n['semester_4'] + $n['semester_5'];
                                    echo number_format($totalSmstr / 5, 2);
                                ?>
                            </strong>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th align="center"><strong><?php __('Total Nilai'); ?></strong></th>
                        <th align="center"><strong><?php echo $total1; ?></strong></th>
                        <th align="center"><strong><?php echo $total2; ?></strong></th>
                        <th align="center"><strong><?php echo $total3; ?></strong></th>
                        <th align="center"><strong><?php echo $total4; ?></strong></th>
                        <th align="center"><strong><?php echo $total5; ?></strong></th>
                    </tr>
                    <tr>
                        <th align="center"><strong><?php __('Rata - Rata Nilai'); ?></strong></th>
                        <th align="center"><strong><?php echo number_format($total1 / $i, 2); ?></strong></th>
                        <th align="center"><strong><?php echo number_format($total2 / $i, 2); ?></strong></th>
                        <th align="center"><strong><?php echo number_format($total3 / $i, 2); ?></strong></th>
                        <th align="center"><strong><?php echo number_format($total4 / $i, 2); ?></strong></th>
                        <th align="center"><strong><?php echo number_format($total5 / $i, 2); ?></strong></th>
                    </tr>
                </tfoot>
            </table>
        </fieldset>
        <?php endif; ?>

        <fieldset><legend><?php __('Hasil Seleksi Tahap Awal'); ?></legend>
            <div class="row">
                <span><?php __('Tahun Pelajaran'); ?></span> : <?php echo $studentDetail['Registration']['tahun_pelajaran']; ?>
            </div>
            <div class="row">
                <span><?php __('Tanggal Registrasi'); ?></span> : <?php echo $dateFormat->changeDateFormat($studentDetail['Registration']['register_date']); ?>
            </div>
            <div class="row">
                <span><?php __('Hasil Tahap Registrasi'); ?></span> : <span class="<?php echo ($studentDetail['Registration']['passed_by_register']) ? 'reg-lulus' : 'reg-tidak-lulus'; ?>"><?php echo ($studentDetail['Registration']['passed_by_register']) ? 'Lulus' : 'Tidak Lulus'; ?></span>
            </div>
            
            <?php if ($studentDetail['Registration']['passed_by_register']) { ?>
                <div class="row">
                    <span><?php __('Tanggal Verifikasi'); ?></span> : <?php echo $dateFormat->changeDateFormat($studentDetail['Registration']['tanggal_verifikasi']); ?>
                </div>
            <?php } ?>      
        </fieldset>

    </div>
</div>
</div>
<div class="clear"></div>
