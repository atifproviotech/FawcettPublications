<div class="container form-wrapper">
    <div class="p-4 rounded form-box" style="background-color: #1c1c1c; color: #fff; max-width: 600px; margin: auto;">
        <form action="javascript:" class="leadform" method="POST" novalidate>
            <div class="row g-3">
                <div class="col-lg-12 col-12">
                    <input type="text" class="form-control bg-transparent text-white border-light" name="name" placeholder="Name" required>
                </div>
                <div class="col-lg-12 col-12">
                    <input type="tel" class="form-control bg-transparent text-white border-light" name="phone" placeholder="Phone Number" required>
                </div>
                <div class="col-lg-12 col-12">
                    <input type="email" class="form-control bg-transparent text-white border-light" name="email" placeholder="Email" required>
                </div>
                <div class="col-lg-12 col-12">
                    <select name="budget" class="form-select bg-transparent text-white border-light" required>
                        <option value="" class="bg-dark">-- What type of book do you plan on writing? --</option>
                        <option value="Business" class="bg-dark">Business</option>
                        <option value="Biography" class="bg-dark">Biography</option>
                        <option value="Inspirational" class="bg-dark">Inspirational</option>
                        <option value="Non-Fiction" class="bg-dark">Non-Fiction</option>
                        <option value="How-To" class="bg-dark">How-To</option>
                    </select>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control bg-transparent text-white border-light" name="service" placeholder="Required Service" required>
                </div>
                <div class="col-12">
                    <textarea class="form-control bg-transparent text-white border-light" name="message" placeholder="I am looking for..." style="height:110px;" required></textarea>
                </div>
            </div>

            <div class="form-check my-3">
                <input class="form-check-input" type="checkbox" id="updates">
                <label class="form-check-label small text-white-50" for="updates">
                    Please check the box to receive updates via SMS and email. By opting in, you agree to our 
                    <a href="#" class="text-decoration-underline text-white">Privacy Policy</a> and 
                    <a href="#" class="text-decoration-underline text-white">Terms & Conditions</a>.
                </label>
            </div>

            <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
            </div>

            <button type="submit" class="btn py-2 btn btn-primary">
                <i class="bi bi-send me-2"></i>Send
            </button>
        </form>
    </div>
</div>
