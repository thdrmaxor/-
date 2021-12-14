<html>
<head>
<meta charset="utf-8">
</head>
</html>

<?php

#입력받은 아이디 비밀번호 받아오기
$id   = $_POST["id"];
$pass = $_POST["password"];

# DB 접속 계정 입력 및 쿼리문 DB로 전송
$con = mysqli_connect("localhost", "root", "apmsetup", "pbl_db");
$sql = "select * from members where id='$id'";
$result = mysqli_query($con, $sql);

#결과값 num_match에 저장
$num_match = mysqli_num_rows($result);

#입력 아이디가 DB에 없을 시 출력구문
if (!$num_match) {
  echo ("
           <script>
             window.alert('등록되지 않은 회원입니다.')
             history.go(-1)
           </script>
         ");
} else {

  #DB 전달값 저장 구문
  $row = mysqli_fetch_array($result);
  $db_pass = $row["password"];

  mysqli_close($con);

  #입력 비밀번호가 DB에 없을 시 출력구문
  if ($pass != $db_pass) {

    echo ("
              <script>
                window.alert('비밀번호가 틀렸습니다.')
                history.go(-1)
              </script>
           ");
    exit;
  } else {

	#입력된 아이디와 비밀번호가 일치할 시 아이디를 세션변수에 저장
    session_start();
    $_SESSION["userid"] = $row["id"];
    echo ("
              <script>
                location.href = 'home.html';
              </script>
            ");
  }
}
?>

