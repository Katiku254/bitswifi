<?php
include "BuyPackagePage.php";

class InvoicePage extends BuyPackagePage {
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

        echo '</div>';
        HTMLPage::printFooter();       
    }

    function printMainContent() {
        echo '
                <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <h2 class="title-5 m-b-35">Invoices</h2>
                            </div>
                            <div class="table-data__tool-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>BUY PACKAGE</button>
                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <select class="js-select2" name="type">
                                        <option selected="selected">Export</option>
                                        <option value="">CSV</option>
                                        <option value="">XLS</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Date</th>                   
                                        <th>Package</th>
                                        <th>Amount</th>
                                        <th>MPESA Code</th>
                                        <th>Status</th>
                                        <th>MPESA Phone</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    $this->printInvoices();
        echo                    '</tbody>
                            </table>
                        </div>
                    </div>
                </div>';
        
        HTMLPage::printCopyright();
                

        echo '</div>
        
        <!-- END DATA TABLE-->
        ';
    }

    function printInvoices() {
        if(count($this->invoices) < 1) {
            echo '<tr class="tr-shadow">
                    <td>No Invoices at this time!</td><td></td><td></td><td></td><td></td><td></td>
                </tr>';
        } else {
            $processed = array(1=>array("Processed", "status--process"), 0=>array("Pending", "status--denied"));

            foreach($this->invoices as $invoice) {
                echo '<tr class="tr-shadow">';
                    echo '<td>'.$invoice[0].'</td>';
                    echo '<td class="desc">'.$invoice[1].'</td>';
                    echo '<td>'.$invoice[2].'</td>';
                    echo '<td><span class="block-email">'.$invoice[3].'</span></td>';
                    echo '<td>
                            <span class="'.$processed[$invoice[4]][1].'">'.$processed[$invoice[4]][0].'</span>
                        </td>';
                    echo '<td><span class="block-email">'.$invoice[5].'</span></td>';
                echo '</tr>';
                echo '<tr class="spacer"></tr>';
            }
        }
    }
}
?>