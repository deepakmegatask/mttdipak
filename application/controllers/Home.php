<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    

		public function __construct()
		{

		parent::__construct();
		
		 $this->load->library('session');
		$this->load->model('login_model');
		$this->load->model('home_model');
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
				redirect(base_url().'login');
			}
		} 

        
	public function index()
	{	

		$data = array();

		$user_id= $this->session->userdata('user_id'); 
		$userdetail = $this->login_model->admin_dtl($user_id);

		$data["file"]="home/list";
		$data["title"]="Dashboard";
		$this->load->view('include/template',$data);

	}



	public function addnew(){

		$data = array();
		$user_id= $this->session->userdata('user_id'); 
		$userdetail = $this->login_model->admin_dtl($user_id);
		$data['admin_detail']  = $userdetail;
		$data["file"] = "home/add";
		$data["title"] = "Add New";
		$this->load->view('include/template',$data);
	}



    
 


	public function insertnow()
	{
		$this->isLoggedIn();
        			
		$this->load->library('form_validation');            
        // $this->form_validation->set_rules('blog_image','Blog  image','required');
        $this->form_validation->set_rules('blog_title','Blog Title','required');
        $this->form_validation->set_rules('blog_heading','Blog Heading','required');
        $this->form_validation->set_rules('blog_content','Blog Content','required');
        
          
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }


        else
        {   
             

            if(isset($_FILES['blog_image']['name']) && $_FILES['blog_image']['name'] != '') {

                $f_name         =$_FILES['blog_image']['name'];
                $f_tmp          =$_FILES['blog_image']['tmp_name'];
                $f_size         =$_FILES['blog_image']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/blogImage/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['blog_image'] = $f_newfile;
                   
                }
             }


            $insertData['blog_title'] = $form_data['blog_title'];
            $insertData['blog_heading'] = $form_data['blog_heading'];
            $insertData['blog_content'] = $form_data['blog_content'];
            $insertData['status'] = '1';
            $insertData['date_at'] = date("Y-m-d H:i:s");

            $result = $this->home_model->save($insertData);
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Blog Post Successfully Added');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Blog Post Addition failed');
            }
            
            $this->addnew();         
			
          }  


	}





	 // Member list
    public function ajax_list()
    {
		$list = $this->home_model->get_datatables();
		
		$data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {

            $filename = (isset($currentObj->blog_image) && $currentObj->blog_image !=='') ? ($currentObj->blog_image) : ("");

            $temp_date = $currentObj->date_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = '<img src ="'.base_url().'uploads/blogImage/'.$filename.'" width="150" alt = "Blog"/>';
            $row[] = $currentObj->blog_title;
            $row[] = $currentObj->blog_heading;
            $row[] = substr($currentObj->blog_content,0,50); 
            $row[] = $currentObj->status;



            
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'home/edit/'.$currentObj->id.'" title="Edit" ><i class="mdi mdi-square-edit-outline"></i></a>';
            $row[] = '<a class="btn btn-sm btn-info deletebtn" href="#" title="Edit" data-userid="'.$currentObj->id.'"><i class="fa fa-trash"></i></a>';
            
          

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->home_model->count_all(),
                        "recordsFiltered" => $this->home_model->count_filtered(),
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
            redirect('home');
        }


        $data['edit_data'] = $this->home_model->find($id);



        $data["file"]="home/edit";
		$data["title"]="Edit";
		$this->load->view('include/template',$data);


    }


    public function update()
    {
    	$this->isLoggedIn();  
         $insertData=array();
		$this->load->library('form_validation'); 
         $form_data  = $this->input->post();
          $this->form_validation->set_rules('blog_title','Blog Title','required');
        $this->form_validation->set_rules('blog_heading','Blog Heading','required');
        $this->form_validation->set_rules('blog_content','Blog Content','required');
        if($this->form_validation->run() == FALSE)
        {
            $this->edit($form_data['id']);
        }else{
            

       
        $insertData['id'] = $form_data['id'];  
        $editids = $form_data['id'];
		$insertData['blog_title'] = $form_data['blog_title'];
		$insertData['blog_heading'] = $form_data['blog_heading'];
		$insertData['blog_content'] = $form_data['blog_content'];
		 if(isset($_FILES['blog_image']['name']) && $_FILES['blog_image']['name'] != '') {

                $f_name         =$_FILES['blog_image']['name'];
                $f_tmp          =$_FILES['blog_image']['tmp_name'];
                $f_size         =$_FILES['blog_image']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/blogImage/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['blog_image'] = $f_newfile;
                   
                }
             }else{


                $insertData['blog_image'] =   $form_data['old_image'];

             }
       

        $result = $this->home_model->save($insertData);


          if($result > 0)
            {
                $this->session->set_flashdata('success', 'Blog Post successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Blog Post Updation failed');
            }

            redirect('home');

            
            
          }  



    }



    // delete category
      function delete()
    {
        
        $this->isLoggedIn();
        $delId = $this->input->post('id');  
        $db_data = $this->home_model->find($delId);
         
        $result = $this->home_model->delete($delId); 
            
        if ($result == 1) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }







}
?>
