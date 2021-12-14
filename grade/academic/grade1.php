<?php
	session_start();
	$my_name = $_POST["name"];
	$my_num = $_POST["num"];
	$my_gender = $_POST["gender"];
	$my_register = $_POST["register"];
	$my_school = $_POST["school"];
	$my_major = $_POST["major"];
	$my_sort = $_POST["sort"];
	$my_grade = $_POST["grade"];
	$my_record = $_POST["record"];
	$my_lastrecord = $_POST["lastrecord"];
	$my_address = $_POST["address"];
	$my_detailaddress = $_POST["detailaddress"];
	$my_phone = $_POST["phone"];
	$my_subphone = $_POST["subphone"];
	$my_mail = $_POST["mail"];
	
function insert_Data($answer1, $answer2, $answer3, $answer4, $answer5, $answer6, $answer7, $answer8, $answer9, $answer10, $answer11, $answer12, $answer13, $answer14, $answer15) {
	$database = "PBL_DB";
	$connect=mysql_connect('localhost', 'root', 'apmsetup')
		or die("mySQL 서버 연결 Error!");
	mysql_select_db($database, $connect);
	
	$query = "insert into ".$_SESSION['userid']."grade values('$answer1', '$answer2', '$answer3', '$answer4', '$answer5', '$answer6', '$answer7', '$answer8', '$answer9', '$answer10', '$answer11', '$answer12', '$answer13', '$answer14', '$answer15')";
	echo "$query";
	$result = mysql_query($query, $connect);

	mysql_close($connect);

	print "<HTML><head><META http-equiv='refresh' content='0; url=./grade1.html'></head></HTML>";

}

if(empty($_POST['mode'])) {
	$my_name = $_POST["name"];
	$my_num = $_POST["num"];
	$my_gender = $_POST["gender"];
	$my_register = $_POST["register"];
	$my_school = $_POST["school"];
	$my_major = $_POST["major"];
	$my_sort = $_POST["sort"];
	$my_grade = $_POST["grade"];
	$my_record = $_POST["record"];
	$my_lastrecord = $_POST["lastrecord"];
	$my_address = $_POST["address"];
	$my_detailaddress = $_POST["detailaddress"];
	$my_phone = $_POST["phone"];
	$my_subphone = $_POST["subphone"];
	$my_mail = $_POST["mail"];

if($error != "") {
?>
	<html>
	<head><title>이름 검색 오류</title>
	<META http-equiv='Content-Type' content='text/html;charset=EUR-KR'>
	<META name ='Author' content='이어진'>
	<META name='keyword' content='검색'>
 	</head>
	<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
	<p align="center"><font size="5"><b>오류</b></font><br>
	 &nbsp;
	<div align="center"><table border="0">
	<tr>
	<td>
<? php>
	print "$error</td></tr></table></div></p>\n";
	print "<center>\n";
	print "<form action='./grade1.php' method=post>\n";
	print "<input type='hidden' name='mode' value='input'>\n";
	print "<input type='button' value='다시 입력' onClick=javascript:history.back()>\n</form></center>";
	print "</body>\n</html>\n";
}
else insert_Data($my_name, $my_num, $my_gender, $my_register, $my_school, $my_major, $my_sort, $my_grade, $my_record, $my_lastrecord, $my_address, $my_detailaddress, $my_phone, $my_subphone, $my_mail);
}
else insert_Data($_POST['name'],$_POST['num'],$_POST['gender'],$_POST['register'],$_POST['school'],$_POST['major'],$_POST['sort'],$_POST['grade'],$_POST['record'],$_POST['lastrecord'],$_POST['address'],$_POST['detailaddress'],$_POST['phone'],$_POST['subphone'],$_POST['mail']);

?>