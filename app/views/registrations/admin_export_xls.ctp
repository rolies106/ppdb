<?php
/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('Europe/London');

/** PHPExcel */
//App::import('Vendor','phpexcel/PHPExcel.php');
require_once(APP.'vendors/phpexcel/PHPExcel.php');

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator($option['creator'])
							 ->setLastModifiedBy($option['creator'])
							 ->setTitle($option['title'])
							 ->setSubject($option['title'])
							 ->setDescription($option['description'])
							 ->setKeywords($option['keywords'])
							 ->setCategory($option['category']);


// Add some data
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'DATA CALON SISWA');
$objPHPExcel->getActiveSheet()->setCellValue('A3', 'NO');
$objPHPExcel->getActiveSheet()->setCellValue('B3', 'NO. PESERTA');
$objPHPExcel->getActiveSheet()->setCellValue('C3', 'NISN');
$objPHPExcel->getActiveSheet()->setCellValue('D3', 'NAMA CALON SISWA');
$objPHPExcel->getActiveSheet()->setCellValue('E3', 'ASAL SEKOLAH');
$objPHPExcel->getActiveSheet()->setCellValue('F3', 'JK');
$objPHPExcel->getActiveSheet()->setCellValue('G3', 'TANGGAL VERIFIKASI');
$objPHPExcel->getActiveSheet()->setCellValue('H3', 'LOLOS/TDK');

$objPHPExcel->getActiveSheet()->mergeCells('A1:H1');

$no = 1;
$c = 4;
foreach($data as $d){
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$c, $no);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$c, $d['Registration']['id']);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$c, $d['Registration']['nisn']);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$c, $d['Registration']['nama']);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$c, $d['Registration']['asal_sekolah']);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$c, $d['Registration']['gender']);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$c, $dateFormat->changeDateFormat($d['Registration']['tanggal_verifikasi'], 'dateFormat=m-d-Y'));
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$c, ($d['Registration']['passed_by_register'] == 1) ? 'Lolos' : 'Tdk Lolos');
    $no++;
    $c++;
}

// set fonts
//$objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setSize(20);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H3')->getFont()->setBold(true);

// set align
$objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('E3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('F3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('G3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('H3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('E3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('H3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// Set column widths
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

$styleThinBlackBorderOutline = array(
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => 'FF000000'),
		)
	),
);
$lastCell = $no + 2;
$objPHPExcel->getActiveSheet()->getStyle('A3:H'.$lastCell.'')->applyFromArray($styleThinBlackBorderOutline);

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Data Siswa');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="data_siswa_'.date('Y-m-d').'.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;