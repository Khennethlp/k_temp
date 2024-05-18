<script>
    $(document).ready(function() {
        load_accounts();
    });

    const load_accounts = () => {
        var search_account = document.getElementById('table_search');
        $.ajax({
            url: "../../process/admin/accounts_p.php",
            type: 'POST',
            cache: false,
            data: {
                method: 'sample_accounts',
                search_account:search_account,
            },
            success: function(response) {
                document.getElementById("sample_tbl_accounts").innerHTML = response;
                // search_accounts();
            }
        });
    }

    // const search_accounts = () => {
    //     var search_account = document.getElementById('table_search');

    //     $.ajax({
    //         url: "../../process/admin/accounts_p.php",
    //         type: 'POST',
    //         cache: false,
    //         data: {
    //             method: 'sample_search_accounts',
    //             search_account:search_account,
    //         },
    //         success: function(response) {
    //             document.getElementById("sample_tbl_accounts").innerHTML = response;
    //         }
    //     });

    // }
</script>