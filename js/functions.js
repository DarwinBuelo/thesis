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

// this variables are intended to be in the global scope to read the state of the function tracker

var switchs = false; // the state of the tracker if turned on or off

var start; // time the tracker is turned on
var end ; // time the tracker is ended

var id; // current id that is being tracked

function tracker(id){

	// onclick the function will check if the start variable is set
	// if the var start is not set then the program will set the start time
	// on the second click or unload the function will set the end time and will
	// send the result to the database tru ajax request with the item id.


	// problems 
	// ## the function will not trigger on unloading page, 
	//    nullifying the start value and not recording the last item being read
	if (switchs == false){
		start = new Date().getTime();
		console.log('start variable defined');
		console.log('turnedon');
		switchs = true;
	}else if(switchs == true && id ){
		end = new Date().getTime();
		console.log(end);
		console.log('turned off');
		switchs = false;
		var timeToRead = end - start;
		console.log(timeToRead/1000.0);

	}
}