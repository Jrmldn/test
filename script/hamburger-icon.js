function toggleMenu() {
    const links = document.getElementById("navLinks");
    links.classList.toggle("hide");
    links.classList.toggle("vertical");
  }

  function adjustMenu() {
    const links = document.getElementById("navLinks");
    const hamburgericon = document.querySelector(".hamburgericon");

    if (window.innerWidth < 768) {
      links.classList.add("hide");
      hamburgericon.style.display = "block";
    } else {
      links.classList.remove("hide", "vertical");
      hamburgericon.style.display = "none";
    }
  }

  window.addEventListener("load", adjustMenu);
  window.addEventListener("resize", adjustMenu);