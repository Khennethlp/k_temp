
<script>
    document.addEventListener("DOMContentLoaded", function() {
        load_sample_tbl();
    });

        const load_sample_tbl = () => {
        $.ajax({
            url: '../../process/admin/load_more_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_more',

            },
            success: function(response) {
                document.getElementById("load_more_table").innerHTML = response;
            }
        });
    }
 </script>