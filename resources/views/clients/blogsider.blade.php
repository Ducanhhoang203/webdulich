@include('clients.blocks.header');
        
        <!-- Blog Detaisl Area start -->
        <section class="blog-detaisl-page py-100 rel z-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-details-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <a href="blog.html" class="category">DevproVn</a>
                            <ul class="blog-meta mb-30">
                                <li><img src="assets/images/blog/admin.jpg" alt="Admin"> <a href="#">Reed A. Johnson</a></li>
                                <li><i class="far fa-calendar-alt"></i> <a href="#">25 Feb 2024</a></li>
                                <li><i class="far fa-comments"></i> <a href="#">Comments (5)</a></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam...</p>
                            <div class="image mt-40 mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <img src="assets/images/blog/blog-details.jpg" alt="Blog Details">
                            </div>
                            <h5>University while the lovely valley team work</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam...</p>
                           
                            <div class="row mb-10">
                                <div class="col-sm-6">
                                    <div class="image mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                        <img src="assets/images/blog/blog-middle1.jpg" alt="Blog">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" data-aos-delay="50">
                                        <img src="assets/images/blog/blog-middle2.jpg" alt="Blog">
                                    </div>
                                </div>
                            </div>
                            <h5>Devpro</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam....</p>
                            <blockquote class="mt-30 mb-35" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <i class="flaticon-quote"></i>
                                <div class="text">"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam..."
                                </div>
                                <div class="blockquote-footer">
                                    Kevin F. Glasscock
                                </div>
                            </blockquote>
                            <ul class="list-style-two mb-45" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <li>Understand the demand in your area, competition, and potential customers.</li>
                                <li>Register your business, obtain necessary licenses, and ensure compliance with local regulations.</li>
                                <li>Build relationships with hotels, airlines, transport companies, and other service providers.</li>
                            </ul>
                        </div>
                            
                        <hr class="mb-45">

                        

                       
                           
                       
                        
                        <form id="comment-form" class="comment-form bgc-lighter z-1 rel mt-25" name="review-form" action="#" method="post" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h5>Leave A Comments</h5>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <div class="row gap-20 mt-30">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="full-name" name="full-name" class="form-control" placeholder="Name" value="" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" id="email-address" name="email" class="form-control" placeholder="Email" value="" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control" rows="5" placeholder="Message" required=""></textarea>
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
                                    </div>
                                </div>
                            </div>
                        </form>
                            
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-10 rmt-75">
                        <div class="blog-sidebar">
                            
                            <div class="widget widget-search" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <form action="#" class="default-search-form">
                                    <input type="text" placeholder="Search" required="">
                                    <button type="submit" class="searchbutton far fa-search"></button>
                                </form>
                            </div>
                            
                            <div class="widget widget-category" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="widget-title">Category</h5>
                                <ul class="list-style-three">
                                    <li><a href="blog.html">Categories</a></li>
                                    <li><a href="blog.html">College</a></li>
                                    <li><a href="blog.html">High School</a></li>
                                    <li><a href="blog.html">School</a></li>
                                    <li><a href="blog.html">University</a></li>
                                    <li><a href="blog.html">Entries feed</a></li>
                                    <li><a href="blog.html">Comments feed</a></li>
                                </ul>
                            </div>
                            
                            <div class="widget widget-news" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="widget-title">Recent News</h5>
                                <ul>
                                    <li>
                                        <div class="image">
                                            <img src="assets/images/widgets/news1.jpg" alt="News">
                                        </div>
                                        <div class="content">
                                            <h6><a href="blog-details.html">Unique Destinations an tolded Stories ways</a></h6>
                                            <span class="date"><i class="far fa-calendar-alt"></i> 25 Feb 2024</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image">
                                            <img src="assets/images/widgets/news2.jpg" alt="News">
                                        </div>
                                        <div class="content">
                                            <h6><a href="blog-details.html">Immersive Experiences from Around Globe</a></h6>
                                            <span class="date"><i class="far fa-calendar-alt"></i> 25 Feb 2024</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image">
                                            <img src="assets/images/widgets/news3.jpg" alt="News">
                                        </div>
                                        <div class="content">
                                            <h6><a href="blog-details.html">Journey to Inspire Your Next Adventure</a></h6>
                                            <span class="date"><i class="far fa-calendar-alt"></i> 25 Feb 2024</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                           
                            
                        
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Detaisl Area end -->
        
        @include('clients.blocks.footer');