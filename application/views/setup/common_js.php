<script> //img preview code ######DON'T REMOVE ####
    var $loading = $('#loader').hide();
    $(document)
            .ajaxStart(function () {
                console.log('loader ok');
                $loading.show();

            })
            .ajaxStop(function () {
                $loading.hide();
            });

            </script>
            <style>
    
    #loader {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.75) url('<?php echo base_url('db/image/loader.gif');?>') no-repeat center center;
        z-index: 10000;
    }
    
    </style>