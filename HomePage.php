<?php

include "HTMLPage.php";

class HomePage extends HTMLPage {
    
    function __construct($title) {
        HTMLPage::__construct($title);

    }

    function printPage() {
        HTMLPage::printHeader();
        HTMLPage::printHead();
        HTMLPage::printHeaderMobile();
        HTMLPage::printMenuSidebar();
        echo '<!-- PAGE CONTAINER-->
            <div class="page-container">';
        HTMLPage::printHeaderDesktop();
        $this->printMainContent();
        //HTMLPage::printPackages();
        echo '</div>';
        HTMLPage::printFooter();       
    }

    function printMainContent() {
        // print head of main content
        echo '
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
            ';

        // print content (row)
        echo '
            <div class="row">
            <!-- /# column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Login / Register</h4>
                    </div>

                    <div class="card-body card-block">
                        
                        <div  class="tab-content  pl-3 p-1" id="myTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
                                <form action="user_profile.php" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-email" class=" form-control-label">Phone</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="hf-email" name="phone" placeholder="Enter Phone..." class="form-control" required>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-password" class=" form-control-label">Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="hf-password" name="password" placeholder="Enter Password..." class="form-control" required>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-submit" class="form-control-label"></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i>Submit
                                            </button>
                                            <span class="help-block">&nbsp;&nbsp;&nbsp;Forgot Password</span>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            

                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="profile-tab">
                                <form action="register.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">First Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="fname" placeholder="e.g. John" class="form-control" required>
                                        <small class="form-text text-muted">This is a help text</small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Last Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="lname" placeholder="e.g. Doe" class="form-control" required>
                                        <small class="form-text text-muted">This is a help text</small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Phone Number</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="phone" placeholder="07XX123456" class="form-control" required>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="email-input" name="email" placeholder="e.g. johndoe@example.com" class="form-control" required>
                                        <small class="help-block form-text"></small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password-input" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="password-input" name="password" placeholder="Password" class="form-control" required>
                                        <small class="help-block form-text"></small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password-input" class=" form-control-label">Confirm Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="password-input" name="passwordC" placeholder="Password" class="form-control" required>
                                        <small class="help-block form-text">Please confirm your password</small>
                                    </div>
                                </div>
                                                           
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Profile Photo</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="profile" class="form-control-file">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-submit" class="form-control-label"></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i>Submit
                                        </button>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                
                                </form>
                            </div>
                        </div>
                                              

                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#register" role="tab" aria-controls="profile" aria-selected="true">Register</a>
                            </li>
                        
                        </ul>

                    </div>
                </div>
            </div>

            </div>
            ';

        HTMLPage::printPackages();

        // print foot region (row)
        echo '
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2021 Bitswifi.</p>
                        </div>
                    </div>
                </div>';
        
        // end main content (closing tags)
        echo '          
                    </div>
                </div>
            </div>
            ';

    }
}

?>