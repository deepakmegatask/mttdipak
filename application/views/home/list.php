

<style>
    .footer1{
   /* height: 679px;*/
    position: relative;
}
i.mdi.mdi-square-edit-outline {
    font-size: 15px;
}
</style>

        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>home">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url();?>home">Home</a></li>
                    </ol>

                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable" id="errors">
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable" id="errors">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                    
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 footer1">
                        <div class="card">
                            <div class="card-body">              
                        <a href="<?php echo base_url()?>home/addnew"> <button type="button" class="btn mb-1 btn-warning" style="float: right;">Add New<span class="btn-icon-right">&nbsp;   <i class="fa fa-plus"></i></span>
                        </button> </a>
                                                
                                 <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration" id="example">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th> Blog Image</th>
                                                <th>Blog Title</th>
                                                <th>Blog Heading</th>
                                                <th>Blog Content</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                         
                                    </table>
 

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>

     

 <!-- Get Databse List -->
   <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"
></script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#example').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('home/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
</script>

<script type="text/javascript">
  setTimeout(function(){ $('#errors').hide(1000); },5000);
</script>

<!-- Delete Script-->
  <script type="text/javascript">
    $(document).ready(function(){
        //$('#example').DataTable();

         $(document).on("click", ".deletebtn", function(){

          var userId = $(this).data("userid"),
            hitURL = "<?php echo base_url() ?>home/delete",
            currentRow = $(this);
          
          var confirmation = confirm("Are you sure to delete this Post ?");
          
          if(confirmation)
          {
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId } 
            }).done(function(data){           
              currentRow.parents('tr').remove();
              if(data.status = true) { alert("successfully deleted"); }
              else if(data.status = false) { alert("deletion failed"); }
              else { alert("Access denied..!"); }
            });
          }
    });
    });
   
</script>