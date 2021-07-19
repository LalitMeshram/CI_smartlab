<script>

var pricing = new Map();
    function getPricing() {
        $.ajax({

                url: 'get_packages',

                type: 'get',

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        
                        var data=``;
                        var package_details;
                        for(var i=0;i<response.data.length;i++){
                            pricing.set(response.data[i].packageId,response.data[i]);
                            data +=`<div class="col-lg-3">
                  <div class="box text-center p-50 bg-img box-inverse" style="background-image: url(<?php echo base_url().'resource';?>/img/pricing_bg1.jpg)" data-overlay="7">
                  <div class="box-body">
                    <h5 class="text-uppercase text-muted">`+response.data[i]['plan_name']+`</h5>
                    <h3 class="font-weight-100 font-size-30">`+response.data[i]['amount']+`</h3>
                    <small>Duration: `+response.data[i]['duration']+` year</small>

                    <hr style="background-color: #fff;">`;

                    
                        package_details=response.data[i]['package_details'];
                        console.log(package_details);
                        for(var j=0;j<package_details.length;j++){
                            data +=`<p><strong>`+package_details[j]['details']+`</strong></p>`;
                        }
                        
                        
                    data +=`<br><br>
                    <a class="btn btn-bold btn-block btn-outline btn-white" href="#" onclick="selectPlan(`+response.data[i]['packageId']+`);">Select plan</a>
                  </div>
                </div>
              </div>`;
                        }
                        
                        
                    } else {


                    }
                    $('#planList').html(data);
                    console.log(data);
                }

            });
    }



   getPricing();

function selectPlan(planId){
planId = planId.toString();
if(pricing.has(planId)){
    var package = pricing.get(planId);
    console.log(package);
    $('#amount').val(package.amount);
    $('form[name=paymentform]').submit();
}else{
    alert('No plan');
}
}

</script>
