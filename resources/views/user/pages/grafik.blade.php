<!-- resources/views/your-blade-view.blade.php -->
@extends('user.layout.master')
@section('title', 'status jual')
@section('content')
<div class="container mt-5">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <h1>Grafik sampah</h1>
    
    <div id="pieChart" style="width: 100%; height: 400px;"></div>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var jsonData = @json($chartData); // This will inject the JSON data from the controller
            var data = google.visualization.arrayToDataTable(jsonData);

            var options = {
                title: 'Waste Types',
            };

            var chart = new google.visualization.PieChart(document.getElementById('pieChart'));

            chart.draw(data, options);
        }
    </script>
</div>
@endsection
