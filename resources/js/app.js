import './bootstrap';
import './function';



// Toggle sidebar for desktop view
window.toggleSidebar = function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarContent = document.getElementById('sidebarcontent');
    const iconside = document.getElementById('iconside');

    // Check if the sidebar is expanded or collapsed
    if (sidebar.classList.contains('w-[300px]')) {
        // Collapse sidebar to small size
        sidebar.classList.remove('w-[300px]');
        sidebar.classList.add('w-[60px]');
        iconside.classList.remove('hidden')

        // Handle sidebar content transition (fade out, collapse)
        sidebarContent.classList.add('hidden', 'max-h-0');
        sidebarContent.classList.add('invisible'); // Make content invisible after animation
    } else {
        // Expand sidebar to full size
        sidebar.classList.remove('w-[60px]');
        sidebar.classList.add('w-[300px]');
        iconside.classList.add('hidden')

        // Handle sidebar content transition (fade in, expand)
        sidebarContent.classList.remove('invisible');
        sidebarContent.classList.remove('max-h-0');
        sidebarContent.classList.remove('hidden'); // Make content visible immediately
    }
};

// Toggle sidebar for mobile view
window.togglePhoneSidebar = function() {
    const phonebar = document.getElementById('phonebar');

    // Toggle the sidebar translation for showing/hiding
    if (phonebar.classList.contains('-translate-x-full')) {
        // Expand phonebar (slide-in)
        phonebar.classList.remove('-translate-x-full');
        phonebar.classList.add('translate-x-0');
    } else {
        // Collapse phonebar (slide-out)
        phonebar.classList.remove('translate-x-0');
        phonebar.classList.add('-translate-x-full');
    }
};

function scrollToApplicantsTable() {
    const table = document.getElementById('applicant-table');
    if (table) {
        console.log("Scrolling to applicants table.");
        table.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else {
        console.log("Applicant table not found.");
    }
}

// Ensure the sidebar starts visible on larger screens
// (You can uncomment this section if needed for specific layout requirements)
/*
function adjustSidebarForScreenSize() {
    const sidebar = document.getElementById('sidebar');

    if (window.innerWidth <= 639) {
        // Collapse sidebar on mobile view
        sidebar.classList.add('-translate-x-full');
    } else {
        // Show sidebar on larger screens
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
    }
}

window.addEventListener('load', adjustSidebarForScreenSize);
window.addEventListener('resize', adjustSidebarForScreenSize);
*/