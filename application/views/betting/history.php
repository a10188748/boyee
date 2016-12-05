<!DOCTYPE>
<html>
<head>
 
 <!-- Libs CSS -->

  <link rel="stylesheet" href="<?echo $this->config->item('base_url')?>/public/dhtmlxSuite/codebase/fonts/font_roboto/roboto.css"/>
  <link rel="stylesheet" href="<?echo $this->config->item('base_url')?>/public/dhtmlxSuite/codebase/dhtmlx.css"/>
  




  <link rel="stylesheet" href="<?echo $this->config->item('base_url')?>/public/assets/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?echo $this->config->item('base_url')?>/public/assets/libs/font-awesome/4.3.0/css/font-awesome.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?echo $this->config->item('base_url')?>/public/assets/styles/common.css">
</head>
<body onload="doOnLoad();">
<nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hello: <?echo $name?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="betting">選手投注</a></li>
            <li><a href="#" class="member">選手操作</a></li>
            <li><a href="#" class="loginout">會員登出</a></li>
          </ul>
        </div>
      </div>
    </nav>





  <div style="position:relative;height:50px;">
    <div style="width: 20%;float: left">
      開始日期
      <input type="text" id="calendar_input_start" readonly="">
      <span><img id="calendar_icon" src="<?echo $this->config->item('base_url')?>/public/dhtmlxSuite/image/calendar.png" border="0"></span>
    </div>

    <div style="width: 20%;float: left">
    結束日期
      <input type="text" id="calendar_input_end" readonly="">
      <span><img id="calendar_icon2" src="<?echo $this->config->item('base_url')?>/public/dhtmlxSuite/image/calendar.png" border="0"></span>
    </div>
    <div style=" width: 20%;float: left ;">
    <a id="selectbtn" class="btn btn-primary btn-block" href="#" title="搜尋" style="height: 26px;line-height:13px;font-size: 14px;">搜尋</a>
    </div>
  </div>
  





 <table class="table table-striped table-bordered" border="1" id="">
        <thead>
          <tr>
            <th style="width: 20%">莊</th>
            <th style="width: 20%">閒</th>
            <th style="width: 20%">和</th>
            <th style="width: 20%">莊對</th>
            <th style="width: 20%">閒對</th>
          </tr>
        </thead>
        <tbody id="tbody1">
          
        </tbody>
      </table> 





</body>
<style>
    #calendar_input_start{
      border: 1px solid #dfdfdf;
      font-family: Roboto, Arial, Helvetica;
      font-size: 14px;
      color: #404040;
    }
    #calendar_icon {
      vertical-align: middle;
      cursor: pointer;
    }
  </style>
<script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-1.11.3/jquery-1.11.3.min.js"></script>
<script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/localization/messages_zh_TW.min.js"></script>
<script src="<?echo $this->config->item('base_url')?>/public/js/blockUI.js"></script>
<script src="<?echo $this->config->item('base_url')?>/public/js/html2canvas.js"></script>
<script src="<?echo $this->config->item('base_url')?>/public/js/FileSaver.js"></script>



<script src="<?echo $this->config->item('base_url')?>/public/dhtmlxSuite/codebase/dhtmlx.js"></script>





<script>
$(".betting").click(function(){
    location.href = "<?echo $this->config->item('base_url')?>/Betting/index";
 });
 $(".member").click(function() {
  location.href = "<?echo $this->config->item('base_url')?>/Betting/member";
  });
 $('.loginout').on('click', function() {
  if (confirm('確定要登出嗎？')) {
    document.location.href="<?echo $this->config->item('base_url')?>/welcome/logout";
  }
});

var myCalendar;
    function doOnLoad() {
      myCalendar = new dhtmlXCalendarObject({input: "calendar_input_start", button: "calendar_icon"});
      myCalendar = new dhtmlXCalendarObject({input: "calendar_input_end", button: "calendar_icon2"});
    }


$("#selectbtn").click(function(){
  $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
   var start = document.getElementById('calendar_input_start').value;
   var end = document.getElementById('calendar_input_end').value;
  // console.log(aa);
   $.post("<?echo $this->config->item('base_url')?>/History/selecthistory",{start:start,end:end}, function(data) {
    setTimeout($.unblockUI, 1000);
    var a = data[0];
    var b = data[1];
    var c = data[2];
    var d = data[3];
    var e = data[4];
    var txttotal = "<tr id=\"total\" style=\"background-color:#fffff\"><td>"+a+"</td><td>"+b+"</td><td>"+c+"</td><td>"+d+"</td><td>"+e+"</td></tr>";
    $('#tbody1 tr:last').remove();
    $("#tbody1").append(txttotal);

   },'json');

});



</script>
</html>