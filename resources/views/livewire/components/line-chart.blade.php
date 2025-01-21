<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;

new class extends Component {
    
    public $chartData = [];

    public function mount()
    {
        // Replace 'your_table' with the name of your database table
        $this->chartData = DB::table('applicants')
            ->select('Category', DB::raw('SUM(id) as total'))
            ->groupBy('Category')
            ->get()
            ->toArray();
    }
    
}; ?>

<div>
    <div class="w-full h-full flex items-center justify-center">
        <canvas id="myChart" class="w-full h-full shrink-0"></canvas>
    </div>

    <script defer>
        document.addEventListener('livewire:load', () => {
            const ctx = document.getElementById('myChart').getContext('2d');

            // Get chart data from Livewire
            const chartData = @js($chartData);

            // Prepare labels and data for the chart
            const labels = chartData.map(item => item.Category);
            const data = chartData.map(item => item.total);

            // Initialize the chart
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Category Counts',
                            data: data,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        x: {
                            ticks: {
                                color: 'black'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'black'
                            }
                        }
                    }
                }
            });
        });
    </script>
    
</div>
