<?php
session_start();
if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["wetechies_security_code"]==$_POST["captcha"])
{
echo "You have Entered the Correct Code ";
//Do you stuff
}
else
{
die("You have Entered the Wrong Code");
}
?>
