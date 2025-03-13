<?php $title = 'Contact';
include 'templates/header.php'; ?>




 

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
