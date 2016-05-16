<?php // test_helper.php
if(!defined('BASEPATH')) exit('No direct script access allowed');

function numberformat($number, $lang)
{
	$euro = array ('fr','de');
	if(in_array($lang, $euro)){
		return  number_format($number, 2, ',', ' ');
	}
	return number_format($number, 2, '.', '');
}

function prix_numberformated($product, $lang)
{
	$product->sale_price = numberformat($product->sale_price, $lang);	
	
	$product->suggested_price = numberformat($product->suggested_price, $lang);

	$datenow = new DateTime("now");
	$datestart = new DateTime($product->special_price_date_start);
	$dateend = new DateTime($product->special_price_date_end);
	
	if($datestart < $datenow and $dateend > $datenow)
	{
		$product->special_price = numberformat($product->special_price, $lang);
	} 
	else
	{
		$product->special_price = NULL;
	}
	
	return $product;
}

?>