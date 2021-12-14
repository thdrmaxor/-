<?
    session_start();
    $con = mysql_connect('localhost','root','apmsetup')
            or die("Connect error");
        
    mysql_select_db('pbl_db',$con) or die("Unable to connet to SQL Server");

    $year = $_POST['year'];
    $code = $_POST['code'];

    if(!empty($year) && !empty($code))
    {
        $query = 'select * from plan where year='.$year.'code='.$code;
        $result = mysql_query($query,$con);
        $num = mysql_num_rows($result);
        print " O 수강목록 리스트 [ 총 ".$num." 개의 과목<br>
                <table id='sugang_table' border=1 style='text-align:center; font-size:13px'><tr>
                <th>년도
                </th><th>학기</th><th>과목코드</th>
                <th>과목명</th><th>이수구분</th><th>대표교수</th></tr>";
        
        for($i=0; $i < $num; $i++)
        {
            $ans = mysql_fetch_row($result);
            
            print "<tr>
                        <td>".$ans[0]."</td>
                        <td>".$ans[1]."</td>
                        <td>".$ans[4]."</td>
                        <td>".$ans[5]."</td>
                        <td>".$ans[6]."</td>
                        <td>".$ans[7]."</td>
                    </tr>";
            
        }
        print "</table>";
    }
    else if(!empty($year) && empty($code))
    {
        $query = 'select * from plan where year='.$year;
        $result = mysql_query($query,$con);
        $num = mysql_num_rows($result);

        print " O 수강목록 리스트 [ 총 ".$num." 개의 과목<br>
                <table id='sugang_table' border=1 style='text-align:center; font-size:13px'><tr>
                <th>년도
                </th><th>학기</th><th>과목코드</th>
                <th>과목명</th><th>이수구분</th><th>대표교수</th></tr>";
        
        $save = array();

        for($i=0; $i < $num; $i++)
        {
            $ans = mysql_fetch_row($result);
            
            print "<tr>
                        <td>".$ans[0]."</td>
                        <td>".$ans[1]."</td>
                        <td>".$ans[4]."</td>
                        <td>".$ans[5]."</td>
                        <td>".$ans[6]."</td>
                        <td>".$ans[7]."</td>
                    </tr>";
            
        }
        print "</table>";
    }
    else if(empty($year) && !empty($code))
    {
        $query = 'select * from plan where code='.$code;
        $result = mysql_query($query,$con);
        $num = mysql_num_rows($result);
        
        print " O 수강목록 리스트 [ 총 ".$num." 개의 과목<br>
                <table id='sugang_table' border=1 style='text-align:center; font-size:13px'><tr>
                <th>년도
                </th><th>학기</th><th>과목코드</th>
                <th>과목명</th><th>이수구분</th><th>대표교수</th></tr>";
        
        $save = array();

        for($i=0; $i < $num; $i++)
        {
            $ans = mysql_fetch_row($result);
            
            print "<tr>
                        <td>".$ans[0]."</td>
                        <td>".$ans[1]."</td>
                        <td>".$ans[4]."</td>
                        <td>".$ans[5]."</td>
                        <td>".$ans[6]."</td>
                        <td>".$ans[7]."</td>
                    </tr>";
            
        }
        print "</table>";
    }
    else
    {
        $query = 'select * from plan';
        $result = mysql_query($query,$con);
        $num = mysql_num_rows($result);

        $arr = array();

        print " O 수강목록 리스트 [ 총 ".$num." 개의 과목<br>
                <table id='sugang_table' border=1 style='text-align:center; font-size:13px'><tr>
                <th>년도
                </th><th>학기</th><th>과목코드</th>
                <th>과목명</th><th>이수구분</th><th>대표교수</th><th>강의계획서 보기</th></tr>";

        for($i=0; $i < $num; $i++)
        {
            $ans = mysql_fetch_row($result);
            $arr[$i] = $ans[4];
            print "<tr>
                        <td>".$ans[0]."</td>
                        <td>".$ans[1]."</td>
                        <td>".$ans[4]."</td>
                        <td>".$ans[5]."</td>
                        <td>".$ans[6]."</td>
                        <td>".$ans[7]."</td>
                        <td><a href=$ans[4].pdf target='iframe1'>보기</a></td>
                   </tr>";
        }
        print "</table>";
    }
    mysql_close($con);
?>