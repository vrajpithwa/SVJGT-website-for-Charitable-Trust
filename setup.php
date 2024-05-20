<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SVJGT</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <script>
        function enableSubmit() {
            var checkbox = document.getElementById("gridCheck");
            var submitButton = document.querySelector("input[name='submit']");

            if (checkbox.checked) {
                submitButton.removeAttribute("disabled");
            } else {
                submitButton.setAttribute("disabled", "true");
            }
        }
    </script>
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <img src="assets/img/favicon.png" alt="">
                <h1 style="font-size: larger;">Shree Vachchhrajdada Jivdaya Gauseva Trust<span>.</span></h1>
            </a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="history.html">History</a></li>
                    <li class="dropdown"><a href="Donation.html" class="active"><span>Donation</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('assets/img/1684052669943.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Donate</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Donate</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section
            style="background-image: url('assets/img/bgd.png'); background-size: cover; background-position: center;background-size: 89%;">

            <div class="container"
                style="width: 50%; color: rgb(0, 0, 0); background-color: rgba(255, 255, 255, 0.56); padding: 30px; border-radius: 20px; margin-top: -50px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                <form method="post" name="customerData" action="img.php" enctype="multipart/form-data">
                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="amount" class="form-label">Amount<span style="color: red">*</span></label>
                            <input type="number" class="form-control" id="amount" name="amount" required min="100">
                            <smalL style="color: red">Minimum 100 Rs. /-</small>
                        </div>

                        <div class="col-md-6">
                            <label for="donationType" class="form-label">Donation Type<span
                                    style="color: red">*</span></label>
                            <select class="form-select" id="donationType" name="donoationType" required>
                                <option value="General Donation">General Donation</option>
                                <option value="Ghass Charo bhandol">Ghass Charo bhandol</option>
                                <option value="Annshetra bhandol">Annshetra bhandol</option>
                                <option value="Bandkaam bhandol">Bandkaam bhandol</option>
                                <option value="Mahiti Prakashan">Mahiti Prakashan</option>
                                <option value="Chakla Chann">Chakla Chann</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="billing_name" class="form-label">Name<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="billing_name" name="billing_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="billing_tel" class="form-label">Mobile no.<span
                                    style="color: red">*</span></label>
                            <input type="number" class="form-control" id="billing_tel" name="billing_tel" required>
                        </div>
                        <div class="col-md-12">
                            <label for="billing_address" class="form-label">Billing Address<span
                                    style="color: red">*</span></label>
                            <textarea type="text" class="form-control" id="billing_address" name="billing_address"
                                required></textarea>
                        </div>
                        <label for="billing_Country" class="form-label">Country State City<span
                                style="color: red">*</span></label>
                        <div class="col-md-6">
                            <select class=" form-select country" id="billing_country" name="billing_country"
                                aria-label="Default select example" onchange="loadStates()">
                                <option selected>Select Country</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class=" form-select state" id="billing_state" name="billing_state"
                                aria-label="Default select example" onchange="loadCities()">
                                <option selected>Select State</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="  form-select city" id="billing_city" name="billing_city"
                                aria-label="Default select example">
                                <option selected>Select City</option>
                            </select>
                        </div>
                        <input type="hidden" id="country_hidden_input" name="billing_country">
                        <input type="hidden" id="state_hidden_input" name="billing_state">
                        <input type="hidden" id="city_hidden_input" name="billing_city">
                        <div class="col-md-7">
                            <label for="cardInput">Enter Aadhar Card Number or PAN Card Number:</label>
                            <input type="text" id="cardInput" name="field7" oninput="validateCardNumber()" required>
                            <small id="inputHint"></small>
                        </div>
                        <div class="col-mb-6">
                            <br>Optional</br>
                            <br>Attach Aadhar/Pan card</br>
                            <input type="file" name="image" accept="image/*">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck"
                                    onchange="enableSubmit()">
                                <label class="form-check-label" for="gridCheck">
                                    <a href="termsandconditions.html" style="color: blue">Agree to Terms and
                                        Conditions<span style="color: red">*</span></a>
                                </label>
                            </div>
                        </div>
                        <div class="row-12 justify-content-center">
                            <input type="submit" name="submit" value="Donate" class="btn btn-warning" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer id="footer" class="footer">
        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>Shree Vachchhrajdada Jivdaya Gauseva Trust</h3>
                            <p>
                                <br>
                                <a href="https://goo.gl/maps/yupP8eSjyyd2JecV6">Zinzuwada, Ta. Patdi, Dist.
                                    Surendranagar, Gujarat-382755. INDIA</a><br><br>
                                <strong>Phone:</strong> +91-99797 51954<br>
                                <strong>Email:</strong> shrivachhrajdadajivdayagauseva@gmail.com<br>
                            </p>
                            <div class="social-links d-flex mt-3">
                                <!-- <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a> -->
                                <!-- <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a> -->
                                <a href="https://instagram.com/vachchharajbet_official?igshid=YmMyMTA2M2Y%3D"
                                    class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UCeaYkdbbl1nEtqzMx0GUh-w"
                                    class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div><!-- End footer info column-->
                    <div class="col-lg-2 col-md-3 footer-links">
                        <!-- footer open space  -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26658.77585101602!2d71.43290480241687!3d23.413849219115306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395bb88b528431d9%3A0xf1afdaa6cc9589a5!2sVachchhraj%20Bet%2C%20Gujarat%20370145!5e1!3m2!1sen!2sin!4v1696102765081!5m2!1sen!2sin"
                            width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="credits">
                    Designed by Vraj Pithva Distributed by Ketan Pithva
                </div>
            </div>
        </div>

    </footer>
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <script src="app.js"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        function validateCardNumber() {
            var inputField = document.getElementById("cardInput");
            var inputHint = document.getElementById("inputHint");
            // var panRegex = /^([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
            var panRegex = /^([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}$/i;

            var aadharRegex = /^\d{4}\d{4}\d{4}$/;

            if (inputField.value.match(panRegex)) {
                inputHint.textContent = "PAN card number is valid.";
                inputHint.style.color = "green";
            } else if (inputField.value.match(aadharRegex)) {
                inputHint.textContent = "Aadhaar card number is valid.";
                inputHint.style.color = "green";
            } else {
                inputHint.textContent = "Please enter a valid PAN card or Aadhaar card number.";
                inputHint.style.color = "red";
                return false;
            }
            return true;
        }

        var config = {
  apiUrl: 'https://api.countrystatecity.in/v1',
  apiKey: 'NHhvOEcyWk50N2Vna3VFTE00bFp3MjFKR0ZEOUhkZlg4RTk1MlJlaA==' // Replace with your actual API key
};

// HTML elements
var countrySelect = document.getElementById('billing_country');
var stateSelect = document.getElementById('billing_state');
var citySelect = document.getElementById('billing_city');
var selectedCountryInput = document.getElementById('selectedCountry');
var selectedStateInput = document.getElementById('selectedState');
var selectedCityInput = document.getElementById('selectedCity');

// Fetch countries and populate country dropdown
function loadCountries() {
  fetch(`${config.apiUrl}/countries`, {
    headers: { 'X-CSCAPI-KEY': config.apiKey }
  })
  .then(response => response.json())
  .then(data => {
    data.forEach(country => {
      var option = document.createElement('option');
      option.value = country.iso2;
      option.textContent = country.name;
      countrySelect.appendChild(option);
    });
  })
  .catch(error => console.error('Error loading countries:', error));
}

// Load states based on selected country and populate state dropdown
function loadStates() {
  var selectedCountryCode = countrySelect.value;
  stateSelect.innerHTML = '<option value="">Select State</option>'; // Clear existing options

  fetch(`${config.apiUrl}/countries/${selectedCountryCode}/states`, {
    headers: { 'X-CSCAPI-KEY': config.apiKey }
  })
  .then(response => response.json())
  .then(data => {
    data.forEach(state => {
      var option = document.createElement('option');
      option.value = state.iso2;
      option.textContent = state.name;
      stateSelect.appendChild(option);
    });
  })
  .catch(error => console.error('Error loading states:', error));
}

// Load cities based on selected state and populate city dropdown
function loadCities() {
  var selectedCountryCode = countrySelect.value;
  var selectedStateCode = stateSelect.value;
  citySelect.innerHTML = '<option value="">Select City</option>'; // Clear existing options

  fetch(`${config.apiUrl}/countries/${selectedCountryCode}/states/${selectedStateCode}/cities`, {
    headers: { 'X-CSCAPI-KEY': config.apiKey }
  })
  .then(response => response.json())
  .then(data => {
    data.forEach(city => {
      var option = document.createElement('option');
      option.value = city.iso2;
      option.textContent = city.name;
      citySelect.appendChild(option);
    });
  })
  .catch(error => console.error('Error loading cities:', error));
}

// Event listeners for dropdown changes
countrySelect.addEventListener('change', function() {
  loadStates();
  selectedCountryInput.value = this.value; // Update hidden input with selected country
});

stateSelect.addEventListener('change', function() {
  loadCities();
  selectedStateInput.value = this.value; // Update hidden input with selected state
});

// Load countries on page load
window.onload = function() {
  loadCountries();
};

    </script>

</body>

</html>