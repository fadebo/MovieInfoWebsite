 // JavaScript for countdown timer
  document.addEventListener('DOMContentLoaded', function() {
      var remainingTime = 0; // Initial remaining time in seconds
      var countdownElement = document.getElementById('countdown');
      if (countdownElement && remainingTime > 0) {
          var interval = setInterval(function() {
              remainingTime--;
              countdownElement.textContent = remainingTime;
              if (remainingTime <= 0) {
                  clearInterval(interval);
                  window.location.reload(); // Reload the page when countdown ends
              }
          }, 1000);
      }
  });

  // JavaScript for back-to-top button
  var backToTopButton = document.getElementById('back-to-top');
  window.addEventListener('scroll', function() {
      if (window.pageYOffset > 100) {
          backToTopButton.style.display = 'block';
      } else {
          backToTopButton.style.display = 'none';
      }
  });

