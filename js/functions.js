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

var currentId = null; // current id that is being tracked

function tracker(id){


	if ( id !== currentId && currentId !== null ){
		//if the user has click to another item without closing the current one
		end = new Date().getTime();
		console.log('current id turning off and creating new id start time');
		console.log(currentId)
		var timeToRead = (end - start)/1000.0;
		console.log(timeToRead);
		//send data to the database
		jQuery.post(
			'process.php',
			{	task:'user_log',
				contentId : currentId,
				time_spent : timeToRead
			}
			);
		
		currentId = id;
		start = new Date().getTime();
		switchs = true;
	}else if (switchs == false){
		//if the user has click to an item.
		start = new Date().getTime();
		console.log('turnedon');
		switchs = true;
		currentId = id;
		console.log(id);

	}else if(switchs == true){
		end = new Date().getTime();
		console.log('turned off');
		switchs = false;
		var timeToRead = (end - start)/1000.0;
		console.log(timeToRead);
		
		jQuery.post(
			'process.php',
			{	task:'user_log',
				contentId : currentId,
				time_spent : timeToRead
			}
		);

		currentId = null;
	}
}