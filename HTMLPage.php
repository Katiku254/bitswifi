<?php

class HTMLPage {
    var $user_data = array();
    var $title;
    var $logged = 0;

    function __construct($title) {
        $this->title = $title;
    }

    function setLogged($logged) {
        $this->logged = $logged;
    }

    function getLogged() {
        return $this->logged;
    }

    function setUserData($user_data) {
        $this->user_data = $user_data;
    }

    function getUserData() {
        return $this->user_data;
    }

    function printHeader() {
        echo '<!DOCTYPE html>
            <html lang="en">
            <body class="animsition">
                <div class="page-wrapper">';
    }

    function printFooter() {
        echo '
                <!-- Jquery JS-->
                <script src="vendor/jquery-3.2.1.min.js"></script>
                <!-- Bootstrap JS-->
                <script src="vendor/bootstrap-4.1/popper.min.js"></script>
                <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
                <!-- Vendor JS       -->
                <script src="vendor/slick/slick.min.js">
                </script>
                <script src="vendor/wow/wow.min.js"></script>
                <script src="vendor/animsition/animsition.min.js"></script>
                <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
                </script>
                <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
                <script src="vendor/counter-up/jquery.counterup.min.js">
                </script>
                <script src="vendor/circle-progress/circle-progress.min.js"></script>
                <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
                <script src="vendor/chartjs/Chart.bundle.min.js"></script>
                <script src="vendor/select2/select2.min.js">
                </script>
            
                <!-- Main JS-->
                <script src="js/main.js"></script>
                </div>
                <!-- end div page wrapper-->
            </body>
        </html>
        <!-- end document-->';
    }

    function getTitle() {
        return $this->title;
    }
    
    function printHead() {
        echo '
                <head>
                    <!-- Required meta tags-->
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <meta name="description" content="au theme template">
                    <meta name="author" content="Hau Nguyen">
                    <meta name="keywords" content="au theme template">
                
                    <!-- Title Page-->
                    <title>'.$this->title.'</title>
                
                    <!-- Fontfaces CSS-->
                    <link href="css/font-face.css" rel="stylesheet" media="all">
                    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
                    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                
                    <!-- Bootstrap CSS-->
                    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
                
                    <!-- Vendor CSS-->
                    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
                    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
                    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
                    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
                    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
                    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
                
                    <!-- Main CSS-->
                    <link href="css/theme.css" rel="stylesheet" media="all">
            
                </head>
            ';
    }

    function printHeaderMobile() {
        echo '
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            Bitswifi
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            ';

        
        $this->printNavBarMobile();
        
        echo '
            </header>
            <!-- END HEADER MOBILE-->
            ';
    }

    function printNavBarMobile() {
        echo '
            <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li>
                        <a href="user_profile.php">
                            <i class="fas fa-chart-bar"></i>Home</a>
                    </li>';

        if ($this->logged == 1) {
            echo '
                <li>
                    <a href="buy_package.php">
                        <i class="far fa-check-square"></i>Buy Package</a>
                </li> 
                <li>
                    <a href="invoices.php">
                        <i class="fas fa-table"></i>Invoices</a>
                </li>';
        }
        echo '
                <li>
                    <a href="about.php">
                        <i class="fas fa-calendar-alt"></i>About Us</a>
                </li>
                <li>
                    <a href="contact.php">
                        <i class="fas fa-map-marker-alt"></i>Contact Us</a>
                </li>
                
                <li>
                    <a href="faq.php">
                        <i class="fas fa-copy"></i>FAQs</a>
                </li>';
                
        echo                   
            '
                </ul>
            </div>
        </nav>
        ';
    }

    function printMenuSidebar() {
        echo '
            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        BITSWIFI
                    </a>
                </div>';

        $this->printNavSideBar();   
        
        echo '                
            </aside>
            <!-- END MENU SIDEBAR-->
            ';
    }

    function printNavSideBar() {
        echo '
            <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="active">
                        <a href="user_profile.php">
                            <i class="fas fa-chart-bar"></i>Home</a>
                    </li>';

        if ($this->logged == 1) {
            echo '
                <li>
                    <a href="buy_package.php">
                        <i class="far fa-check-square"></i>Buy Package</a>
                </li> 
                <li>
                    <a href="invoices.php">
                        <i class="fas fa-table"></i>Invoices</a>
                </li>
            ';
        }

        echo        '<li>
                        <a href="about.php">
                            <i class="fas fa-calendar-alt"></i>About Us</a>
                    </li>
                    <li>
                        <a href="contact.php">
                            <i class="fas fa-map-marker-alt"></i>Contact Us</a>
                    </li>
                    <li>
                        <a href="faq.php">
                            <i class="fas fa-copy"></i>FAQs</a>
                    </li>
                </ul>
            </nav>
        </div>
        ';
    }

    function printHeaderDesktop() {
        echo '
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search anything..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>';
        
        if($this->logged == 1) {
            $this->printProfileInfo();
        }

        echo                '</div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
        ';
    }

    function printProfileInfo() {
        $user_name = $this->user_data["fname"].' '.$this->user_data["lname"];

        echo '
            <div class="header-button">
            <div class="noti-wrap">
                <div class="noti__item js-item-menu">
                    <i class="zmdi zmdi-comment-more"></i>
                    <span class="quantity">1</span>
                    <div class="mess-dropdown js-dropdown">
                        <div class="mess__title">
                            <p>You have 2 news message</p>
                        </div>
                        <div class="mess__item">
                            <div class="image img-cir img-40">
                                <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                            </div>
                            <div class="content">
                                <h6>Michelle Moreno</h6>
                                <p>Have sent a photo</p>
                                <span class="time">3 min ago</span>
                            </div>
                        </div>
                        <div class="mess__item">
                            <div class="image img-cir img-40">
                                <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                            </div>
                            <div class="content">
                                <h6>Diane Myers</h6>
                                <p>You are now connected on message</p>
                                <span class="time">Yesterday</span>
                            </div>
                        </div>
                        <div class="mess__footer">
                            <a href="#">View all messages</a>
                        </div>
                    </div>
                </div>
                <div class="noti__item js-item-menu">
                    <i class="zmdi zmdi-email"></i>
                    <span class="quantity">1</span>
                    <div class="email-dropdown js-dropdown">
                        <div class="email__title">
                            <p>You have 3 New Emails</p>
                        </div>
                        <div class="email__item">
                            <div class="image img-cir img-40">
                                <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                            </div>
                            <div class="content">
                                <p>Meeting about new dashboard...</p>
                                <span>Cynthia Harvey, 3 min ago</span>
                            </div>
                        </div>
                        <div class="email__item">
                            <div class="image img-cir img-40">
                                <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                            </div>
                            <div class="content">
                                <p>Meeting about new dashboard...</p>
                                <span>Cynthia Harvey, Yesterday</span>
                            </div>
                        </div>
                        <div class="email__item">
                            <div class="image img-cir img-40">
                                <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                            </div>
                            <div class="content">
                                <p>Meeting about new dashboard...</p>
                                <span>Cynthia Harvey, April 12,,2018</span>
                            </div>
                        </div>
                        <div class="email__footer">
                            <a href="#">See all emails</a>
                        </div>
                    </div>
                </div>
                <div class="noti__item js-item-menu">
                    <i class="zmdi zmdi-notifications"></i>
                    <span class="quantity">3</span>
                    <div class="notifi-dropdown js-dropdown">
                        <div class="notifi__title">
                            <p>You have 3 Notifications</p>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c1 img-cir img-40">
                                <i class="zmdi zmdi-email-open"></i>
                            </div>
                            <div class="content">
                                <p>You got a email notification</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c2 img-cir img-40">
                                <i class="zmdi zmdi-account-box"></i>
                            </div>
                            <div class="content">
                                <p>Your account has been blocked</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__item">
                            <div class="bg-c3 img-cir img-40">
                                <i class="zmdi zmdi-file-text"></i>
                            </div>
                            <div class="content">
                                <p>You got a new file</p>
                                <span class="date">April 12, 2018 06:50</span>
                            </div>
                        </div>
                        <div class="notifi__footer">
                            <a href="#">All notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="account-wrap">
                <div class="account-item clearfix js-item-menu">
                    <div class="image">
                    <img src="profiles/'.$this->user_data["phone"].'.'.$this->user_data["imageName"].'" alt="'.$user_name.'" />
                    </div>
                    <div class="content">
                        <a class="js-acc-btn" href="#">'.$user_name.'</a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                        <div class="info clearfix">
                            <div class="image">
                                <a href="#">
                                    <img src="profiles/'.$this->user_data["phone"].'.'.$this->user_data["imageName"].'" alt="'.$user_name.'" />
                                </a>
                            </div>
                            <div class="content">
                                <h5 class="name">
                                    <a href="#">'.$user_name.'</a>
                                </h5>
                                <span class="email">'.$this->user_data["phone"].'</span>
                            </div>
                        </div>
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="edit_account.php">
                                    <i class="zmdi zmdi-account"></i>Account</a>
                            </div>
                            
                        </div>
                        <div class="account-dropdown__footer">
                            <a href="logout.php">
                                <i class="zmdi zmdi-power"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }

    function printPackages() {
        echo '
        <div class="row">
            <div class="col-lg-6">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>bundle internet</th>
                                <th>description</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                            <td><a href="buy_package.php?bundle=1">1 GB Internet bundles @ Kshs 70</a></td>
                                <td>1 GB Internet Bundle at speed of 4 mbps. Expires after 30 days</td>                                
                            </tr>
                            

                            <tr>
                                <td><a href="buy_package.php?bundle=2">2 GB Internet bundles @ Kshs 120</a></td>
                                <td>2 GB Internet Bundle at speed of 4 mbps. Expires after 30 days</td>
                            </tr>

                            <tr>
                                <td><a href="buy_package.php?bundle=3">3 GB Internet bundles @ Kshs 200</a></td>
                                <td>3 GB Internet Bundle at speed of 4 mbps. Expires after 30 days</td>
                            </tr>

                            <tr>
                                <td><a href="buy_package.php?bundle=4">10 GB Internet bundles @ Kshs 850</a></td>
                                <td>10 GB Internet Bundle at speed of 4 mbps. Expires after 30 days</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE-->
            </div>

            <div class="col-lg-6">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>monthly internet</th>
                                <th>description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="buy_package.php?bundle=5">Monthly 3mbs @ Kshs 1,500</a></td>
                                <td>You will access internet at speed of 3 mbps for 1 month</td>
                            </tr>

                            <tr>
                                <td><a href="buy_package.php?bundle=6">Monthly 5mbs @ Kshs 2,000</a></td>
                                <td>You will access internet at speed of 5 mbps for 1 month</td>
                            </tr>

                            <tr>
                                <td><a href="buy_package.php?bundle=7">Monthly 6mbs @ Kshs 2,700</a></td>
                                <td>You will access internet at speed of 6 mbps for 1 month</td>
                            </tr>

                            <tr>
                                <td><a href="buy_package.php?bundle=8">Monthly 10 mbs @ Kshs 3,500</a></td>
                                <td>You will access internet at speed of 10 mbps for 1 month</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>weekly internet</th>
                                <th>decription</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="buy_package.php?bundle=9">Weekly 1 mbs @ Kshs 500</a></td>
                                <td>You will access internet at speed of 1 mbps for 1 week</td>                                
                            </tr>

                            <tr>
                                <td><a href="buy_package.php?bundle=10">Weekly 2 mbs @ Kshs 1,000</a></td>
                                <td>You will access internet at speed of 2 mbps for 1 week</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE-->
            </div>

            <div class="col-lg-6">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>Hourly/Daily internet</th>
                                <th>description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="buy_package.php?bundle=11">1 hour 1mbs @ Kshs 20</a></td>
                                <td>You will access internet at speed of 1 mbps for 1 hour for a maximum of 1 day</td>
                            </tr>

                            <tr>
                                <td><a href="buy_package.php?bundle=12">3 hours 1mbs @ Kshs 40</a></td>
                                <td>You will access internet at speed of 1 mbps for 3 hours for a maximum of 1 day</td>
                            </tr>

                            <tr>
                                <td><a href="buy_package.php?bundle=13">Daily 1mbs @ Kshs 80</a></td>
                                <td>You will access internet at speed of 1 mbps for 24 hours</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
        ';
    }
    
    function printCopyright() {
        echo '
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2021 Bitswifi.</p>
                </div>
            </div>
        </div>
        ';
    }

}