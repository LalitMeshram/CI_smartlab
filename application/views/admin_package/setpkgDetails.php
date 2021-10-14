<script>
var pkgList = new Map();
var pkgId=<?php echo $pkgId; ?>;

function setDetails(){
    
   
    
    let pkg = pkgList.get(pkgId.toString());
    console.log(pkg);
    $('#packageId').val(pkg.packageId);
    $('#plan_name').val(pkg.plan_name);
    $('#amount').val(pkg.amount);
    $('#duration').val(pkg.duration);

    var details=pkg.package_details;
    var tableData = '';
    for(var i=0;i<details.length;i++){

        tableData += `<tr id="r` + details[i].details.replace(/ /g, "_") + `">
                        <td>` + details[i].details + `</td>
                        <td>
                        <button class="btn btn-danger btn-xs" onclick="deleteFeature('` + details[i].details.replace(/ /g,
                "_") + `')" type="button"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;

    }

    $('#featureList').html(tableData);

}

function setpkgDetails() {
  

    $.ajax({

        url: '<?php echo base_url("get_packages")?>',

        type: 'GET',

        dataType: 'json',

        success: function(response) {


            if (response.status == 200) {

                if (response.data.lenght != 0) {
                    for (var i = 0; i < response.data.length; i++) {
                        pkgList.set(response.data[i].packageId, response.data[i]);

                    }
                    
                    if(pkgId>0){
                        setDetails();
                    }
                    

                }

            }

        }

    });





}

setpkgDetails();
</script>