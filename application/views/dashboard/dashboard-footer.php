
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/dashboard/js/jquery-1.11.1.min.js"></script>
	<script src="<?=base_url()?>assets/dashboard/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/dashboard/js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
	
 
 <script src="<?=base_url()?>assets/dashboard/js/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
 
<!-- ********************** to add 	ckeditor ----------------------->
	
	  <script src="<?=base_url()?>assets/dashboard/ckeditor/ckeditor/ckeditor.js" type="text/javascript"></script>
         <script src="<?=base_url()?>assets/dashboard/ckeditor/css/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        
        

            $(function() {
          //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();
   });


            $(function() {
                CKEDITOR.replace('editor1');
                 $(".textarea").wysihtml5();
            });
            
             $(function() {
                CKEDITOR.replace('editor2');
                 $(".textarea").wysihtml5();
            });
        </script>
<!-- ********************** // to add ckeditor ----------------------->
 
        
</body>

</html>