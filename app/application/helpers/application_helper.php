<?php
defined('BASEPATH') or exit('No direct script access allowed');
function s_name_label($obj)
{
  $ci = &get_instance();
  $siteLang = $ci->session->userdata('site_lang');
  return $obj->{"s_name_{$siteLang}"};
}

function baht_to_satang($baht)
{
  return intval($baht) * 100;
}

function satang_to_baht($satang)
{
  return intval($satang) / 100;
}

function cut_params($url)
{
  return explode("?", $url)[0];
}


function base_image_url($image_path)
{
  return BASE_IMAGE_URL . $image_path;
}

function base_other_url($path)
{
	$base_url =     str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$array_url = explode("/",$base_url);
$array_path = array_filter($array_url);
$base_api_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_api_url .= "://". @$_SERVER['HTTP_HOST'];
foreach($array_path as $val){
		$new_array_path[] = $val;
}
$base_api_url .=     "/".$new_array_path[0]."/".$path."/";
  return $base_api_url;
}

function get_value($obj, $key, $default)
{
  if ($obj && $obj->{$key}) {
    return $obj->{$key};
  }
  return $default;
}
