// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

$.ajax({
  url: "consulta_cpa.php",
  type: "POST",
}).done(function (resp) {
  var clientes = parseInt(resp[0]);
  var productos = parseInt(resp[1]);
  var admins = parseInt(resp[2]);
  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: "doughnut",
    data: {
      labels: ["Clientes", "Productos", "Administradores"],
      datasets: [
        {
          data: [clientes, productos, admins],
          backgroundColor: ["#4e73df", "#1cc88a", "#f6c23e"],
          hoverBackgroundColor: ["#2e59d9", "#17a673", "#f2ad2f"],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: "#dddfeb",
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false,
      },
      cutoutPercentage: 80,
    },
  });
});
