<?php 
$title = 'About';
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
 
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background: url(&quot;assets/img/g.jpg&quot;) center center / cover no-repeat;"></div>
            </div>
        </div>
    </div>
    <div class="container py-4 py-xl-5">
        <section class="py-4 py-xl-5">
            <h1 class="text-center">About us</h1>
            <div class="container">
                <section class="py-4 py-xl-5">
                    <div class="container">
                        <div class="text-dark bg-white border rounded border-1 border-dark p-4 p-md-5">
                            <h2 class="fw-bold text-center text-dark mb-3">365: Your Trusted Partner for Quality Apartment Rentals</h2>
                            <p class="mb-4">365 is a trusted apartment rental company dedicated to offering high-quality, fully-furnished living spaces for individuals and families. With a focus on convenience and comfort, we provide a variety of rental options to meet the needs of our diverse clientele. Whether you’re looking for a cozy studio or a spacious multi-bedroom unit, 365 offers flexible lease terms and competitive rates. Our goal is to make the rental process smooth and hassle-free, ensuring that every customer enjoys a pleasant living experience in a safe and well-maintained environment.<br><br>At 365, we offer exceptional apartment rentals designed for modern living. Our properties range from cozy one-bedroom apartments to spacious family units, all equipped with top-notch amenities and located in prime locations. We strive to make your rental experience as smooth as possible by offering flexible leasing options, affordable pricing, and excellent customer service. Whether you are a student, professional, or family, 365 is committed to helping you find the perfect apartment that fits your lifestyle and budget.<br><br><br><br>At 365, we offer a variety of apartment options designed to meet diverse living needs.</p>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <h1 class="text-center"><br><strong><span style="background-color: rgb(248, 249, 250);">Apartment location</span></strong><br><br></h1>
        <div class="progress" data-aos="fade" data-aos-duration="50" data-aos-once="true">
            <div class="progress-bar bg-dark" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;">98%</div>
        </div>
    </div>
    <div class="container py-4 py-xl-5">
        <div class="text-dark bg-white border rounded border-1 border-dark d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5" style="background: var(--swiper-theme-color);">
            <div class="pb-2 pb-lg-1">
                <h2 class="fw-bold mb-2"><br>Looking for a place to call home? 7 houses are up for rent at only 365 per month. Grab yours now before it's too late!"<br><br></h2>
                <p class="mb-0">At 365 Plaza, we feature spacious Two Bedroom, Two Bath Apartments and cozy One Bedroom, One Bath Apartments located in the vibrant neighborhood of Mayera. For those seeking modern studio living, our One Bedroom Studio Apartments at 365 Residence in Mayera provide the perfect balance of comfort and style. Additionally, we offer Two Bedroom, Two Bath Apartments and Two Bedroom, One Bath Apartments at 365 Residence in Mayera, ideal for families or roommates. For larger households, our Three Bedroom, Three Bath Apartments at 365 Residence in Mayera deliver ample space and convenience. We also provide One Bedroom Self-Contained Houses in Okaiman-Mayera, offering privacy and independence for individuals or couples. Whatever your preference, 365 has the perfect home for you.<br><br><br><br>365 was established in [year] with the goal of providing quality and affordable housing solutions to individuals and families. Over the years, we have built a reputation for offering diverse rental options, ranging from studios to multi-bedroom apartments, all designed to meet the evolving needs of our clients. With a commitment to excellence and customer satisfaction, 365 continues to grow as a trusted name in apartment rentals.<br><br><br><br><br></p>
            </div>
            <div class="my-2"></div>
        </div>
        <div class="w-100"></div>
    </div>
    
   <?php include 'templates/footer.php'; ?>