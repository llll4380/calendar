<?php
    session_start();
    error_reporting(0);
    header('Content-type:text/html;charset=utf-8');

    ini_set('date.timezone','Asia/Shanghai');
    //修改页面编码
    //如果没有传入年份则获取当前系统年份
    $year  =isset($_REQUEST['year'])?$_REQUEST['year']:date('Y');
    //如果没有传入月份则获取当前系统月份
    $month =isset($_REQUEST['month'])?$_REQUEST['month']:date('m');
    //获取当前月有多少天
    $days  =date('t',strtotime("{$year}-{$month}-1"));
    //当前1号是星期几
    $week  =date('w',strtotime("{$year}-{$month}-1"));
    $id    =$_SESSION['id'];
    $_SESSION['year']=$year;
    $_SESSION['month']=$month;

    $ym      =$year.$month;//选中的年月，如202002。
    $now_ym  =date('Ym');
    $now_ymd =date('Ymd');


    echo "<h2 class='ym'>{$year}年{$month}月</h2>";
    ?>
    <script type="text/javascript">
        var year=<?php echo "$year"; ?>;
        var month=<?php echo "$month"; ?>;
    </script>
    <div>
    <!-- 输出日期表格 -->
    <table width='800px' height='600px' border='1px' class="date_t">
        <tr>
            <th class="week">周日</th>
            <th class="week">周一</th>
            <th class="week">周二</th>
            <th class="week">周三</th>
            <th class="week">周四</th>
            <th class="week">周五</th>
            <th class="week">周六</th>
        </tr>

    <?php       //铺表格
    for($i=1-$week;$i<=$days;){
        echo "<tr>";
        for($j=0;$j<7;$j++){
            if($i>$days || $i<=0){
                echo "<td>&nbsp;</td>";
            }else{                 
            echo"<td valign='top' class='date_td' id='d_{$i}'>";
            echo"<div class='quarter_td d-day' id='d-{$i}'>{$i}</div>";           
            echo "</td>";        
            }
            $i++;
         }        
         echo "</tr>";
    }  
    ?>
    </table>  
    <div class="right">
        <section id="rc_content">
              <div id="rc_container">
                  日程的内容
              </div>
        </section>
    </div>         
</div>


    <script type="text/javascript" src="./jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./date.js"></script>  
