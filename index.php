<?php 
$title = '365 Apartment';
include 'templates/header.php'; 
?>
<!DOCTYPE html>
<html lang="en">



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


<div id="bookingSidebar">
    <span class="close-btn" onclick="toggleBookingSidebar()">&times;</span>
    <h3>Rent Apartment</h3>
 <!-- Form with no action attribute for offline usage -->
 

          </div>


<script src="assets/bootstrap/js/bootstrap.min.js"></script>


   
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background: url(&quot;assets/img/g.jpg&quot;) center center / cover no-repeat;"></div>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-column align-items-center py-4 py-xl-5">
        <section class="py-4 py-xl-5">
            <div class="container h-100">
                <div class="text-dark bg-white border rounded border-1 p-4 py-5">
                    <div class="row h-100">
                        <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                            <div>
                                <h1 class="text-uppercase fw-bold text-dark mb-3">Welcome to 365 Apartments!</h1>
                                <p class="mb-4">At 365 Apartments, we pride ourselves on providing comfortable, stylish, and affordable living spaces tailored to your needs. Whether you’re looking for a cozy studio or a spacious family apartment, we have the perfect home waiting for you. Explore our available apartments and let us help you find a place to call your own. Your comfort is our priority!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="py-4 py-xl-5">
                <div class="container">
                    <div class="text-white bg-dark border rounded border-0 p-4 p-md-5">
                        <h2 class="fw-bold text-center text-white mb-3">Affordable Apartment for rent !</h2>
                    </div>
                </div>
            </section>
            <div class="text-dark bg-white border rounded border-1 border-dark p-4 py-5">
                <div class="row h-100">
                    <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div>
                            <h1 class="text-uppercase fw-bold text-dark border-1 mb-3">365 apartment</h1>
                            <p class="mb-4"><br>365 Apartments is a premier apartment rental company dedicated to providing exceptional housing solutions for individuals and families. With a commitment to comfort, convenience, and affordability, we offer a wide range of apartments designed to suit diverse lifestyles and preferences.<br><br></p><a class="btn btn-primary" role="button" href="Service.php" style="background: rgb(255,255,255);color: rgb(0,0,0);">Click&nbsp;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  
        <?php include 'templates/footer.php'; ?>