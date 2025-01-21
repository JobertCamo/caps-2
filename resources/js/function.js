// Toggle New Applicants Sidebar
window.toggleSide = function () {
    const tableslide = document.getElementById('table-slide');
    console.log('Toggling New Applicants Sidebar');

    if (tableslide.classList.contains('translate-x-full')) {
        tableslide.classList.remove('translate-x-full');
        tableslide.classList.add('translate-x-0');
        document.addEventListener('click', closeSideOnClickOutside);
    } else {
        tableslide.classList.remove('translate-x-0');
        tableslide.classList.add('translate-x-full');
        document.removeEventListener('click', closeSideOnClickOutside);
    }
};

function closeSideOnClickOutside(event) {
    const tableslide = document.getElementById('table-slide');
    if (!tableslide.contains(event.target) && !event.target.closest('.count-card')) {
        console.log('Clicked outside, closing sidebar');
        tableslide.classList.remove('translate-x-0');
        tableslide.classList.add('translate-x-full');
        document.removeEventListener('click', closeSideOnClickOutside);
    }
}

// Toggle Passed Applicants Sidebar
window.togglePassed = function () {
    const tablepassed = document.getElementById('table-passed');
    console.log('Toggling Passed Applicants Sidebar');

    if (tablepassed.classList.contains('translate-x-full')) {
        tablepassed.classList.remove('translate-x-full');
        tablepassed.classList.add('translate-x-0');
        document.addEventListener('click', closePassedOnClickOutside);
    } else {
        tablepassed.classList.remove('translate-x-0');
        tablepassed.classList.add('translate-x-full');
        document.removeEventListener('click', closePassedOnClickOutside);
    }
};

function closePassedOnClickOutside(event) {
    const tablepassed = document.getElementById('table-passed');
    if (!tablepassed.contains(event.target) && !event.target.closest('.count-card')) {
        console.log('Clicked outside, closing Passed sidebar');
        tablepassed.classList.remove('translate-x-0');
        tablepassed.classList.add('translate-x-full');
        document.removeEventListener('click', closePassedOnClickOutside);
    }
}

// Toggle Failed Applicants Sidebar
window.toggleFailed = function () {
    const tablefailed = document.getElementById('table-failed');
    console.log('Toggling Failed Applicants Sidebar');

    if (tablefailed.classList.contains('translate-x-full')) {
        tablefailed.classList.remove('translate-x-full');
        tablefailed.classList.add('translate-x-0');
        document.addEventListener('click', closeFailedOnClickOutside);
    } else {
        tablefailed.classList.remove('translate-x-0');
        tablefailed.classList.add('translate-x-full');
        document.removeEventListener('click', closeFailedOnClickOutside);
    }
};

function closeFailedOnClickOutside(event) {
    const tablefailed = document.getElementById('table-failed');
    if (!tablefailed.contains(event.target) && !event.target.closest('.count-card')) {
        console.log('Clicked outside, closing Failed sidebar');
        tablefailed.classList.remove('translate-x-0');
        tablefailed.classList.add('translate-x-full');
        document.removeEventListener('click', closeFailedOnClickOutside);
    }
}

// Scroll to Applicants Table
// function scrollToApplicantsTable() {
//     const table = document.getElementById('applicant-table');
//     if (table) {
//         console.log("Scrolling to applicants table.");
//         table.scrollIntoView({ behavior: 'smooth', block: 'start' });
//     } else {
//         console.log("Applicant table not found.");
//     }
// }
