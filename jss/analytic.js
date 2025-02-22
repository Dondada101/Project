const ctx = document.getElementById('myChart');
const ctx1 = document.getElementById('myChart1');
let myChart;
let myChart1;
let jsonData;
let jsonData1;
fetch('json/data.json')
        .then(function(response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Network response was not ok.');
            }
        })
        .then(data => {
          jsonData = data.data1;
          jsonData1 = data.data2;
          createChartData1(jsonData, 'bar');
          createChartData2(jsonData1, 'line');
        })
        .catch(error => console.error('Error fetching data:', error));

function setChartType(chartType){
  myChart.destroy();
  createChartData1(jsonData,chartType);
}
function setChartType1(chartType){
  myChart1.destroy();
  createChartData2(jsonData1,chartType);
}
function createChartData1(data,type){
  const dname=data.map(item => item.dname);
  const dreqcount=data.map(item=> item.reqcount);
  const barColors = data.map((_, index) => {
    const colors = ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(231, 76, 60, 0.2)'];
    return colors[index % colors.length];
});
const borderColors = data.map((_, index) => {
    const colors = ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(231, 76, 60, 1)'];
    return colors[index % colors.length];
});
  myChart=new Chart(ctx, {
    type: type,
    data: {
      labels: dname,
      datasets: [{
        label: 'Number of request',
        data: dreqcount,
        borderWidth: 1,
        backgroundColor:'rgb(212, 208, 208)'
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      maintainAspectRatio:false
    }
  });
}
function createChartData2(data,type){
  const hname=data.map(item => item.hname);
  const hreqcount=data.map(item=> item.reqcount);
  const barColors = data.map((_, index) => {
    const colors = ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(231, 76, 60, 0.2)'];
    return colors[index % colors.length];
});
const borderColors = data.map((_, index) => {
    const colors = ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(231, 76, 60, 1)'];
    return colors[index % colors.length];
});
  myChart1=new Chart(ctx1, {
    type: type,
    data: {
      labels: hname,
      datasets: [{
        label: 'Number of request',
        data: hreqcount,
        borderWidth: 1,
        backgroundColor:barColors,
        borderColor:borderColors
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      maintainAspectRatio:false
    }
  });
}
  