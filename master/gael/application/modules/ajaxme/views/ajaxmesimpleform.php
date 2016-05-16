
ajaxmeview

<?php 
if(isset($module)){
	if(is_array($module)){

		$this->load->module($module['module']);
		echo '
		<div class="ajaxdiv" id="simpleajaxdiv' . $module['module'] . $module['methode'] . '">';
		if(is_array($module['data'])){
			// if data is array we implode and put all the arguments in the methode 
			call_user_func_array(array($this->$module['module'], $module['methode']), $module['data']);

		}else{
		
			$this->$module['module']->$module['methode']($module['data']);
			
		}
		echo '
		</div>';
		echo '<script type="text/javascript" >
			var simpleajaxdiv = "#simpleajaxdiv'  . $module['module'] . $module['methode'] . '";
		</script>';

	}else{
		$this->load->module($module);
		
		echo '
<div class="ajaxdiv" id="simpleajaxdiv' . $module . $methode . '">';
		
		$this->$module->$methode(); 

		echo '
</div>';

		echo '
<script type="text/javascript" >
	var simpleajaxdiv = "#simpleajaxdiv' . $module . $methode . '";
</script>';
	}
}
?>
<script type="text/javascript" >
$(document).ready(function(){
	ajaxForm($(simpleajaxdiv + " form:first-child"));
	
});

function ajaxForm(form) {
		$(form).on('submit', function() {
			
			var obj = $(this), // (*) references the current object/form each time
			url = obj.attr('action'),
			method = obj.attr('method'),
			data = {};

			obj.find('[name]').each(function(index, value) {
				// console.log(value);
				var obj = $(this),
				name = obj.attr('name'),
				value = obj.val();

				data[name] = value;
			});
			
			sendData(url, method, data, simpleajaxdiv);
			return false; //disable refresh
		});
}

function sendData(url, method, data, div){ 
	$.ajax({
		// see the (*)
		url: url,
		type: method,
		data: data,
		success: function(response) {			
			if(response == "<?php echo $this->lang->line('success');?>"){
				alert(response);
				$(div).html("");
			}else{
				$(div).html(response);
				form = $(div +" form:first-child");
				ajaxForm(form);
			}
		}
	});  
}

</script>