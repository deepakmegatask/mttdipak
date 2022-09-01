<div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="<?php echo base_url()?>"> <h4>Coffee Shop</h4></a>

                                <div class="col-md-12 mt-5">
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


                                <form method="post" action="<?php echo base_url(); ?>lock/lock_validation" class="mt-5 mb-3 login-input">
                                    <div class="form-group">
                                        <input hidden type="text" name="email" id="email" class="form-control" value="<?php echo $lock_dtl[0]->email?>">
                                    </div>
                                    <div class="form-group">
                                       <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    </div>
                                     <button class="btn login-form__btn submit w-100" type="submit" name="insert" value="Login">Unlock</button>
                                 </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

