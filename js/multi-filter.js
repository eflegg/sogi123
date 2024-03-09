
document.addEventListener("DOMContentLoaded", function() {
//ajax try again multi
const cardContainer = document.querySelector( '.card-container' )
const ajaxFilterMulti = document.getElementById( 'ajax-filter-multi' )
console.log('multi filter form: ', ajaxFilterMulti );


ajaxFilterMulti.addEventListener( 'change', event => {
	console.log('fired');
	event.preventDefault();



	const formData = new FormData( ajaxFilterMulti ) // similar to jQuery's serialize()
  console.log('form data: ', Array.from(formData) );
 



	fetch(  ajaxurl +'?action=ajaxfilter2', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify( Object.fromEntries( formData.entries() ) ),
     
	}).then( response => {
		return response.text()
	}).then( response => {

		if( response ) {
			cardContainer.innerHTML = response;
		} 
	
		console.log('response ', response);

	}).catch( error => {
		console.log( error )
	})

} )


});