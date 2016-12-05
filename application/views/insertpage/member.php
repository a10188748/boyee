<script type="text/javascript" src="<?echo $this->config->item('base_url')?>/public/js/jquery-2.2.2.min.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('base_url')?>/public/js/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?echo $this->config->item('base_url')?>/public/js/jquery-validation-1.15.0/dist/localization/messages_zh_TW.min.js"></script>
<div>
	<form name ="LoginForm" id="LoginForm">
		<ul>
			<li>
				<div class="ItemHead">
            	<label for="pw">填入會員名稱</label>
            	</div>
            	<div class="ItemBox">
                	<input type="text" value="" name="wintype" id="wintype" class="Text" autocomplete="off"
                        placeholder="請填入有效字元" required>
            	</div>
			</li>
		</ul>
		<ul>
			<li class="ButtonBar">
                <div class="Btnlogin">
                    <a id="submit" href="#" title="確認">
                    	<div>確認</div>
                    </a>
                </div>
            </li>
        </ul>
	</form>
</div>
<script>
	$("#submit").click(function(){
			//var validator = $("#LoginForm").validate();
			$("#LoginForm").validate();
	   
	      if ($("#LoginForm").valid()) {
	        // 在這邊post資料
	        post();
	      }
			//var datarows = $('#StaticDiv tbody tr').attr('data-json'); 
	       
		});
	function post(){

			 $.post('<?echo $this->config->item('base_url')?>/insertpage/show', $('#LoginForm').serialize(), function(data) {
</script>