<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function encryptthis($string){
  $CI =& get_instance();
  $CI->load->library('encryption');
  return str_replace(array('+', '/', '='), array('-', '_', '~'),$CI->encryption->encrypt($string));
}
function decryptthis($string){
  $CI =& get_instance();
  $CI->load->library('encryption');
  $str = str_replace(array('-', '_', '~'), array('+', '/', '='),$string);
  return $CI->encryption->decrypt($str);

}
