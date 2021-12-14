<?php
	session_start();

	$userid="";
	
	if(isset($_SESSION['userid'])) $userid = $_SESSION['userid'];

?>
<!doctype html>
<html>
    <style>
	    * { margin : 0; }
	    img{
            margin : 20px;
            width : 200px;
            height : 80px;
        }
        nav{
            position : fixed;
            height : 100%;
            width : 18%;
            float : left;
            background-color:#d5fefd;
        }
        #navigat li{
            list-style: none;
            cursor:pointer;
        }
        #navigat li:hover{
            transform : translate(20px);
        }
        #navigat li{
            margin-top : 20px;
            color : black;
            font-size : 17px;
        }
        #Menu {
            margin-top : 30px;
            height: 30px;
            width: 850px;
            background-color:#ffffff;
        }
        #Menu ul li {
            list-style: none;
            color: white;
            background-color: #2d2d2d;
            float: left;
            line-height: 30px;
            vertical-align: middle;
            text-align: center;
            cursor:pointer;
        }
        #Menu .menuLink {
            text-decoration:none;
            color: white;
            display: block;
            width: 150px;
            font-size: 12px;
            font-weight: bold;
            font-family: "Trebuchet MS", Dotum, Arial;
        }
        #Menu .menuLink:hover {
            color: white;
            background-color: #4d4d4d;
        }
        section{
            width : 82%;
            height : 100%;
            float : right;
        }
        #wrap {
            position:relative;
            width:1500px;
            height:1500px;
            left:50%;
            transform: translate(-50%, 0);
        }
        #wrap > div {
            width:600px;
            height:600px;
            border:1px solid #333;
            float:left;
            margin: 30px;
            box-sizing:border-box;
        }
        #wrap > div:nth-child(3) {
            clear:both;
        }
        #scheduler{
            background-color : black;
        }
        #notice{
            background-color : violet;
        }
        #calender{
            background-color : cyan;
        }
        table{
            margin-top: 50px;
        }
    </style>
</head>
<body>
	<nav>
		<p>
			<img onclick="window.open('home.html','_self')" src = 'logo.png' style="cursor: pointer;">
		</p>
		<ul id="navigat">
			<li onclick="window.open('home.html','_self')">ㅡ HOME</li><br>

		<!-- 비 로그인시 로그인/학번등록 -->
		<?php																		
			if(!$userid) {															
		?>
			<li onclick="window.open('login.html','_self')">ㅡ 로그인/학번등록 </li><br>

		<!-- 로그인시 접속 학번출력 및 로그아웃 -->
		<?php } else { ?>														
			<li>ㅡ 접속 학번 : <?php print "$userid" ?> </li><br>						
			<li onclick="window.open('logout.php','_self')">ㅡ 로그아웃 </li><br>
		<?php } ?>


		<!-- 비 로그인시 알림창(alert 스크립트) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">ㅡ 학적 관리</li><br>					
																							
		<!-- 로그인시 기능동작 -->
		<?php } else { ?>															
			<li onclick="window.open('grade1.html','_self')">ㅡ 학적 관리</li><br>
		<?php } ?>


		<!-- 비 로그인시 알림창(alert 스크립트) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">ㅡ 성적 조회</li><br>		

		<!-- 로그인시 기능동작 -->
		<?php } else { ?>	
			<li onclick="window.open('grades1.html','_self')">ㅡ 성적 조회</li><br>
		<?php } ?>


		<!-- 비 로그인시 알림창(alert 스크립트) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">ㅡ 0원 등록 신청</li><br>						
																							
		<!-- 로그인시 기능동작 -->
		<?php } else { ?>	
            <li onclick="window.open('zero_fee_m','_self')">ㅡ 0원 등록 신청</li><br>
		<?php } ?>


		<!-- 비 로그인시 알림창(alert 스크립트) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">ㅡ 등록 내역 조회</li><br>					
																							
		<!-- 로그인시 기능동작 -->
		<?php } else { ?>	
			<li onclick="window.open('lookup_fee.html','_self')">ㅡ 등록 내역 조회</li><br>
		<?php } ?>


		<!-- 비 로그인시 알림창(alert 스크립트) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">ㅡ 휴·복학 신청</li><br>
					
																							
		<!-- 로그인시 기능동작 -->
		<?php } else { ?>	
            <li onclick="window.open('leave_page.html','_self')">ㅡ 휴·복학 신청</li><br>
		<?php } ?>


		<!-- 비 로그인시 알림창(alert 스크립트) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">ㅡ 수강 계획서 조회</li><br>
					
																							
		<!-- 로그인시 기능동작 -->
		<?php } else { ?>	
			<li onclick="window.open('sugang.html','_self')">ㅡ 수강 계획서 조회</li><br>
		<?php } ?>

		</ul>
    	</nav>

	<section>

		<nav  id="Menu">
			<ul>
				<li onclick="window.open('grade1.html','_self')"><a class="menuLink">기본 정보</a></li>
                    			<li onclick="window.open('grade3.html','_self')"><a class="menuLink" href="#">등록 내역</a></li>
                     			<li onclick="window.open('grade4.html','_self')"><a class="menuLink" href="#">장학 내역</a></li>
			</ul>
		</nav>
<?
 	$database = "PBL_DB";
 	$connect=mysql_connect('localhost','root', 'apmsetup')or die("mySQL 서버 연결 Error!");
	mysql_select_db($database, $connect);
	$query = "select * from  ".$_SESSION['userid']."grade";
	$result = mysql_query($query,$connect);
	$sdtinfo=mysql_fetch_row($result);

	if(!($sdtinfo[1] == "")) {
		print '<form name="form" method="post" action="./submit.php">
		<p align=right><INPUT type="submit" value="조회"></p>
		</form>

		<form name="form" method="post" action="./grade1.php">
		<p align=right><INPUT type="submit" value="저장"></p>
		<table border=1 width=700 height=200 align=center>
			<tr>
			<td colspan=2 rowspan=5 align=center><img src="asd.jpg" width=100 height=150></td>
			<td colspan=2 align=center>이름</td>
			<td colspan=3 align=center><INPUT type="text" size=20 name="name" value='.$sdtinfo[0].' disabled></td>
			<td colspan=2 align=center>학번</td>
			<td colspan=3 align=center><INPUT type="text" size=20 name="num" value='.$sdtinfo[1].' disabled></td>
			</tr>

			<tr>
			<td colspan=2 align=center>성별</td>
			<td colspan=3 align=center><INPUT type="text" size=20 name="gender" value='.$sdtinfo[2].' disabled></td>
			<td colspan=2 align=center>주민번호</td>
			<td colspan=3 align=center><INPUT type="text" size=20 name="register" value='.$sdtinfo[3].' disabled></td>
			</tr>

			<tr>
			<td colspan=2 align=center>대학</td>
			<td colspan=3 align=center><INPUT type="text" size=20 name="school" value='.$sdtinfo[4].' disabled></td>
			<td colspan=2 align=center>학과</td>
			<td colspan=3 align=center><INPUT type="text" size=20 name="major" value='.$sdtinfo[5].' disabled></td>
			</tr>

			<tr>
			<td colspan=2 align=center>학생구분</td>
			<td colspan=3 align=center><INPUT type="text" size=20 name="sort" value='.$sdtinfo[6].' disabled></td>
			<td colspan=2 align=center>학년</td>
			<td colspan=3 align=center><INPUT type="text" size=20 name="grade" value='.$sdtinfo[7].' disabled></td>
			</tr>

			<tr>
			<td colspan=2 align=center>학적</td>
			<td colspan=3 align=center><INPUT type="text" size=20 name="record" value='.$sdtinfo[8].' disabled></td>
			<td colspan=2 align=center>최종학적</td>
			<td colspan=3 align=center><INPUT type="text" size=20 name="lastrecord" value='.$sdtinfo[9].' disabled></td>
			</tr>

			<tr>
			<td align=center>주소</td>
			<td align=center colspan=10><INPUT type="text" size=80 name="address" value='.$sdtinfo[10].' disabled></td>
			</tr>

			<tr>
			<td align=center>상세주소</td>
			<td align=center colspan=10><INPUT type="text" size=80 name="detailaddress" value='.$sdtinfo[11].' disabled></td>
			</tr>

			<tr>
			<td align=center>연락처</td>
			<td align=center colspan=10><INPUT type="text" size=80 name="phone" value='.$sdtinfo[12].' disabled></td>
			</tr>

			<tr>
			<td align=center>휴대폰</td>
			<td align=center colspan=10><INPUT type="text" size=80 name="subphone" value='.$sdtinfo[13].' disabled></td>
			</tr>

			<tr>
			<td align=center>이메일</td>
			<td align=center colspan=10><INPUT type="text" size=80 name="mail" value='.$sdtinfo[14].' disabled></td>
			</tr>

		</table>
		</form>';
	}
	mysql_close($connect);
?>