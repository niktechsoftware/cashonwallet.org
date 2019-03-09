'use strict'

$(document).on('click', '.profileImg',(evt) => {
	let id = evt.currentTarget.attributes['data-id'].value;
	if(id > 0){
		let url = window.location.href.split('/');
		if(url.length == 8){
			url[url.length - 1] = id;
			window.location.href = `${url.join('/')}`;
		}
		else{
			url[url.length - 1] = 'binarySubGroup';
			window.location.href = `${url.join('/')}/${id}`;
		}
	}
})