// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Direct", "Referral", "Social"],
    datasets: [{
      data: [55, 30, 15],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    responsive: true,
    plugins: {
      legend: {
        display:true,
        position: 'bottom',
      },
      title: {
        display: true,
        text: 'Chart.js Pie Chart'
      }
    }
  }
});

$.get('/api/dashboard/sumByMode',function(data){
  console.log(data)
  label = data.map(function(e){
    return e.name
  })
  dataChart = data.map(function(e){
    return parseInt(e.total)
  })
  console.log(label)
  console.log(dataChart)
  myPieChart.data.labels=label
  myPieChart.options.plugins.legend.position='bottom'
  myPieChart.data.datasets[0].data = dataChart
  myPieChart.update()
})