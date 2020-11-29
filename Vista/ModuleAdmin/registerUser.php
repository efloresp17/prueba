<?php
$userType = $_GET['userType'];
?>

<section class="p-fixed d-flex text-center">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form action="ModuleAdmin/addUser.php" method="post" id="formUser" name="formUser" enctype="multipart/form-data" class="md-float-material">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <?php if($userType==1){?>
                                        <h3 class="text-center txt-primary">Register a new client</h3>
                                        <?php }elseif($userType==3){?>
                                        <h3 class="text-center txt-primary">Register a new administrator</h3>
                                        <?php }elseif($userType==4){?>
                                            <h3 class="text-center txt-primary">Register a new reader</h3>
                                        <?php }elseif($userType==5){?>
                                            <h3 class="text-center txt-primary">Register a new author</h3>
                                        <?php }elseif($userType==6){?>
                                            <h3 class="text-center txt-primary">Register a new editorial</h3>
                                        <?php }?>
                                    </div>
                                </div>
                                <hr/>
                                <input id="userType" name="userType" type="hidden" value="<?php echo $userType; ?>">
                                <div class="input-group">
                                    <input type="text" id="mail" name="mail" class="form-control" placeholder="Email Address">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Choose Password">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone Number">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Address">
                                    <span class="md-line"></span>
                                </div>      
                                <div class="input-group">
                                    <select name="status" id="status" class="form-control" required> 
                                        <option value="3" selected>Activated</option> 
                                        <option value="4" >Desactivated</option>
                                    </select>
                                    <!--<input type="text" id="status" name="status" class="form-control" placeholder="Status">-->
                                    <span class="md-line"></span>
                                </div> 
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button name="addUser" style="background-color: #C0392B; color: #fff;" class="btn btn-md btn-block waves-effect text-center m-b-20 advertencia">Register</button>
                                    </div>
                                </div>
                                <hr/>
                                
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
	