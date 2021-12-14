<?
    session_start();
    $database = "pbl_db";
    $con = mysql_connect('localhost','root','apmsetup')
            or die("mySQL 서버 연결 Error");
        
    mysql_select_db($database, $con);

    $name = $_POST['name'];
    $stu_id = $_POST['stu_id'];
    $reason = $_POST['name'];
    $day = $_POST['name'];
    $choice = $_POST['choice'];
    $address = $_POST['address'];

    $query = 'select * from statement where stu_id='.$stu_id;

    $result = mysql_query($query,$con);

    $ans = mysql_fetch_row($result);

    if(empty($ans[0]))
    {
        if($choice == 1)
            $choice = "군휴학";
        else   
            $choice = "일반휴학";

        $query1 = "insert into statement values('$stu_id','$name','$reason','$day','$choice','$address')";

        $result1 = mysql_query($query1,$con);

        $query2 = "update grade set lastrecord='휴학' where num=".$stu_id;

        $result2 = mysql_query($query2,$con);

        mysql_close($con);

        print '<script type="text/javascript">alert("휴학 신청이 완료 되었습니다!");</script>';
    }
    else
    {
        print '<script type="text/javascript">alert("이미 휴학 신청을 한 내용이 있습니다!");</script>';
    }
    echo ("<script>location.href='home.html'</script>") ;
?>
    