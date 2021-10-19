(function($){
$.get( "http://localhost:8000/service-cookie", function( data ) {
  for(i in data){
    item = data[i];
    console.log(item);
    $( "body" ).append(`
       <script>ticket_id=${item}</script>
      
    `);
  }
});

})(jQuery); 
