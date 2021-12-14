<?
	$my_select = $_POST["select"];
 	$database = "PBL_DB";
 	$connect=mysql_connect('localhost','root', 'apmsetup')or die("mySQL 서버 연결 Error!");
	mysql_select_db($database, $connect);
	$query = "select * from PBL_PROBLEMS where name='$my_search'";
	$result = mysql_query($query,$connect);
	$sdtinfo=mysql_fetch_row($result);

	if($sdtinfo[0] == 'select1') {
		print "<HTML><head><META http-equiv='refresh' content='0; url=./grades1.html'></head></HTML>";
	}
	else if($sdtinfo[0] == 'select2') {
		print "<HTML><head><META http-equiv='refresh' content='0; url=./grades2.html'></head></HTML>";
	}
	else if(!($sdtinfo[0] == 'select3') {
		print "<HTML><head><META http-equiv='refresh' content='0; url=./grades3.html'></head></HTML>";
	}
	else {
		print "<HTML><head><META http-equiv='refresh' content='0; url=./grades4.html'></head></HTML>";	
	}

	mysql_close($connect);
?>
