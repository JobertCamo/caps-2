
<div x-data="calendar()" class="p-4 bg-white rounded-lg shadow-lg ">
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

    <!-- Days -->
    <div class="grid grid-cols-7 gap-2 text-center">
        <template x-for="day in blankDays">
            <div class="text-gray-300">...</div>
        </template>
        <template x-for="day in daysInMonth">
            <div @click="selectDate(day)" class="px-4 py-2 rounded cursor-pointer"
                :class="{'bg-blue-500 text-white': isToday(day), 'bg-blue-100': isSelected(day)}">
                <span x-text="day"></span>
            </div>
        </template>
    </div>
</div>

<script>
    function calendar() {
        return {
            currentMonth: new Date().getMonth(),
            currentYear: new Date().getFullYear(),
            selectedDate: null,

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
            },

            selectDate(day) {
                this.selectedDate = new Date(this.currentYear, this.currentMonth, day);
            },

            isToday(day) {
                const today = new Date();
                return day === today.getDate() && this.currentMonth === today.getMonth() && this.currentYear === today.getFullYear();
            },

            isSelected(day) {
                return this.selectedDate && day === this.selectedDate.getDate() &&
                    this.currentMonth === this.selectedDate.getMonth() &&
                    this.currentYear === this.selectedDate.getFullYear();
            }
        };
    }
</script>
