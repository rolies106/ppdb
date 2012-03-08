 <?php

 $db_host = "localhost";
    $db_user = "root";
    $db_pass = "password";
    $db_name = "sixreps_dev";

//koneksi ke database
    $link = mysql_connect ($db_host, $db_user,$db_pass) or die ("unable to connect");
    mysql_select_db ($db_name) or die ("unable select to database");