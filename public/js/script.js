const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click", function() {
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.addEventListener("DOMContentLoaded", function () {
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
  
    sidebarLinks.forEach(link => {
      link.addEventListener('mouseenter', function () {
        this.classList.add('active');
      });
  
      link.addEventListener('mouseleave', function () {
        this.classList.remove('active');
      });
    });
  });
  