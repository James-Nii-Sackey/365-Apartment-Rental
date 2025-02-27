<?php $title = 'Contact';
include 'templates/header.php'; ?>

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
                <div class="swiper-slide" style="background: url('assets/img/g.jpg') center center / cover no-repeat;"></div>
                <div class="swiper-slide" style="background: url('https://cdn.bootstrapstudio.io/placeholders/1400x800.png') center center / cover no-repeat;"></div>
                <div class="swiper-slide" style="background: url('https://cdn.bootstrapstudio.io/placeholders/1400x800.png') center center / cover no-repeat;"></div>
            </div>
        </div>
    </div>

    <section class="getintouch">
        <div class="container modern-form">
            <div class="text-center">
                <h4 style="color: #212529;font-size: 45px;">Get in touch</h4>
            </div>
            <hr class="modern-form__hr">
            <div class="modern-form__form-container">
                <form id="contactForm">
                    <input type="hidden" name="access_key" value="ffa08f3e-d5b7-41df-89aa-d0a96f2ce48a" required>

                    <div class="row">
                        <div class="col col-contact">
                            <div class="modern-form__form-group--padding-r form-group mb-3">
                                <input class="form-control input input-tr" type="text" placeholder="First Name" name="first_name" id="first_name" required>
                                <div class="line-box">
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-contact">
                            <div class="modern-form__form-group--padding-l form-group mb-3">
                                <input class="form-control input input-tr" type="email" placeholder="Email" name="email" id="email" required>
                                <div class="line-box">
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="modern-form__form-group--padding-t form-group mb-3">
                                <textarea class="form-control input modern-form__form-control--textarea" placeholder="Message" name="message" id="message" required></textarea>
                                <div class="line-box">
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-primary submit-now" type="submit">Submit Now</button>
                        </div>
                    </div>
                </form>
                <div id="formResponse"></div>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.7367550641457!2d-0.28336172564459455!3d5.75098423165949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf75c618c1b78b%3A0xe137f997148fb2a7!2sPokuase%20Mayera!5e0!3m2!1sen!2sgh!4v1734972871023!5m2!1sen!2sgh" width="100%" height="400" style="border: 0;margin-top: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <?php include 'templates/footer.php'; ?>
    <script>
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            var formData = new FormData(this);

            fetch("https://api.web3forms.com/submit", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Display success message
                    document.getElementById("formResponse").innerHTML = "<p>Thank you for your message! We will get back to you shortly.</p>";
                    
                    // Clear the form fields
                    document.getElementById("contactForm").reset();
                } else {
                    // Display error message
                    document.getElementById("formResponse").innerHTML = "<p>There was an error with the submission. Please try again.</p>";
                }
            })
            .catch(error => {
                // Display error message
                document.getElementById("formResponse").innerHTML = "<p>Error: " + error.message + "</p>";
            });
        });
    </script>
</body>

</html>
