$("div[id^='d-']").on('click', function(e) {                 
  e.preventDefault();  // 阻止链接跳转
  var day =this.id;
  day=day.slice(2, day.length);
  if (day<10) {
    day=0+day;
  }
  $("#rc_container").remove();
  $('#rc_content').load('./lookday.php',{"year":year,"month":month,"day":day}).fadeIn('slow'); // 加载新内容,url地址与该地址下的选择器之间要有空格,表示该url下的#container
});




