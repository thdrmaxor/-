<?
  session_start();
  $database="PBL_DB";
  $connect=mysql_connect('localhost','root','apmsetup') or die("mySQL ���� ���� Error!");
  mysql_select_db($database, $connect);
  $id = $_SESSION["userid"];
  $semester = $_POST["semester"];
  $query = "insert into zerofee values('$id', '$semester', '0')";
  $result = mysql_query($query, $connect);
  mysql_close($connect);
  print "<h1>".$id."�� ��û�� ���������� �ԷµǾ����ϴ�.</h1>";
  print "<button onclick=\"window.open('zero_fee_u.html','self')\"> ���ư���  </button>";
?>
