<script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-1.11.3/jquery-1.11.3.min.js"></script>
 <script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
  <script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/localization/messages_zh_TW.min.js"></script>
  <script src="<?echo $this->config->item('base_url')?>/public/js/blockUI.js"></script>

<script>

$( document ).ready(function() {
  // test();
  selectmember();
});

$('#MemberForm').on('submit', function(e){
  e.preventDefault();
})

function selectmember()
{
  <?foreach ($data as $key => $value) {?>
    var txt1 = "<tr id=\"<?echo $value['id']?>\"><td><?echo $value['nickname']?></td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>";
    var txt2 = "<tr id=\"<?echo $value['id']?>\"><td><?echo $value['nickname']?></td><td>0</td><td><?$point = empty($value['end_point'])? "0" : $value['end_point'];echo $point;?></td><td><?$point = empty($value['start_point'])? "0" : $value['start_point'];echo $point;?></td></tr>";
    $("#table1 tbody").append(txt1);
    $("#table2 tbody").append(txt2); 
  <?}?>
    
 
}
// function test(x)
// {
//   $("#insertuser").val(x);
//   $("#insertuserpoint").val(x);
// }
$(".member").click(function() {
    window.open("<?echo $this->config->item('base_url')?>/Betting/member", 'dailydata', config='height=700,width=800');
  });

$("#MemberForm").validate({
  errorPlacement: function(error, element) {
    if (element.attr("name") == "insertuser")
    {
       error.insertAfter("#erroruser");
    }
  }
});

 // $("#deleteuserbtn").click(function(e){
 //    e.preventDefault();
 //     if($("#MemberForm").valid()){
 //        $.post("<?echo $this->config->item('base_url')?>/test/deleteuser", $('#MemberForm').serialize(), function(data) {
 //          // console.log($('#MemberForm').serialize());
 //          switch (data) {
 //          case 'ok':
 //            alert("刪除成功");
 //            window.location.reload();
 //            break;
 //          case 'no':
 //            alert("沒有此會員");
 //            break;
 //          }
 //        });
 //     }
 //  });

 //  $("#insertuserbtn").click(function(e){
 //    e.preventDefault();
 //    if($("#MemberForm").valid()){
 //     $.post("<?echo $this->config->item('base_url')?>/test/insertuser", $('#MemberForm').serialize(), function(data) {
 //     switch (data) {
 //        case 'ok':
 //          alert("新增成功");
 //          window.location.reload();
 //          break;
 //        case 'no':
 //          alert("已有此會員");
 //          break;
 //      }   
 //     });
 //    }
 //  });
$("#count").click(function(e){
  $("#OpenForm").validate({
    errorPlacement: function(error, element) {
      if (element.attr("name") == "wintype")
      {
        error.insertAfter("#errorwintype");
      }
    }
  });
  if ($("#OpenForm").valid()) {
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
      // console.log(aa);
      $.post("<?echo $this->config->item('base_url')?>/Betting/countresult",{infoary: aa,num: num}, function(data) {
        if(data.status == "no") {
          setTimeout($.unblockUI, 2000);
          alert("請輸入正確代號");
        }
        else
        {
          $('#tbody2 tr').each(function() {
            for(var index = 0 ; index < data.length ; index++)
            {
              if($(this).attr('id') == data[index].id)
              {
                  $(this).css({"background-color": "yellow"});
                 $(this).find('td:eq(1)').text(data[index].win);
                 $(this).find('td:eq(2)').text(Number(data[index].win)+Number($(this).find('td:eq(2)').text()));
              }
            }
          });
        }
        $('html,body').animate({scrollTop: $('body').height()}, 1000); 
        setTimeout($.unblockUI, 2000);
      },'json');
    }
  };
});
$("#insertinfo").click(function(e){
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
});
function postuserform(count){
  count ++;
  console.log(count);
  $.post("<?echo $this->config->item('base_url')?>/Betting/aaa", $('#LoginForm').serialize(), 
      function(data) {
        switch (data.status) {
          case 'ok':
           setTimeout($.unblockUI, 1000);
            insertData(data.array);
            break;
          case 'no':
            alert("第"+data.row+"筆有錯誤資料");
            break;
          default:
            alert("發生錯誤!!");
            break;
        }
        $('html,body').animate({scrollTop: $('body').height()}, 1000); 
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
function insertData(arr) {
  for(var i = 0; i < arr.length; i++) {  
    $('#tbody1 tr').each(function(){
      if (arr[i].name.replace('\r','').replace('\n','') == $(this).find('td:eq(0)').text()) {
        //console.log(1);
        $(this).css({"background-color": "yellow"});
        $(this).find('td:eq(1)').text(arr[i].a);
        $(this).find('td:eq(2)').text(arr[i].b);
        $(this).find('td:eq(3)').text(arr[i].c);
        $(this).find('td:eq(4)').text(arr[i].d);
        $(this).find('td:eq(5)').text(arr[i].e);       
        return;
      }
    });
  }
}
$("#submitsavebtn").click(function() {
  if (confirm("確定儲存本局？")) {
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
    var i = 0;
    $('#tbody2 tr').each(function(){
      var bb = Array();
      var style =  $(this).attr('style');
       if(style == "background-color: yellow;")
        {
          bb['0'] =  $(this).attr('id');
          bb['1'] =  $(this).find('td:eq(0)').text();
          bb['2'] =  $(this).find('td:eq(1)').text();
          bb['3'] =  $(this).find('td:eq(2)').text();
          aa[i] = bb;
          i++;
        }
    });    
    $.post("<?echo $this->config->item('base_url')?>/Betting/saveboard",{board: aa}, function(data) {
      if(data == "ok")
      {
        setTimeout($.unblockUI, 1000);
        alert("儲存成功");
      }
    }, 'json');
  }
});
$("#submitresetbtn").click(function() {
  if (confirm("確定重置盤數？")) {
     $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
    $.post("<?echo $this->config->item('base_url')?>/Betting/setboard",{type:"reset"}, function(data) {
      setTimeout($.unblockUI, 1000);
      alert("重置成功");
      window.location.reload();
    }, 'json');
  }
});
$("#submitnextbtn").click(function() {
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
    $.post("<?echo $this->config->item('base_url')?>/Betting/setboard",{type:"next"}, function(data) {
      window.location.reload();
    }, 'json');
  }
});
</script>