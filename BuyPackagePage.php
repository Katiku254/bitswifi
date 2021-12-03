<?php

include "HomePage.php";

class BuyPackagePage extends HomePage {
    
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
        echo '<!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">';
                    
                    
        HTMLPage::printPackages();     

        echo            '<div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2021 Bitswifi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->';
    }

    function printInvoice() {
        
    }
}

?>