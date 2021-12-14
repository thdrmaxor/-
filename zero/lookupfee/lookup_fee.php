<?
   session_start();
   $id = $_SESSION['userid'];
   //  $id = "admin";	//관리자가 조회할 경우

   print "<HTML><head></head><body>";
   if($id == "admin"){	//관리자 계정일 경우
      $connect=mysql_connect('localhost','root','apmsetup') or die("mySQL 서버 연결 Error!");
      mysql_select_db("pbl_db", $connect);
      $query = "select * from fee;";
      $result = mysql_query($query, $connect);
      print "<h1 align='center'><b>전체 등록 조회(관리자용)</b></h1>";
   }
   else if ($id != "") {				//단순 이용자 계정일 경우
      $connect=mysql_connect('localhost','root','apmsetup') or die("mySQL 서버 연결 Error!");
      mysql_select_db("pbl_db", $connect);
      $query = "select * from fee where sno='".$id."'";
      $result = mysql_query($query, $connect);
      print "<h3 align='center'><b>".$id."의 등록내역 조회(사용자용)</b></h3>";
   }

   print "<table border=1 align='center'>";
   print "<tr bgcolor = 'C0CDEF'><th>년도</th><th>학년-학기</th><th>학과</th><th>등록금</th><th>장학금</th><th>납입액</th><th>미납입액</th><th>납입구분</th></tr>";
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
