<?
  $database="PBL_DB";
  $connect=mysql_connect('localhost','root','apmsetup') or die("mySQL 서버 연결 Error!");
  mysql_select_db($database, $connect);
  $queryo = "select semester from zerofee where sno = ".$sno.";";
  if($_POST['flag1'] != ''){
     $sno = $_POST['flag1'];
     $query = "update zerofee set approval = 1 where sno = '$sno'";
     $queryo = "select semester from zerofee where sno = '$sno'";
     $result = mysql_query($queryo, $connect);
     $row = mysql_fetch_array($result);
     $semester = $row['semester'];
     $queryt = "update fee set scholar = 4000000, paid = 0, unpaid = 0, status = '완납' where sno = '$sno' and semester = '$semester'";
     mysql_query($queryt, $connect);
     print "<h1>".$sno."의 신청을 정상적으로 승인 하였습니다.</h1>";

  }
  else if($_POST['flag2'] != ''){
     $sno = $_POST['flag2'];
     $query = "update zerofee set approval = 2 where sno = '$sno'";
     $queryo = "select semester from zerofee where sno = '$sno'";
     $result = mysql_query($queryo, $connect);
     $row = mysql_fetch_array($result);
     $semester = $row['semester'];
     $queryt = "update fee set scholar = 0, paid = 0, unpaid = 4000000, status = '미납' where sno = '$sno' and semester = '$semester'";
     mysql_query($queryt, $connect);
     print "<h1>".$sno."의 신청을 정상적으로 거절 하였습니다.</h1>";

  }
  else { 
     print"<br> <h1>오류 발생  선택 안함</h1> <br>";
  }

  mysql_query($query, $connect);
  mysql_close($connect);;
  print "<button onclick=\"window.open('zero_fee_m.html','self')\"> 돌아가기  </button>";
?>