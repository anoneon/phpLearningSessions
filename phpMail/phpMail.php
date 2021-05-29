<?php
    //before it change sendmail.ini file and php.ini files also less secure in your mail
    if(mail('user@gmail.com','test','testing mail from php','From: your@gmail.com')){
        echo "mail sent";
    }else{
        echo "mail not sent";
    }
?>