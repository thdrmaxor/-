<?php
    session_start();

    $userid="";

    if(isset($_SESSION['userid'])) $userid = $_SESSION['userid'];

?>
<!doctype html>
<html>
    <head>
         <link rel="stylesheet" href="sugang.css">
    </head>
    <body>
        <form action="sugang.php" method="post">
            <nav style='float:left; background-color:#d5fefd; height:100%; width:18%; position:fixed; min-width:200px'>
              <p>
                  <img src="logo.png" style='margin:20px; width:200px; height:80px'>
              </p>
              <ul id="navigat" style='margin-top:20px; font-size:17px; list-style: none; cursor:pointer;' >
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

            <section style='width:82%; height:100%; float:right'>
                <div id="wrap" style='height:100%; width:81%; margin:50px'>
                    <div id="search" style='width:100%; height:20%'>
                        > ������ȹ�� ��ȸ <input type="submit" value="��ȸ" id="sub"><br>
                        <div id="search_code" style='height:30px; border: 1px solid black; background-color:#cceeff; margin:10px'>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            �⵵ <input type="text" name='year'>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            �����ڵ� <input type="text" name='code'>
                        </div>
                    </div>

                    <div id="list" style='width:50%; height:550px; float:left; margin-top:30px'>
                            <? include "sugang_2.php" ?>
                    </div>
                    <div id="show_pdf" style='width:450px; height:1000px; float:left; margin-top:30px'>
                            <iframe name="iframe1" style='width:750px; height:1000px'></iframe>
                    </div>
                </div>
            </section>
        </form>
    </body>
</html>