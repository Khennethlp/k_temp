<script>
    $(document).ready(function() {
        load_sample_tbl();

        const date_from = document.getElementById("date_from");
        const date_to = document.getElementById("date_to");
        const search_index = document.getElementById("search_index");
        const btn = document.getElementById("btnClear");
        const searchDate = document.getElementById("searchDate");
        const show_date = document.getElementById("show_date");

        let qw = false;
        const toggleButtonVisibility = () => {
            qw = !qw;
            if ((date_from.value !== '' && date_to.value !== '') || search_index.value.length > 0) {
                btn.style.display = "block";
            } else {
                btn.style.display = "none";
            }
            // toggleDates();

        };

        let isDateVisible = false;
        const toggleDates = () => {
            isDateVisible = !isDateVisible; // Toggle the visibility state

            date_from.style.display = isDateVisible ? 'block' : 'none';
            date_to.style.display = isDateVisible ? 'block' : 'none';
            // searchDate.style.display = isDateVisible ? 'block' : 'none';
        }

        // Initially hide the button and date inputs
        btn.style.display = "none";
        // searchDate.style.display = "none";
        date_from.style.display = "none";
        date_to.style.display = "none";

        // Add event listeners to the date input fields
        date_from.addEventListener('input', toggleButtonVisibility);
        date_to.addEventListener('input', toggleButtonVisibility);
        search_index.addEventListener('input', toggleButtonVisibility);

        show_date.addEventListener('click', toggleDates);

        btn.addEventListener('click', () => {
            if ((date_from.value !== '' && date_to.value !== '') || search_index !== '') {
                date_from.value = '';
                date_to.value = '';
                search_index.value = '';
                btn.style.display = "none";
                load_sample_tbl();
            }
            // btn.style.display = "none";
        });

        document.querySelector('#search').addEventListener('keyup', function(e) {
            if(e.key === 'Enter'){
                e.preventDefault();
                search();
            }
        });
    });

    const printTable_index = () => {
        var date_from = document.getElementById("date_from").value;
        var date_to = document.getElementById("date_to").value;
        var search_index = document.getElementById("search_index").value;

        if (search_index && date_from && date_to) {
            window.open('../../process/admin/print/print_dashboard.php?search_by=' + encodeURIComponent(search_index) + '&date_from=' + encodeURIComponent(date_from) + '&date_to=' + encodeURIComponent(date_to), '_blank', 'width=600, height=520');
        } else if (search_index) {
            window.open('../../process/admin/print/print_dashboard.php?search_by=' + encodeURIComponent(search_index), '_blank', 'width=600, height=520');
        } else if (date_from && date_to) {
            // var data_url = encodeURIComponent(search_index)+ '&date_from=' + encodeURIComponent(date_from) + '&date_to=' + encodeURIComponent(date_to);
            window.open('../../process/admin/print/print_dashboard.php?date_from=' + encodeURIComponent(date_from) + '&date_to=' + encodeURIComponent(date_to), '_blank', 'width=600, height=520');
        } else {
            window.open('../../process/admin/print/print_dashboard.php', '_blank', 'location=yes,width=600, height=520,scrollbars=yes,status=yes');
        }
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
        var filename = 'Export_Index' + '_' + new Date().toLocaleDateString() + '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(csv_string));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

    }

    const load_sample_tbl = () => {

        $.ajax({
            url: '../../process/admin/dashboard_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_dashboard',
            },
            success: function(response) {
                document.getElementById("index_table").innerHTML = response;

            }
        });
    }

    const search = () => {
        var search = document.getElementById("search_index").value;
        var dFrom = document.getElementById("date_from").value;
        var dTo = document.getElementById("date_to").value;

        $.ajax({
            url: '../../process/admin/dashboard_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'search',
                search: search,
                dFrom: dFrom,
                dTo: dTo,
            },
            success: function(response) {
                document.getElementById("index_table").innerHTML = response;
                // load_sample_tbl();
            }
        });
    }
</script>