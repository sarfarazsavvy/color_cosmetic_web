<script src="js/jquery-1.11.1.min.js"></script>
	<script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>

	<script src="{{ asset('js/plugins/select2/select2.js') }}" ></script>

	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
          var chart1 = document.getElementById("line-chart").getContext("2d");
              window.myLine = new Chart(chart1).Line(lineChartData, {
              responsive: true,
              scaleLineColor: "rgba(0,0,0,.2)",
              scaleGridLineColor: "rgba(0,0,0,.05)",
              scaleFontColor: "#c5c7cc"
          });
      };

		// Sidebar

	  	// var url = window.location.href;
		// var id = url.substring(url.lastIndexOf('/') + 1);
		// alert(id);
	</script>
	@stack('plugin-scripts')
	@stack('custom-scripts')
