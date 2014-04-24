<?php
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);
    $conn = mysql_connect($server, $username, $password);
    if(!$conn){ die('Could not connect: ' . mysql_error()); }
    mysql_select_db($db);

    
    if((!$_POST["email"]) || (!$_POST["pass"]))
    {
        //redirect to login page
        header("Location: signin.html");
        exit;
    }

    $sql = "SELECT * FROM Logins WHERE email = '$_POST[eml]' AND pass = '$_POST[pass]'";
    $result = mysql_query($sql, $conn) or die(mysql_error());
    $num = mysql_num_rows($result);

    if($num != 0){
        $match = "{ status: true }"; 
    }
    else{
        $match = "{ status: false }";
    }
    
    echo json_encode($match);
?>
