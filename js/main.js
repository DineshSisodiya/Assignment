
function getInformation(input_email) {
    $("select[name='employee_names']").css('display', 'none');
		var dataString = {
			email:input_email
		}
		$.ajax({
			type:'POST',
			url:'./get_information.php',
			dataType: 'json',
      		data: JSON.stringify(dataString),
      		contentType: 'application/json; charset=utf-8',
			success:function(data) {

				if(data['success']==true) {
					$("input[name='name']").val(data.list[0].name);
					$("input[name='dob']").val(data.list[0].dob);
					$("input[name='email']").val(data.list[0].email);
					$("input[name='address']").val(data.list[0].address);
					$("input[name='income']").val(data.list[0].income);
				}
			}
		});    
};

$(document).ready(function(){


	function findNames(input_name) {
		var dataString = {
			name:input_name
		}
		$.ajax({
			type:'POST',
			url:'./find_name.php',
			dataType: 'json',
      		data: JSON.stringify(dataString),
      		contentType: 'application/json; charset=utf-8',
			success:function(data) {

				if(data['success']==true) {
					var data_length = data.list.length;
					var select_list = '<select name="employee_names" size="'+data_length+'">';
					for(var i=0;i<data_length;i++) {
						select_list += '<option value='+data.list[i].email+' onclick="getInformation(\''+data.list[i].email+'\')">'+data.list[i].name+'</option>';
					}
					select_list += '</select>';
					$("#list_box").empty();
					$("#list_box").append(select_list);

				} else {
					$("select[name='employee_names']").css('display', 'none');
				}
			}
		});
	}

	$("input[name='name']").on('keyup', function(){
		$name_input=$.trim($(this).val()); 
		if($name_input.length > 0) {
			findNames($name_input);
		} else {
			$("select[name='employee_names']").css('display', 'none');
		}
	});
	
});