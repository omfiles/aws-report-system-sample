    <?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
    session_start(); ?>

    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->


            <div class="container">

                <?php 



                $username = '';
                $password = '';

                $random1 = '%O475>z#~+138PP';
                $random2 = '5?331$*97<P%9\f';

                $hash = md5($random1.$password.$random2);  
                $self = $_SERVER['REQUEST_URI'];
                $num_records='10';


// ************************************ //
// **********   USER LOGOUT  ********** //
// ************************************ //

                if(isset($_GET['logout']))
                {
                    unset($_SESSION['login']);
                }

// *********************************************** //
// **********   USER IS LOGGED IN   ********** //
// *********************************************** //



// *********************************************** //
// **********   FORM HAS BEEN SUBMITTED ********** //
// *********************************************** //

                else if (isset($_POST['submit'])) {
                    if ($_POST['username'] == $username && $_POST['password'] == $password){

                        $num_records=$_POST['num_records'];

        //IF USERNAME AND PASSWORD ARE CORRECT SET THE LOG-IN SESSION
                        $_SESSION["login"] = $hash;
                        header('Location: https://c1ms2.com/warriors/aws/report-check.php?n='.$num_records);


                    } else {

        // DISPLAY FORM WITH ERROR
                        display_login_form();
                        echo '<h2>Incorrect username or password. Please try again.</h2>';

                    }
                }   


// *********************************************** //
// **********   SHOW THE LOG-IN FORM    ********** //
// *********************************************** //

                else { 
                    display_login_form();
                }




                function display_login_form(){ ?>

                <div class="logo"><img src="../aws/images/logo.png"></div>
                <form class="form-signin" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <h2 class="form-signin-heading"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Submissions Report</h2>

                    <input type="usernam" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                    <input type="password" id="password" name="password"  class="form-control" placeholder="Secret Key" required autofocus>
                    <label for="num_records">Number of records to download</label>
                    <select class="form-control" name="num_records" id="num_records">
                      <option value="10">Latest 10</option>
                      <option value="30">Latest 30</option>
                      <option value="50">Latest 50</option>
                      <option value="100">Latest 100</option>
                      <option value="0">All</option>

                  </select>

                  <button class="btn btn-lg btn-primary btn-block keys" name="submit" id="submit" type="submit">View Table</button><BR>

                  <div class="alert alert-danger" style="text-align:center;font-size:25px;" role="alert" >

                    <span class="glyphicon glyphicon-exclamation-sign center" aria-hidden="true"></span><BR>
                    <strong>Warning</strong><BR> Downloading 'All' records may result in slow or unresponsive behaviour.</div>
                </form> 
                <?php } ?>


            </div>


            <div class="loader" style="position:absolute;width:100%;height:100%;background-color:#FFF;display:none;"><div class="loading-message" style="margin:auto;top:200px;left:0;bottom:0;right:0;font-size:35px;position:relative;"><img src="ajax-loader.gif"><BR>Loading...</div>
            <div class="main-content container">

            </div>





        </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


        <script src="js/vendor/bootstrap.min.js"></script>

        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/tabletools/2.2.3/css/dataTables.tableTools.css">
        <link rel="stylesheet" type="text/css" href="css/report.css">

        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/tabletools/2.2.3/js/dataTables.tableTools.min.js"></script>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>

        <script>

        $(function(){
            $('#submit').click(function(){

             $('.loader').show();
         });
        });
        </script>


    </body>
    </html>
