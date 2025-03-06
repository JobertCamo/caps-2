{{-- <div class="w-full h-full flex items-center justify-center"> <!-- Set explicit height -->
    <canvas id="myChart" class="w-full h-full shrink-0"></canvas>
</div>


<script defer>
    try {
        const ctx = document.getElementById('myChart').getContext('2d');

        // Sample data for the chart
        const data = [
            { month: 'January', count: 45 },
            { month: 'February', count: 45 },
            { month: 'March', count: 100 },
            { month: 'April', count: 45 },
            { month: 'May', count: 45 },
            { month: 'June', count: 20 },
            
        ];

        // Initialize the chart
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(row => row.month),
                datasets: [
                    {
                        label: 'Monthly Data',
                        data: data.map(row => row.count),
                        backgroundColor: 'rgba(0, 0, 0, 0.1)', // Light black background for the line
                        borderColor: 'rgba(0, 0, 0, 1)', // Black line
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true, // Allows the chart to resize properly
                animation: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'black' // Make the legend text black
                        }
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: 'white', // Black tooltip background
                        titleColor: 'white', // White text inside tooltips
                        bodyColor: 'white'
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: 'black' // Make x-axis labels black
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'black' // Make y-axis labels black
                        }
                    }
                }
            }
        });

        // Handle window resize to ensure the chart resizes properly
        window.addEventListener('resize', () => {
            myChart.resize();
        });
    } catch (error) {
        console.error('Error rendering chart:', error);
    }
</script> --}}
@props(['chartData'])

<div>
    <canvas id="applicantChart"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('applicantChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar', // Change to 'line', 'pie', etc., if needed
                data: {
                    labels: @json(array_keys($chartData)), // Months
                    datasets: [{
                        label: 'Applicants per Month',
                        data: @json(array_values($chartData)), // Count of applicants
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    </script>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</div>
