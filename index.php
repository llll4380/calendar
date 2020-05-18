<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>日历主页面</title>
        <meta charset="UTF-8">
        <!-- 框架的bootstrap css文件 -->
        <link rel="stylesheet" href="./bootstrap.css">
        <!-- jquery文件 bootstrap(bs)是依赖于jq来实现的   一般情况jq文件要在bs的js文件之前引入-->
        <script src="./jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="./all.css">

    </head>
    <body>
        <?php 
            session_start();  
            ini_set('date.timezone','Asia/Shanghai');
            //修改页面编码
            header("Content-type: text/html; charset=utf-8");
            //获取当前系统年份
            $nowyear=date('Y');
            //获取当前系统月份
            $nowmonth=date('m');
            if(isset($_SESSION['year'])){
                $selyear=$_SESSION['year'];
            }else{
                $selyear=$nowyear;
            }
            if(isset($_SESSION['month'])){
                $selmonth=$_SESSION['month'];
            }else{
                $selmonth=$nowmonth;
            }
            //获取当前系统年份
            $year=$selyear;
            //获取当前系统月份
            $month=$selmonth;
            if($month==1){
                $premonth = 12;
                $preyear = $year - 1;
            }else{
                $premonth = $month-1;
                if($premonth<10){
                    $premonth='0'.$premonth;
                }
                $preyear = $year;
            }

            //实现下一月和下一年
            if($month==12){
                $nextmonth = '01';
                $nextyear = $year + 1;
            }else{
                $nextmonth = $month + 1;
                if($nextmonth<10){
                    $nextmonth='0'.$nextmonth;
                }
                $nextyear = $year;
            }
            $Authority=$_SESSION['Authority'];
            //权限等级，3为超级管理员，2为导师，1为要做毕设的学生，0为普通用户
            $calendar_now=$_SESSION['calendar_now'];

        ?>
        <!--  日历表主页面  -->
        <div class="main">   
            <!--  主页面左边列表  -->   

            <!--  主页面中间日历表格  --> 
            <div class="date">
                    <section id="content">
                          <div id="container">
                              首页的内容
                          </div>
                    </section>
            </div>   
        <!-- 上一月、下一月的实现  -->
        <div class="btn-group Jump" role="group" aria-label="..." id="Jump">
            <a href="" name="<?php echo"$preyear$premonth";?>"   id="prem" ><button type="button" class="btn btn-default">上个月</button></a>
            <a href="" name="<?php echo"$nowyear$nowmonth";?>"   id="nowm"><button type="button" class="btn btn-default">回到本月</button></a>
            <a href="" name="<?php echo"$nextyear$nextmonth";?>" id="nextm"><button type="button" class="btn btn-default">下个月</button></a>
            <button type="button" class="btn btn-default jumpM" id='jumpM' style="float: right;">跳转月份</button>
        </div>

        <!-- 跳转月份窗口 -->
        <div class="jumpM_W" id="jumpM_W">
            <h4><font color="white">选择跳转的月份：</font></h4>         
            <div class="input-group add_S_W_input">
                <input type="text" id="jM_year" class="form-control" placeholder="年" aria-describedby="basic-addon1">
                <br>
                <br>
                <input type="text" id="jM_month" class="form-control" placeholder="月" aria-describedby="basic-addon1">
            </div>
            <div class="add_S_W_btu">
                <button id="jM_submit" type="submit" class="btn btn-success">提交</button>
                <button id="close4" type="button" class="btn btn-danger" style="margin-left: 40px;">关闭</button>
            </div>
        </div> 
        
        <!-- 引入JQ库 -->
        <script type="text/javascript" src="./jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="./main.js"></script> 
        <script type="text/javascript">
            var selyear= <?php echo $selyear; ?>;
            var selmonth=<?php echo $selmonth; ?>;
        </script> 
        
    </body>     
</html>
