<?php

use Carbon\Carbon;
use App\Models\Interview;
use Livewire\Volt\Component;

new class extends Component {
    
    public function with()
    {
        $interview = '';
        $interviews = Interview::whereNotNull('interview_date') // Exclude null values
        ->select('interview_date', 'title', 'time') // Select necessary fields
        ->get()
        ->groupBy(fn($item) => Carbon::parse($item->interview_date)->format('Y-m-d'));

        return [
            'interviews' => $interviews
        ];
    }
    
}; ?>

<div>
    <script>
        function calendar(scheduledInterviews) {
    return {
        currentMonth: new Date().getMonth(),
        currentYear: new Date().getFullYear(),
        selectedDate: null,
        interviews: scheduledInterviews || {},

        months: [
            'January', 'February', 'March', 'April', 'May', 'June', 'July',
            'August', 'September', 'October', 'November', 'December'
        ],

        get daysInMonth() {
            const days = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
            return Array.from({ length: days }, (_, i) => i + 1);
        },

        get blankDays() {
            const firstDay = new Date(this.currentYear, this.currentMonth, 1).getDay();
            return Array.from({ length: firstDay }, (_, i) => i);
        },

        hasInterview(day) {
            const dateKey = `${this.currentYear}-${String(this.currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            return this.interviews.hasOwnProperty(dateKey);
        },

        isToday(day) {
            const today = new Date();
            return day === today.getDate() && this.currentMonth === today.getMonth() && this.currentYear === today.getFullYear();
        },

        isSelected(day) {
            return this.selectedDate && day === this.selectedDate.getDate() &&
                this.currentMonth === this.selectedDate.getMonth() &&
                this.currentYear === this.selectedDate.getFullYear();
        },

        selectDate(day) {
            this.selectedDate = new Date(this.currentYear, this.currentMonth, day);
        },

        prevMonth() {
            if (this.currentMonth === 0) {
                this.currentMonth = 11;
                this.currentYear--;
            } else {
                this.currentMonth--;
            }
        },

        nextMonth() {
            if (this.currentMonth === 11) {
                this.currentMonth = 0;
                this.currentYear++;
            } else {
                this.currentMonth++;
            }
        }
    };
}


    </script>
    <div x-data="calendar(@js($interviews))" class="p-4 bg-white rounded-lg shadow-lg">
        <!-- Month navigation -->
        <div class="flex items-center justify-between font-bold text-2xl mx-2">
            <x-icon name="chevron-left" class="w-8 h-8 stroke-[3]" @click="prevMonth" />
            <h1>
                <span x-text="months[currentMonth]"></span> <span x-text="currentYear"></span>
            </h1>
            <x-icon name="chevron-right" class="w-8 h-8 stroke-[3]" @click="nextMonth" />
        </div>
    
        <!-- Days of the week -->
        <div class="grid grid-cols-7 gap-2 text-center text-gray-600 font-semibold mb-2">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
    
        <!-- Calendar Days -->
        <div class="grid grid-cols-7 gap-2 text-center">
            <!-- Blank days -->
            <template x-for="day in daysInMonth">
                <div @click="selectDate(day)" 
                     class="px-4 py-2 rounded cursor-pointer"
                     :class="{
                         'bg-blue-500 text-white': hasInterview(day),
                         'bg-blue-100': isSelected(day),
                         'bg-gray-100': !hasInterview(day) && !isSelected(day)
                     }">
                    <span x-text="day"></span>
                    <template x-if="hasInterview(day)">
                        <div class="text-xs text-gray-700 mt-1">
                            <span></span>
                        </div>
                    </template>
                </div>
            </template>
            
        </div>
    </div>
    
    
    
</div>
