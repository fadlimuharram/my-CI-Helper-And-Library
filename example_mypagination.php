<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classname extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->library('pagination');
    $this->load->helper('mypagination');
        $baseurl = 'viewadmin/catagories';
        $totalrow = $this->catagorymodel->count();//dari model
        $perpage = 5;
        $urisegment = 3;
        $configdata = bootstrappagging($baseurl,$totalrow,$perpage,$urisegment);

    $this->pagination->initialize($configdata);
    $this->alldata['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    $this->alldata['allcatagories'] = $this->catagorymodel->select($perpage,$this->alldata['page']);
    $this->alldata['pagination'] = $this->pagination->create_links();

    $this->alldata['halaman'] = 'catagories';
    $this->load->view('admin/index', $this->alldata);

    /*
    pada view echo $pagination;
    */
  }

}
