<?php
echo "<head>\n";
  echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n";

  echo "<title>".PAGE_TITLE."</title>\n";

  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".RELPATH."css/reset.css\" />\n";
  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".RELPATH."css/style.css\" />\n";
  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".RELPATH."css/editable.css\" />\n";
  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".RELPATH."css/jquery.fancybox-1.3.4.css\" />\n";
//  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".RELPATH."css/nivo-default.css\" media=\"screen\" />\n";
//  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".RELPATH."css/nivo-slider.css\" media=\"screen\" />\n";

  echo "<script type=\"text/javascript\" src=\"".RELPATH."js/jquery.js\"></script>\n";
//  echo "<script type=\"text/javascript\" src=\"".RELPATH."js/editable.js\"></script>\n";
//  echo "<script type=\"text/javascript\" src=\"".RELPATH."js/jquery-ui.js\"></script>\n";
  echo "<script type=\"text/javascript\" src=\"".RELPATH."js/jquery.fancybox-1.3.4.js\"></script>\n";
//  echo "<script type=\"text/javascript\" src=\"".RELPATH."js/custom.js\"></script>\n";
//==============Скрипт залипания меню у верхнего края страницы (начало)=========
/*	echo "<script type=\"text/javascript\">
	\$(document).ready(function(){
		var HeaderTop = \$('#subpage_area').offset().top;
			\$(window).scroll(function(){
				if( \$(window).scrollTop() > HeaderTop ) {
					\$('#subpage_area').css({position: 'fixed', top: '-35px'});
				} else {
					\$('#subpage_area').css({position: 'static'});
				}
			});
	});
	</script>";
*/
//==============Скрипт залипания меню у верхнего края страницы (конец)==========
echo "<script  type=\"text/javascript\">
\$(function(){

  \$('.task_edit').keypress(function(e){
    if(e.which == 13){
      return false;
    }
  });

  \$('.task_edit').focus(function(){
    oldVal = \$(this).text();
    id = \$(this).data('id');
  }).blur(function(){
    newVal = \$(this).text();
      //console.log(oldVal + '|' + newVal + '|' + id);
    if(newVal != oldVal){
      \$.ajax({
        url: '".RELPATH."save.php',
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
      console.log(\"Запрос отправлен!\");
    } else{
      //console.log(\"Ничего не изменилось!\");
    }
  });
});
</script>
";
echo "</head>";
?>

