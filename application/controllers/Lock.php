<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lock extends CI_Controller {
    
    

	public function __construct()
    {

	parent::__construct();
	
	 $this->load->library('session');
	
	$this->load->model('login_model');



	}



	public function index()
	{	
		$data = array();


		$where = array();
		$where['table'] = 'user';
		$where['status'] = '1';
		$data['lock_dtl'] = $this->login_model->findDynamic($where);



		$data["file"]="lock";
		$data["title"]="Lockscreen";
		$this->load->view('logtemplate',$data);
	}




	function lock_validation()  
          {  

           $this->load->library('form_validation');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {    



                //true
                $password = $this->input->post('password');  
                //model function  
                $this->load->model('login_model');  
                if($this->login_model->can_lock($password))  
                {
                  redirect(base_url() . 'dashboard');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Password');  
                     redirect(base_url() . 'lock');
                }  
           }  
           else  
           {  
                //false  
                $this->index();  
           }  
      } 









}
