<?php

include "HTMLPage.php";

class ContactPage extends HTMLPage {

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

        echo '</div>';
        HTMLPage::printFooter();       
    }

    function printMainContent() {
        echo '
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
        ';

        echo '<div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Send us a message
                    </div>
                    <div class="card-body card-block">
                        <form action="message.php" method="post" class="form-horizontal">
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Full Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="fname" placeholder="John Doe" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="email" id="email-input" name="email" placeholder="john@doe.com" class="form-control">
                                    <small class="help-block form-text">Please enter your email</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password-input" class=" form-control-label">Phone</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="password-input" name="phone" placeholder="07XX123456" class="form-control">
                                    <small class="help-block form-text">Contact Phone</small>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Message</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="message" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Guest or Client</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="user" id="select" class="form-control">
                                        <option value="0">Guest</option>
                                        <option value="1">Client</option>
                                
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Send
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Our Contacts
                    </div>
                    <div class="card-body card-block">
                        <div>Office Phone : </div>
                        <div>Email : </div>
                        <div>Facebook : </div>
                        <div>Instagram : </div>
                        <div>Twitter : </div>
                    </div>
                </div>
            
            </div>
        </div>       
        ';

        echo '
                    
        ';
        
        HTMLPage::printCopyright();
        
        echo '
                    </div>
                </div>
            </div>
        </div>
        ';
    }

}
?>