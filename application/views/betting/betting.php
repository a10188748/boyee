<!DOCTYPE>
<html>
<head>
 
 <!-- Libs CSS -->
  <link rel="stylesheet" href="<?php echo $this->config->item('base_url')?>/public/assets/libs/bootstrap/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo $this->config->item('base_url')?>/public/assets/styles/betting.css"> 
</head>

<body>
  <header class="site-header">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hello: <?php echo $name?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="history">歷史紀錄</a></li>
            <li><a href="#" class="member">選手操作</a></li>
            <li><a href="#" class="loginout">會員登出</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div>
    <div style="width: 100%">
        <h1 style="">第<?php echo $board["game"]?>盤<?php echo $board["num"]?>局 </h1>
    </div>


    <!-- 選手投注區 -->
    <div style="width: 37% ;float: left; padding-left: 10px;min-height: 800px">
      <div class="page-header">
        <h2>選手投注</h2>
      </div>
      <table class="table table-striped table-bordered" border="1" id="table1">
        <thead>
          <tr>
            <th>第<?echo $board["game"]?>盤<?php echo $board["num"]?>局</th>
            <th>莊</th>
            <th>閒</th>
            <th>和</th>
            <th>莊對</th>
            <th>閒對</th>
          </tr>
        </thead>
        <tbody id="tbody1"></tbody>
      </table>
    </div>


    <!-- 選手資訊區 -->
    <div style="width: 37%; float: left; padding-left: 10px;min-height: 800px">
      <div class="page-header">
        <h2>選手分數</h2>
      </div>
      <table class="table table-striped table-bordered" border="1" id="table2">
        <thead>
          <tr>
            <th>第<?php echo $board["game"]?>盤<?php echo $board["num"]?>局</th>
            <th>本局分</th>
            <th>剩餘分</th>
            <th>初始分</th>
            <th>轉碼分</th>
          </tr>
        </thead>
        <tbody id="tbody2"></tbody>
      </table>
    </div>


    <!-- 下注區 -->
    <div class="bet" style="padding-left: 10px; float: left; width: 24%">
      <div class="page-header">
        <h2>下注區</h2>
      </div>
      <form class="form-group" id="BettingForm">
        <textarea style="width: 100%;height: 500px"class="form-control" value="" name="insert" id="insert"  autocomplete="off" required></textarea>
        <div class="features">
        	<a id="insertinfo" class="btn btn-primary btn-block" href="#" title="確認">確認</a>
        </div>
        <label id="errorinsert"></label>
      </form>
    </div>
    <!-- 開局區 -->
    <div class="board hide" style="padding-left: 10px; float: left; width: 24%">
     <div class="page-header">
        <h2>開局區</h2>
      </div>
      <div>
        <form  class="form-inline" id="OpenForm">
          <!-- <div>
            <input style="width: 100%;"class="form-control" type="number" value="" name="wintype" id="wintype" autocomplete="off" placeholder="請填入數字" required>
          </div> -->
          <div>
            <label class="radio-inline" style="width: 30%">
              <input type="radio" name="bet1" value="1">庄<br>
            </label>
            <label class="radio-inline" style="width: 30%">
              <input type="radio" name="bet1" value="2">閒<br>
            </label>
            <label class="radio-inline" style="width: 30%">
              <input type="radio" name="bet1" value="3">和<br>
            </label>
          </div>
          <div>
            <label class="checkbox-inline" style="width: 30%">
              <input type="checkbox" name="bet2" value="1">庄對<br>
            </label>
            <label class="checkbox-inline" style="width: 30%">
              <input type="checkbox" name="bet3" value="1">閒對<br>
            </label>
          </div>
          <div class="features">
            <a id="count" class="btn btn-primary btn-block" href="#" title="開局">開局</a>  
          </div>
          <label id="errorwintype"></label>
        </form>
      </div>
    </div>
    
    <!-- 功能區 -->
    <div class="function hide" style="float: left; width: 24%">
      <div class="page-header">
        <h2>功能區</h2>
      </div>
      <div class="cancel hide features">
        <a href="#" class="btn btn-warning btn-block" id="submitcancelbbtn">隱藏本局未下注選手</a>
      </div>
      <div class="cancel2 hide features">
        <a href="#" class="btn btn-warning btn-block" id="submitcancel2bbtn">隱藏本局未下注選手</a>
      </div>
      <div class="add hide features">
        <a href="#" class="btn btn-info btn-block" id="submitaddbbtn">顯示本局未下注選手</a>
      </div>
      <div class="add2 hide features">
        <a href="#" class="btn btn-info btn-block" id="submitadd2btn">顯示本局未下注選手</a>
      </div>
      <div class="picture hide features">
        <a href="#" class="btn btn-info btn-block" id="picturebtn">截圖</a>
      </div>
      <div class="save hide features">
        <a href="#" class="btn btn-warning btn-block" id="submitsavebtn">儲存本局</a>
      </div>
      <div class="nextb hide features">
        <a href="#" class="btn btn-success btn-block" id="submitnextbbtn">進下一局</a>
      </div>
    </div>
    <!-- 全域功能 -->
    <div style="padding-left: 10px; float: left; width: 24%">
      <hr>
      <div class="nextg features">
        <a href="#" class="btn btn-success btn-block" id="submitnextgbtn">進下一盤</a>
      </div> 
      <div class="features">
        <a href="#" class="btn btn-danger btn-block" id="submitresetbtn">盤數重置</a>
      </div>
    </div>
    
  </div>
  <!--Main content end-->

  <!--Footer begin-->
  <footer class="site-footer">
    <div class="copyright">Copyright © 2016 Sean_Yeh All rights reserved.</div>
  </footer>
  <!--Footer end-->
</body>

<script src="<?php echo $this->config->item('base_url')?>/public/assets/libs/jquery-1.11.3/jquery-1.11.3.min.js"></script>
<script src="<?php echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="<?php echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/localization/messages_zh_TW.min.js"></script>
<script src="<?php echo $this->config->item('base_url')?>/public/js/blockUI.js"></script>
<script src="<?php echo $this->config->item('base_url')?>/public/js/html2canvas.js"></script>
<script src="<?php echo $this->config->item('base_url')?>/public/js/FileSaver.js"></script>
<script>

$( document ).ready(function() {
  selectmember();
});
$("#OpenForm").on('submit', function(e){
  e.preventDefault();
});
function selectmember()
{
  <?php
  $total = count($data);
  $total1 = 0;
  $total2 = 0;
  $total3 = 0;
  ?>
  <?foreach ($data as $key => $value) {?>
    var txt1 = "<tr id=\"<?php echo $value['id']."a"?>\"><td><?php echo $value['nickname']?></td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>";
    var txt2 = "<tr id=\"<?php echo $value['id']?>\"><td><?php echo $value['nickname']?></td><td>0</td><td><?php $point = empty($value['end_point'])? "0" : $value['end_point'];echo $point;$total1 = $total1+$point;?></td><td><?php $point = empty($value['start_point'])? "0" : $value['start_point'];echo $point;$total2 = $total2+$point;?></td><td><?php $point = empty($value['lose'])? "0" : $value['lose'];echo $point;$total3 = $total3+$point;?></td></tr>";
    $("#table1 tbody").append(txt1);
    $("#table2 tbody").append(txt2); 
  <?}?>
  var txttotal = "<tr id=\"total\" style=\"background-color:#5599FF\"><td>總人數（<?php echo $total;?>）</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>"
  $("#table1 tbody").append(txttotal);
  var txttotal2 = "<tr id=\"total2\" style=\"background-color:#5599FF\"><td>總人數（<?php echo $total;?>）</td><td>0</td><td><?php echo $total1;?></td><td><?php echo $total2;?></td><td><?php echo $total3;?></td></tr>"
  $("#table2 tbody").append(txttotal2);
 
}

(function (window, document, $, undefined) {
      "use strict";

      var editableCols = '#table1 tbody td';

      function init() {
        $(document).on('click', editableCols, editColumn);
      }

      function editColumn(e) {
      
        var target = $(e.target);
        if (target.index() == 0) return;
        
        if (target.find('input').length) return;
        
        var value = target.text();
        var input = $('<input type="number">').val(value);

        target.empty().append(input);
        input.focus().on('blur keypress', function(e) {

          if (e.type == 'keypress' && e.which != 13) return;
          var newValue = $(e.target).val() ? $(e.target).val() : 0;
          newValue = parseFloat(newValue);
          target.empty().text(newValue);
          if(newValue != 0) {
            target.parent().css("background-color", "yellow");
          }

          setTimeout(function() {
            $(document).on('click', editableCols, editColumn);
          }, 500);

          // count column 1 total
          counttotal();
          
        });
        
        $(document).off('click', editableCols, editColumn);
      }

      init();

    } (window, document, jQuery));


// 截圖
$("#picturebtn").click(function(){
  var dom=prompt("請輸入截圖範圍,1=選手投注,2=選手分數","")
  if(dom==1){
    html2canvas($("#table1"), {
      onrendered: function(canvas) {
        canvas.toBlob(function(blob) {
          saveAs(blob, 'image.png');
        });
      }
    });
  }
  else if(dom==2){
    html2canvas($("#table2"), {
      onrendered: function(canvas) {
        canvas.toBlob(function(blob) {
          saveAs(blob, 'image.png');
        });
      }
    });
  }
  else
  {
    alert("輸入錯誤");
  }
});
$(".member").click(function() {
  location.href = "<?php echo $this->config->item('base_url')?>/Betting/member";
    // window.open("<?echo $this->config->item('base_url')?>/Betting/member",'member' ,'scrollbars');
  });
$(".history").click(function() {
  location.href = "<?php echo $this->config->item('base_url')?>/Betting/history";
  });
$("#submitnextbbtn").click(function()
{
  if (confirm("確定進入下一局？")) {
    window.location.reload();
  }
});
$("#count").click(function(e){
  $('#tbody1 tr').each(function(){
    var id = "";
    var aa = Array();
    var style =  $(this).attr('style');
    if(style != "background-color: yellow;")
    {
      id = $(this).attr('id');
      $('#'+id).show();
    }
  });
  e.preventDefault();
  $.ajaxSetup({
        type: 'POST',
        timeout: 5000,});
  // $("#OpenForm").validate({
  //       errorPlacement: function(error, element) {
  //         if (element.attr("name") == "wintype")
  //         {
  //           error.insertAfter("#errorwintype");
  //         }
  //       }
  //     });
  // if ($("#OpenForm").valid()) {
    if (confirm("確定輸入？")) {
      $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
      var i = 0;
      var aa = Array();
      var num = $('#wintype').val();
      var bet1 = 0;
      var bet2 = 0;
      var bet3 = 0;
      bet1 = $('input[name=bet1]:checked').val();
      bet2 = $('input[name=bet2]:checked').val();
      bet3 = $('input[name=bet3]:checked').val();
      $('#tbody1 tr').each(function(){
        var bb = Array();
        var style =  $(this).attr('style');
        // console.log(dd);
        if(style == "background-color: yellow;")
        {
          bb['0'] =  $(this).attr('id');
          bb['1'] =  $(this).find('td:eq(1)').text();
          bb['2'] =  $(this).find('td:eq(2)').text();
          bb['3'] =  $(this).find('td:eq(3)').text();
          bb['4'] =  $(this).find('td:eq(4)').text();
          bb['5'] =  $(this).find('td:eq(5)').text();
          aa[i] = bb;
          i++;
        }
      });
      $.post("<?php echo $this->config->item('base_url')?>/Betting/countresult",{infoary: aa, bet1: bet1, bet2: bet2, bet3: bet3}, function(data) {
        if(data.status == "no") {
          setTimeout($.unblockUI, 1000);
          alert("請輸入正確代號");
        }
        else
        {
          var total = 0;
          var total3 = 0;
          $('#tbody2 tr').each(function() {
            for(var index = 0 ; index < data.length ; index++)
            {
              if($(this).attr('id')+"a" == data[index].id)
              {
                total = total+data[index].win;
                if(Number(data[index].win) < 0)
                {
                  total3 = total3-Number(data[index].win);
                }
                $(this).css({"background-color": "yellow"});
                $(this).find('td:eq(1)').text(data[index].win);
                $(this).find('td:eq(2)').text(Number(data[index].win)+Number($(this).find('td:eq(2)').text()));
                if(total+data[index].win < 0)
                {
                  $(this).find('td:eq(4)').text(Number($(this).find('td:eq(4)').text())-Number(data[index].win));
                }
              }
            }
          });
          $("#total2").find('td:eq(1)').text(total);

          //var total2 = Number($("#total2").find('td:eq(2)').text())+Number(total);
          $("#total2").find('td:eq(2)').text(Number($("#total2").find('td:eq(2)').text())+Number(total));
          $("#total2").find('td:eq(4)').text(Number($("#total2").find('td:eq(4)').text())+Number(total3));           

          $(' .save, .function, .cancel').removeClass('hide');
          $('.cancel2, .add2, .board').addClass('hide');
        }
        //$('html,body').animate({scrollTop: $('body').height()}, 1000); 
        setTimeout($.unblockUI, 1000);
      },'json'
      ).fail(function(){
        setTimeout($.unblockUI, 1000);
        alert("系統逾時,請再次操作");
      });
    }
  // };
});
$("#insertinfo").click(function(e){
  e.preventDefault();
  $("#BettingForm").validate({
        errorPlacement: function(error, element) {
          if (element.attr("name") == "insert")
          {
            error.insertAfter("#errorinsert");
          }
        }
      });
  if ($("#BettingForm").valid()) {
    if (confirm("確定輸入？")) {
      $.blockUI({ css: {
              border: 'none',
              padding: '15px',
              backgroundColor: '#000',
              '-webkit-border-radius': '10px',
              '-moz-border-radius': '10px',
              opacity: .5,
              color: '#fff'
      } });
      var count = 0;
      $.ajaxSetup({
        type: 'POST',
        timeout: 5000,});
      postuserform(count);
    }
  } 
});
function postuserform(count){
  count ++;
  $.post("<?php echo $this->config->item('base_url')?>/Betting/bet", $('#BettingForm').serialize(), 
      function(data) {
        switch (data.status) {
          case 'ok':
           setTimeout($.unblockUI, 1000);
            insertData(data.array);
            alert("輸入成功");
            $('.board, .function, .picture, .cancel2').removeClass('hide');
            $('.bet').addClass('hide');
            break;
          case 'no':
            alert("第"+data.row+"筆有錯誤資料");
            break;
          default:
            alert("發生錯誤!!");
            break;
        }
        // $('html,body').animate({scrollTop: $('body').height()}, 1000); 
      }
      , 'json'
    ).fail(function(){
      if(count >= 5){
        setTimeout($.unblockUI, 1000);
        alert("操作逾時,請再次操作");
      }
      else{
        postuserform(count);
      }
      }); 
}
function counttotal() {
  var total1 = 0;
  var total2 = 0;
  var total3 = 0;
  var total4 = 0;
  var total5 = 0;
  $("#table1 tr").find("td:eq(1)").each(function() {
    if($(this).parent().attr('id') == 'total') return;
    total1 += parseFloat($(this).text());
  });
  $("#table1 tr").find("td:eq(2)").each(function() {
    if($(this).parent().attr('id') == 'total') return;
    total2 += parseFloat($(this).text());
  });
  $("#table1 tr").find("td:eq(3)").each(function() {
    if($(this).parent().attr('id') == 'total') return;
    total3 += parseFloat($(this).text());
  });
  $("#table1 tr").find("td:eq(4)").each(function() {
    if($(this).parent().attr('id') == 'total') return;
    total4 += parseFloat($(this).text());
  });
  $("#table1 tr").find("td:eq(5)").each(function() {
    if($(this).parent().attr('id') == 'total') return;
    total5 += parseFloat($(this).text());
  });
  $("#total").find('td:eq(1)').text(total1);
  $("#total").find('td:eq(2)').text(total2);
  $("#total").find('td:eq(3)').text(total3);
  $("#total").find('td:eq(4)').text(total4);
  $("#total").find('td:eq(5)').text(total5);
}
function insertData(arr) {
  // var total1 = 0; 
  // var total2 = 0;  
  // var total3 = 0;  
  // var total4 = 0;  
  // var total5 = 0;  
  for(var i = 0; i < arr.length; i++) {
  // total1 = total1+arr[i].a;
  // total2 = total2+arr[i].b;
  // total3 = total3+arr[i].c;
  // total4 = total4+arr[i].d;
  // total5 = total5+arr[i].e;
    $('#tbody1 tr').each(function(){
      if (arr[i].name.replace('\r','').replace('\n','') == $(this).find('td:eq(0)').text()) {
        //console.log(1);
        $(this).css({"background-color": "yellow"});
        $(this).find('td:eq(1)').text(arr[i].a);
        $(this).find('td:eq(2)').text(arr[i].b);
        $(this).find('td:eq(3)').text(arr[i].c);
        $(this).find('td:eq(4)').text(arr[i].d);
        $(this).find('td:eq(5)').text(arr[i].e);  
        if($(this).find('td:eq(1)').text() == 0 && $(this).find('td:eq(2)').text() == 0 && $(this).find('td:eq(3)').text() == 0 && $(this).find('td:eq(4)').text() == 0 && $(this).find('td:eq(5)').text() == 0)
        {
          $(this).css({"background-color": ""});
        }     
      }
    });
  }


counttotal();

  // $("#total").find('td:eq(1)').text(total1);
  // $("#total").find('td:eq(2)').text(total2);
  // $("#total").find('td:eq(3)').text(total3);
  // $("#total").find('td:eq(4)').text(total4);
  // $("#total").find('td:eq(5)').text(total5);



  

}
$("#submitcancelbbtn").click(function(e){
  e.preventDefault();
  $('#tbody2 tr').each(function(){
    var id = "";
    var aa = Array();
    var style =  $(this).attr('style');
    if(style != "background-color: yellow;")
    {
      id = $(this).attr('id');
      $('#'+id).hide();
    }
  });
  $('#tbody1 tr').each(function(){
    var id = "";
    var aa = Array();
    var style =  $(this).attr('style');

    if(style != "background-color: yellow;")
    {
      id = $(this).attr('id');
      $('#'+id).hide();
    }
  });
  $(".add ").removeClass('hide');
  $(".cancel").addClass('hide');
  // $("#submitaddbbtn").show();
  // $("#submitcancelbbtn").hide();

})
$("#submitcancel2bbtn").click(function(e){
$('#tbody1 tr').each(function(){
    var id = "";
    var aa = Array();
    var style =  $(this).attr('style');

    if(style != "background-color: yellow;")
    {
      id = $(this).attr('id');
      $('#'+id).hide();
    }
    $(".add2 ").removeClass('hide');
    $(".cancel2 ").addClass('hide');
  });
})

$("#submitadd2btn").click(function(e){
$('#tbody1 tr').each(function(){
    var id = "";
    var aa = Array();
    var style =  $(this).attr('style');

    if(style != "background-color: yellow;")
    {
      id = $(this).attr('id');
      console.log(id);
      $('#'+id).show();
    }
    $(".cancel2 ").removeClass('hide');
    $(".add2 ").addClass('hide');
  });
})


$("#submitaddbbtn").click(function(e){
 e.preventDefault();
  $('#tbody2 tr').each(function(){
    var id = "";
    var aa = Array();
    var style =  $(this).attr('style');
    if(style != "background-color: yellow;")
    {
      id = $(this).attr('id');
      $('#'+id).show();
    }
  });
  $('#tbody1 tr').each(function(){
    var id = "";
    var aa = Array();
    var style =  $(this).attr('style');
    if(style != "background-color: yellow;")
    {
      id = $(this).attr('id');
      $('#'+id).show();
    }
  });
  // $("#submitaddbbtn").hide();
  // $("#submitcancelbbtn").show();
  $(".cancel ").removeClass('hide');
  $(".add ").addClass('hide');

  })

$("#submitsavebtn").click(function(e) {
  if (confirm("確定儲存本局？")) {
       e.preventDefault();
   $.ajaxSetup({
        type: 'POST',
        timeout: 30000,});
    $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
       
    var aa = Array();
    var cc = Array();
    var i = 0;
    var j = 0;
    $('#tbody2 tr').each(function(){
      var bb = Array();
      var style =  $(this).attr('style');
       if(style == "background-color: yellow;")
        {
          bb['0'] =  $(this).attr('id');
          bb['1'] =  $(this).find('td:eq(0)').text();
          bb['2'] =  $(this).find('td:eq(1)').text();
          bb['3'] =  $(this).find('td:eq(2)').text();
          bb['4'] =  $(this).find('td:eq(4)').text();
          aa[i] = bb;
          i++;
        }
    });
    $('#tbody1 tr').each(function(){
      var dd = Array();
      var style =  $(this).attr('style');
       if(style == "background-color: yellow;")
        {
          // dd['0'] =  $(this).attr('id');
          dd['1'] =  $(this).find('td:eq(1)').text();
          dd['2'] =  $(this).find('td:eq(2)').text();
          dd['3'] =  $(this).find('td:eq(3)').text();
          dd['4'] =  $(this).find('td:eq(4)').text();
          dd['5'] =  $(this).find('td:eq(5)').text();
          aa[j]['5'] = dd['1'];
          aa[j]['6'] = dd['2'];
          aa[j]['7'] = dd['3'];
          aa[j]['8'] = dd['4'];
          aa[j]['9'] = dd['5'];
          j++;
        }
    });
    // console.log($('#total').find('td:eq(0)').text());
       cc['0'] = $('#total').find('td:eq(1)').text();
       cc['1'] = $('#total').find('td:eq(2)').text();
       cc['2'] = $('#total').find('td:eq(3)').text();
       cc['3'] = $('#total').find('td:eq(4)').text();
       cc['4'] = $('#total').find('td:eq(5)').text();

    $.post("<?php echo $this->config->item('base_url')?>/Betting/saveboard",{board: aa, num:<?echo $board["num"]?>, total:cc}, function(data) {
      if(data == "ok")
      {
        setTimeout($.unblockUI, 1000);
        alert("儲存成功");
        $('.nextb').removeClass('hide');
        $('.save').addClass('hide');
      }
      if(data == "no")
      {
        setTimeout($.unblockUI, 1000);
        alert("本局無資料");
      }
      if(data == "finish")
      {
        setTimeout($.unblockUI, 1000);
        alert("本局已儲存");
      }
    }, 'json'
    ).fail(function(){
        setTimeout($.unblockUI, 1000);
        alert("系統逾時,請再次操作");
      });
  }
});
$("#submitresetbtn").click(function() {
  if (confirm("確定重置盤數？")) {
    $.ajaxSetup({
        type: 'POST',
        timeout: 5000,});
     $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
    $.post("<?php echo $this->config->item('base_url')?>/Betting/setboard",{type:"reset"}, function(data) {
      setTimeout($.unblockUI, 1000);
      alert("重置成功");
      window.location.reload();
    }, 'json'
    ).fail(function(){
        setTimeout($.unblockUI, 1000);
        alert("系統逾時,請再次操作");
      });
  }
});
$("#submitnextgbtn").click(function() {
  if (confirm("確定進入下一盤？")) {
     $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
    $.post("<?php echo $this->config->item('base_url')?>/Betting/setboard",{type:"next"}, function(data) {
      if(data == "ok")
      {
        setTimeout($.unblockUI, 1000);
        window.location.reload();
      } 
    }, 'json'
    ).fail(function(){
        setTimeout($.unblockUI, 1000);
        alert("系統逾時,請再次操作");
      });
  }
});
$('.loginout').on('click', function() {
  if (confirm('確定要登出嗎？')) {
    document.location.href="<?php echo $this->config->item('base_url')?>/welcome/logout";
  }
});
</script>
</body>
</html>