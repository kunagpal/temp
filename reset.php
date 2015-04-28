<?php
/**
 * Created by PhpStorm.
 * User: Kunal Nagpal
 * Date: 27-04-2015
 * Time: 00:56
 */
    if($_POST['password'] && $_POST['confirm'])
    {
        if($_POST['password'] == $_POST['confirm'])
        {
            $con = mysql_connect('localhost', '', '');
            if(! $con )
            {
                die('Could not connect: ' . mysql_error());
            }
            echo 'Connected successfully';
            //mysql_query("update users set hash = crypt($_POST['password']) where token = ", $con);
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