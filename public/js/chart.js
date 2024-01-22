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

