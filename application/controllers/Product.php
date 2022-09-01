<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    
    
       


		public function __construct()
		{

		parent::__construct();
		
		 $this->load->library('session');
		
		$this->load->model('login_model');
		$this->load->model('home_model');
        $this->load->model('product_model');
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

           $totalcount = $this->product_model->count_all(); 
           print_r($totalcount);

            if ($totalcount > 0) {
                     redirect (base_url().'dproduct');
            }
            else{
            }
        }



	public function index()
	{	

		$data = array();

		$user_id= $this->session->userdata('user_id'); 
		$userdetail = $this->login_model->admin_dtl($user_id);	

        $totalcount = $this->product_model->count_all();  


		$data['admin_detail']  = $userdetail;
        $data['totalcount']  = $totalcount;
		$data["file"]="product/list";
		$data["title"]="Product";
		$this->load->view('include/template',$data);

	}



	public function addnew(){

        $this->stop();

		$data = array();
		$user_id= $this->session->userdata('user_id'); 
		$userdetail = $this->login_model->admin_dtl($user_id);
	
		$data['admin_detail']  = $userdetail;
		$data["file"] = "product/add";
		$data["title"] = "Add New";
		$this->load->view('include/template',$data);
	}


	public function insertnow()
	{
		$this->isLoggedIn();
					
		$this->load->library('form_validation');            
       /* $this->form_validation->set_rules('image','Offer Banner','required');*/
        $this->form_validation->set_rules('heading1','Heading One','required');
        $this->form_validation->set_rules('heading2','Heading Two','required');
        $this->form_validation->set_rules('content1','Content One','required');
        
        $this->form_validation->set_rules('heading3','Heading Three','required');
        $this->form_validation->set_rules('heading4','Heading Four','required');
        $this->form_validation->set_rules('content2','Content Two','required');

        $this->form_validation->set_rules('heading5','Heading Five','required');
        $this->form_validation->set_rules('heading6','Heading Six','required');
        $this->form_validation->set_rules('content3','Content Three','required'); 
         
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
            $insertData['content1'] = $form_data['content1'];
            
            $insertData['heading3'] = $form_data['heading3'];
            $insertData['heading4'] = $form_data['heading4'];
            $insertData['content2'] = $form_data['content2'];

            $insertData['heading5'] = $form_data['heading5'];
            $insertData['heading6'] = $form_data['heading6'];
            $insertData['content3'] = $form_data['content3'];

            $insertData['pro_image1'] = $form_data['pro_image1'];
            $insertData['pro_image2'] = $form_data['pro_image2'];
            $insertData['pro_image3'] = $form_data['pro_image3'];


            $insertData['status'] = '1';
            $insertData['date_at'] = date("Y-m-d H:i:s");


             $i = 1;

            for ($i=1; $i < 4; $i++) { 
                    if(isset($_FILES['pro_image'.$i]['name']) && $_FILES['pro_image'.$i]['name'] !== '') {

                    $f_name         =$_FILES['pro_image'.$i]['name'];
                    $f_tmp          =$_FILES['pro_image'.$i]['tmp_name'];
                    $f_size         =$_FILES['pro_image'.$i]['size'];
                    $f_extension    =explode('.',$f_name);
                    $f_extension    =strtolower(end($f_extension));
                    $f_newfile      =uniqid().'.'.$f_extension;
                     $store          ="uploads/product/".$f_newfile;
                 
                    if(!move_uploaded_file($f_tmp,$store))
                    {
                        $this->session->set_flashdata('error', 'Image Upload Failed .');
                    }
                    else
                    {
                       $insertData['pro_image'.$i] = $f_newfile;
                       
                    }
                 }  
                }





            $result = $this->product_model->save($insertData);
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
		$list = $this->product_model->get_datatables();
		
		$data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {


            $filename1 = (isset($currentObj->pro_image1) && $currentObj->pro_image1 !=='') ? ($currentObj->pro_image1) : ("");
            $filename2 = (isset($currentObj->pro_image2) && $currentObj->pro_image2 !=='') ? ($currentObj->pro_image2) : ("");
            $filename3 = (isset($currentObj->pro_image3) && $currentObj->pro_image3 !=='') ? ($currentObj->pro_image3) : ("");



            $temp_date = $currentObj->date_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = $currentObj->heading1;
            $row[] = '<img src ="'.base_url().'uploads/product/'.$filename1.'" width="150" alt = "Product"/>';
            $row[] = $currentObj->heading3;
            $row[] = '<img src ="'.base_url().'uploads/product/'.$filename2.'" width="150" alt = "Product"/>';
            $row[] = $currentObj->heading5;
            $row[] = '<img src ="'.base_url().'uploads/product/'.$filename3.'" width="150" alt = "Product"/>';
            $row[] = $currentObj->status;
            
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'product/edit/'.$currentObj->id.'" title="Edit" ><i class="ti-pencil"></i></a>';
            $row[] = '<a class="btn btn-sm btn-info deletebtn" href="#" title="Edit" data-userid="'.$currentObj->id.'"><i class="ti-trash"></i></a>';
            
          

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->product_model->count_all(),
                        "recordsFiltered" => $this->product_model->count_filtered(),
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


        $data['edit_data'] = $this->product_model->find($id);



        $data["file"]="product/edit";
		$data["title"]="Edit";
		$this->load->view('include/template',$data);


    }


    public function update()
    {
    	$this->isLoggedIn();
					
		$this->load->library('form_validation');            
       /* $this->form_validation->set_rules('image','Offer Banner','required');*/
        $this->form_validation->set_rules('heading1','Top Heading','required');
        $this->form_validation->set_rules('heading2','Second Top Heading','required');
        $this->form_validation->set_rules('content1','Top Content','required');
        
        $this->form_validation->set_rules('heading3','Heading Three','required');
        $this->form_validation->set_rules('heading4','Heading Four','required');
        $this->form_validation->set_rules('content2','Content Two','required');

        $this->form_validation->set_rules('heading5','Heading Five','required');
        $this->form_validation->set_rules('heading6','Heading Six','required');
        $this->form_validation->set_rules('content3','Content Three','required'); 

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
		$insertData['content1'] = $form_data['content1'];
		
        $insertData['heading3'] = $form_data['heading3'];
        $insertData['heading4'] = $form_data['heading4'];
        $insertData['content2'] = $form_data['content2'];

        $insertData['heading5'] = $form_data['heading5'];
        $insertData['heading6'] = $form_data['heading6'];
        $insertData['content3'] = $form_data['content3'];





         $i = 1; 
             
                for ($i=0; $i < 4; $i++) { 
                    if(isset($_FILES['pro_image'.$i]['name']) && $_FILES['pro_image'.$i]['name'] != '') {

                    $f_name         =$_FILES['pro_image'.$i]['name'];
                    $f_tmp          =$_FILES['pro_image'.$i]['tmp_name'];
                    $f_size         =$_FILES['pro_image'.$i]['size'];
                    $f_extension    =explode('.',$f_name);
                    $f_extension    =strtolower(end($f_extension));
                    $f_newfile      =uniqid().'.'.$f_extension;
                    $store          ="uploads/product/".$f_newfile;
                
                    if(!move_uploaded_file($f_tmp,$store))
                    {
                        $this->session->set_flashdata('error', 'Image Upload Failed .');
                    }
                    else
                    {
                        $file = "uploads/product/".$form_data['old_image'.$i];
                        if(file_exists ( $file))
                        {
                            unlink($file);
                        }
                        $insertData['pro_image'.$i] = $f_newfile;
                       
                    }
                 }
                }




        $result = $this->product_model->save($insertData);


          if($result > 0)
            {
                $this->session->set_flashdata('success', ' Post successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Post Updation failed');
            }

            redirect('product/edit/'.$insertData['id']);

            
            
          }  



    }



    // delete category
      function delete()
    {
        
        $this->isLoggedIn();
        $delId = $this->input->post('id');  
        $db_data = $this->product_model->find($delId);
         
        $result = $this->product_model->delete($delId); 
            
        if ($result == 1) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }







}
