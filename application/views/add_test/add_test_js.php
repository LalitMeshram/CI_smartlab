<script>

    $('#outsourceCheck').click(function () {
        if ($(this).prop("checked") == true) {
            $("#outsourcelabAmount").removeAttr("disabled");
            $("#outsourcelabId").removeAttr("disabled");
        } else if ($(this).prop("checked") == false) {
            $("#outsourcelabAmount").attr("disabled", "disabled");
            $("#outsourcelabId").attr("disabled", "disabled");
        }
    });

</script>