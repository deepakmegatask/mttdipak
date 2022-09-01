
<style>
    .row.justify-content-center {
    height: 679px;
    position: relative;
}
  </style>


  <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
                                <h4 class="card-title mb-5">Blog Posts</h4>
                                <div class="form-validation">
                                    <form class="form-valide" action="<?php echo base_url()?>home/insertnow" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            
                                            <div class="col-lg-12">
                                                <label class="col-form-label" for="content">Blog Post Image</label>
                                                 <div class="form-group form-control">

                                                <div class="fallback">
                                                    <input class="l-border-1" name="blog_image" id="blog_image" type="file" multiple="multiple">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label class="col-form-label" for="val-username">Blog Title</label>
                                                <input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Enter your Blog content">
                                            </div>
                                        </div>
                                        <div class="form-group row">   
                                            <div class="col-lg-12">
                                                <label class="col-form-label" for="val-email">Blog Heading</label>
                                                <input type="text" class="form-control" id="blog_heading" name="blog_heading" placeholder="Enter your Blog heading">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label class="col-form-label" for="content">Blog Post Content</label>
                                                <textarea class="form-control" id="blog_content" name="blog_content" rows="5" placeholder="Enter your Blog content"></textarea>
                                            </div>
                                        </div>   
                                        <!-- <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label class="col-form-label" for="content">Slug</label>
                                                <select class="form-control" id="slug" name="slug">
                                                    <option value="">Please select</option>
                                                    <option value="about">About</option>
                                                    <option value="products">Product</option>
                                                    <option value="store">Store</option>
                                                </select>
                                            </div>
                                        </div>  -->
                                        <div class="row bottom">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-3">
                                                 <input type="submit" class="form-control btn btn-primary" value="Post">
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
       

        <!-- <script type="text/javascript">
            $('#blog_content').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
        </script> -->