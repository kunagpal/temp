<?php
/**
 * Created by PhpStorm.
 * User: Kunal Nagpal
 * Date: 27-04-2015
 * Time: 00:56
 */
    if($_POST['name'] && $_POST['password'])
    {
        $con = mysql_connect('localhost', '', '');
        if(!$con)
        {
            die(mysql_error());
        }
        $ret = mysql_query("select * from users where name = $_POST['name'] and hash = crypt($_POST['password'], 'MD5');", $con);
        if(!$ret)
        {
            echo 'Not found!';
        }
        mysql_close($con);
        setcookie("name", $_POST['name'], time()+86400000, "/", "", 0);
    }
    else
    {
        echo 'One or more fields was empty!';
    }
?>