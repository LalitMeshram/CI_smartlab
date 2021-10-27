<script>

$(function() {

    $("#patientRegForm").validate( {

        ignore: [], rules: {

            contact_number: {

                required: true, minlength: 10, maxlength: 10,digits: true

            }
          
           , alternate_number: {

                minlength: 10, maxlength: 10,digits: true

            }
            
        }

        , messages: {

            contact_number: {

                required: 'Please Enter Contact Number', minlength: 'please enter valid number', maxlength: 'please enter valid number',digits: 'only Allow digits'

            }
          
         ,   alternate_number: {

            minlength: 'please enter valid number', maxlength: 'please enter valid number',digits: 'only Allow digits'

            }

            

        }

    });

});



</script>