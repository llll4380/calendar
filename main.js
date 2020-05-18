$(document).ready(function(){
    $("#container").remove();
    if (selmonth<10) {
      selmonth=0+''+selmonth;
    }
    $('#content').load('./date.php',{"year":selyear,"month":selmonth}).fadeIn('slow'); // 加载新内容,url地址与该地址下的选择器之间要有空格,表示该url下的#container
});


//跳转月份的窗口
$('#jumpM').on('click', function(e) { 
    $('#jumpM_W').show();
});

//跳转月份的窗口关闭
$('#close4').on('click', function(e) { 
    $('#jumpM_W').hide();
});

$('#Jump a').on('click', function(e) {                 
  e.preventDefault();  // 阻止链接跳转
  var ym = this.name;  // 保存点击的地址
  var year = ym.substr(0,4);
  var month = ym.substr(4); 
  var preyear;
  var premonth;
  var nextyear;
  var nextmonth;  
  if(month<10){
     month=month.slice(-1);
  }
  if(month==1){
    premonth = 12;
    preyear = year-1;
  }else{
    premonth = month-1;
    preyear = year;
  }

  //实现下一月和下一年
  if(month==12){
    nextmonth =1;
    nextyear = Number(year)+1;
  }else{
    nextmonth=Number(month)+1;
    nextyear=year;
  }
  if(premonth<10){
    premonth='0'+premonth;
  }
  if(nextmonth<10){
    nextmonth='0'+nextmonth;
  }
  if(month<10){
    month='0'+month;
  }
  var prembtn=preyear+""+premonth; 
  var nextmbtn=nextyear+""+nextmonth;     
  $('#prem').attr('name',prembtn)
  $('#nextm').attr('name',nextmbtn)   
  $("#container").remove();
  $('#content').load('./date.php',{"year":year,"month":month}).fadeIn('slow'); // 加载新内容,url地址与该地址下的选择器之间要有空格,表示该url下的#container
});


$('#jM_submit').on('click', function(e) {                 
  
  var year = $('#jM_year').val();
  var month = $('#jM_month').val();
  //console.log(year);
  if (year==''||month=='') {
    alert("不可以输入空");
  }else{
      // year= Number(year);
      // month= Number(month);
      // console.log(year);
      // console.log(month);  
      var arr_month=['1','2','3','4','5','6','7','8','9','10','11','12'];
      var flag =arr_month.indexOf(month);
      //console.log(flag);
      if ((1500<year)&&(year<3000)&&(flag!=-1)) {
        if (month<10) {
           month='0'+''+month;
        }
        var preyear;
        var premonth;
        var nextyear;
        var nextmonth;  
        if(month<10){
        month=month.slice(-1);
        }
        if(month==1){
        premonth = 12;
        preyear = year-1;
        }else{
        premonth = month-1;
        preyear = year;
        }

        //实现下一月和下一年
        if(month==12){
        nextmonth =1;
        nextyear = Number(year)+1;
        }else{
        nextmonth=Number(month)+1;
        nextyear=year;
        }
        if(premonth<10){
        premonth='0'+premonth;
        }
        if(nextmonth<10){
        nextmonth='0'+nextmonth;
        }
        if(month<10){
        month='0'+month;
        }
        var prembtn=preyear+""+premonth; 
        var nextmbtn=nextyear+""+nextmonth;        
        document.getElementById("prem").setAttribute("name",prembtn);
        document.getElementById("nextm").setAttribute("name",nextmbtn);
        $("#container").remove();
        $('#content').load('./date.php',{"year":year,"month":month}).fadeIn('slow'); // 加载新内容,url地址与该地址下的选择器之间要有空格,表示该url下的#container
      }else{
        alert("日期输入错误");
      }
  }
});




