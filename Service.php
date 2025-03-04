<?php 
$title = 'Service';
include 'templates/header.php'; 
?>


    <style>
        /* Use flexbox for layout */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1; /* This ensures the container grows and takes the remaining space */
        }

        #bookingSidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 300px;
            height: 100%;
            background-color: #f8f9fa;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
            padding: 20px;
            transition: right 0.3s ease-in-out;
            z-index: 1050;
        }

        #bookingSidebar.open {
            right: 0;
        }

        #bookingSidebar .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        #bookingButton {
            position: fixed;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            z-index: 1060;
        }


.location {
    font-size: 14px;
    color: #555;
    text-align: center;
    margin-top: 5px;
}

/* Scrollbar styles for the booking sidebar */
#bookingSidebar {
    overflow-y: auto; /* Enable vertical scrolling */
    height: 100%; /* Ensure it takes full height */
}

/* Optional: Customize scrollbar appearance (for WebKit browsers) */
#bookingSidebar::-webkit-scrollbar {
    width: 8px; /* Width of the scrollbar */
}

#bookingSidebar::-webkit-scrollbar-thumb {
    background: #888; /* Color of the scrollbar thumb */
    border-radius: 4px; /* Rounded corners */
}

#bookingSidebar::-webkit-scrollbar-thumb:hover {
    background: #555; /* Color on hover */
}

#bookingSidebar input[type="text"],
#bookingSidebar input[type="number"],
#bookingSidebar textarea {
    width: 100%; /* Makes the input field stretch to the container width */
    height: 22px; /* Adjust the height as needed */
    padding: 8px; /* Add some padding for better appearance */
    border: 1px solid #ccc; /* Border color */
    border-radius: 4px; /* Rounded corners */
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Subtle inner shadow */
}
        
    </style>
    <div id="bookingButton">
    <button class="btn btn-primary" onclick="toggleBookingSidebar()">Rent an Apartment</button>
</div>
<div id="bookingSidebar">
    <span class="close-btn" onclick="toggleBookingSidebar()">&times;</span>
    <h3>Rent Apartment</h3>
 <!-- Form with no action attribute for offline usage -->
 <form method="post" action="https://script.google.com/macros/s/AKfycbxCZvJn674Z-yD7qVhqSKhg3ibRgTCUXPTyniLgERGhNzV--dCCFBCdlXbcfTsvQ_RIjA/exec">            <div class="form-group">
                <div class="form-group">
    <label for="rentPackage">Rent Package Duration:</label>
    <select id="rentPackage" name="Rent Package Duration" required>
        <option value="3 months for GHC 1200">3 months for GHC 1200</option>
        <option value="6 months for GHC 2400">6 months for GHC 2400</option>
        <option value="12 months for GHC 4800">12 months for GHC 4800</option>
    </select>
</div>

<br>

<div class="form-group">
    <div class="location-header">
        <label for="Location">Location:</label>
        <button type="button" id="toggleButton" name="location"  class="toggle-btn">X</button>
    </div>
    <div id="checkboxList" class="checkbox-list" style="display: none;">
        <label><input type="radio" name="location" value="Two bedrooms 2 bath Apartment at 365 PLAZA at Mayera"> Two bedrooms 2 bath Apartment at 365 PLAZA at Mayera</label><br>
        <label><input type="radio" name="location" value="One Bedroom Self House at Okaiman-Mayera"> One Bedroom Self House at Okaiman-Mayera</label><br>
        <label><input type="radio" name="location" value="Two bedrooms Two bath Apartment at 365 Residence-Mayera"> Two bedrooms Two bath Apartment at 365 Residence-Mayera</label><br>
        <label><input type="radio" name="location" value="Two bedrooms One bath Apartment at 365 Residence-Mayera"> Two bedrooms One bath Apartment at 365 Residence-Mayera</label><br>
        <label><input type="radio" name="location" value="Three bedrooms Three bath Apartment at 365 Residence-Mayer"> Three bedrooms Three bath Apartment at 365 Residence-Mayera</label><br>
        <label><input type="radio" name="location" value="One bedrooms One bath Apartment at 365 PLAZA at Mayera"> One bedrooms One bath Apartment at 365 PLAZA at Mayera</label><br>
    </div>
</div>





<style type="text/css">
    .checkbox-list {
    margin-top: 10px;
    display: none;
}

.location-header {
    display: flex;
    align-items: center;
}

.toggle-btn {
    margin-left: 10px;
    cursor: pointer;
    background-color: #f1f1f1;
    border: 1px solid #ccc;
    padding: 3px 6px;  /* Reduced padding for a smaller button */
    font-size: 12px;    /* Smaller font size */
    border-radius: 4px; /* Smaller border radius */
    display: inline-block;
}

.toggle-btn:hover {
    background-color: #ddd;
}


.form-group {
    position: relative;
}

.location-header label, .location-header button {
    position: static; /* Keeps them in the same line and static */
}


</style>

<script type="text/javascript">
  document.getElementById('toggleButton').addEventListener('click', function() {
    var list = document.getElementById('checkboxList');
    if (list.style.display === "none") {
        list.style.display = "block";
    } else {
        list.style.display = "none";
    }
});


</script>

              <label for="firstname">first name</label>
              <input type="text" class="form-control" id="name" name="First name" placeholder="" required>
            </div>

            <div class="form-group">
              <label for="LastName">Last name</label>
              <input type="text" class="form-control" id="name" name="Last name" placeholder="" required>
            </div>

            <!-- Phone -->
            <div class="form-group">
              <label for="Mobile number"> Mobile number</label>
              <input type="text" class="form-control" id="Mobilenumber" name="Mobile number" placeholder="" required>
            </div>

    <div class="form-group">
              <label for="Email Address">Email address </label>
              <input type="text" class="form-control" id="Email Address" name="Email Address" placeholder="" required>
            </div>

            <div class="form-group">
              <label for="Name of Emergency person">Name of Emergency person </label>
              <input type="text" class="form-control" id="Name of Emergency Person" name="Name of Emergency Person" placeholder="" required>
            </div>


              <div class="form-group">
              <label for="EmergencyContactPhoneNumber"> Emergency Contact Phone Number </label>
              <input type="text" class="form-control" id="Emergency Contact Phone Number" name="Emergency Contact Phone Number" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="Agreement"> Tenant Initial Deposit Agreement (GHC 500) </label>
            <input type="number" id="agreement" name="Tenant Initial Deposit (GHC 500)" value="500" readonly>

            </div>

      
<br>
          
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block">Submit </button>
          </form>

          </div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    function toggleBookingSidebar() {
        const sidebar = document.getElementById('bookingSidebar');
        const bookingButton = document.getElementById('bookingButton');
        const bookingForm = document.getElementById('bookingForm');
        sidebar.classList.toggle('open');
        if (sidebar.classList.contains('open')) {
            bookingButton.style.display = 'none';
        } else {
            bookingButton.style.display = 'block';
            bookingForm.reset(); // Clear the form fields
        }
    }

    // Prevent form submission for demo purposes
    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Simulate booking success
        alert('Booking Submitted!');
        toggleBookingSidebar(); // Hide sidebar and reset form
    });
</script>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    function toggleBookingSidebar() {
        const sidebar = document.getElementById('bookingSidebar');
        const bookingButton = document.getElementById('bookingButton');
        const bookingForm = document.getElementById('bookingForm');
        sidebar.classList.toggle('open');
        if (sidebar.classList.contains('open')) {
            bookingButton.style.display = 'none';
        } else {
            bookingButton.style.display = 'block';
            bookingForm.reset(); // Clear the form fields
        }
    }

    // Prevent form submission for demo purposes
    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Simulate booking success
        alert('Booking Submitted!');
        toggleBookingSidebar(); // Hide sidebar and reset form
    });
</script>
 
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background: url(&quot;assets/img/g.jpg&quot;) center center / cover no-repeat;"></div>
            </div>
        </div>
    </div>
    <section class="py-4 py-xl-5">
        <section class="py-4 py-xl-5">
            <h1 class="text-center border-1 border-dark"><br><strong><span style="color: rgba(var(--bs-dark-rgb),var(--bs-text-opacity)) ;">! Apartments for rent !</span></strong><br><br></h1><header></header>
            <section class="text-center py-4 py-xl-5">
                <div class="container">
    <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-3" data-bss-baguettebox="">
        <div class="col">
            <img class="img-fluid" src="assets/img/1.jpg" />
            <p class="location">Location: Two bedrooms 2 bath Apartment at 365 PLAZA at Mayera</p>
        </div>
        <div class="col">
            <img class="img-fluid" src="assets/img/2.jpg" />
            <p class="location">Location: One Bedroom Self House at Okaiman-Mayera</p>
        </div>
        <div class="col">
            <img class="img-fluid" src="assets/img/3.jpg" />
            <p class="location">Location: Two bedrooms Two bath Apartment at 365 Residence-Mayera</p>
        </div>
        <div class="col">
            <img class="img-fluid" src="assets/img/4.jpg" />
            <p class="location">Location: Two bedrooms One bath Apartment at 365 Residence-Mayera</p>
        </div>
        <div class="col">
            <img class="img-fluid" src="assets/img/6.jpg" />
            <p class="location">Location: Three bedrooms Three bath Apartment at 365 Residence-Mayer</p>
        </div>
        <div class="col">
            <img class="img-fluid" src="assets/img/5.jpg" />
            <p class="location">Location: One bedrooms One bath Apartment at 365 PLAZA at Mayera</p>
        </div>
    </div>
</div>

            </section>
            <div class="container">
                <div class="text-white bg-dark border rounded border-0 p-4 p-md-5">
                    <h2 class="fw-bold text-center text-white mb-3">Services we offer at 365 rent Apartment</h2>
                    <p class="text-center mb-4">At 365 Apartments, we pride ourselves on providing comfortable, stylish, and affordable living spaces tailored to your needs. Whether you’re looking for a cozy studio or a spacious family apartment, we have the perfect home waiting for you. Explore our available apartments and let us help you find a place to call your own. Your comfort is our priority!<br><br><br></p>
                </div>
            </div>
        </section>
    </section>
    <?php include 'templates/footer.php'; ?>