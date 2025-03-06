<?php

use App\Models\Job;
use Livewire\Volt\Component;
use Carbon\Carbon;

new class extends Component {

    public function with()
    {
        return [
            'jobs' => Job::latest()->paginate(5),
        ];
    }
    
}; ?>

<div class="space-y-2 ">
    @forelse ($jobs as $job)
        <div class="border-b-[1px] border-gray-400">
            <div>📢 <strong class="text-sm">New Job List Alert!</strong> <span class="text-sm">Please review and publish it for public view.</span></div>
            <div class="text-xs text-end">{{ Carbon::parse($job->created_at)->diffForHumans() }}</div>
        </div>
    @empty
        <div>No Data Found.</div>
    @endforelse
</div>
