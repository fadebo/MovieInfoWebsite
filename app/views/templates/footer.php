<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h5>About Us</h5>
                <p>Project by Farrell Adebo. This project is aimed at delivering top-notch solutions in web development.</p>
            </div>
            <div class="col-lg-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#about">About</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li>Email: fadebo@algomau.ca</li>
                    <li>Phone: +123 456 7890</li>
                    <li>Address: 1234 Street Name, City, Country</li>
                </ul>
                <h5>Follow Us</h5>
                <a href="https://www.facebook.com" target="_blank" class="me-2"><i class="fab fa-facebook"></i></a>
                <a href="https://www.twitter.com" target="_blank" class="me-2"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com" target="_blank" class="me-2"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com" target="_blank" class="me-2"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <p>&copy; <?php echo date('Y'); ?> Project by Farrell Adebo</p>
            </div>
        </div>
    </div>
</footer>

<div id="back-to-top" class="back-to-top">
    <a href="#top"><i class="fas fa-chevron-up"></i></a>
</div>

</div> <!-- End of main content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    // JavaScript for countdown timer
    document.addEventListener('DOMContentLoaded', function() {
        var remainingTime = <?php echo $remainingTime; ?>;
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
</script>
<!-- <style>
    .footer {
        background-color: grey;
        padding: 20px 0;
    }
    .footer h5 {
        font-size: 18px;
        margin-bottom: 10px;
    }
    .footer p, .footer ul, .footer li {
        font-size: 14px;
    }
    .footer a {
        color: #007bff;
        text-decoration: none;
    }
    .footer a:hover {
        text-decoration: underline;
    }
    .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
    }
    .back-to-top a {
        font-size: 24px;
        color: #007bff;
        text-decoration: none;
    }
    .back-to-top a:hover {
        color: #0056b3;
    }
    #countdown {
        font-weight: bold;
        color: red;
    }
</style> -->
</body>
</html>