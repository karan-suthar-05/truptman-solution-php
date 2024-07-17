<?php require_once "partials/head.php" ?>
<?php require_once "partials/nav.php" ?>

<main role="main">
        <section id="Quote">
        <div class="get-quote container py-5">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="display-1 fw-medium">GET A QUOTE</h1>
                </div>
            </div>
            <div class="row d-flex align-items-start gap-5 gap-lg-0">
                <div class="col-lg-6 d-flex flex-column gap-4">
                    <div class="quote-info d-flex gap-4 align-items-start justify-content-start">
                        <span class="material-symbols-outlined mt-1 fs-2"> location_on </span>
                        <div class="quote-content">
                            <h2 class="m-0 fs-1">visit us</h2>
                            <p class="m-0 fs-5">512, I The Address, Nr. Sola Overbridge, Sola, Ahmedabad, India</p>
                        </div>
                    </div>
                    <div class="quote-info d-flex gap-4 align-items-start justify-content-start">
                        <span class="material-symbols-outlined mt-1 fs-2"> mail </span>
                        <div class="quote-content">
                            <h2 class="m-0 fs-1">EMAIL ADDRESS</h2>
                            <a href="mailto:manish@truptman.com" class="fs-5">manish@truptman.com</a>
                        </div>
                    </div>
                    <div class="quote-info d-flex gap-4 align-items-start justify-content-start">
                        
                        <span class="material-symbols-outlined mt-1 fs-2"> phone_in_talk </span>
                        <div class="quote-content">
                            <h2 class="m-0 fs-1">CALL NOW</h2>
                            <p class="m-0 fs-5">+91-999-822-1513</p>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-6 form">
                    <form action="/quote" method="post" id="quoteForm">
                        <div class="row mb-5 d-flex gap-5 gap-lg-0">
                            <div class="col-lg-6">
                                <input name="Name" class="form-control" type="text" placeholder="Your name"
                                    aria-label="Your name">
                                <span class="form-msg d-none">This field is required</span>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" name="Email" placeholder="Email Address"
                                    aria-label="Email Address">
                                    <span class="form-msg d-none">This field is required</span>
                            </div>
                        </div>
                        <div class="row mb-5 d-flex gap-5 gap-lg-0">
                            <div class="col-lg-6">
                                <input class="form-control" type="text" name="Phone" placeholder="Phone number"
                                    aria-label="Phone number">
                                    <span class="form-msg d-none">This field is required</span>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" name="Country" placeholder="Country"
                                aria-label="Country">
                                <span class="form-msg d-none">This field is required</span>
                            </div>
                        </div>
                      
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <select name="Service" class="form-select" aria-label="select job">
                                    <option value="0" selected>-- Select Services --</option>
                                    <option value="MobileApp">Mobile App</option>
                                    <option value="Website">Wensite</option>
                                    <option value="UI/UX">UI/UX</option>
                                    <option value="IoT">IoT</option>
                                    <option value="QA">QA</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <select name="Budget" class="form-select" aria-label="select job">
                                    <option selected value="0">-- Select Budget --</option>
                                    <option value="lessThan5K">Less than $5k</option>
                                    <option value="5KTo10K">$5k - $10k</option>
                                    <option value="10KTo20K">$10k - $20k</option>
                                    <option value="20KTo30K">$20k - $30k</option>
                                    <option value="MoreThan30K">More than $30k</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="row mb-5 text-center">
                            <div class="col-lg-12">
                                <button type="submit" class="submit-btn fs-3 fw-normal" name="submit">Submit</button>
                            </div>
                        </div>
                        <div class="row mb-5 d-none" id="errorMessage">
                            <div class="col-lg-12">
                                <div class="errorMessage">
                                    <p class="m-0 fs-4 text-secondary text-center">One or more fields have an error. Please check and try again.</p>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($_SESSION["errors"]) || isset($_SESSION["message"])) : ?>
                                <div class="row mb-5">
                                    <div class="col-lg-12">
                                        <ul class="d-inline-block">
                                        <?php if($_SESSION["errors"] ?? false) : ?>
                                            <?php foreach($_SESSION["errors"] as $error):?>
                                            <li class="m-0 fs-4 text-center" style="color:red;"><?= $error ?></li>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                        <?php if($_SESSION["message"] ?? false) : ?>
                                            
                                            <li class="m-0 fs-4 text-center" style="color:green;list-style:none;"><?= $_SESSION["message"] ?></li>
                                            
                                        <?php endif ?>
                                        </ul>
                                    </div>
                                </div>
                               <?php endif ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="map">
            <div class="container-fluid px-2">
                <div class="row m-0">
                    <div class="col-12 p-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14683.037579156153!2d72.522543!3d23.069281!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e830e6549a36b%3A0xf8d8e141ffe489da!2sTruptMan%20Solutions%20LLP!5e0!3m2!1sen!2sus!4v1719818473804!5m2!1sen!2sus"
                            width="600" height="450" style="max-height:80vh;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-label-container">
            <div class="container">
                <div class="contact-label p-5 rounded-3">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6 d-lg-flex justify-content-start">
                            <h1 class="display-3 fw-normal">LET'S GET YOUR PROJECT
                                STARTED!</h1>
                        </div>
                        <div class="col-lg-6 d-lg-flex justify-content-end">
                            <a href="#">CONNECT WITH US</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>

<?php require_once "partials/footer.php" ?>