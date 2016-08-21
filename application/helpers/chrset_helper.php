<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function l( $handle )
{
	return lang( $handle ); 	
}

function UCWord( $str )
{
		return ucwords(strtolower($str));
}

function UPWord( $str )
{
		return strtoupper($str);
}

function DSCw($str , $limiter = 30)
{
	$str = strip_tags($str); // ตัด tag html
	$str = preg_replace('~[^a-z0-9ก-๙\.\-\_]~iu', " ", $str); // ตัดอักขระพิเศษ
	$str = strtolower($str); // ทำให้เป็นตัวพิมพ์เล็ก
	$str = trim($str); // ตัดช่องว่างหน้าและหลัง
	$str = @ereg_replace('[[:space:]]+', ' ', $str); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
	return ($limiter == 0)? $str : mb_substr($str, 0, $limiter) . " ...";
}

function DSCk($str , $limiter = 25)
{
		
	$keyword = strip_tags($str);
	$keyword = preg_replace('~[^a-z0-9ก-๙]~iu', " ", $keyword); // ตัดอักขระพิเศษ
	$keyword = trim($keyword); // ตัดช่องว่างหน้าและหลัง
	$keyword = @ereg_replace('[[:space:]]+', ' ', $keyword); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
	$keyword = explode(" ", $keyword);
	$keyword = array_unique($keyword);
	$keyword = array_splice($keyword, 0 , $limiter);
	$keyword = implode($keyword, ',');
	
	return $keyword;
}

function trimSpecial( $str )
{
	$str = trim($str); // ตัดช่องว่างหน้าและหลัง
	$str = @ereg_replace('[[:space:]]+', ' ', $str); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
	return $str;	
}

function trimCross( $str , $uc = 0 , $space = "-")
{
        switch( $uc ){
            case 0: $str = strtolower($str); break;
            case 1: $str = ucwords(strtolower($str)); break;
            case 2: $str = strtoupper($str); break;
			case 9: $str = strip_tags($str); $str = preg_replace('~[^a-z0-9ก-๙]~iu', " ", $str); $str = ucwords($str); break;        
        }
	
	$str = trim($str); // ตัดช่องว่างหน้าและหลัง
	$str = @ereg_replace('[[:space:]]+', ' ', $str); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
	
	$str = str_replace(" ", $space , $str);	
	return $str;	
}

function allowTagHTML( $str )
{
    $str = str_replace( '&lt;', '<', $str);
    $str = str_replace( '&gt;', '>', $str);
    return $str;
}

