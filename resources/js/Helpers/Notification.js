class Notification{

	success(){
		new Noty({
		    type: 'success',
		    layout: 'topRight',
		    text: 'Successfully Done !',
		    timeout: 1000
		}).show();
	}

	alert(){
		new Noty({
		    type: 'alert',
		    layout: 'topRight',
		    text: 'are you sure !',
		    timeout: 1000
		}).show();
	}

	error(){
		new Noty({
		    type: 'error',
		    layout: 'topRight',
		    text: 'sumthing went wrong !',
		    timeout: 1000
		}).show();
	}

	warning(){
		new Noty({
		    type: 'warning',
		    layout: 'topRight',
		    text: 'Opps ! wrong',
		    timeout: 1000
		}).show();
	}

	image_validation(){
		new Noty({
		    type: 'error',
		    layout: 'topRight',
		    text: 'Upload Image less den 1 mb',
		    timeout: 2000
		}).show();
	}

}
export default Notification = new Notification();