<script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-1.11.3/jquery-1.11.3.min.js"></script>
<script>
$(function() {
  
  function init() {
    $('.loginout').on('click', function() {
      if (confirm('確定要登出嗎？')) {
        document.location.href="<?echo $this->config->item('base_url')?>/welcome/logout";
      }

    });
    $('.deleteboard').on('click', function() {
      if (confirm('確定要刪除嗎？')) {
       $.post("<?echo $this->config->item('base_url')?>/insertpage/deleteboard",null, function(data) {
        if(data=="ok")
        {
          alert("刪除成功");
        }
        else
        {
          alert("發生錯誤");
        }
       }, 'json');
      }
    });
    $('.game-end').on('click', function() {
      if (confirm('確定要結束下注嗎？')) {
        $('.game-rules, .count').removeClass('hide');
        $('.insert, .game-end').addClass('hide');
      }
    });
    
    $("#showbtn").click(function() {
      window.open("<?echo $this->config->item('base_url')?>/insertpage/showform", 'dailydata', config='height=400,width=700');
    });
    
    $("#submitokbtn").click(function() {
      if($('#LoginForm')) {
        if (confirm("確定儲存本局嗎")) {
          var json = []; 
          var win = [];
          var i = 0;
          var datarows = $('#StaticDiv tbody tr');
          var table = document.getElementById('tbody');
          // console.log(win);
          datarows.each(function(){
            json[i] =$(this).data('json');
            win[i] = table.rows[i].cells[8].innerHTML;
            i++
          });  
          json = JSON.stringify(json);
          // win = JSON.stringify(win);
               
          $.post("<?echo $this->config->item('base_url')?>/insertpage/insertform",{json: json,win: win}, function(data) {
            console.log("11");
            switch (data){
              case 'ok':
                alert("更新完畢!");
                window.location.reload();
                break;
              default:
                alert(data);
            }
          }, 'json');
        }
      }
    });

    $("#submit").click(function(e){
      //var validator = $("#LoginForm").validate();
      e.preventDefault();

      $("#LoginForm").validate({
        errorPlacement: function(error, element) {
          if (element.attr("name") == "member")
          {
            error.insertAfter("#errormember");
          }
          if (element.attr("name") == "a")
          {
            error.insertAfter("#errora");
          }
          if (element.attr("name") == "b")
          {
            error.insertAfter("#errorb");
          }
          if (element.attr("name") == "c")
          {
            error.insertAfter("#errorc");
          }
          if (element.attr("name") == "d")
          {
            error.insertAfter("#errord");
          }
          if (element.attr("name") == "e")
          {
            error.insertAfter("#errore");
          }
          //  else
          // error.insertAfter(element);
          },
      });
      
      if ($("#LoginForm").valid()) {
        // 在這邊post資料
        post();
      }
      //var datarows = $('#StaticDiv tbody tr').attr('data-json');
    });

    $(document).on('click', '.deletebtn', function(e) {
      
      if (confirm("確定刪除下注嗎？")) {
        //var target = e.currentTarget;
        var parent = $(this).parent().parent();
        parent.remove();

        var datarows = $('#StaticDiv tbody tr');
        var index = 1;
        datarows.each(function(){
          $(this).find('td:eq(0)').text(index);
          index++
        });
        // ajaxOrder();
      }
    });

    function post() {

      if (confirm("確定輸入資訊？")) {
        $.post("<?echo $this->config->item('base_url')?>/insertpage/count", $('#LoginForm').serialize(), function(data) {
          //console.log(data);
          switch (data.status) {
            case 'ok':
              var member = data.member;
              var a = data.a;
              var b = data.b;
              var c = data.c;
              var d = data.d;
              var e = data.e;
              var total = data.total;
              //var win = data.win;
              var rows = (StaticDiv.rows.length)-4;
              var txt1 = "<tr data-json="+JSON.stringify(data)+"><td>"+rows+"<td>"+member+"<td>"+total+"<td>"+a+"<td>"+b+"<td>"+c+"<td>"+d+"<td>"+e+"<td colspan=\"2\" id=\""+rows+"\">0</td><td colspan=\"4\"><a href=\"#\" title=\"刪除\" class=\"btn btn-warning deletebtn\">刪除</a></td>";
              // <img src=\"\" alt=\"刪除\">
              $("#StaticDiv tbody").append(txt1); 
              break;
            case 'no':
              alert("請輸入正確代號");
              break;
            default:
              alert("發生錯誤!!");
              break;
          }
          $('html,body').animate({scrollTop: $('body').height()}, 1000); 
        }, 'json');  
      }
    }

    $("#opening").click(function() {
      $("#OpenForm").validate({
        errorPlacement: function(error, element) {
          if (element.attr("name") == "wintype")
          {
            error.insertAfter("#errorwintype");
          }
        }
      });
     
      if ($("#OpenForm").valid()) {
          
        if (confirm("確定計算結果？")) {
          var datarows = $('#StaticDiv tbody tr');
          var index = 0;
          var index2 = 0;
          var array = [];
          var wintype = $('#wintype').val();
          datarows.each(function(){
            array[index] = $(this).data('json');
            index++;
          });
          array = JSON.stringify(array);
          $.post("<?echo $this->config->item('base_url')?>/insertpage/opening",{json: array,wintype: wintype}, function(data) { 
            
            if(data.status == "no") {
              alert("請輸入正確代號");
            }
            datarows.each(function() {
              $(this).find('td:eq(8)').text(data[index2]);
              index2++
            });
          }, 'json');
        }
      }
    });
  }
  
  
  init();
    
});
</script>