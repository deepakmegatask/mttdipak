     
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
                                <h4 class="card-title mb-5">Change Password</h4><br><br>
                                <div class="form-validation">
                                    <form class="form-valide" action="<?php echo base_url()?>login/updatepassword" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="SettingPassword" class="col-sm-3 control-label">Current Password:<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="password" class="form-control input-sm" id="SettingPassword" name="SettingPassword"/>
                                                            <span class="input-group-addon"><i class="fa fa-eye" style="cursor: pointer;" id="SettingPasswordToggle"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="SettingNewPassword" class="col-sm-3 control-label">New Password:<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="password" class="form-control input-sm" id="SettingNewPassword" name="SettingNewPassword"/>    
                                                            <span class="input-group-addon"><i class="fa fa-eye" style="cursor: pointer;" id="SettingNewPasswordToggle"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="SettingConfirmPassword" class="col-sm-3 control-label">Confirm New Password:<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="password" class="form-control input-sm" id="SettingConfirmPassword" name="SettingConfirmPassword"/>
                                                            
                                                            <span class="input-group-addon"><i class="fa fa-eye" style="cursor: pointer;" id="SettingConfirmPasswordToggle"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row bottom">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-3">
                                                 <input type="submit" class="form-control btn btn-primary" value="Update Password">
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
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"
></script>

         <script type="text/javascript">
             $(function() {

                    $("#SettingPasswordToggle").click(function () {
                            $(this).toggleClass("fa-eye fa-eye-slash");
                           var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                            $("#SettingPassword").attr("type", type);
                    });
                    $("#SettingNewPasswordToggle").click(function () {
                            $(this).toggleClass("fa-eye fa-eye-slash");
                            var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                            $("#SettingNewPassword").attr("type", type);
                    });
                    $("#SettingConfirmPasswordToggle").click(function () {
                            $(this).toggleClass("fa-eye fa-eye-slash");
                            var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                            $("#SettingConfirmPassword").attr("type", type);
                    });
                    
                 });
        </script>