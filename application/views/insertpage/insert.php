<!DOCTYPE html>
<html lang="en">
<head>
<title>Form Page</title>
 <link rel="icon" type="image/png" href="<?echo $this->config->item('base_url')?>/public/material-kit-master/assets/img/favicon.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no"><!--避免手機瀏覽器將數字變成電話連結-->

  <!-- Libs CSS -->
  <link rel="stylesheet" href="<?echo $this->config->item('base_url')?>/public/assets/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?echo $this->config->item('base_url')?>/public/assets/libs/font-awesome/4.3.0/css/font-awesome.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?echo $this->config->item('base_url')?>/public/assets/styles/common.css">
</head>
<body>
  <div class="container">
    <!--Header begin-->
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
            <a class="navbar-brand" href="#">Hello: admin</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#" id="showbtn">顯示本日資料</a></li>
              <li><a href="#" class="deleteboard">刪除本日資料</a></li>
              <li><a href="#" class="loginout">會員登出</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!--Header end-->
    
    <!--Main content begin-->
    <div class="main">
      <div class="page-header">
        <h1>第<? echo $num+1;?>局 <!-- <small>結束時間：2016-11-12 12:30</small -->></h1>
      </div>
        

      <div class="block game-data">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-list"></i> 當局資料</h3>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered" id="StaticDiv">
              <thead>
                <tr>
                  <th rowspan="4">現場直播</th>
                  <th rowspan="2" colspan="3">地點：馬尼拉斯豪天地</th>
                  <th rowspan="4" colspan="2" class="qrcode"><img src="<?echo $this->config->item('base_url')?>/public/assets/images/qrcode.png"></th>
                  <th rowspan="2" colspan="7">本群唯一指定微信号：</th>
                  <!-- <th rowspan="5">刪除</th> -->
                </tr>
                <tr></tr>
                <tr>
                  <th colspan="3">電腦現場網址</th>
                  <th>當局局數</th>
                  <th><? echo $num+1;?></th>
                  <th colspan="2">日期：</th>
                  <th colspan="3">客服微信：</th>
                </tr>
                <tr>
                  <th colspan="3">手機掃描&gt;&gt;</th>
                  <th></th>
                  <th colspan="3">象號</th>
                  <th colspan="3">客服電話：</th>
                </tr>
                <tr>
                  <th>編號</th>
                  <th>姓名</th>
                  <th>本局下注</th>
                  <th>庄</th>
                  <th>閒</th>
                  <th>和</th>
                  <th>庄對</th>
                  <th>閒對</th>
                  <th colspan="2">本局輸贏</th>
                  <th colspan="4">刪除本日資料</th> 
                </tr>
              </thead>
              <tbody id="tbody"></tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="block insert">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user-plus"></i> 輸入下注者資料</h3>
          </div>
          <div class="panel-body">
            <form class="form" id="LoginForm">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">名稱</div>
                      <input class="form-control" type="text" value="" name="member" id="member" autocomplete="off" required placeholder="名稱">
                    </div>
                    <label id="errormember"></label>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">莊</div>
                      <input class="form-control" type="number" value="" name="a" id="a" autocomplete="off" placeholder="莊 (請填入數字)" required>
                    </div>
                    <label id="errora"></label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">閒</div>
                      <input class="form-control" type="number" value="" name="b" id="b" autocomplete="off" placeholder="閒 (請填入數字)" required>
                    </div>
                    <label id="errorb"></label>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">和</div>
                      <input class="form-control" type="number" value="" name="c" id="c" autocomplete="off" placeholder="和 (請填入數字)" required>
                    </div>
                    <label id="errorc"></label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">莊對</div>
                      <input class="form-control" type="number" value="" name="d" id="d" autocomplete="off" placeholder="莊對 (請填入數字)" required>
                    </div>
                    <label id="errord"></label>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">閒對</div>
                      <input class="form-control" type="number" value="" name="e" id="e" autocomplete="off" placeholder="閒對 (請填入數字)" required>
                    </div>
                    <label id="errore"></label>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <a id="submit" class="btn btn-default" href="#" title="確認">確認</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      

      <div class="block count hide">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-star-half-full"></i> 當局輸贏</h3>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered" border="1">
              <tbody>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>賠率</th>
                  <th>賠率</th>
                  <th>賠率</th>
                </tr>
                <tr>
                  <th>1</th>
                  <th>莊</th>
                  <th>-&gt;</th>
                  <th>莊0.95</th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <th>2</th>
                  <th>閒</th>
                  <th>-&gt;</th>
                  <th>閒1</th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <th>3</th>
                  <th>和</th>
                  <th>-&gt;</th>
                  <th>和8</th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <th>4</th>
                  <th>莊,莊對,閒對</th>
                  <th>-&gt;</th>
                  <th>莊0.95</th>
                  <th>莊對11</th>
                  <th>賢對11</th>
                </tr>
                <tr>
                  <th>5</th>
                  <th>莊,莊對</th>
                  <th>-&gt;</th>
                  <th>莊0.95</th>
                  <th>莊對11</th>
                  <th></th>
                </tr>
                <tr>
                  <th>6</th>
                  <th>莊,閒對</th>
                  <th>-&gt;</th>
                  <th>莊0.95</th>
                  <th></th>
                  <th>閒對11</th>
                </tr>
                <tr>
                  <th>7</th>
                  <th>閒,莊對,閒對</th>
                  <th>-&gt;</th>
                  <th>閒1</th>
                  <th>莊對11</th>
                  <th>閒對11</th>
                </tr>
                <tr>
                  <th>8</th>
                  <th>閒,莊對</th>
                  <th>-&gt;</th>
                  <th>閒1</th>
                  <th>莊對11</th>
                  <th></th>
                </tr>
                <tr>
                  <th>9</th>
                  <th>閒,閒對</th>
                  <th>-&gt;</th>
                  <th>閒1</th>
                  <th></th>
                  <th>閒對11</th>
                </tr>
                <tr>
                  <th>10</th>
                  <th>和,莊對,閒對</th>
                  <th>-&gt;</th>
                  <th>和8</th>
                  <th>莊對11</th>
                  <th>閒對11</th>
                </tr>
                <tr>
                  <th>11</th>
                  <th>和,莊對</th>
                  <th>-&gt;</th>
                  <th>和8</th>
                  <th>莊對11</th>
                  <th></th>
                </tr>
                <tr>
                  <th>12</th>
                  <th>和,閒對</th>
                  <th>-&gt;</th>
                  <th>和8</th>
                  <th></th>
                  <th>閒對11</th>
                </tr>
              </tbody>
            </table>
            <form class="form-inline" id="OpenForm">
            <div class="col-sm-3">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">填入代號</div>
                  <input class="form-control" type="number" value="" name="wintype" id="wintype" autocomplete="off" placeholder="請填入數字" required>
                </div>
                <label id="errorwintype"></label>
              </div>
            </div>
              <a id="opening" href="#" title="確認" class="btn btn-danger">確認</a>
            </form>
          </div>
        </div>
      </div>
      

      <div class="block game-actions">
        <a href="#" class="btn btn-danger game-end">結束下注</a>
        <a href="#" class="btn btn-success" id="submitokbtn">儲存本局</a>
      </div>

    </div>
    <!--Main content end-->

    <!--Footer begin-->
    <footer class="site-footer">
      <div class="copyright">Copyright © 2016 Sean_Yeh All rights reserved.</div>
    </footer>
    <!--Footer end-->
  </div>

  <!--Libs JS-->
  <script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-1.11.3/jquery-1.11.3.min.js"></script>
  <script src="<?echo $this->config->item('base_url')?>/public/assets/libs/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
  <script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/localization/messages_zh_TW.min.js"></script>
  <!--Custom JS-->
  <!--<script src="<?echo $this->config->item('base_url')?>/public/assets/js/common.js"></script>-->
</body>
</html>
