<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Login extends CI_Controller {

        


	public function __construct()
    {

	parent::__construct();
	
	 $this->load->library('session');
	
	$this->load->model('login_model');
  $this->load->helper('captcha');
	}

	public function index()
	{	


		$data = array();

		$data["file"]="login";
		$data["title"]="Login";
		$this->load->view('logtemplate',$data);
	}

 
	 function login_validation()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('email', 'Email', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');
           // $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');  
           if($this->form_validation->run())  
           {  	



                //true  
                $email = $this->input->post('email');  
                $password = $this->input->post('password'); 
                      
                //model function  
                $this->load->model('login_model');  
                if($this->login_model->can_login($email, $password))  
                {
                	redirect(base_url() . 'dashboard');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid email and Password');  
                     redirect(base_url() . 'login');  



                }  
           }  
           else  
           {  
                //false  
                $this->index();  
           }  
      } 


      public function changep(){
        $data = array();
        $user_id= $this->session->userdata('user_id'); 
        $userdetail = $this->login_model->admin_dtl($user_id);
        $data['admin_details']  = $userdetail;
        $data["file"] = "changepassword";
        $data["title"] = "New password";
        $this->load->view('include/template',$data);
    }


    public function userProfile(){
        $data = array();
        $user_id= $this->session->userdata('user_id'); 
        $userdetail = $this->login_model->admin_dtl($user_id);
        $data['admin_details']  = $userdetail;
        $data["file"] = "userprofile";
        $data["title"] = "New password";
        $this->load->view('include/template',$data);
    }
 

    public function editProfile(){
        $data = array();
        $user_id= $this->session->userdata('user_id'); 
        $userdetail = $this->login_model->admin_dtl($user_id);
        $data['admin_details']  = $userdetail;
        $data["file"] = "editprofile";
        $data["title"] = "New password";
        $this->load->view('include/template',$data);
    }





public function profileupdate()
    {

         $insertData=array();
         $form_data  = $this->input->post();
        $insertData['id'] = $form_data['id'];  
        $insertData['name'] = $form_data['name'];
        $insertData['bio'] = $form_data['bio'];
        $insertData['mobileno'] = $form_data['mobileno'];
        $insertData['address'] = $form_data['address'];
      
        $result = $this->login_model->save($insertData);


          if($result > 0)
            {
                $this->session->set_flashdata('success', 'Your Profile Has been Updated');
            }
            
            redirect('login/userprofile');



    }









    public function updatepassword()
    {

         
         $insertData=array();
        $this->load->library('form_validation'); 
         $form_data  = $this->input->post();
        $this->form_validation->set_rules('SettingPassword','Current Password','required');
        $this->form_validation->set_rules('SettingNewPassword','New Password','required|matches[SettingConfirmPassword]');
        $this->form_validation->set_rules('SettingConfirmPassword','Confirm Password','required');
        if($this->form_validation->run() == FALSE)
        {
            $this->changep();
        }else{
            
                $user_id= $this->session->userdata('user_id');
                $userdetail = $this->login_model->admin_dtl($user_id); 
                $pre_existPass = $form_data['SettingPassword'];
                $check_Pass = $userdetail->password;

                 if ($pre_existPass== $check_Pass) 
                 {
        
                        $insertData['id']       = $user_id;
                        $insertData['password']   =  $form_data['SettingConfirmPassword'];

                        $insertData['update_at']  = date("Y-m-d H:i:s");

                        $result = $this->login_model->save($insertData);
                }
          if($result > 0)
            {
                $this->session->set_flashdata('success', 'Successfully Your Password is Changed');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Your Current Password is Not Valid Please Enter Valid Password');
                 redirect('login/changep');
            }

            redirect('home');

            
            
          }  



    }



  function logout()
    {
       $this->session->sess_destroy();
       redirect(base_url()."login");
    } 


     function lock()
    {
       $this->session->sess_destroy();
       redirect(base_url()."lock");
    } 
     
 
}  
?>  









