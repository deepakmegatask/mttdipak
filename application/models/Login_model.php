 <?php  
 class Login_model extends Base_model 
 {  


   public $table = "user";
    var $column_order = array(null, 'heading1','heading2', 'content1','content2','date_at'); //set column field database for datatable orderable
    var $column_search = array('heading1','heading2', 'content1','content2','date_at'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order




   function __construct() {

            parent::__construct();

        }



      public function can_login($email, $password)  
      {  
           $this->db->where('email', $email);  
           $this->db->where('password', $password);
           $query = $this->db->get('user');  
           //SELECT * FROM users WHERE email = '$email' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  

            
            $result = $query->result();
           $result_data  =  $result[0]; 
           $id = $result_data->id;
           $name = $result_data->name;
           $email = $result_data->email;
           $session_data = array(  
                          'user_id'     =>     $id ,
                           'user_name'      => $name,
                           'user_email'      => $email  
                      ); 
            $this->session->set_userdata($session_data);  
          
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      }  


       public function can_lock($password)  
      {  
           
           $this->db->where('password', $password);
           $query = $this->db->get('user');  
           //SELECT * FROM users WHERE email = '$email' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  

            $result = $query->result();

           $result_data  =  $result[0]; 
           $id = $result_data->id;
           $name = $result_data->name;
           $email = $result_data->email;
           $session_data = array(  
                          'user_id'     =>     $id ,
                           'user_name'      => $name,
                           'user_email'      => $email
                          
                      ); 
            $this->session->set_userdata($session_data);  
          


                return true;  
           }  
           else  
           {  
                return false;       
           }  
      } 



      public function admin_dtl($userid)
      {
          $this->db->select('*'); 
          $this->db->from('user'); 
           $this->db->where('id',$userid);  
            $query = $this->db->get();  
            if( !empty($query->result()))
            {
              $result_data = $query->result();
              return $result_data[0];
            }else{
              return array();
            }
      }



       function matchOldPassword($id, $password)
    {
        $this->db->select('id, password');
        $this->db->where('id', $id);        
       $this->db->where('status', '1');
        $query = $this->db->get('user');
        
        $user = $query->result();

        if(!empty($user)){
            if($password==$user[0]->password){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }


     


    public function update_user($id, $userdata)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $userdata);
    }




 }  