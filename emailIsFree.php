<?php
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);
    $conn = mysql_connect($server, $username, $password);
    if(!$conn){ die('Could not connect: ' . mysql_error()); }
    mysql_select_db($db);


    $sql = "SELECT * FROM Logins WHERE email = '$_GET[email]'";
    $result = mysql_query($sql, $conn) or die(mysql_error());
    $num = mysql_num_rows($result);

    if($num == 0){
        echo "1";
    }
    else{
        echo "0";
    }
    
?>
