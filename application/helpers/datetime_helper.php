<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function DateThai($strDate, $day=0)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate) + $day);
	$strHour= date("H",strtotime($strDate));
	$strMinute= date("i",strtotime($strDate));
	$strSeconds= date("s",strtotime($strDate));
	$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
}

function DateThaiShort($strDate, $day=0)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strMonthThai $strYear";
}

function get_date_options($select=false, $month=null, $year=null, $return_select=true){
	
	$obj =& get_instance();
	$date_size = 0;
	$result = null;
	
	if(!is_null($month) && !is_null($year)){
		$obj->load->helper('date');
		$date_size = days_in_month($month, $year);
	}
	
	$date_size = ($date_size == 0)? '31' : $date_size;
	
	if($return_select == true){
		if($date_size != 0){
			$current_date = ($select)? $select : date("d");
			for($i=1;$i<=$date_size;$i++){
				$select = ($i == $current_date)? 'selected="selected"' : null;
				$result .= "<option value=\"".sprintf("%'.02d", $i)."\" {$select}>".sprintf("%'.02d", $i)."</option>";
			}
		}
	}
	
	return ($result == null)? $date_size : $result;
}

function get_month_options($select=false, $return_name=false){
	
	$result = null;
	$current_month = ($select)? $select : date("m");
	$TH_Month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	
	for($i=1;$i<=12;$i++){
		$select = ($i == $current_month)? 'selected="selected"' : null;
		if($return_name){
			$result .= "<option value=\"".$TH_Month[date('n', mktime(0, 0, 0, $i, 10)) - 1]."\" {$select}>".$TH_Month[date('n', mktime(0, 0, 0, $i, 10)) - 1]."</option>";
		} else {
			$result .= "<option value=\"".sprintf("%'.02d", $i)."\" {$select}>".$TH_Month[date('n', mktime(0, 0, 0, $i, 10)) - 1]."</option>";
		}
		
	}
	
	return $result;
}

function get_year_options($select=false, $return_name=false){
	
	$start_year = 2014;
	$current_year = ($select)? $select : date("Y");
	$result = null;
	
	for($i=$start_year;$i<=date("Y");$i++){
		$TH_year = $i + 543;
		$select = ($i == $current_year)? 'selected="selected"' : null;
		
		if($return_name){
			$result .= "<option value=\"{$TH_year}\" $select>{$TH_year}</option>";
		} else {
			$result .= "<option value=\"{$i}\" $select>{$TH_year}</option>";
		}
		
	}
	
	return $result;
}

function get_hour_options($select=false){
	
	$current_hour = ($select)? $select : date("H");
	$result = null;
	
	for($i=0; $i<=23; $i++){
		$select = ($i == $current_hour)? 'selected="selected"' : null;
		$result .= "<option value=\"".sprintf("%'.02d", $i)."\" {$select}>".sprintf("%'.02d", $i)."</option>";
	}
	
	return $result;
}

function get_min_options($select=false){

	$current_min = ($select)? $select : date("i");
	$result = null;

	for($i=0; $i<=59; $i++){
		$select = ($i == $current_min)? 'selected="selected"' : null;
		$result .= "<option value=\"".sprintf("%'.02d", $i)."\" {$select}>".sprintf("%'.02d", $i)."</option>";
	}
	
	return $result;
}
