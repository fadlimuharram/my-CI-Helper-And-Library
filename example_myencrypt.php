<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classname extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('myencrypt');

    //sebagai anonymous function yang di load ke dalam view
    //digunakan dengan $varencryption($id) atau $vardecryption($id_encrypt)
    $this->alldata['varencryption'] = function($string){return encryptthis($string);};
    $this->alldata['vardecryption'] = function($string){return decryptthis($string);};
  }

  function decrypt()
  {
    $id = decryptthis($this->uri->segment('3'));
    echo $id;
  }

  function encrypt()
  {
    $id = encryptthis($this->uri->segment('3'));
    echo $id;
  }

}
