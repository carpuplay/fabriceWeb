document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("menu-index").addEventListener("click", function() {
      window.location.href = "/fabriceWeb/";
  });

  document.getElementById("menu-reserver").addEventListener("click", function() {
      window.location.href = "#";
  });

  document.getElementById("menu-about").addEventListener("click", function() {
      window.location.href = "#";
  });

  document.getElementById("menu-compte").addEventListener("click", function() {
      window.location.href = "/fabriceWeb/auth/login.php";
  });

  document.getElementById("menu-projet").addEventListener("click", function() {
      window.location.href = "#";
  });

  document.getElementById("menu-legal").addEventListener("click", function() {
      window.location.href = "#";
  });

  function setFavicon(mode) {
      let favicon = document.querySelector('link[rel="icon"]');
      if (!favicon) {
          favicon = document.createElement('link');
          favicon.rel = 'icon';
          document.head.appendChild(favicon);
      }

      if (mode === 'dark') {
          favicon.href = '/fabriceWeb/assets/dark_favicon.ico'; // Absolute path
      } else {
          favicon.href = '/fabriceWeb/assets/light_favicon.ico'; // Absolute path
      }
  }

  function detectColorScheme() {
      if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
          setFavicon('dark');
      } else {
          setFavicon('light');
      }
  }

  detectColorScheme();

  // Listen for changes in the color scheme preference
  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
      if (e.matches) {
          setFavicon('dark');
      } else {
          setFavicon('light');
      }
  });
});
