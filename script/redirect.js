// !!! Toujours CHEMIN ABSOLU !!!

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("menu-index").addEventListener("click", function() {
        window.location.href = "/fabriceWeb/"; // 
      });

    document.getElementById("menu-reserver").addEventListener("click", function() {
      window.location.href = "#"; // 
    });
  
    document.getElementById("menu-about").addEventListener("click", function() {
      window.location.href = "#"; // 
    });
  
    document.getElementById("menu-compte").addEventListener("click", function() {
      window.location.href = "/fabriceWeb/auth/login.php"; // 
    });
  
    document.getElementById("menu-projet").addEventListener("click", function() {
      window.location.href = "#"; // 
    });
  
    document.getElementById("menu-legal").addEventListener("click", function() {
      window.location.href = "#"; // 
    });
  });
  