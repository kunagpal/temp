<?php
/**
 * Created by PhpStorm.
 * User: Kunal Nagpal
 * Date: 27-04-2015
 * Time: 00:56
 */
    if($_POST['name'] && $_POST['password'] && $_POST['confirm'] && $_POST['email'])
    {
        if($_POST['password'] == $_POST['confirm'])
        {
            session_start();
            $con = mysql_connect('localhost', '', '');
            if(!$con)
            {
                die(mysql_error());
            }
            echo 'Connection successful!';
            $name = $_POST['name'];
            $email = $_POST['email'];
            $hash = crypt($_POST['password'], 'MD5');
            $ret = mysql_query("insert into users values($name, $email, $hash)", $con);
            if(!$ret)
            {
                echo 'Not found!';
            }
            setcookie("name", $_POST['name'], time()+86400000, "/", "", 0);
            mysql_close($con);
        }
        else
        {
            echo 'Passwords do not match!';
        }
    }
    else
    {
        echo 'One or more fields was empty!';
    }
?>