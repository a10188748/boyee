
<script type="text/javascript" src="<?php echo $this->config->item('base_url')?>/public/js/jquery-2.2.2.min.js"></script> 
<!-- <div>
	<form class="MemberForm NormalForm" name = "LoginForm" id="LoginForm">
		<h3>輸入會員資料</h3>
            <ul>
                <li>
                    <div class="ItemHead">
                        <label for="email">會員帳號</label>
                    </div>
                    <div class="ItemBox">
                        <input type="text" value="" name="member" id="member" class="Text">
                    </div>
                </li>
                <li>
                    <div class="ItemHead">
                        <label for="pw">密碼 Password</label>
                    </div>
                    <div class="ItemBox" id="groupPwd">
                        <input type="password" value="" name="password" id="password" class="Text" autocomplete="off">
                    </div>
                </li>
                
                <li class="ButtonBar">
                    <div class="Btnlogin">
                        <a id = "submit" href="#" title="確認">
                        	<div>確認</div>
                        </a>
                    </div>
            	</li>
			</ul>
	</form>
</div> -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->config->item('base_url')?>/public/material-kit-master/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo $this->config->item('base_url')?>/public/material-kit-master/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Sign In Page</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="<?php echo $this->config->item('base_url')?>/public/material-kit-master/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $this->config->item('base_url')?>/public/material-kit-master/assets/css/material-kit.css" rel="stylesheet"/>

</head>

<body class="signup-page">
    <!-- <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container"> -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://www.creative-tim.com">Creative Tim</a>
            </div>

            <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../components-documentation.html" target="_blank">
                            Components
                        </a>
                    </li>
                    <li>
                        <a href="http://demos.creative-tim.com/material-kit-pro/presentation.html?ref=utp-freebie" target="_blank">
                            <i class="material-icons">unarchive</i> Upgrade to PRO
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('<?echo $this->config->item('base_url')?>/public/material-kit-master/assets/img/black-wallpaper.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="card card-signup">
                            <form id="form" name="form" class="form" method="" action="">
                                <div class="header header-primary text-center">
                                    <h4>Sign Up</h4>
                                    <div class="social-line">
                                        <!-- <a href="#pablo" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-google-plus"></i>
                                        </a> -->
                                    </div>
                                </div>
                                <!-- <p class="text-divider">Or Be Classical</p> -->
                                <div class="content">

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>
                                        <input name="member" id="member" type="text" class="form-control" placeholder="Account">
                                    </div>

                                    <!-- <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Email...">
                                    </div> -->

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <input name="password" id="groupPwd" type="password" placeholder="Password..." class="form-control" />
                                    </div>

                                    <!-- If you want to add a checkbox to this form, uncomment this code

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes" checked>
                                            Subscribe to newsletter
                                        </label>
                                    </div> -->
                                </div>
                                <div class="footer text-center">
                                    <a  id="submit"  class="btn btn-simple btn-primary btn-lg">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container">
                    <!-- <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="http://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="http://presentation.creative-tim.com">
                                   About Us
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                   Blog
                                </a>
                            </li>
                            <li>
                                <a href="http://www.creative-tim.com/license">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav> -->
                    <div class="copyright pull-right">
                        &copy; 2016, made with <i class="fa fa-heart heart"></i> by <a target="_blank">Sean Yeh</a>
                    </div>
                </div>
            </footer>

        </div>

    </div>


</body>
    <!--   Core JS Files   -->
    <script src="<?php echo $this->config->item('base_url')?>/public/material-kit-master/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url')?>/public/material-kit-master/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url')?>/public/material-kit-master/assets/js/material.min.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?php echo $this->config->item('base_url')?>/public/material-kit-master/assets/js/nouislider.min.js" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="<?php echo $this->config->item('base_url')?>/public/material-kit-master/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="<?php echo $this->config->item('base_url')?>/public/material-kit-master/assets/js/material-kit.js" type="text/javascript"></script>

<script>
    $("#submit").click(function(){
    var member = document.form.member.value;
    var password = document.form.password.value;
    var emailRule = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
    var passwordRule =/^[\d|a-zA-Z]+$/;
    if(document.form.member.value=="")
        {
            alert("請輸入帳號");

        }
    else if(passwordRule.test(member) != true)
    {
        alert("帳號只能為英文或數字");
    }
    else if(document.form.password.value=="")
    {
        alert("請輸入密碼");

    }
    else if (passwordRule.test(password) != true)
    {
        alert("密碼只能為英文或數字");
    }
    else
    {
        submit();
    }
        
});
function submit(){
    if($('#form')){                
        $.post('<?php echo $this->config->item('base_url')?>/welcome/login', $('#form').serialize(), function(data) {
            console.log(data);
            switch (data.status) {
                case 'ok': 
                alert("登入成功");
                 location.href = "<?php echo $this->config->item('base_url')?>/betting";
                     break;
                 case 'empty': 
                 alert("帳號或密碼錯誤");
                     break;
                 case 'no': 
                 alert("帳號或密碼錯誤");
                     break;
                default:
                    alert("發生錯誤!!");
                    break;
            } 
        }, 'json');
    }
};
    
</script>