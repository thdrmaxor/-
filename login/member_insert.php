<?php

	#입력받은 아이디, 비밀번호 값 받아오기
    $id   = $_POST["id"];
    $pass = $_POST["password"];
              
	#DB 접속용 사용자 계정(ID: root, PW: apmsetup, DB이름: pbl_db) 변수에 저장
    $con = mysqli_connect("localhost", "root", "apmsetup", "pbl_db");
	
	#입력받은 아이디 값이 비었을 시 member_input.html로 돌아가는 구문
	if (!$id) {
		echo "
	      <script>
	          location.href = 'member_input.html';
	      </script>
		";
      }
	
	#입력받은 비밀번호 값이 비었을 시 member_input.html로 돌아가는 구문
    else if (!$pass) {  
		echo "
	      <script>
	          location.href = 'member_input.html';
	      </script>
		";
      }	
	else{
	
	#입력받은 아이디, 비밀번호 값이 정상일 경우 members 테이블에 값을 저장해주는 구문
	$sql = "insert into members(id, password) ";
	$sql .= "values('$id', '$pass')";

	mysqli_query($con, $sql);
    mysqli_close($con);     

	#입력값 DB에 저장 후 home 화면으로 되돌아가는 구문
    echo "
	      <script>
	          location.href = 'home.html';
	      </script>
	  ";
	}
?>

   
<!-- 테이블 코드 양식
create database pbl_db;
use pbl_db;

create table members ( 
id char(10) not null, password char(30) not null, primary key(id)); 
-->