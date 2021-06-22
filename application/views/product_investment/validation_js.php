<script>

$(function() {

    $("#addUserForm").validate( {

        ignore: [], rules: {

            business_name: {

                required: true, minlength: 2, maxlength: 255

            }
          ,  owner_name: {

                required: true, minlength: 2, maxlength: 255

            }
           , emailid: {

                required: true, minlength: 2, maxlength: 255

            }
            
        }

        , messages: {

            business_name: {

                required: 'Enter Bussiness Name', minlength: 'please enter more word', maxlength: 'length is exceed'

            }
          ,  owner_name: {

                required: 'Enter Client Name', minlength: 'please enter more word', maxlength: 'length is exceed'

            }
         ,   emailid: {

                required: 'Enter Email Id Name', minlength: 'please enter more word', maxlength: 'length is exceed'

            }

            

        }

    });

});



</script>