<!-- dataTable_script.php -->
 <script>
    document.addEventListener("DOMContentLoaded", function() {
        load_sample_tbl();
    });

        const load_sample_tbl = () => {
        $.ajax({
            url: '../../process/admin/dataTable_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_dt',

            },
            success: function(response) {
                document.getElementById("dt_tbody").innerHTML = response;
            }
        });
    }
 </script>