<?
    session_start();
    $date = date("Ymd");

    $day = array("일","월","화","수","목","금","토");

    $today = ($day[date('w', strtotime($date))]);

    $database = "pbl_db";
    $con = mysql_connect('localhost','root','apmsetup')
            or die("Connect Error");
    
    mysql_select_db($database,$con) or die("Unable to Connet to SQL Server");

    $query1 = "select day1,name from plan where day1 like '%".$today."%'";
    $query2 = "select day2,name from plan where day2 like '%".$today."%'";

    $result1 = mysql_query($query1,$con);
    $result2 = mysql_query($query2,$con);
    
    $num1 = mysql_num_rows($result1);
    $num2 = mysql_num_rows($result2);

    print "<center><table style='padding:10px; border-spacing:10px'>";
    for($i = 0; $i < $num1+$num2; $i++)
    {   
        if($i < $num1)
            $ans = mysql_fetch_row($result1);
        else
            $ans = mysql_fetch_row($result2);
        
        print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td></tr>";
    }
    print "</table></center>";

    mysql_close();
?>