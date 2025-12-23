    let index = 1; // Start from the first actual slide
    const slider = document.getElementById("slider");
    const slides = document.querySelectorAll(".slide");
    const totalSlides = slides.length;

    // Clone first and last slides for smooth looping
    const firstClone = slides[0].cloneNode(true);
    const lastClone = slides[totalSlides - 1].cloneNode(true);

    slider.appendChild(firstClone);
    slider.insertBefore(lastClone, slides[0]);

    const allSlides = document.querySelectorAll(".slide"); // Update slides count
    const totalAllSlides = allSlides.length;
    slider.style.transform = `translateX(-100%)`; // Move to first actual slide

    function moveSlide(step) {
        index += step;
        slider.style.transition = "transform 0.8s ease-in-out";
        slider.style.transform = `translateX(${-index * 100}%)`;

        if (index === totalAllSlides - 1) {
            setTimeout(() => {
                slider.style.transition = "none"; // Remove transition
                index = 1; // Reset to first real slide
                slider.style.transform = `translateX(-100%)`;
            }, 800);
        }

        if (index === 0) {
            setTimeout(() => {
                slider.style.transition = "none";
                index = totalSlides; // Reset to last real slide
                slider.style.transform = `translateX(${-index * 100}%)`;
            }, 800);
        }
    }

    function autoSlide() {
        moveSlide(1);
        setTimeout(autoSlide, 7000);
    }

    setTimeout(autoSlide, 7000);


    gsap.to('.im', {
        y: 20,
        yoyo: true,
        repeat: -1,
        ease: 'power1.inOut'
    });
    
    gsap.to('.img', {
        rotate: 10, // Fixed spelling
        yoyo: true,
        duration:1,
        repeat: -1,
        ease: 'power1.inOut'
    });

    
    
    