<?
   session_start();
   $id = $_SESSION['userid'];
   //  $id = "admin";	//�����ڰ� ��ȸ�� ���

   print "<HTML><head></head><body>";
   if($id == "admin"){	//������ ������ ���
      $connect=mysql_connect('localhost','root','apmsetup') or die("mySQL ���� ���� Error!");
      mysql_select_db("pbl_db", $connect);
      $query = "select * from fee;";
      $result = mysql_query($query, $connect);
      print "<h1 align='center'><b>��ü ��� ��ȸ(�����ڿ�)</b></h1>";
   }
   else if ($id != "") {				//�ܼ� �̿��� ������ ���
      $connect=mysql_connect('localhost','root','apmsetup') or die("mySQL ���� ���� Error!");
      mysql_select_db("pbl_db", $connect);
      $query = "select * from fee where sno='".$id."'";
      $result = mysql_query($query, $connect);
      print "<h3 align='center'><b>".$id."�� ��ϳ��� ��ȸ(����ڿ�)</b></h3>";
   }

   print "<table border=1 align='center'>";
   print "<tr bgcolor = 'C0CDEF'><th>�⵵</th><th>�г�-�б�</th><th>�а�</th><th>��ϱ�</th><th>���б�</th><th>���Ծ�</th><th>�̳��Ծ�</th><th>���Ա���</th></tr>";
   while($row = mysql_fetch_array($result)){
      print"<tr width='300'>";
      print"<td>".$row['year']."</td>";
      print"<td>".$row['semester']."</td>";
      print"<td>".$row['department']."</td>";
      print"<td>".$row['fee']."</td>";
      print"<td>".$row['scholar']."</td>";
      print"<td>".$row['paid']."</td>";
      print"<td>".$row['unpaid']."</td>";
      print"<td>".$row['status']."</td>";
   }
   print"</table>";
   mysql_close($connect);
?>
