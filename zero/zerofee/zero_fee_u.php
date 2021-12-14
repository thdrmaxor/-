<?
  session_start();
  $database="PBL_DB";
  $connect=mysql_connect('localhost','root','apmsetup') or die("mySQL 서버 연결 Error!");
  mysql_select_db($database, $connect);
  $id = $_SESSION["userid"];
  $semester = $_POST["semester"];
  $query = "insert into zerofee values('$id', '$semester', '0')";
  $result = mysql_query($query, $connect);
  mysql_close($connect);
  print "<h1>".$id."의 신청이 정상적으로 입력되었습니다.</h1>";
  print "<button onclick=\"window.open('zero_fee_u.html','self')\"> 돌아가기  </button>";
?>
