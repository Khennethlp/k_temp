<script>
    $(document).ready(function() {
        // load_sample_t1_data(1);
        load_sample_table();
    });



    const add_account = () => {
        var emp_id = document.getElementById('add_emp_id').value;
        var fullname = document.getElementById('add_fullname').value;
        var username = document.getElementById('add_username').value;
        var password = document.getElementById('add_password').value;
        var section = document.getElementById('add_section').value;
        var role = document.getElementById('add_user_type').value;

        if (emp_id === '' || fullname === '' || username === '' || password === '' || section === '' || role === '') {
            Swal.fire({
                icon: 'info',
                title: 'Fields must not be empty !!!',
                text: 'information',
                showConfirmButton: true,
                // timer: 1000
            });
        } else {
            $.ajax({
                type: "POST",
                url: '../../process/admin/accounts_p.php',
                cache: false,
                data: {
                    method: 'add_account',
                    emp_id: emp_id,
                    fullname: fullname,
                    username: username,
                    password: password,
                    section: section,
                    role: role,
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Recorded !!!',
                            text: 'Success',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        $('#add_acc').modal('hide');
                        $('#add_emp_id').val('');
                        $('#add_fullname').val('');
                        $('#add_username').val('');
                        $('#add_password').val('');
                        $('#add_user_type').val('');
                        load_accounts();
                    } else if (response == 'duplicate') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Duplicate Data !!!',
                            text: 'Information',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        $('#add_acc').modal('hide');
                        $('#add_emp_id').val('');
                        $('#add_fullname').val('');
                        $('#add_username').val('');
                        $('#add_password').val('');
                        $('#add_user_type').val('');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error !!!',
                            text: 'Error',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
                }
            });
        }
    }

    const search_accounts = () => {
        var search_account = document.getElementById('search_accounts').value;

        $.ajax({
            url: "../../process/admin/accounts_p.php",
            type: 'POST',
            cache: false,
            data: {
                method: 'sample_search_accounts',
                search_account: search_account,
            },
            success: function(response) {
                document.getElementById("sample_tbl_accounts").innerHTML = response;
                // count_sample_t1_data();
            }
        });

    }

    const printTable_accounts = () => {
        // var date_from = document.getElementById("date_from");
        // var date_to = document.getElementById("date_to");
        var search_accounts = document.getElementById("search_accounts").value;

        if (search_accounts) {
            window.open('../../process/admin/print/print_accounts.php?q=' + search_accounts, 'Print Account', 'width=600, height=520');
        } else {
            window.open('../../process/admin/print/print_accounts.php', 'Print Account', 'width=600, height=520');
        }
    }

    document.getElementById("tbl_div").addEventListener("scroll", function() {
        var scrollTop = document.getElementById("tbl_div").scrollTop;
        var scrollHeight = document.getElementById("tbl_div").scrollHeight;
        var offsetHeight = document.getElementById("tbl_div").offsetHeight;

        //check if the scroll reached the bottom
        if ((offsetHeight + scrollTop + 1) >= scrollHeight) {
            get_next_page();
        }
    });

    const get_next_page = () => {
        // var current_table = parseInt(sessionStorage.getItem('t_table_number'));
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));
        let total = sessionStorage.getItem('count_rows');
        var last_page = parseInt(sessionStorage.getItem('last_page'));
        var next_page = current_page + 1;
        if (next_page <= last_page && total > 0) {
            load_sample_t1_data(next_page);
        }
    }

    const load_sample_t1_data_last_page = () => {
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));
        $.ajax({
            url: '../../process/admin/accounts_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_sample_t1_data_last_page'
            },
            success: function(response) {
                sessionStorage.setItem('last_page', response);
                let total = sessionStorage.getItem('count_rows');
                var next_page = current_page + 1;
                if (next_page > response || total < 1) {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                } else {
                    document.getElementById("btnNextPage").style.display = "block";
                    document.getElementById("btnNextPage").removeAttribute('disabled');
                }
            }
        });
    }

    const load_sample_table = () => {
        load_accounts();
        setTimeout(() => {
            load_sample_t1_data(1);
        }, 500);
    }

    const load_accounts = current_page => {
        sessionStorage.setItem('t_table_number', 1);
        // var search_account = document.getElementById('table_search');
        // $.ajax({
        //     url: "../../process/admin/accounts_p.php",
        //     type: 'POST',
        //     cache: false,
        //     data: {
        //         method: 'sample_accounts',
        //         // search_account: search_account,
        //         current_page: current_page
        //     },
        //     success: function(response) {
        //         if (current_page == 1) {
        //         document.getElementById("sample_tbl_accounts").innerHTML = response;
        //         }
        //         // search_accounts();
        //         sessionStorage.setItem('t_table_pagination', current_page);
        //         count_sample_t1_data();
        //     }
        // });
    }

    const load_sample_t1_data = current_page => {
        $.ajax({
            url: '../../process/admin/accounts_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_sample_t1_data',
                current_page: current_page
            },
            success: function(response) {
                // $('#sample_tbl_accounts').html(response);
                if (current_page == 1) {
                    $('#sample_tbl_accounts').html(response);
                } else {
                    $('#sample_tbl_accounts').append(response);
                }
                sessionStorage.setItem('t_table_pagination', current_page);
                count_sample_t1_data();  
            }
        });
    }

    const count_sample_t1_data = () => {
        var search_account = document.getElementById('search_accounts').value;
        $.ajax({
            url: '../../process/admin/accounts_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_sample_t1_data',
            },
            success: function(response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total Record: ${response}`;
                $('#t_table_info').html(count);

                if (response > 0) {
                    load_sample_t1_data_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const exportCSV = (table_id, separator = ',') => {
        // Select rows from table_id
        var rows = document.querySelectorAll('table#' + table_id + ' tr');
        // Construct csv
        var csv = [];
        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll('td, th');
            for (var j = 0; j < cols.length; j++) {
                var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
                data = data.replace(/"/g, '""');
                // Push escaped string
                row.push('"' + data + '"');
            }
            csv.push(row.join(separator));
        }
        var csv_string = csv.join('\n');
        // Download it / change the file name
        var filename = 'Export_Accounts' + '_' + new Date().toLocaleDateString() + '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(csv_string));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

    }
</script>