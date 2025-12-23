window.addEventListener('scroll', function () {
    const navbar = document.getElementById('navb');
    if (window.scrollY > 0) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
  const openMenu = document.getElementById("openMenu");
  const closeMenu = document.getElementById("closeMenu");
  const menuBar = document.getElementById("menuBar");

  openMenu.addEventListener("click", () => {
    menuBar.classList.add("active");
  });

  closeMenu.addEventListener("click", () => {
    menuBar.classList.remove("active");
  });
  
  