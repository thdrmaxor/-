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
			<li onclick="window.open('home.html','_self')">�� HOME</li><br>

<!-- �� �α��ν� �α���/�й���� -->
		<?php																		
			if(!$userid) {															
		?>
			<li onclick="window.open('login.html','_self')">�� �α���/�й���� </li><br>

		<!-- �α��ν� ���� �й���� �� �α׾ƿ� -->
		<?php } else { ?>														
			<li>�� ���� �й� : <?php print "$userid" ?> </li><br>						
			<li onclick="window.open('logout.php','_self')">�� �α׾ƿ� </li><br>
		<?php } ?>


		<!-- �� �α��ν� �˸�â(alert ��ũ��Ʈ) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">�� ���� ����</li><br>					
																							
		<!-- �α��ν� ��ɵ��� -->
		<?php } else { ?>															
			<li onclick="window.open('grade1.html','_self')">�� ���� ����</li><br>
		<?php } ?>


		<!-- �� �α��ν� �˸�â(alert ��ũ��Ʈ) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">�� ���� ��ȸ</li><br>		

		<!-- �α��ν� ��ɵ��� -->
		<?php } else { ?>	
			<li onclick="window.open('grades1.html','_self')">�� ���� ��ȸ</li><br>
		<?php } ?>


		<!-- �� �α��ν� �˸�â(alert ��ũ��Ʈ) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">�� 0�� ��� ��û</li><br>						
																							
		<!-- �α��ν� ��ɵ��� -->
		<?php } else { ?>	
            <li onclick="window.open('zero_fee_m','_self')">�� 0�� ��� ��û</li><br>
		<?php } ?>


		<!-- �� �α��ν� �˸�â(alert ��ũ��Ʈ) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">�� ��� ���� ��ȸ</li><br>					
																							
		<!-- �α��ν� ��ɵ��� -->
		<?php } else { ?>	
			<li onclick="window.open('lookup_fee.html','_self')">�� ��� ���� ��ȸ</li><br>
		<?php } ?>


		<!-- �� �α��ν� �˸�â(alert ��ũ��Ʈ) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">�� �ޡ����� ��û</li><br>
					
																							
		<!-- �α��ν� ��ɵ��� -->
		<?php } else { ?>	
            <li onclick="window.open('leave_page.html','_self')">�� �ޡ����� ��û</li><br>
		<?php } ?>


		<!-- �� �α��ν� �˸�â(alert ��ũ��Ʈ) -->
		<?php																			
			if(!$userid) {															
		?>
			<li onclick="alertFunction()">�� ���� ��ȹ�� ��ȸ</li><br>
					
																							
		<!-- �α��ν� ��ɵ��� -->
		<?php } else { ?>	
			<li onclick="window.open('sugang.html','_self')">�� ���� ��ȹ�� ��ȸ</li><br>
		<?php } ?>

		</ul>
    	</nav>

	<section>

		<nav  id="Menu">
			<ul>
				<li onclick="window.open('grade1.html','_self')"><a class="menuLink">�⺻ ����</a></li>
                    			<li onclick="window.open('grade3.html','_self')"><a class="menuLink" href="#">��� ����</a></li>
                     			<li onclick="window.open('grade4.html','_self')"><a class="menuLink" href="#">���� ����</a></li>
			</ul>
		</nav>
<?
 	$database = "PBL_DB";
 	$connect=mysql_connect('localhost','root', 'apmsetup')or die("mySQL ���� ���� Error!");
	mysql_select_db($database, $connect);
	$query = "select * from  ".$_SESSION['userid']."register";
	$result = mysql_query($query,$connect);
	$sdtinfo = mysql_fetch_row($result);

	if(!($sdtinfo[0] == "")) {
		print '<form name="form" method="post" action="./submit3.php">
		<p align=right><INPUT type="submit" value="��ȸ">
		</form>

		<table border=1 width=1000 height=100 align=center>
			<tr bgcolor="C0CDEF">
			<td colspan=1 align=center>No</td>
			<td colspan=1 align=center>�⵵</td>
			<td colspan=1 align=center>�б�</td>
			<td colspan=1 align=center>�г�</td>
			<td colspan=2 align=center>��������</td>
			<td colspan=2 align=center>�հ�</td>
			</tr>

			<tr>
			<td colspan=1 align=center>'.$sdtinfo[0].'</td>
			<td colspan=1 align=center>'.$sdtinfo[1].'</td>
			<td colspan=1 align=center>'.$sdtinfo[2].'</td>
			<td colspan=1 align=center>'.$sdtinfo[3].'</td>
			<td colspan=2 align=center>'.$sdtinfo[4].'</td>
			<td colspan=2 align=center>'.$sdtinfo[5].'</td>
			</tr>';

			for($i=0; $i<7; $i++) {
				$sdtinfo=mysql_fetch_array($result);
				print'<tr>
				<td colspan=1 align=center>'.$sdtinfo[0].'</td>
				<td colspan=1 align=center>'.$sdtinfo[1].'</td>
				<td colspan=1 align=center>'.$sdtinfo[2].'</td>
				<td colspan=1 align=center>'.$sdtinfo[3].'</td>
				<td colspan=2 align=center>'.$sdtinfo[4].'</td>
				<td colspan=2 align=center>'.$sdtinfo[5].'</td>
				</tr>';
			}
		print'</table>';
	}
	mysql_close($connect);
?>