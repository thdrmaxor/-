<?php
  #세션변수 값(아이디) 비워주는 구문
  session_start();
  $_SESSION["userid"]="";
  unset($_SESSION["userid"]);
  
  echo("
       <script>
          location.href = 'home.html';
         </script>
       ");
?>