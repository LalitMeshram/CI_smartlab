<script>

    $(function () {

        $("#register").validate({

            ignore: [], rules: {

                fullname: {

                    required: true, minlength: 2, maxlength: 255

                },

                emailId: {

                    required: true, email: true, minlength: 2, maxlength: 255

                },
                contact_number: {

                    required: true, minlength: 10, maxlength: 10

                },
                password: {

                    required: true, minlength: 2, maxlength: 20

                },
                upassword: {

                    required: true, equalTo: '#password', minlength: 2, maxlength: 20

                }

            }

            , messages: {

                fullname: {

                    required: 'Enter Full Name', minlength: 'please enter more word', maxlength: 'length is exceed'

                },

                emailId: {

                    required: 'Enter email id', minlength: 'please enter more word', maxlength: 'length is exceed'

                },
                contact_number: {

                    required: 'Enter contact Number', minlength: 'please enter Valid Mobile Number', maxlength: 'please enter Valid Mobile Number'

                },
                password: {

                    required: 'Enter Password', minlength: 'please enter more Character', maxlength: 'length is exceed'

                },
                upassword: {

                    required: 'Enter confirm password', equalTo: 'Password not match!', minlength: 'please enter more Character', maxlength: 'length is exceed'

                }

            }
            ,
            errorElement: 'p',
            errorLabelContainer: '.errorTxt'


        });

    });



</script>