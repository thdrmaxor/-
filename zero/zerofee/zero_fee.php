<?
  session_start();
  $id = $_SESSION['userid'];
  print "<HTML><head></head><body>";
  if($id == "admin"){	//������ ������ ���
     print "<form name='hiddenform' method='post' action='zero_fee_m.html'>";
     print "<input type='hidden' name='id' value='".$id."'>";     
  }
  else {			//�ܼ� �̿��� ������ ���
     print "<form name='hiddenform' method='post' action='zero_fee_u.html'>";
     print "<input type='hidden' name='id' value='".$id."'>";
  }
  print "</form><script> document.hiddenform.submit(); </script></body></html>";
?>
