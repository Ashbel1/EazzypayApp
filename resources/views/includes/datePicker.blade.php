<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Eazzypay</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
  <main id="main" class="main">


    <div class="container">
    <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Date Range
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Left Side - Start and End Date Inputs -->
                <div class="row">
                    <div class="col">
                        <label for="start-date">Start Date</label>
                        <input type="text" class="form-control" id="start-date">
                    </div>
                    <div class="col">
                        <label for="end-date">End Date</label>
                        <input type="text" class="form-control" id="end-date">
                    </div>
                </div>
                <!-- Left Side - Calendar Carousel -->
                <div id="calendar" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Calendar slides will be dynamically added here -->
                    </div>
                    <a class="carousel-control-prev" href="#calendar" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#calendar" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- Right Side - Date Range Links -->
                <div class="date-range-links">
                    <a href="#" class="date-range-link" data-range="today">Today</a>
                    <a href="#" class="date-range-link" data-range="yesterday">Yesterday</a>
                    <a href="#" class="date-range-link" data-range="last-7-days">Last 7 Days</a>
                    <a href="#" class="date-range-link" data-range="this-month">This Month</a>
                    <a href="#" class="date-range-link" data-range="last-month">Last Month</a>
                    <a href="#" class="date-range-link" data-range="custom">Custom Range</a>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    
  </main><!-- End #main -->





<!-- for my dates -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- for my dates -->

<script>

document.addEventListener('DOMContentLoaded', function() {
    // Initialize the datepicker
    var startDatePicker = new Datepicker(document.getElementById('start-date'), {
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    var endDatePicker = new Datepicker(document.getElementById('end-date'), {
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    // Handle date range link clicks
    var dateRangeLinks = document.getElementsByClassName('date-range-link');
    for (var i = 0; i < dateRangeLinks.length; i++) {
        dateRangeLinks[i].addEventListener('click', function(e) {
            e.preventDefault();

            var range = this.dataset.range;
            var startDate = '';
            var endDate = '';

            // Calculate start and end dates based on the selected range
            if (range === 'today') {
                startDate = endDate = new Date().toISOString().slice(0, 10);
            } else if (range === 'yesterday') {
                var yesterday = new Date();
                yesterday.setDate(yesterday.getDate() - 1);
                startDate = endDate = yesterday.toISOString().slice(0, 10);
            } else if (range === 'last-7-days') {
                var last7DaysEndDate = new Date().toISOString().slice(0, 10);
                var last7DaysStartDate = new Date();
                last7DaysStartDate.setDate(last7DaysStartDate.getDate() - 6);
                startDate = last7DaysStartDate.toISOString().slice(0, 10);
                endDate = last7DaysEndDate;
            } else if (range === 'this-month') {
                var thisMonthEndDate = new Date().toISOString().slice(0, 10);
                var thisMonthStartDate = new Date(new Date().getFullYear(), new Date().getMonth(), 1);
                startDate = thisMonthStartDate.toISOString().slice(0, 10);
                endDate = thisMonthEndDate;
            } else if (range === 'last-month') {
                var lastMonthEndDate = new Date(new Date().getFullYear(), new Date().getMonth(), 0).toISOString().slice(0, 10);
                var lastMonthStartDate = new Date(new Date().getFullYear(), new Date().getMonth() - 1, 1);
                startDate = lastMonthStartDate.toISOString().slice(0, 10);
                endDate = lastMonthEndDate;
            } else if (range === 'custom') {
                // Handle custom range selection
                // You can use a date range picker plugin or create a custom UI for selecting start and end dates
                // Once the custom range is selected, update the startDate and endDate variables accordingly
            }

            // Update the input fields with the selected dates
            startDatePicker.setDate(startDate);
            endDatePicker.setDate(endDate);

            // Fetch data and update the datatable based on the selected date range
            fetchDataAndRenderDataTable(startDate, endDate);
        });
    }

    // Function to fetch data and render the datatable
    function fetchDataAndRenderDataTable(startDate, endDate) {
        // Make an AJAX request to fetch data based on the selected date range
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/sales?start_date=' + startDate + '&end_date=' + endDate);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                // Render the datatable using the fetched data
                // You can use a datatable library like DataTables to display the data
            } else {
                // Handle error
            }
        };
        xhr.onerror = function() {
            // Handle error
        };
        xhr.send();
    }
});
</script>

</body>

</html>