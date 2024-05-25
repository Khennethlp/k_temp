
    document.addEventListener('DOMContentLoaded', function () {
      const toggleSwitch = document.getElementById('customSwitch1');
      const theme_label = document.getElementById('theme_label');
      // const myDataTable = document.getElementById('myDataTable');
      // const btnTxtColor = document.querySelectorAll('.theme-text');
      const body = document.body;

      // Function to apply the theme
      function applyTheme(theme) {
        if (theme === 'dark') {
          body.classList.add('dark-mode');
          body.classList.remove('light-mode');
          theme_label.innerHTML = 'Light ';
          theme_label.style.color = 'white';
          // myDataTable.style.color = 'black';
          // myDataTable.style.backgroundColor = 'black';

          toggleSwitch.checked = true;
        } else {
          body.classList.add('light-mode');
          body.classList.remove('dark-mode');
          theme_label.innerHTML = 'Dark ';
          theme_label.style.color = 'black';
          // myDataTable.style.color = 'white';
         
          toggleSwitch.checked = false;
        }
      }

      // Check session storage for theme preference
      const currentTheme = sessionStorage.getItem('theme') || 'light';
      applyTheme(currentTheme);

      // Listen for toggle switch changes
      toggleSwitch.addEventListener('change', function () {
        const selectedTheme = toggleSwitch.checked ? 'dark' : 'light';
        applyTheme(selectedTheme);
        sessionStorage.setItem('theme', selectedTheme);
      });
    });
