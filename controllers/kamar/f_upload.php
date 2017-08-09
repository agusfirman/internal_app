<div class="upload_div">
    <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="controller/kamar/upload.php">
    	<input type="hidden" name="image_form_submit" value="1"/>
        <label>Choose Image</label>
        <input type="file" name="images[]" id="images" multiple >
        <div class="uploading none">
            <label>&nbsp;</label>
            <img src="assets/images/uploading.gif"/>
        </div>
    </form>
    </div>
<div class="gallery" id="images_preview"></div>

<script>
$(document).ready(function(){
	$('#images').on('change',function(){
		$('#multiple_upload_form').ajaxForm({
			target:'#images_preview',
			beforeSubmit:function(e){
				$('.uploading').hide();
			},
			success:function(e){
				$('.uploading').hide();
			},
			error:function(e){
			}
		}).submit();
	});
});
</script>
