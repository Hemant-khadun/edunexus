

var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Function to set the theme on initial load
function setThemeOnInitialLoad() {
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    if (themeToggleDarkIcon) {
            themeToggleLightIcon.classList.remove('hidden');
            themeToggleDarkIcon.classList.add('hidden');
    }
    } else {
        
        document.documentElement.classList.remove('dark');
        if (themeToggleDarkIcon) {
            themeToggleDarkIcon.classList.remove('hidden');
            themeToggleLightIcon.classList.add('hidden');
        }
    }
}

setThemeOnInitialLoad();

var themeToggleBtn = document.getElementById('theme-toggle');

if (themeToggleBtn) {

    themeToggleBtn.addEventListener('click', function() {

        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }

        // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }
        
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const notificationElement = document.querySelector('#notification');
    const closeButton = document.getElementById('closeButton');

    if (notificationElement) {
        setTimeout(function() {
            notificationElement.remove();
        }, 5000);

        closeButton.addEventListener('click', () => {
            notificationElement.style.display = 'none'; // Hide the notification
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {

    const buttons = document.querySelectorAll('.question-btn');

    if(buttons){
        buttons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-toggle');
            const target = document.getElementById(targetId);
            const isExpanded = target.style.display === 'block';

            if (isExpanded) {
            target.style.display = 'none';
            this.querySelector('#arrow').classList.remove('rotate-180');
            } else {
            target.style.display = 'block';
            this.querySelector('#arrow').classList.add('rotate-180');
            }
        });
        });
    }

  });