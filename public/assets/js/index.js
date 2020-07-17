
(function($) {

    var i = 1;
    $('#add').click(function () {
        i++;
        $('#dynamic_field').append('' +
            '<tr id="row' + i + '" class="dynamic-added">'+
            '<td><label for="" style="padding-top:10px">'+i+'</label></td>'+
            '<td><input type="text" name="shortanswer_value[]" placeholder="Enter answer" class="form-control name_list"/></td>' +
           
            '<td><button type="button" name="remove" id="' + i + '"  class="btn btn-danger btn_remove">delete</button></td>'+
            '</tr>');
    });
    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr('id');
        $('#row' + button_id + '').remove();
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#submit').click(function () {
        $.ajax({
            url: "/dynamic_field",
            method: "POST",
            data: $('#add_name').serialize(),
            type: 'json',
            success: function (data) {
                if (data.error) {
                    printErrorMsg(data.error);
                } else {
                    i = 1;
                    $('.dynamic-added').remove();
                    $('#add_name')[0].reset();
                    $(".print-success-msg").find("ul").html('');
                    $(".print-success-msg").css("display", "block");
                    $(".print-error-msg").css("display", "none");
                    $(".print-success-msg").find("ul").append('<li>Record Inserted Successsfuly</li>');
                }
            }
        });
    });
    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css("display", "block");
        $(".print-success-msg").css("display", "none");
        $.each(msg, function (key, value) {
            $(".print-success-msg").find("ul").append('<li>' + value + '</li>');
        })

    }






    
      
      $('#para').click(function () {
       alert("ok");
    });
    


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


  //
  $('#pape-category').on('change', function() {
    var optionSelected = $(this).find("option:selected");
     var prop_type = optionSelected.val();
     var cat= $('#paper-drop').val();
      if(cat==''){
        alert("please select a paper first");
      }

      
     
    // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

   

 
$.ajax({
       
      type: "get",
      url: "/fillbox/" ,
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
      

      // url: "{{URL::to('search') }}",
       
       data: {
           'papertypeval' : prop_type,
           'qid' : cat,
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