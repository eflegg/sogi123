 
 document.addEventListener("DOMContentLoaded", function() {

    console.log('single filter');
 
 //single filter
 const ajaxFilter = document.getElementById( 'ajax-filter' )
 console.log('ajax filter: ', ajaxFilter);
 const cardContainer = document.querySelector( '.card-container' )
 
 const selectElem = ajaxFilter.querySelector('select');
 
 const postType = selectElem.getAttribute('data-type');
 console.log(postType);
 
 selectElem.addEventListener( 'change', event => {
     
     fetch( ajaxurl +'?action=ajaxfilter', {
         method: 'POST',
         headers: {
             'Content-Type': 'application/json'
         },
     // body: JSON.stringify( Object.fromEntries( formData.entries(),  ) ),
         body: JSON.stringify( { 
             'cat' : event.target.value,
       'dataType' : postType
       
         } ),
     
     }).then( response => {
         return response.text()
     }).then( response => {
 
         if( response ) {
             cardContainer.innerHTML = response;
         }
     
         console.log('response ', response );
     console.log(postType);
     
    
 
     }).catch( error => {
         console.log( error )
     })
 
 } )


});