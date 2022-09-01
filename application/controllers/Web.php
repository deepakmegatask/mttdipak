<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

        

		public function __construct()
		{

		parent::__construct();
		
		 $this->load->library('session');
		
		$this->load->model('login_model');
		$this->load->model('home_model');
        $this->load->model('web_model');
		$this->isLoggedIn();
		}



		public function isLoggedIn()
		{
			$user_id= $this->session->userdata('user_id');

			if(isset($user_id) &&  !empty($user_id))
			{

			}
			else
			{
				redirect(base_url().'admin');
			}
		}



         public function stop(){

           $totalcount = $this->web_model->count_all(); 
           print_r($totalcount);

            if ($totalcount > 0) {
                     redirect (base_url().'web');
            }
            else{
            }
        }





	public function index()
	{	

		$data = array();
     

		$user_id= $this->session->userdata('user_id'); 
		$userdetail = $this->login_model->admin_dtl($user_id);

        $totalcount = $this->web_model->count_all();  

		$data['admin_detail']  = $userdetail;
        $data['totalcount']  = $totalcount;
		$data["file"]="admin/web/add";
		$data["title"]="Web Details";
		$this->load->view('admin/include/template',$data);

	}



        public function changePassword(){
            
            $user_id= $this->session->userdata('user_id');
            $userdetail = $this->login_model->admin_dtl($user_id);

            redirect(base_url().'web');
        }


         function passwordchange()
    {   
       
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Old password','required');
        $this->form_validation->set_rules('npassword','New password','required');
        $this->form_validation->set_rules('cnpassword','Confirm new password','required|matches[npassword]');
       
        if($this->form_validation->run() == FALSE)
        {
            $this->changePassword();
        }
        else
        {   
            $user_id = $this->session->userdata('user_id');

            $password = $this->input->post('password');
            $npassword = $this->input->post('npassword');
            
            $resultPas = $this->login_model->matchOldPassword($user_id, $password);

           
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect(base_url().'web');               
            }
            else
            {
                $usersData = array(
                    'password'=>$npassword,
                    'date_at'=>date('Y-m-d H:i:s')
                );
                 
                $resultPas = $this->login_model->update_user($user_id, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success1', 'Password updation successful'); }
                else { $this->session->set_flashdata('error1', 'Password updation failed'); }
                
                 redirect(base_url().'dashboard');
            }
        }
    }










    public function list()
    {   

        $data = array();


        $user_id= $this->session->userdata('user_id'); 
        $userdetail = $this->login_model->admin_dtl($user_id);

        $data['admin_detail']  = $userdetail;
        $data["file"]="admin/web/list";
        $data["title"]="Web Details";
        $this->load->view('admin/include/template',$data);

    }





	public function addnew(){

        $this->stop();

		$data = array();
		$user_id= $this->session->userdata('user_id'); 
		$userdetail = $this->login_model->admin_dtl($user_id);
		$data['admin_detail']  = $userdetail;
		$data["file"] = "admin/web/add";
		$data["title"] = "Add New";
		$this->load->view('admin/include/template',$data);
	}


	public function insertnow()
	{
		$this->isLoggedIn();
					
		$this->load->library('form_validation');            
       /* $this->form_validation->set_rules('image','Offer Banner','required');*/
        $this->form_validation->set_rules('heading1','Top Heading','required');
        $this->form_validation->set_rules('heading2','Second Top Heading','required');
        $this->form_validation->set_rules('footer','Footer','required');
         
        /*form data */
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }

        else
        {   
             
            $insertData['heading1'] = $form_data['heading1'];
            $insertData['heading2'] = $form_data['heading2'];
            $insertData['footer'] = $form_data['footer'];
            $insertData['status'] = '1';
            $insertData['date_at'] = date("Y-m-d H:i:s");



            if(isset($_FILES['bg_image']['name']) && $_FILES['bg_image']['name'] != '') {



                $f_name         =$_FILES['bg_image']['name'];
                $f_tmp          =$_FILES['bg_image']['tmp_name'];
                $f_size         =$_FILES['bg_image']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/web/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['bg_image'] = $f_newfile;
                   
                }
             }




            $result = $this->web_model->save($insertData);
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Offer Successfully Added');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Offer Addition failed');
            }
            
            $this->addnew();         
			
          }  

	}





	 // Member list
    public function ajax_list()
    {
		$list = $this->web_model->get_datatables();
		
		$data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {


            $filename = (isset($currentObj->bg_image) && $currentObj->bg_image !=='') ? ($currentObj->bg_image) : ("");


            $temp_date = $currentObj->date_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = '<img src ="'.base_url().'uploads/web/'.$filename.'" width="150" alt = "Web"/>';
            $row[] = $currentObj->heading1;
            $row[] = $currentObj->heading2;
            $row[] = $currentObj->footer;
            $row[] = $currentObj->status;
            $row[] = date("d M Y", strtotime($currentObj->date_at));
            
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/web/edit/'.$currentObj->id.'" title="Edit" ><i class="ti-pencil"></i></a>';
            $row[] = '<a class="btn btn-sm btn-info deletebtn" href="#" title="Edit" data-userid="'.$currentObj->id.'"><i class="ti-trash"></i></a>';
            
          

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->web_model->count_all(),
                        "recordsFiltered" => $this->web_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }




    public function edit($id = NULL){

    	 $this->isLoggedIn();

         $data = array();
        $user_id= $this->session->userdata('user_id'); 
        $userdetail = $this->login_model->admin_dtl($user_id);
    
        $data['admin_detail']  = $userdetail;


        if($id == null)
        {
            redirect('admin/home');
        }



        $data['edit_data'] = $this->web_model->find($id);



        $data["file"]="admin/web/edit";
		$data["title"]="Edit";
		$this->load->view('admin/include/template',$data);


    }


    public function update()
    {
    	$this->isLoggedIn();


					
		$this->load->library('form_validation');            
       /* $this->form_validation->set_rules('image','Offer Banner','required');*/
        $this->form_validation->set_rules('heading1','Top Heading','required');
        $this->form_validation->set_rules('heading2','Second Top Heading','required');
        $this->form_validation->set_rules('footer','Footer','required');

         $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->edit($form_data['id']);
        }

        else{

        $insertData=array();

        $editids = $form_data['id'];

        $insertData['id'] = $form_data['id'];
        
		$insertData['heading1'] = $form_data['heading1'];
		$insertData['heading2'] = $form_data['heading2'];
        $insertData['footer'] = $form_data['footer'];



         if(isset($_FILES['bg_image']['name']) && $_FILES['bg_image']['name'] != '') {

                $f_name         =$_FILES['bg_image']['name'];
                $f_tmp          =$_FILES['bg_image']['tmp_name'];
                $f_size         =$_FILES['bg_image']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/web/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['bg_image'] = $f_newfile;
                   
                }
             }else{


                $insertData['bg_image'] =   $form_data['oldimage'];

             }





        $result = $this->web_model->save($insertData);


          if($result > 0)
            {
                $this->session->set_flashdata('success', ' Post successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Post Updation failed');
            }

               redirect('admin/web/edit/'.$insertData['id']);
            
          }  

    }



    // delete category
      function delete()
    {
        
        $this->isLoggedIn();
        $delId = $this->input->post('id');  
        $db_data = $this->web_model->find($delId);
         
        $result = $this->web_model->delete($delId); 
            
        if ($result == 1) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }







}
