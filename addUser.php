<?php
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);
    $conn = mysql_connect($server, $username, $password);
    if(!$conn){ die('Could not connect: ' . mysql_error()); }
    mysql_select_db($db);

    
    if((!$_POST["eml"]) || (!$_POST["pass"]))
    {
        //redirect to login page
        header("Location: signin.html");
        exit;
    }
    else{
        $email = $_POST["eml"];
        $email = mysql_real_escape_string($email);
        $pass = $_POST["pass"];
        $pass = mysql_real_escape_string($pass);

        $query = "INSERT INTO Logins (email, pass) VALUES ('$email', '$pass')";
        mysql_query($query) or trigger_error(mysql_error()." in ".$query);
        
    }


?>
