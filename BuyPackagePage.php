<?php

include "HomePage.php";

class BuyPackagePage extends HomePage {
    var $pageData = 0;
    var $pageValues = array();

    function __construct($title, $user_data) {
        HomePage::__construct($title);
        HomePage::setLogged(1);
        HTMLPage::setUserData($user_data);
    }

    function setPageData($pageData, $pageValues) {
        $this->pageData = $pageData;
        $this->pageValues = $pageValues;
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
                    
        if($this->pageData == 1) {
            $this->printInvoice();
        } elseif($this->pageData == 2) {
            $this->printReceipt();
        } else {
            HTMLPage::printPackages();
        }         
        HTMLPage::printCopyright();
        echo            '
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->';
    }

    function printInvoice() {
        /* $monthDays = array(1=>31, 2=>28, 3=>31, 4=>30, 5=>31, 6=>30,
                            7=>31, 8=>31, 9=>30, 10=>31, 11=>30, 12=>31); */
    
        $bundle = "Unlimited";
        $duration = $this->pageValues["duration"]." days";

        if($this->pageValues["bundle"] != -1) {
            $bundle = $this->pageValues["bundle"]." GB";
        }

        if($this->pageValues["duration"] == -1) {
            $duration = "1 hour";
        }
    
        /* $date_array = getdate();
        $minutes = $date_array["minutes"];
        $hours = $date_array["hours"] + 1;
        if($hours == 24) {
            $hours = 0;
        }

        $day = $date_array["mday"] + 1;
        $month = $date_array["mon"] + 1;

        if($day > 31) {
            $m = $date_array["mon"];
            $days = $monthDays[$m];

            if($m == 2) {
                if($day > 28) {
                    $day = 1;
                    $month+=1
                }
            }
        }
        $week = $date_array["mday"] + 7;
        $month = $date_array["mon"] + 1;

        $expiry_date = $date_array["mday"]." ".$date_array["mon"]." ".
            $date_array["year"]." ".$date_array["hours"].
                $date_array["minutes"]." ".$date_array["seconds"]; */
        
        
        echo '
            <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Buy Package</div>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Pay Invoice</h3>
                        </div>
                        <hr>
                        <form action="invoices.php?receipt=0" method="post" novalidate="novalidate">
                            <input type="hidden" name="packageID" value="'.$this->pageValues["ID"].'">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Payment amount</label>
                                <input id="cc-payment" name="amount" type="text" class="form-control" aria-required="true" aria-invalid="false" value = "'.$this->pageValues["price"].'" disabled="">
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Payment Phone Number</label>
                                <input id="cc-name" name="phone" type="text" class="form-control cc-name valid" data-val="true"
                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required>
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">MPESA Transaction Number</label>
                                <input id="cc-number" name="code" type="text" class="form-control cc-number identified visa" value="" data-val="true"
                                    data-val-required="Please enter the MPESA transaction number" data-val-cc-number="Please enter a valid number"
                                    autocomplete="cc-number" required>
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                            </div>
                            
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Pay Ksh. '.$this->pageValues["price"].'</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>Package Details</strong>
                </div>
                <div class="card-body card-block">
                    <div class="card-title">
                        <h3 class="text-center title-2">Lipa na MPESA Till : 600245</h3>
                    </div>
                    <div class="card-title">
                        <h3 class="text-center title-2">Payment : Ksh.'.$this->pageValues["price"].'</h3>
                    </div>
                    <div class="card-title">
                        <h3 class="text-center title-2">Bundle : '.$bundle.'</h3>
                    </div>
                    <div class="card-title">
                        <h3 class="text-center title-2">Speed : '.$this->pageValues["speed"].' Mbps</h3>
                    </div>
                    <div class="card-title">
                        <h3 class="text-center title-2">Duration : '.$duration.'</h3>
                    </div>
                </div>
            </div>
            </div>
        </div>
        ';
    }

    function printReceipt() {
        echo "RECEIPT";
    }
}

?>