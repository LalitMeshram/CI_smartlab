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
           , contact1: {

                required: true, minlength: 2, maxlength: 255

            }
           , address: {

                required: true, minlength: 2, maxlength: 255

            }
           , city: {

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
         ,   address: {

                required: 'Enter Address', minlength: 'please enter more word', maxlength: 'length is exceed'

            }
         ,   contact1: {

                required: 'Enter Contact No.', minlength: 'please enter more word', maxlength: 'length is exceed'

            }
         ,   city: {

                required: 'Enter City', minlength: 'please enter more word', maxlength: 'length is exceed'

            }

            

        }

    });

});



</script>