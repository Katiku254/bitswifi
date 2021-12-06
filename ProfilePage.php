<?php

include "HomePage.php";

class ProfilePage extends HomePage {
    var $invoices = array();

    function __construct($title, $user_data, $invoices) {
        HomePage::__construct($title);
        HomePage::setLogged(1);
        HTMLPage::setUserData($user_data);
        $this->invoices = $invoices;
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
        echo '<!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">overview</h2>
                                <a href = "buy_package.php"><button class="au-btn au-btn-icon au-btn--blue">
                                    <i class="zmdi zmdi-plus"></i>Buy Package</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-25">
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c1">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-account-o"></i>
                                        </div>
                                        <div class="text">
                                            <h2>10368</h2>
                                            <span>average data</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c2">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </div>
                                        <div class="text">
                                            <h2>388,688</h2>
                                            <span>package subscription</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c3">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-calendar-note"></i>
                                        </div>
                                        <div class="text">
                                            <h2>1,086</h2>
                                            <span>this week</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart3"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c4">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-money"></i>
                                        </div>
                                        <div class="text">
                                            <h2>$1,060,386</h2>
                                            <span>money spent</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="title-1 m-b-25">Processed Invoices</h2>
                            <div class="table-responsive table--no-card m-b-40">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>date</th>
                                            <th>package</th>
                                            <th>amount</th>
                                            <th class="text-right">mpesa code</th>
                                            <th class="text-right">mpesa phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                                    $this->printInvoices();

                                    
    echo                                '</tbody>
                                </table>
                            </div>
                        </div>
                    </div>';
    HTMLPage::printCopyright();   
                    
    echo            '</div>
            </div>
        </div>

        <!-- END MAIN CONTENT-->';
    }

    function printInvoices() {
        if(count($this->invoices) < 1) {
            echo '<tr class="tr-shadow">
                    <td>No Invoices at this time!</td><td></td><td></td><td></td><td></td>
                </tr>';
        } else {
            foreach($this->invoices as $invoice) {
                if($invoice[4] == 1) {
                    echo '<tr>';
                        echo '<td>'.$invoice[0].'</td>';
                        echo '<td>'.$invoice[1].'</td>';
                        echo '<td>'.$invoice[2].'</td>';
                        echo '<td class="text-right">'.$invoice[3].'</td>';
                        echo '<td class="text-right">'.$invoice[5].'</td>';
                    echo '</tr>';
                }
            }
        }
    }

}

?>