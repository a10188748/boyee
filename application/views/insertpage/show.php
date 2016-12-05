<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title></title>
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
	<div class="block game-data">
		<div class="panel panel-success">
			<div class="panel-heading">
		        <h3 class="panel-title"><i class="fa fa-list"></i> 當日資料</h3>
		    </div>
			<div class="panel-body">
				<table class="table table-striped table-bordered" >
					<thead>
						<tr>
							<th>姓名</th>
							<th>當日輸</th>
							<th>當日贏</th>
							<th>當日輸贏</th>
						</tr>
					</thead>
					<tbody>
						<? 
						foreach($form as $key)
						{
						?>
							<tr>
								<th><?echo $key["nickname"]?></th>
								<th><?echo $key["lose"]?></th>
								<th><?echo $key["win"]?></th>
								<th><?echo $key["win"]-$key["lose"]?></th>
							</tr>
						<?
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
<script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-1.11.3/jquery-1.11.3.min.js"></script>
  <script src="<?echo $this->config->item('base_url')?>/public/assets/libs/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
  <script src="<?echo $this->config->item('base_url')?>/public/assets/libs/jquery-validation-1.14.0/dist/localization/messages_zh_TW.min.js"></script>