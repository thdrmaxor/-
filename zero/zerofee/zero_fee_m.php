<?
  $database="PBL_DB";
  $connect=mysql_connect('localhost','root','apmsetup') or die("mySQL ���� ���� Error!");
  mysql_select_db($database, $connect);
  $queryo = "select semester from zerofee where sno = ".$sno.";";
  if($_POST['flag1'] != ''){
     $sno = $_POST['flag1'];
     $query = "update zerofee set approval = 1 where sno = '$sno'";
     $queryo = "select semester from zerofee where sno = '$sno'";
     $result = mysql_query($queryo, $connect);
     $row = mysql_fetch_array($result);
     $semester = $row['semester'];
     $queryt = "update fee set scholar = 4000000, paid = 0, unpaid = 0, status = '�ϳ�' where sno = '$sno' and semester = '$semester'";
     mysql_query($queryt, $connect);
     print "<h1>".$sno."�� ��û�� ���������� ���� �Ͽ����ϴ�.</h1>";

  }
  else if($_POST['flag2'] != ''){
     $sno = $_POST['flag2'];
     $query = "update zerofee set approval = 2 where sno = '$sno'";
     $queryo = "select semester from zerofee where sno = '$sno'";
     $result = mysql_query($queryo, $connect);
     $row = mysql_fetch_array($result);
     $semester = $row['semester'];
     $queryt = "update fee set scholar = 0, paid = 0, unpaid = 4000000, status = '�̳�' where sno = '$sno' and semester = '$semester'";
     mysql_query($queryt, $connect);
     print "<h1>".$sno."�� ��û�� ���������� ���� �Ͽ����ϴ�.</h1>";

  }
  else { 
     print"<br> <h1>���� �߻�  ���� ����</h1> <br>";
  }

  mysql_query($query, $connect);
  mysql_close($connect);;
  print "<button onclick=\"window.open('zero_fee_m.html','self')\"> ���ư���  </button>";
?>