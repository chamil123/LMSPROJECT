(function($) {

    

    $('#search').on('change', function() {
         var optionSelected = $(this).find("option:selected");
          var prop_type = optionSelected.val();
         // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        

          
     $.ajax({
            
           type: "get",
           url: "/searchbox/" ,
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           

           // url: "{{URL::to('search') }}",
            
            data: {
                'search' : prop_type,
            },
        
            success:function(data)
             {
             $("#ajax-body").html(data);
             },

             error: function() {
                console.log("error");
            }

      }); 
      
  });



})(jQuery);