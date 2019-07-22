<script>
$(document).ready(function() {
	$('#danhmuccha').change(function() {
		var option = $('option:selected', this).attr('nlsx');
		if(option==1){
			CKEDITOR.instances['editor5'].setData('');
			CKEDITOR.instances['editor6'].setData('');
			$('.nlsx').fadeIn('slow');
		}else{
			CKEDITOR.instances['editor5'].setData('');
			CKEDITOR.instances['editor6'].setData('');
			$('.nlsx').fadeOut('slow');
		}
	});
});
</script>