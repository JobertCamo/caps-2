<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;

new class extends Component {
    public function with()
    {
        return [
            'chartData' => DB::table('applicants')
                ->selectRaw("strftime('%Y-%m', created_at) as month, COUNT(*) as total_records")
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->pluck('total_records', 'month') // Format as [ '2024-01' => 10, '2024-02' => 20 ]
                ->toArray()
        ];
    }
};
?>


<div shadow="xl" class="w-[95%] lg:w-[95%] md:h-[100%] md:w-fit sm:w-[90%] m-2 bg-white/80 rounded-xl drop-shadow-lg text-black p-2">
    <x-line-chart :chartData="$chartData" />
</div>

