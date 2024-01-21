// public/js/chart-scripts.js

// Mã cho biểu đồ cột
var barCanvas = document.getElementById('barChart');
var barData = {
    labels: JSON.parse(barCanvas.getAttribute('data-labels')),
    datasets: [{
        label: 'Total Quantity Sold',
        data: JSON.parse(barCanvas.getAttribute('data-data')),
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
    }]
};

var barCtx = barCanvas.getContext('2d');
var barChart = new Chart(barCtx, {
    type: 'bar',
    data: barData,
});

// Mã cho biểu đồ tròn
var pieCanvas = document.getElementById('pieChart');
var pieData = {
    labels: JSON.parse(pieCanvas.getAttribute('data-labels')),
    datasets: [{
        data: JSON.parse(pieCanvas.getAttribute('data-data')),
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
        ],
        borderWidth: 1
    }]
};

var pieCtx = pieCanvas.getContext('2d');
var pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: pieData,
    plugins: [ChartDataLabels],
    options: {
        plugins: {
            datalabels: {
                formatter: (value, ctx) => {
                    let label = ctx.dataset.data[ctx.dataIndex];
                },
                color: '#000000',
                anchor: 'end',
                align: 'start',
                offset: -5
            }
        }
    }
});
