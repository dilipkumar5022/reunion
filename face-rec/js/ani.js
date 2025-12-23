window.addEventListener('load', () => {
    // Display the preloader for 3 seconds, then hide it
    setTimeout(() => {
        const preloader = document.getElementById('preloader');
        preloader.style.display = 'none';
    }, 900); // 3 seconds delay
});