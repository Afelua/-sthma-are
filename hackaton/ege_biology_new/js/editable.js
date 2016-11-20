$(function(){

	$('.task_edit').keypress(function(e){
		if(e.which == 13){
			return false;
		}
	});

	$('.task_edit').focus(function(){
		oldVal = $(this).text();
		id = $(this).data('id');
	}).blur(function(){
		newVal = $(this).text();
			//console.log(oldVal + '|' + newVal + '|' + id);
		if(newVal != oldVal){
			$.ajax({
				url: 'ege_biology/save.php',
				type: 'POST',
				data: {
					value: newVal,
					id: id
				},
				success: function(res){
					//console.log(res);
				},
				error: function(){
					alert('Ошибка!')
				}
			});
			console.log("Запрос отправлен!");
		} else{
			//console.log("Ничего не изменилось!");
		}
	});
});