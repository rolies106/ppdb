<?php
class DateFormatHelper extends Helper {

	function changeDateFormat($date, $param = NULL ) {
				
		parse_str($param);

		if (!isset($lang) || $lang == 'ID') {

			$month = array(
	
				'January' => 'Januari',
				'February' => 'Februari',
				'March' => 'Maret',
				'April' => 'April',
				'May' => 'Mei',
				'June' => 'Juni',
				'July' => 'Juli',
				'August' => 'Agustus',
				'September' => 'September',
				'October' => 'Oktober',
				'November' => 'November',
				'December' => 'Desember'
			
			);

		} else if ($lang == 'EN') {
		
			$month = array();
		
		}
				
		if ( $date && $date != '0000-00-00' && $date != '0000-00-00 00:00:00') {
		
			$firstExp = explode(' ', $date);
			
			if (!empty($firstExp[1])) {
				$timeExp = explode(':', $firstExp[1]);
			} else {
				$timeExp = array(0, 0, 0);
			}
			
			$str  = explode("-",$firstExp[0]);
			$bln  = mktime($timeExp[0],$timeExp[1],$timeExp[2],$str[1],$str[2],$str[0]);
			
			if ( !isset($dateFormat) ) {
				$result = date("d F Y",$bln);
			} else {
				$result = date("$dateFormat",$bln);
			}
			
		} else {
		
			if (isset($default)) {
				$result = $default;
			} else {
				$result = "-";
			}
			
		}
		
		$result = strtr($result, $month);
		
		return $result;
		
	}
}
?>