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

function get_value($obj, $key, $default)
{
  if ($obj && $obj->{$key}) {
    return $obj->{$key};
  }
  return $default;
}
