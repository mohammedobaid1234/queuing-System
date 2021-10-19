require('./bootstrap');

// require('alpinejs');
// window.Echo.channel(`service-${item}`)
//           .listen('.ticket', (e) => {
//            alert('you ticket is ready');
//          });
(function($){
    $.get( "http://localhost:8000/service-cookie", function( data ) {
        for(i in data){
            item = data[i];
            console.log(item);
          window.Echo.channel(`service-${item}`)
          .listen('.ticket', (e) => {
           alert(`you ticket # ${e.ticket_id} is ready`);
         });
        
      }
      
    });
    
})(jQuery); 