<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand | Book Marketing</title>

    <?php include "../includes/meta.php" ?>
</head>

<body>
    <?php include "../includes/header.php" ?>

    <?php include "../includes/mouse-follower.php" ?>

    <section class="hero-page">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 col-md-10 col-12">
                    <h2 class="mb-2 fw-light follow heading-1">Ready to Meet Your Readers?</h2>
                    <p class="para-service mb-5 follow">Trust the book marketing wizards to do their magic and ensure
                        your hard work lands in the right hands! It's time your book met the right audience.</p>

                </div>
                <div class="col-lg-6">
                    <?php include "../includes/form.php" ?>
                </div>
            </div>
        </div>
    </section>


    <section class="book-lovers bg-dark text-white">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-6">
                    <h2 class="fw-light">Fawcett Publications -
                        The Premium Book Writing Experience</h2>
                    <p class="mb-5 para-service">At Fawcett Publications, we specialize in crafting compelling stories
                        that captivate and connect with audiences. Whether you're stuck halfway or just starting out,
                        our team of expert writers is here to help you cross the finish line. We understand your vision
                        and translate it into words that engage, entertain, and inspire your readers. With us helping
                        you out with your book, nothing is stopping it from making a buzz around the world and putting
                        your name in the spotlight!</p>

                    <div class="d-flex gap-3">
                        <a class="chat btn btn-primary" href="javascript:;">
                            <i class="fa-solid fa-comment-dots"></i> Let's Discuss
                        </a>
                    </div>
                </div>
                <div class="col-6 container-3d">
                    <div class="card-3d">
                        <img class="w-100" src="/assets/images/marketing-about2.png" alt="home-about">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="services-section text-black follow">
        <div class="row flex-column justify-content-between align-items-center">
            <div class="col-8 center-flex">
                <div class="d-flex gap-2 justify-content-center text-center align-items-center mb-4">
                    <h3>It's Time You Finished Your Book</h3>
                    <img width="100" src="/assets/images/services.webp" alt="services">
                </div>
                <p class="col-12 col-lg-6">Don't you think your book has waited long enough?
                    Let's work together and give your book the ending it deserves.</p>
            </div>

            <div class="col-12">
                <div class="row service-box-main justify-content-center align-items-center">
                    <div class="col-2 d-lg-inline-block d-none">
                        <div class="service-box-dis"></div>
                    </div>
                    <div class="col-lg-2 col-md-5">
                        <div class="service-box">
                            <h4 class="mb-4">Book Writing</h4>
                            <p class="mb-4">Can't get a clever book idea out of your head but also can't find the time
                                to pen it
                                down on paper? We got you covered.
                            </p>
                            <a class="btn btn-dark rounded-circle" href="/book-writing"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-5">
                        <div class="service-box">
                            <h4 class="mb-4">Book Publishing</h4>
                            <p class="mb-4">Have a rough manuscript at hand? Don't worry, our in-house pros will polish
                                it up and
                                publish it in all the right places.</p>
                            <a class="btn btn-dark rounded-circle" href="/book-publishing"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-5">
                        <div class="service-box">
                            <h4 class="mb-4">Book Cover Design</h4>
                            <p class="mb-4">Nobody will be turning the pages if your book can't turn their heads. Hire
                                our book
                                cover designers and they won't be able to resist!</p>
                            <a class="btn btn-dark rounded-circle" href="/book-cover-design"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-5">
                        <div class="service-box">
                            <h4 class="mb-4">Book Marketing</h4>
                            <p class="mb-4">Is your book's release date nearby or is it sitting in a corner collecting
                                dust? Our
                                book marketing can turn things around.</p>
                            <a class="btn btn-dark rounded-circle" href="/book-marketing"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-2 d-lg-inline-block d-none">
                        <div class="service-box-dis"></div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    
    <section class="video-section">
        <video src="/assets/images/marketing.mp4" autoplay muted loop></video>
    </section>



   <?php include "../includes/counter.php" ?>

  

    <section class="call-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 col-12">
                    <h2>We Add Wings to Your Book So That Your Journey Becomes A Breeze!</h2>
                </div>
                <div class="col-lg-2 col-12">
                    <a class="btn btn-primary px-5" href="tel:">Call Now</a>
                </div>
            </div>
        </div>
    </section>

   <?php include "../includes/consultation.php" ?>

   
    <section class="portfolio-section bg-black">
        <?php include "../includes/portfolio.php" ?>
    </section>

    <!-- Steps Section -->

    <?php include "../includes/steps.php" ?>

    <?php include "../includes/faq.php" ?>
    <?php include "../includes/footer.php" ?>
    <?php include "../includes/scripts.php" ?>
</body>

</html>