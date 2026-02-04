// Dropdown toggle functionality
const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(drop => {
    drop.addEventListener('click', function(e) {
        // Prevent the click from bubbling up to parent elements
        e.stopPropagation();

        // Toggle the clicked dropdown
        this.classList.toggle('open');
        const content = this.querySelector('.dropdown-content');
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
});

// Optional: close dropdowns if clicked outside
document.addEventListener('click', function() {
    dropdowns.forEach(drop => {
        drop.classList.remove('open');
        const content = drop.querySelector('.dropdown-content');
        content.style.display = "none";
    });
});
