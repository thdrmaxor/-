<?php
  #���Ǻ��� ��(���̵�) ����ִ� ����
  session_start();
  $_SESSION["userid"]="";
  unset($_SESSION["userid"]);
  
  echo("
       <script>
          location.href = 'home.html';
         </script>
       ");
?>