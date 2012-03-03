<?php

/**
 * Registration model
 * @copyright 2011
 */

class Registration extends AppModel {
    var $name = 'Registration';
    var $hasMany = array('RegistrationScore' => array('dependent'=>true));
    var $hasOne = array('TestScore');
    var $belongsTo  = array('User');
    
    var $validate = array(
        'nisn' => array(
            'rule1' => array(
                'rule' => array('minLength',10),
                'message' => 'Masukan 10 digit NISN Anda !'
            ),
            'rule2' => array(
                'rule' =>'checkNisn',
                'message' => 'Maaf NISN yang anda masukan telah ada. Silahkan cek NISN anda di http://nisn.jardiknas.org/'
            )
        ),
        'nama' => array(
            'rule' => 'notEmpty',
            'message' => 'Nama harus diisi !'
        ),
        'asal_sekolah' => array(
            'rule' => 'notEmpty',
            'message' => 'Asal Sekolah harus diisi !'
        ),
        'email' => array(
            'rule' => array('email', true),
            'message' => 'Email Anda harus valid !'
        ),
        'tempat_lahir' => array(
            'rule' => 'notEmpty',
            'message' => 'Tempat lahir harus diisi !'
        ),
        'alamat_calon' => array(
            'rule' => 'notEmpty',
            'message' => 'Alamat tidak boleh kosong !'
        ),
        'pendidikan_terakhir' => array(
            'rule' => 'notEmpty',
            'message' => 'Data tidak boleh kosong !'
        ),
        'tahun' => array(
            'rule' => 'notEmpty',
            'message' => 'Data tidak boleh kosong !'
        ),
        'agama' => array(
            'rule' => 'notEmpty',
            'message' => 'Data tidak boleh kosong !'
        ),
        'kebangsaan' => array(
            'rule' => 'notEmpty',
            'message' => 'Data tidak boleh kosong !'
        ),
        'nama_ortu' => array(
            'rule' => 'notEmpty',
            'message' => 'Data tidak boleh kosong !'
        ),
        'alamat_ortu' => array(
            'rule' => 'notEmpty',
            'message' => 'Data tidak boleh kosong !'
        )
    );
    
    function checkNisn($check){
        $existing_nisn_count = $this->find('count',array('conditions'=>array('Registration.nisn'=>$check)));
        
        return $existing_nisn_count < 1;
    }
    
    function validateNilai($data,$options){
        if(!empty($data)){
            
            //debug($data['RegistrationScore']);
            
            // define nilai awal
            $nilai_per_semester = $options['nilai_per_semester'];
            $nilai_semua_semester = $options['nilai_semua_semester'];
            $jml_pelajaran = count($data['RegistrationScore']);
            $nilai_semester1 = '';
            $nilai_semester2 = '';
            $nilai_semester3 = '';
            $nilai_semester4 = '';
            $nilai_semester5 = '';
            
            // validate nilai tiap-tiap semester
            foreach($data['RegistrationScore'] as $nilai){
                $nilai_semester1 += $nilai['semester_1'];
                $nilai_semester2 += $nilai['semester_2'];
                $nilai_semester3 += $nilai['semester_3'];
                $nilai_semester4 += $nilai['semester_4'];
                $nilai_semester5 += $nilai['semester_5'];
            }
            
            // tentukan rata-rata nilai
            $rata_semester1 = $nilai_semester1 / $jml_pelajaran;
            $rata_semester2 = $nilai_semester2 / $jml_pelajaran;
            $rata_semester3 = $nilai_semester3 / $jml_pelajaran;
            $rata_semester4 = $nilai_semester4 / $jml_pelajaran;
            $rata_semester5 = $nilai_semester5 / $jml_pelajaran;
            
            // validate 4 nilai mata pelajaran penting
            $nilai_indo = ($data['RegistrationScore'][2]['semester_1'] + $data['RegistrationScore'][2]['semester_2'] + $data['RegistrationScore'][2]['semester_3'] + $data['RegistrationScore'][2]['semester_4'] + $data['RegistrationScore'][2]['semester_5']) / 5;
            $nilai_inggris = ($data['RegistrationScore'][3]['semester_1'] + $data['RegistrationScore'][3]['semester_2'] + $data['RegistrationScore'][3]['semester_3'] + $data['RegistrationScore'][3]['semester_4'] + $data['RegistrationScore'][3]['semester_5']) / 5;
            $nilai_matematika = ($data['RegistrationScore'][4]['semester_1'] + $data['RegistrationScore'][4]['semester_2'] + $data['RegistrationScore'][4]['semester_3'] + $data['RegistrationScore'][4]['semester_4'] + $data['RegistrationScore'][4]['semester_5']) / 5;
            $nilai_ipa = ($data['RegistrationScore'][5]['semester_1'] + $data['RegistrationScore'][5]['semester_2'] + $data['RegistrationScore'][5]['semester_3'] + $data['RegistrationScore'][5]['semester_4'] + $data['RegistrationScore'][5]['semester_5']) / 5;
            
            if($rata_semester1 >= $nilai_per_semester 
                && $rata_semester2 >= $nilai_per_semester 
                && $rata_semester3 >= $nilai_per_semester 
                && $rata_semester4 >= $nilai_per_semester 
                && $rata_semester5 >= $nilai_per_semester 
                && $nilai_indo >= $nilai_semua_semester 
                && $nilai_inggris >= $nilai_semua_semester 
                && $nilai_matematika >= $nilai_semua_semester
                && $nilai_ipa >= $nilai_semua_semester){
                
                return true;
            }
            else{
                return false;
            }
        }
    }
    
    function setVerificationDate($dates = null, $group_siswa){
        $last_count = $this->find('count',array('conditions'=>array('Registration.passed_by_register'=>1)));
        $last_count += 1;
        
        $selisih = $this->checkSelisihTanggal($dates);
        $date = $dates['date1'];
        $group = $group_siswa;
        
        for($i=0;$i <= $selisih;$i++){
            $p = explode("-", $date);
            $d = $p[2];
            $m = $p[1];
            $y = $p[0];
            
            $d = date("l", mktime(0, 0, 0, $m, $d, $y));
            
            //echo $i.' '.$group.' '.$date.' '.$d.'<br />';
            
            if($d == "Sunday" || $d == "Saturday"){}
            else{
                if($last_count <= $group){
                    $verify_date = $date;
                    continue;
                }
                $group += $group_siswa;
            }
            $date++;
        }
        return $verify_date;
        //echo $verify_date.' '.$group.' '.$d;
    }
    
    function checkSelisihTanggal($dates){
        $tgl1 = $dates['date1'];
        $tgl2 = $dates['date2'];
        
        // memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
        // dari tanggal pertama
        
        $pecah1 = explode("-", $tgl1);
        $date1 = $pecah1[2];
        $month1 = $pecah1[1];
        $year1 = $pecah1[0];
        
        // memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
        // dari tanggal kedua
        
        $pecah2 = explode("-", $tgl2);
        $date2 = $pecah2[2];
        $month2 = $pecah2[1];
        $year2 =  $pecah2[0];
        
        // menghitung JDN dari masing-masing tanggal
        
        $jd1 = GregorianToJD($month1, $date1, $year1);
        $jd2 = GregorianToJD($month2, $date2, $year2);
        
        // hitung selisih hari kedua tanggal
        
        return $selisih = $jd2 - $jd1;
    }

    function checkDateInRange($start_date, $end_date, $date_from_user)
    {
        // Convert to timestamp
        $start_ts = strtotime($start_date);
        $end_ts = strtotime($end_date);
        $user_ts = strtotime($date_from_user);

        // Check that user date is between start & end
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }
    
    function isRegistrationOpened($date){
        # Old ways
        # @author Resa Rahman
        /*$selisih = $this->checkSelisihTanggal($date);

        $date_begin = $date['date1'];
        $today = date('Y-m-d');
        $date_range = array();
        
        for($i=0;$i <= $selisih;$i++){
            
            $date_range[] = $date_begin;
            
            $date_begin++;    
        }
        die(var_dump($date_range));
        if(in_array($today,$date_range)){
            return true;
        }
        else {
            return false;
        }*/

        # New Ways
        # @author RoliesTheBee
        $today = date('Y-m-d');

        $isOpen = $this->checkDateInRange($date['date1'], $date['date2'], $today);
        
        return $isOpen;
        //debug($date_range);
    }
}

?>