<script>

$(function() {

    $("#addProductForm").validate( {

        ignore: [], rules: {

            name: {

                required: true, minlength: 2, maxlength: 255

            }
            
        }

        , messages: {

            name: {

                required: 'Enter Product Name', minlength: 'please enter more word', maxlength: 'length is exceed'

            }

            

        }

    });

});



</script>