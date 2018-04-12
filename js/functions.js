function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}



function toggleModal(){
	 var modal = $('.modal').css('display');
	 
	 if (modal == 'block'){
	 	$('.modal').css('display','none');
	 }else{
	 	$('.modal').css('display','block');
	 }
}