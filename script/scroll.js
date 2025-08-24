const exploreButton = document.getElementById("exploreBtn");
const itemsSection = document.querySelector(".items-section");

exploreButton.addEventListener("click", function () {
      itemsSection.scrollIntoView({ behavior: "smooth" });
});