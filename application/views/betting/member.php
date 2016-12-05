<!DOCTYPE>
<html>
<head>
 
 <!-- Libs CSS -->
  <link rel="stylesheet" href="<?php echo $this->config->item('base_url')?>/public/assets/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $this->config->item('base_url')?>/public/assets/libs/font-awesome/4.3.0/css/font-awesome.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo $this->config->item('base_url')?>/public/assets/styles/common.css">
</head>
<body>

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
            <li><a href="#" class="betting">選手投注</a></li>
            <li><a href="#" class="loginout">會員登出</a></li>
          </ul>
        </div>
      </div>
    </nav>





<div style="float:left;width: 33%;height: 620px">
<label><h2>選手列表</h2></label>
<!-- <div class="">選手列表</div> -->
<select class="form-control" size="8" style="height: 100%"  onchange="test(this.value)">
<?foreach ($data as $key => $value) {?>
  <option><?echo $value['nickname'];?></option>
<?}?>
</select>
</div>

<div style="float:left;width: 33% ;padding-left: 10px;height: 600px">
  <div >
    <form id="selectcount">
        <label><h2>選手資訊</h2></label>
       <input class="form-control" type="text" name="insertuser4" id="insertuser4" autocomplete="off" required placeholder="名稱" readonly="readonly" >
      <div style="height: 20px">
        <label id="erroreditcountu"></label>  
      </div>
      <input class="form-control" type="number" name="membercount" id="membercount" autocomplete="off" required placeholder="分數">
      <div style="height: 20px">
        <label id="erroreditcount"></label>  
      </div>
        <a id="editcount" class="btn btn-info btn-block" href="#" title="確認">修改分數</a>
    </form>
  </div>
  <div style="height: 400px">
    <form id="SelectInfo">
      <label><h2>上下分查詢</h2></label>
      <div class = "form-group">
        <select id="select" class="form-control" size="8" style="height: 100%; overflow:scroll">

        </select>
      </div>
    </form>
  </div>
</div>



<div style="float:left;width: 33%;padding-left: 10px;height: 600px" >
	<form id="MemberForm">

      <label><h2>新增或移除選手</h2></label>
      <input class="form-control" type="text" name="insertuser" id="insertuser" autocomplete="off" required placeholder="名稱">
    <div style="height: 20px">
      <label id="erroruser"></label>
    </div>
    <div class="form-group">
      <a id="insertuserbtn" class="btn btn-info btn-block" href="#" title="確認">新增</a>
    </div>
    <div class="form-group">
      <a id="deleteuserbtn" class="btn btn-danger btn-block" href="#" title="確認">刪除</a>
    </div>
  </form>
  <form id="MemberPointForm">   
      <label><h2>儲值或扣除選手分數</h2></label>
      <input class="form-control" type="text" name="insertuser2" id="insertuser2" autocomplete="off" required placeholder="名稱" readonly="readonly" >
      <div style="height: 20px">
        <label id="erroruserpointu"></label>
      </div>
      <input class="form-control" type="number" name="insertpoint" id="insertpoint" autocomplete="off" required placeholder="金額">
      <div style="height: 20px">
        <label id="erroruserpoint"></label>
      </div>
    <div class="form-group">
      <a id="insertuserpointbtn" class="btn btn-info btn-block" href="#" title="確認">儲值</a>
    </div>
    <div class="form-group">
      <a id="deleteuserpointbtn" class="btn btn-danger btn-block" href="#" title="確認">扣除</a>
    </div>
  </form>

  <form id="MemberSelectFrom">

    <label><h2>選手編輯查詢</h2></label>
      <input class="form-control" type="text" name="insertuser3" id="insertuser3" autocomplete="off" required placeholder="名稱" readonly="readonly">
    <div style="height: 20px">
      <label id="erroredituseru"></label>
    </div>
      <input class="form-control" type="text" name="newname" id="newname" autocomplete="off" required placeholder="新名稱">
    <div style="height: 20px">
      <label id="erroredituser"></label>
    </div>
    <div class="form-group">
      <a id="editmemberbtn" class="btn btn-danger btn-block" href="#" title="確認">修改名稱</a>
    </div>
  </form>
</div>

<script src="<?php echo $this->config->item('base_url')?>/public/assets/libs/jquery-1.11.3/jquery-1.11.3.min.js"></script> 
  <script src="<?php echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
  <script src="<?php echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/localization/messages_zh_TW.min.js"></script>

<script type="text/javascript">
	
	function test(x){
  $("#select option").remove();
  $("#insertuser").val(x);
  $("#insertuser2").val(x);
  $("#insertuser3").val(x);
  $("#insertuser4").val(x);
$.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });

    $.post("<?php echo $this->config->item('base_url')?>/Betting/selectusercount", {name:x}, function(data) {
      console.log(data);
      setTimeout($.unblockUI, 500);
          if(data.point == null) { 
            $("#membercount").val(0);
          }
          else {
            $("#membercount").val(data.point);
          }
          if(data.memberlog == "") {
            $("#select").append($("<option></option>").attr("value", 0).text('沒有資料'));
          }
          else {
            for(var index = 0 ; index < data.memberlog.length ; index++) {
              date = data.memberlog[index].date;
              count = "";
              if(data.memberlog[index].upcount != null) {
                count = data.memberlog[index].upcount;
                $("#select").append($("<option></option>").attr("value", index).text(Number(index+1)+". 上分: "+count+"點 於 "+date));
              }
              else if (data.memberlog[index].downcount != null) {
                count = data.memberlog[index].downcount;
                 $("#select").append($("<option></option>").attr("value", index).text(Number(index+1)+". 下分: "+count+"點 於 "+date));
              }
              else if(data.memberlog[index].setcount != null) {
                count = data.memberlog[index].setcount;
                $("#select").append($("<option></option>").attr("value", index).text(Number(index+1)+". 改分: "+count+"點 於 "+date));
              }
              else if(data.memberlog[index].newname != null) {
                newname = data.memberlog[index].newname;
                 oldname = data.memberlog[index].oldname;
                 $("#select").append($("<option></option>").attr("value", index).text(Number(index+1)+". 舊名為 :"+oldname+" 改名為: "+newname+" 於 "+date));
              }  
            }
          }
        },'json');
}

$("#deleteuserbtn").click(function(e){
  if (confirm('確定要刪除？')) {
   e.preventDefault();
     $("#MemberForm").validate({
        errorPlacement: function(error, element) {
          if (element.attr("name") == "insertuser")
          {
            error.insertAfter("#erroruser");
          }
        }
      });
    

     if($("#MemberForm").valid()){
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
        $.post("<?php echo $this->config->item('base_url')?>/Betting/deleteuser", $('#MemberForm').serialize(), function(data) {
          setTimeout($.unblockUI, 500);
          // console.log($('#MemberForm').serialize());
          switch (data) {
          case 'ok':
            alert("刪除成功");
            window.location.reload();
            break;
          case 'no':
            alert("沒有此會員");
            break;
          }
        });
     }
   }
  });


  $("#insertuserbtn").click(function(e){
      e.preventDefault();
     $("#MemberForm").validate({
        errorPlacement: function(error, element) {
          if (element.attr("name") == "insertuser")
          {
            error.insertAfter("#erroruser");
          }
        }
      });
    
  
    if($("#MemberForm").valid()){
      $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
     $.post("<?php echo $this->config->item('base_url')?>/Betting/insertuser", $('#MemberForm').serialize(), function(data) {
      setTimeout($.unblockUI, 500);
     switch (data) {
        case 'ok':
          alert("新增成功");
          window.location.reload();
          break;
        case 'no':
          alert("已有此會員");
          break;
      }   
     });
    }
  });
  // 編輯選手分數
  $("#insertuserpointbtn").click(function(e){
    e.preventDefault();
    $("#MemberPointForm").validate({
      errorPlacement: function(error, element) {
        
        if (element.attr("name") == "insertuser2")
        {
          error.insertAfter("#erroruserpointu");
        }
        if (element.attr("name") == "insertpoint")
        {
          error.insertAfter("#erroruserpoint");
        }
      }
    });
  	if($("#MemberPointForm").valid()){
       $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
  	$.post("<?php echo $this->config->item('base_url')?>/Betting/insertuserpoint/", $('#MemberPointForm').serialize(), function(data) {
      setTimeout($.unblockUI, 500);
     switch (data) {
        case 'ok':
          alert("儲值成功");
          window.location.reload();
          break;
        case 'no':
          alert("儲值失敗");
          break;
      }   
     });
  	}
  });
  // 編輯選手分數
 $("#deleteuserpointbtn").click(function(e){
  e.preventDefault();
  $("#MemberPointForm").validate({
      errorPlacement: function(error, element) {
         if (element.attr("name") == "insertuser2")
        {
          error.insertAfter("#erroruserpointu");
        }
        if (element.attr("name") == "insertpoint")
        {
          error.insertAfter("#erroruserpoint");
        }
      }
    });
  	if($("#MemberPointForm").valid()){
      $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
  	$.post("<?php echo $this->config->item('base_url')?>/Betting/deleteuserpoint/", $('#MemberPointForm').serialize(), function(data) {
      setTimeout($.unblockUI, 500);
     switch (data) {
        case 'ok':
          alert("扣除成功");
          window.location.reload();
          break;
        case 'no1':
          alert("此會員沒有儲值金");
          break;
        case 'no2':
          alert("扣除金額大於儲值金");
          break;
      }   
     });
  	}
  });
 $(".betting").click(function(){
    location.href = "<?php echo $this->config->item('base_url')?>/Betting/index";
 });

 // 直接修改剩餘金
 $("#editcount").click(function(e){
  e.preventDefault();
  $("#selectcount").validate({
      errorPlacement: function(error, element) {
        
        if (element.attr("name") == "insertuser4" )
        {
          error.insertAfter("#erroreditcountu");
        }
        if (element.attr("name") == "membercount")
        {
          error.insertAfter("#erroreditcount");
        }
      }
    });
  if($("#selectcount").valid()){
  $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    } });
  $.post("<?php echo $this->config->item('base_url')?>/Betting/setmembercount", $('#selectcount').serialize(), function(data) {
    setTimeout($.unblockUI, 500);
    switch (data) {
    case 'ok':
      alert("修改成功");
      window.location.reload();
      break;
    case 'no':
      alert("此選手沒有初始分,請先儲值");
      break;
    case 'same':
      alert("修改分數與目前分數相同");
      break;
    }
  },'json');
  }
 });

 $(".history").click(function() {
  location.href = "<?php echo $this->config->item('base_url')?>/Betting/history";
  });
 // 修改會員名稱
 $("#editmemberbtn").click(function(e){
  e.preventDefault();
  $("#MemberSelectFrom").validate({
      errorPlacement: function(error, element) {
        if (element.attr("name") == "insertuser3")
        {
          error.insertAfter("#erroredituseru");
        }
        if (element.attr("name") == "newname")
        {
          error.insertAfter("#erroredituser");
        }
      }
    });
if($("#MemberSelectFrom").valid()){
  $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
    }});
  $.post("<?php echo $this->config->item('base_url')?>/Betting/editmembername", $('#MemberSelectFrom').serialize(), function(data) {
    switch (data) {
      case 'ok':
        alert("修改成功");
        window.location.reload();
        break;
    }

  },'json');
}
 });
 $('.loginout').on('click', function() {
  if (confirm('確定要登出嗎？')) {
    document.location.href="<?echo $this->config->item('base_url')?>/welcome/logout";
  }
});
</script>
</body>
<script src="<?php echo $this->config->item('base_url')?>/public/js/blockUI.js"></script>

</html>
