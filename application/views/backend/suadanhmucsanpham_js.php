<script>
$(document).ready(function() {
	$('#loaidanhmuc').change(function() {
		var option = $(this).val();
		if(option==1){
			CKEDITOR.instances['editor1'].setData('');
			CKEDITOR.instances['editor2'].setData('');
			$('.nlsx').fadeIn('slow');
		}else{
			CKEDITOR.instances['editor1'].setData('');
			CKEDITOR.instances['editor2'].setData('');
			$('.nlsx').fadeOut('slow');
		}
	});
});
</script>