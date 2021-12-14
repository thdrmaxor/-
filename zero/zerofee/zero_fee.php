<?
  session_start();
  $id = $_SESSION['userid'];
  print "<HTML><head></head><body>";
  if($id == "admin"){	//관리자 계정일 경우
     print "<form name='hiddenform' method='post' action='zero_fee_m.html'>";
     print "<input type='hidden' name='id' value='".$id."'>";     
  }
  else {			//단순 이용자 계정일 경우
     print "<form name='hiddenform' method='post' action='zero_fee_u.html'>";
     print "<input type='hidden' name='id' value='".$id."'>";
  }
  print "</form><script> document.hiddenform.submit(); </script></body></html>";
?>
