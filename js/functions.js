function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      jQuery('#preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}



function toggleModal(modal){
	 var modalStat = jQuery('.'+modal).css('display');
	 
	 if (modalStat == 'block'){
	 	jQuery('.'+modal).css('display','none');
	 }else{
	 	jQuery('.'+ modal).css('display','block');
	 }
}

function toggleModalId(modal){
	 var modalStat = $('#'+modal).css('display');
	 
	 if (modalStat == 'block'){
	 	$('#'+modal).css('display','none');
	 }else{
	 	$('#'+ modal).css('display','block');
	 }
}

function tracker(){


	// onclick the function will check if the start variable is set
	// if the var start is not set then the program will set the start time
	// on the second click or unload the function will set the end time and will
	// send the result to the database tru ajax request with the item id.


	
	var start = new Date().getTime();
	var end = new Date().getTime();

	var timeToRead = ( end - start )/1000 ;
	console.log(timeToRead)
}