<?php include 'main.php';?>

<script>
    function loc() {
        var alllocation = <?php echo json_encode($data); ?>;
        console.log(alllocation);
        var index;
        for (index in alllocation) {
            var result =alllocation[index];
            if (result !== null) {
                codeAddress(result);
            }

        }
    }
</script>
