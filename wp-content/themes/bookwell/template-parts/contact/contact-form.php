<div class="wl-home-index inline-form">
    <section class="wl-home-contact-form">
        <div class="wl-home-contact-container"><h4 class="title"><?php echo get_theme_mod('form_title')?></h4>
            <p class="description"><?php echo get_theme_mod('form_subtitle')?></p>
            <div class="js-wl-schedule-demo-form wl-schedule-demo-form">
                <div id="rs-home-contact-dom">
                    <form action="" class="rs-home-contact-form" enctype="multipart/form-data" id="rs-home-contact-form" method="post">
                        <div class="rs-home-contact-field-container">
                                    <span><input autocomplete="off" class="type-text" maxlength="255" name="firstname" placeholder="First Name" style="width:100%;" type="text" value="">
                                        <div class="a-validate-message-container" data-field="firstname"> </div>
                                    </span>
                            <span><input autocomplete="off" class="type-text" maxlength="255" name="lastname"
                                         placeholder="Last Name" style="width:100%;" type="text" value="">
                                        <div class="a-validate-message-container" data-field="lastname"></div>
                                    </span>
                            <input autocomplete="off" class="type-text mail-icon" maxlength="256" name="mail" placeholder="Email address" style="width:100%;" type="email" value="">
                            <div class="a-validate-message-container" data-field="mail"></div>
                            <input autocomplete="off" class="type-text phone-icon input-phone" maxlength="255" name="phone" placeholder="Phone Number" style="width:100%;" type="tel" value="">
                            <div class="a-validate-message-container" data-field="phone"></div>
                            <input autocomplete="off" class="type-text" maxlength="255" name="business" placeholder="Business Name" style="width:100%;" type="text" value="">
                            <div class="a-validate-message-container" data-field="business"></div>
                            <input autocomplete="off" class="type-text" maxlength="1024" name="url" placeholder="Web Site" style="width:100%;" type="text" value="">
                            <div class="a-validate-message-container" data-field="url"></div>
                            <select name="industry" style="width: 100%; box-sizing: border-box;" id="rs-home-contact-industry-select">
                                <option value="">Select your industry</option>
                                <option>Automotive Business</option>
                                <option>Barber Shop</option>
                                <option>Barre Studio</option>
                                <option>Bootcamp</option>
                                <option>Boxing Gym</option>
                                <option>Cosmetic Surgery Clinic</option>
                                <option>CrossFit Box</option>
                                <option>Dance Studio</option>
                                <option>Dental Office</option>
                                <option>Dog Training Business</option>
                                <option>Education Center</option>
                                <option>Equestrian Business</option>
                                <option>Events and Tours Business</option>
                                <option>Fencing Academy</option>
                                <option>Financial Institution</option>
                                <option>Fitness Studio</option>
                                <option>Gym</option>
                                <option>Hair Removal Clinic</option>
                                <option>Health Club</option>
                                <option>Language School</option>
                                <option>Life Coaching Business</option>
                                <option>Martial Arts School</option>
                                <option>Massage Business</option>
                                <option>Medical Office</option>
                                <option>Meditation Studio</option>
                                <option>Miscellaneous</option>
                                <option>MMA Gym</option>
                                <option>Music School</option>
                                <option>Optometry Office</option>
                                <option>Personal Training Studio</option>
                                <option>Physiotherapy Clinic</option>
                                <option>Pilates Studio</option>
                                <option>Pole Dancing Studio</option>
                                <option>Pottery Studio</option>
                                <option>Racquet Club</option>
                                <option>Salon</option>
                                <option>Spa</option>
                                <option>Spinning Studio</option>
                                <option>Swimming School</option>
                                <option>Tanning Salon</option>
                                <option>Tattoo Parlor</option>
                                <option>Training Center</option>
                                <option>Veterinary Office</option>
                                <option>Wellness Center</option>
                                <option>Yoga Studio</option>
                                <option>Zumba Studio</option>
                            </select>
                            <div class="a-validate-message-container" data-field="industry"></div>
                            <select name="reference" style="width: 100%;" id="home_reference_select">
                                <option data-plural="How did you hear about us?" data-single="How did you hear about us?" data-value="" value="" selected="selected"> How did you hear about us?</option>
                                <option> Capterra</option>
                                <option> Email Promotion</option>
                                <option> Facebook</option>
                                <option> Google AdWords Advertisement</option>
                                <option> Google Search</option>
                                <option> Instagram</option>
                                <option> LinkedIn</option>
                                <option> Twitter</option>
                                <option> Wellnessliving Blog</option>
                                <option> other</option>
                            </select>
                            <div class="a-validate-message-container" data-field="reference"></div>
                            <div class="a-validate-message-container" data-field="s_promo"></div>
                            <br>
                            <input type="submit" class="type-submit contact-button home-request-demo" value="Request a demo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="contact"><span class="wl-icon-telephone"></span> <span><?php echo get_theme_mod('form_footer')?> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; </span>
            <a href="tel:<?php echo get_theme_mod('phone')?>"
               onclick="ga('send', 'event', 'Phone Lead', 'Call', 'Header <?php echo get_theme_mod('phone') ?>');"><?php echo get_theme_mod('form_number')?></a></div>
        <div class="clear"></div>
    </section>
</div>