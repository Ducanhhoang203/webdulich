@include('clients.blocks.header');
        
        <section class="contact-form-area py-70 rel z-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="comment-form bgc-lighter z-1 rel mb-30 rmb-55">
                            <form id="contactForm" class="contactForm" name="contactForm" action="https://webtendtheme.net/html/2024/ravelo/assets/php/form-process.php" method="post" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                <div class="section-title">
                                    <h2>Get In Touch</h2>
                                </div>
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <div class="row mt-35">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Randy J. Thomas" value="" required data-error="Please enter your Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone" value="" required data-error="Please enter your Phone">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="enter email" value="" required data-error="Please enter your Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message">Your Message</label>
                                            <textarea name="message" id="message" class="form-control" rows="5" placeholder="Message" required data-error="Please enter your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                           <ul class="radio-filter mb-25">
                                                <li>
                                                    <input class="form-check-input" type="radio" name="terms-condition" id="terms-condition">
                                                    <label for="terms-condition">Save my name, email, and website in this browser for the next time I comment.</label>
                                                </li>
                                            </ul>
                                            <button type="submit" class="theme-btn style-two">
                                                <span data-hover="Send Comments">Send Comments</span>
                                                <i class="fal fa-arrow-right"></i>
                                            </button>
                                            <div id="msgSubmit" class="hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact-images-part" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="row">
                                <div class="col-12">
                                    <img src="assets/images/contact/contact1.jpg" alt="Contact">
                                </div>
                                <div class="col-6">
                                    <img src="assets/images/contact/contact2.jpg" alt="Contact">
                                </div>
                                <div class="col-6">
                                    <img src="assets/images/contact/contact3.jpg" alt="Contact">
                                </div>
                            </div>
                            <div class="circle-logo">
                                <img src="\assets\images\logos\favicon.png" alt="Logo">
                                <span class="title h2">Devpro</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        @include('clients.blocks.footer');