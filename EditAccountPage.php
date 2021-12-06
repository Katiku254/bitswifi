<?php
include "HomePage.php";

class EditAccountPage extends HomePage {

    function __construct($title, $user_data) {
        HomePage::__construct($title);
        HomePage::setLogged(1);
        HTMLPage::setUserData($user_data);
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

        echo '</div>';
        HTMLPage::printFooter();       
    }

    function printMainContent() {
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
                        <h4>Edit Account</h4>
                    </div>

                    <div class="card-body card-block">
                            <div id="register">
                                <form action="edit_account.php?edit=1" method="post" enctype="multipart/form-data" class="form-horizontal">
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">First Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="fname" value="'.$this->user_data["fname"].'" class="form-control" required>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Last Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="lname" value="'.$this->user_data["lname"].'" class="form-control" required>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Phone Number</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="phone" value="'.$this->user_data["phone"].'" class="form-control" disabled="">
                                        <small class="form-text text-muted">Due to anti-fraud and security reasons, to edit phone please <a href="contact.php">contact</a> Admin.</small>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="email-input" name="email" value="'.$this->user_data["email"].'" class="form-control" required>
                                        <small class="help-block form-text"></small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password-input" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="password-input" name="password" value="'.$this->user_data["password"].'" class="form-control" required>
                                        <small class="help-block form-text"></small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password-input" class=" form-control-label">Confirm Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="password-input" name="passwordC" value="'.$this->user_data["password"].'" class="form-control" required>
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
                    </div>
                </div>
            </div>

            </div>
            ';

        // print foot region (row)
        HTMLPage::printCopyright();
        
        // end main content (closing tags)
        echo '          
                    </div>
                </div>
            </div>
            ';
    }
}
?>