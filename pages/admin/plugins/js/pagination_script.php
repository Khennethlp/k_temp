<script>
     document.querySelector('#sample_search').addEventListener("keyup", function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            search_sample_tbl(1);
        }
    });

    $(document).ready(function() {
        // load_sample_tbl();
        search_sample_tbl(1);
    });

    document.getElementById("sample_table_pagination").addEventListener("keyup", e => {
        var current_page = parseInt(document.getElementById("sample_table_pagination").value.trim());
        let total = sessionStorage.getItem('count_rows');
        var last_page = parseInt(sessionStorage.getItem('last_page'));
        if (e.which === 13) {
            e.preventDefault();
            console.log(total);
            if (current_page != 0 && current_page <= last_page && total > 0) {
                search_sample_tbl(current_page);
            }
        }
    });

    //get previous page
    const get_prev_page = () => {
        var current_page = parseInt(sessionStorage.getItem('sample_table_pagination'));
        let total = sessionStorage.getItem('count_rows');
        var prev_page = current_page - 1;
        if (prev_page > 0 && total > 0) {
            search_sample_tbl(prev_page);
        }
    }

    //get next page
    const get_next_page = () => {
        var current_page = parseInt(sessionStorage.getItem('sample_table_pagination'));
        let total = sessionStorage.getItem('count_rows');
        var last_page = parseInt(sessionStorage.getItem('last_page'));
        var next_page = current_page + 1;
        if (next_page <= last_page && total > 0) {
            search_sample_tbl(next_page);
        }
    }

    const load_sample_pagination = () => {
        var sample_search = sessionStorage.getItem('sample_search');
        var current_page = sessionStorage.getItem('sample_table_pagination');
        $.ajax({
            url: "../../process/admin/pagination_p.php",
            type: 'POST',
            cache: false,
            data: {
                method: 'sample_pagination',
                sample_search: sample_search,
            },
            success: function(response) {
                $('#sample_table_paginations').html(response);
                $('#sample_table_pagination').val(current_page);
                let last_page_check = document.getElementById("sample_table_paginations").innerHTML;
                if (last_page_check != '') {
                    let last_page = document.getElementById("sample_table_paginations").lastChild.text;
                    sessionStorage.setItem('last_page', last_page);
                }
            }
        });
    }

    const count_sample_tbl = () => {
        var sample_search = sessionStorage.getItem('sample_search');

        $.ajax({
            url: '../../process/admin/pagination_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_sample_tbl',
                sample_search: sample_search,
            },
            success: function(response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total: ${response}`;
                $('#sample_table_info').html(count);

                if (response > 0) {
                    load_sample_pagination();
                    document.getElementById("btnPrevPage").removeAttribute('disabled');
                    document.getElementById("btnNextPage").removeAttribute('disabled');
                    document.getElementById("sample_table_pagination").removeAttribute('disabled');
                } else {
                    document.getElementById("btnPrevPage").setAttribute('disabled', true);
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                    document.getElementById("sample_table_pagination").setAttribute('disabled', true);

                }
            }
        });
    }


    const load_sample_tbl = current_page => {
        $.ajax({
            url: '../../process/admin/pagination_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_pagination',
                current_page: current_page,

            },
            success: function(response) {
                document.getElementById("sample_tbl").innerHTML = response;
                count_sample_tbl();
                load_sample_pagination();
            }
        });
    }

    const search_sample_tbl = current_page => {
        var sample_search = document.getElementById('sample_search').value;
        var savedSearch = sessionStorage.getItem('sample_search');

        if (current_page > 1) {
            switch (true) {
                case sample_search !== savedSearch:
                    sample_search = savedSearch;

                    break;
                default:
            }
        } else {
            sessionStorage.setItem('sample_search', sample_search);
        }

        $.ajax({
            url: '../../process/admin/pagination_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'sample_search',
                sample_search: sample_search,
                current_page: current_page

            },
            success: function(response) {
                document.getElementById("sample_tbl").innerHTML = response;
                sessionStorage.setItem('sample_table_pagination', current_page);
                count_sample_tbl();
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
        var filename = 'Export_Pagination' + '_' + new Date().toLocaleDateString() + '.csv';
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