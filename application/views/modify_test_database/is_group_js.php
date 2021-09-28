<script>

function isGroupCheck() {
    var checkBox = document.getElementById("isGroup");
    var gouprNametxt=document.getElementById("groupName");

    if (checkBox.checked == true) {
        gouprNametxt.readOnly=false;
    } else {
        gouprNametxt.value='';
        gouprNametxt.readOnly=true;
    }
}
</script>