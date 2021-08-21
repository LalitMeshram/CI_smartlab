<script>
    var enterMap = new Map();
    function getFindingDetail() {
        $.ajax({

            url: '<?php echo base_url(); ?>view_finding/' +<?php echo $caseId; ?>,

            type: 'GET',

            dataType: 'json',
            async: false,

            success: function (response) {


                if (response.ResponseCode == 200) {
                    var keyArr = Object.keys(response.Data);
                    for (var i = 0; i < keyArr.length; i++) {
//                        var val=keyArr[i];
//                        console.log(val);
//                        var temp=response.Data.val;
//                    console.log(temp);
//                        enterMap.set(keyArr[i],temp);

                        

                    }
//                    console.log(enterMap);

                }

            }

        });
    }
    getFindingDetail();


</script>