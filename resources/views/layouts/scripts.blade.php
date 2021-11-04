<!-- <script src="js/jquery-1.11.1.min.js"></script>
 -->
 <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
	<script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>

	<script src="{{ asset('js/plugins/select2/select2.js') }}" ></script>

	<script src="js/custom.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>
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

	//   ======== GREATINGS ============


	  	var now = new Date();
		var hrs = now.getHours();
		var msg = "";

		if (hrs >  0) msg = "Morning' Sunshine!,"; // REALLY early
		if (hrs >  6) msg = "Good morning,";      // After 6am
		if (hrs > 12) msg = "Good afternoon,";    // After 12pm
		if (hrs > 17) msg = "Good evening,";      // After 5pm

		const textBox = document.getElementById("greatingText");
		textBox.innerText = msg;


		// Sidebar
	  	// var url = window.location.href;
		// var id = url.substring(url.lastIndexOf('/') + 1);
		// alert(id);
		 
	</script>
	@stack('plugin-scripts')
	@stack('custom-scripts')
