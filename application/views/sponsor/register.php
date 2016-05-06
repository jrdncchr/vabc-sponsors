<style>
    .wizard > .actions > ul > li.disabled {
        display: none;
    }
</style>
<h2 class="text-center vabc-h2" style="margin-top: 30px;">Sponsor Registration</h2>
<div class="container">
    <div class="row" style="margin: 10px 0 50px 0;">
        <div class="col-sm-12">
            <div class="danero-box">

                <div id="registration-steps">
<!--                    <h3>Sponsor Details</h3>-->
<!--                    <section>-->
<!--                        <div class="row" id="sponsor-details">-->
<!--                            <div class="col-sm-8 col-sm-offset-2" style="padding: 10px 0; border-radius:7px;">-->
<!--                                <div class="notice"></div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-8 col-sm-offset-2 vabc-box" style="margin-bottom: 20px;">-->
<!--                                <h2>General Information</h2>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="company-name">* Company Name</label>-->
<!--                                    <input id="company-name" type="text" class="form-control required" value="I.O.I" />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="name">* Contact Name</label>-->
<!--                                    <input id="contact-name" type="text" class="form-control required" value="Jeon Somi" />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="street-address">* Street Address</label>-->
<!--                                    <input id="street-address" type="text" class="form-control required" value="62-B 1st Road Palma" />-->
<!--                                </div>-->
<!--                                <div class="row">-->
<!--                                    <div class="col-sm-7">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="city">* City</label>-->
<!--                                            <input id="city" type="text" class="form-control required" value="Baguio City" />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-sm-2">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="state">* State</label>-->
<!--                                            <input id="state" type="text" class="form-control required" value="Benguet" />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-sm-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="state">* Zip</label>-->
<!--                                            <input id="state" type="text" class="form-control required" value="2600" />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="row">-->
<!--                                    <div class="col-sm-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="phone1">* Daytime Phone </label>-->
<!--                                            <input id="phone1" type="text" class="form-control required" value="+639162553791" />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-sm-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="phone2">* Evening Phone </label>-->
<!--                                            <input id="phone2" type="text" class="form-control required" value="+639162553791" />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="website-url">Website Url</label>-->
<!--                                    <input id="website-url" type="text" class="form-control url" value="http://www.danero.net" />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="about-us">* About Us</label>-->
<!--                                    <textarea id="about-us" class="form-control required" rows="6" maxlength="2000">Aenean vitae enim quis lectus elementum volutpat nec et urna. Maecenas fermentum malesuada lorem, nec blandit ipsum laoreet id. Vestibulum at vehicula nisl. Morbi quis ligula viverra, volutpat dolor vitae, porta velit. Integer in porta ligula, nec varius est. Pellentesque quis odio at nisl aliquet rutrum. Proin sollicitudin lacus urna, vitae rutrum ex interdum eget. Phasellus dignissim velit elit, eget consequat nunc porta ut.</textarea>-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="join-us-message">* Join Us Message</label>-->
<!--                                    <textarea id="join-us-message" class="form-control required" rows="4" maxlength="1000">Praesent molestie vestibulum nibh, non pretium sapien. Sed ultrices nisi et ligula mattis faucibus. Nullam aliquam ipsum a tincidunt dictum.</textarea>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-sm-8 col-sm-offset-2 vabc-box" style="margin-top: 20px; margin-bottom: 20px;">-->
<!--                                <h2>Social Links</h2>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="facebook-url">Facebook Url</label>-->
<!--                                    <input id="facebook-url" type="text" class="form-control url" value="http://www.facebook.com/ioi" />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="twitter-url">Twitter Url</label>-->
<!--                                    <input id="twitter-url" type="text" class="form-control url" value="http://www.twitter.com/ioi" />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="linkedin-url">LinkedIn Url</label>-->
<!--                                    <input id="linkedin-url" type="text" class="form-control url" value="http://www.linkedin.com/ioi" />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="googleplus-url">Google+ Url</label>-->
<!--                                    <input id="googleplus-url" type="text" class="form-control url" value="http://www.google.com/ioi" />-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-sm-8 col-sm-offset-2 vabc-box" style="margin-top: 20px; margin-bottom: 20px;">-->
<!--                                <h2>Authentication</h2>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="email">* Email Address </label>-->
<!--                                    <input id="email" type="email" class="form-control required email" value="danero.jrc@gmail.com" />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="password">* Password</label>-->
<!--                                    <input id="password" type="password" class="form-control required" value="jordan" />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="confirm-password">* Confirm Password</label>-->
<!--                                    <input id="confirm-password" type="password" class="form-control" value="jordan" />-->
<!--                                </div>-->
<!--                                <div class="checkbox">-->
<!--                                    <label style="font-size: 14px;">-->
<!--                                        <input type="checkbox" id="agree"> I agree to the <a href="#">terms & agreements</a> and <a href="#">privacy policy</a>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                    </section>-->
                    <h3>Sponsor Details</h3>
                    <section>
                        <div class="row" id="sponsor-details">
                            <div class="col-sm-8 col-sm-offset-2" style="padding: 10px 0; border-radius:7px;">
                                <div class="notice"></div>
                            </div>
                            <div class="col-sm-8 col-sm-offset-2 vabc-box" style="margin-bottom: 20px;">
                                <h2>General Information</h2>
                                <div class="form-group">
                                    <label for="company-name">* Company Name</label>
                                    <input id="company-name" type="text" class="form-control required" />
                                </div>
                                <div class="form-group">
                                    <label for="name">* Contact Name</label>
                                    <input id="contact-name" type="text" class="form-control required" />
                                </div>
                                <div class="form-group">
                                    <label for="street-address">* Street Address</label>
                                    <input id="street-address" type="text" class="form-control required" />
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label for="city">* City</label>
                                            <input id="city" type="text" class="form-control required" />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="state">* State</label>
                                            <input id="state" type="text" class="form-control required" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="state">* Zip</label>
                                            <input id="state" type="text" class="form-control required" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone1">* Daytime Phone </label>
                                            <input id="phone1" type="text" class="form-control required" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone2">* Evening Phone </label>
                                            <input id="phone2" type="text" class="form-control required" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website-url">Website Url</label>
                                    <input id="website-url" type="text" class="form-control url" />
                                </div>
                                <div class="form-group">
                                    <label for="about-us">* About Us</label>
                                    <textarea id="about-us" class="form-control required" rows="6" maxlength="2000"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="join-us-message">* Join Us Message</label>
                                    <textarea id="join-us-message" class="form-control required" rows="4" maxlength="1000"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-2 vabc-box" style="margin-top: 20px; margin-bottom: 20px;">
                                <h2>Social Links</h2>
                                <div class="form-group">
                                    <label for="facebook-url">Facebook Url</label>
                                    <input id="facebook-url" type="text" class="form-control url" />
                                </div>
                                <div class="form-group">
                                    <label for="twitter-url">Twitter Url</label>
                                    <input id="twitter-url" type="text" class="form-control url" />
                                </div>
                                <div class="form-group">
                                    <label for="linkedin-url">LinkedIn Url</label>
                                    <input id="linkedin-url" type="text" class="form-control url" />
                                </div>
                                <div class="form-group">
                                    <label for="googleplus-url">Google+ Url</label>
                                    <input id="googleplus-url" type="text" class="form-control url" />
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-2 vabc-box" style="margin-top: 20px; margin-bottom: 20px;">
                                <h2>Authentication</h2>
                                <div class="form-group">
                                    <label for="email">* Email Address </label>
                                    <input id="email" type="email" class="form-control required email" />
                                </div>
                                <div class="form-group">
                                    <label for="password">* Password</label>
                                    <input id="password" type="password" class="form-control required" />
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password">* Confirm Password</label>
                                    <input id="confirm-password" type="password" class="form-control" />
                                </div>
                                <div class="checkbox">
                                    <label style="font-size: 14px;">
                                        <input type="checkbox" id="agree"> I agree to the <a href="#">terms & agreements</a> and <a href="#">privacy policy</a>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </section>
                    <h3>Email Confirmation</h3>
                    <section>
                        <div class="row" id="email-confirmation" style="margin: 120px 0;">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="notice"></div>
                            </div>
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="vabc-box">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p><i class="fa fa-question-circle"></i> A confirmation code was sent to your email address.</p>
                                            <div class="form-group">
                                                <label for="email-confirmation-code">Confirmation Code</label>
                                                <input id="email-confirmation-code" type="text" class="form-control required" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>Events</h3>
                    <section>
                        <div class="row" id="events">
                            <div class="col-sm-10 col-sm-offset-1" style="padding: 10px 0; border-radius:7px;">
                                <div class="notice"></div>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1">
                                <?php foreach($events as $e): ?>
                                <div class="media vabc-box">
                                    <div class="row-eq-height">
                                        <div class="media-img col-sm-5 col-md-4 col-lg-4" style="background-image: url('<?php echo base_url() . "resources/uploads/events/" . $e->image1; ?>'); ">
                                        </div>
                                        <div class="col-sm-7 col-md-8 col-lg-8 media-content">
                                            <div class="media-info">
                                                <h2><?php echo $e->name; ?></h2>
                                                <p class="block-with-text">
                                                    <?php echo $e->short_description; ?>
                                                </p>
                                            </div>
                                            <div class="media-actions">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a class="btn btn-default" href="<?php echo $e->info_link; ?>">View Details</a>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <input class="switch" type="checkbox" data-event-id="<?php echo $e->event_id; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <h3>Sponsorship Level</h3>
                    <section>
                        <div class="row" id="level-of-sponsorship" style="margin: 50px 0;">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="notice"></div>
                            </div>
                            <div class="col-sm-4 text-center">
                                <div class="plan">
                                    <input class="level-id" type="hidden" value="1" />
                                    <p class="icon bronze">
                                        <i class="fa fa-user fa-fw"></i>
                                    </p>
                                    <h2>Present</h2>
                                    <p class="price">$<span class="level-price">500</span><span style="font-size: 14px">/event</span></p>
                                    <p class="level-sub">Marketing support</p>
                                    <p class="level-feature">Included sponsor in one (1) city/event.</p>
                                    <p class="level-feature">Opportunity to share marketing material/flyers at the event</p>
                                    <p class="level-feature">Social media mention</p>
                                    <p class="level-feature" style="border-bottom: none;">Free race entries for 2 participants for the city event.</p>
                                    <button class="btn btn-pricing">Select</button>
                                </div>
                            </div>

                            <div class="col-sm-4 text-center">
                                <div class="plan">
                                    <input class="level-id" type="hidden" value="2" />
                                    <p class="icon gold">
                                        <i class="fa fa-user-secret fa-fw"></i>
                                    </p>
                                    <h2>Featured</h2>
                                    <p class="price">$<span class="level-price">3,000</span><span style="font-size: 14px">/event</span></p>
                                    <p class="level-sub">Featured Local Sponsor in one location of the JTV! tour Helps support creative workshops</p>
                                    <p class="level-feature">Featured Local sponsor for one (1) city/event</p>
                                    <p class="level-feature">Promotional tent and table at the event for marketing collateral</p>
                                    <p class="level-feature">Social media post mention</p>
                                    <p class="level-feature">On stage mention</p>
                                    <p class="level-feature" style="border-bottom: none;">Free race entries for 8 participants for the city event.</p>
                                    <button class="btn btn-pricing">Select</button>
                                </div>
                            </div>

                            <div class="col-sm-4 text-center">
                                <div class="plan">
                                    <input class="level-id" type="hidden" value="3" />
                                    <p class="icon silver">
                                        <i class="fa fa-user-plus fa-fw"></i>
                                    </p>
                                    <h2>Contributing</h2>
                                    <p class="price">$<span class="level-price">1,000</span><span style="font-size: 14px">/event</span></p>
                                    <p class="level-sub">Support printed marketing material</p>
                                    <p class="level-feature">Promotional table at the event for marketing collateral</p>
                                    <p class="level-feature">Social media mention</p>
                                    <p class="level-feature" style="border-bottom: none;">Free race entries for 4 participants for the city event.</p>
                                    <button class="btn btn-pricing">Select</button>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 70px;">
                            <div class="col-sm-4 col-sm-offset-4">
                                <button class="btn btn-block btn-white" style="background-color: #fff">Register as a Pending Sponsor</button>
                            </div>
                        </div>
                    </section>
                    <h3>Payment</h3>
                    <section>
                        <div class="row" style="margin: 50px 0;">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="vabc-box" id="paymentSummary">

                                </div>
                            </div>
                        </div>
                    </section>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
    var selectedLevelId = 0;
    var data = {};
    var sponsoringEvents = [];
    var actionUrl = "<?php echo $client_base_url . '/sponsor/page';?>";
    var userId = 0;
    var confirmedEmailAddress = false;

    $(function() {
        $('#nav-register').addClass('active');

        $("#registration-steps").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "fade",
            autoFocus: true,
            enableFinishButton: false,
            onStepChanging: function (event, currentIndex, newIndex) {
                if(newIndex == 4) {
                    updateSummaryTable();
                }
                return true;
                var form;
                var move = false;
                if(currentIndex == 0) {
                    form = $('#sponsor-details');
                    if(!validator.validateForm(form)) {
                        return false;
                    }
                    if($('#password').val() !== $('#confirm-password').val()) {
                        validator.displayAlertError(form, true, "Password did not match!");
                        return false;
                    }
                    if(!$('#agree').is(':checked')) {
                        validator.displayAlertError(form, true, "You must agree to the terms and agreements and privacy policy.");
                        return false;
                    }
                    data.sponsor_details = {
                        company_name    : $('#company-name').val(),
                        contact_name    : $('#contact-name').val(),
                        street_address  : $('#street-address').val(),
                        city            : $('#city').val(),
                        state           : $('#state').val(),
                        zip             : $('#zip').val(),
                        phone1          : $('#phone1').val(),
                        phone2          : $('#phone2').val(),
                        website_url     : $('#website-url').val(),
                        about_us        : $('#about-us').val(),
                        join_us_message : $('#join-us-message').val()
                    };
                    data.social_links = {
                        facebook_url    : $('#facebook-url').val(),
                        linkedin_url    : $('#linkedin-url').val(),
                        twitter_url     : $('#twitter-url').val(),
                        googleplus_url  : $('#googleplus-url').val()
                    };
                    data.authentication = {
                        email            : $('#email').val(),
                        password         : $('#password').val()
                    };
                    if(userId > 0) {
                        data.user_id = userId;
                    }
                    loading('info', 'Saving registration details...');
                    $.ajax({
                        url: actionUrl + '/save_registration_details',
                        data: data,
                        type: 'POST',
                        async: false,
                        dataType: 'json',
                        success: function(res) {
                            if(res.success) {
                                move = true;
                                loading('success', 'Saving successful!');
                                userId = res.user_id;
                            } else {
                                loading('danger', res.message);
                                if(res.field == 'email') {
                                    validator.displayAlertError(form, true, res.message);
                                }
                            }
                        }
                    });
                    return move;
                } else if(currentIndex == 1) {
                    if(newIndex > 1) {
                        if(!confirmedEmailAddress) {
                            move = false;
                            form = $('#email-confirmation');
                            if(!validator.validateForm(form)) {
                                return false;
                            }
                            loading('info', 'Validating confirmation code...');
                            $.ajax({
                                url: actionUrl + '/confirm_email',
                                data: {user_id: userId, confirmation_code: $('#email-confirmation-code').val()},
                                type: 'POST',
                                async: false,
                                dataType: 'json',
                                success: function(res) {
                                    if(!res.success) {
                                        validator.displayAlertError(form, true, "Incorrect email confirmation code.");
                                        loading('danger', 'Incorrect code.');
                                    } else {
                                        move = true;
                                        form.find('.notice').addClass('alert alert-success').html('<i class="fa fa-check"></i> Your email address is now confirmed.').show();
                                        $('#email-confirmation-code').attr('disabled', 'disabled');
                                        confirmedEmailAddress = true;
                                        loading('success', 'Your email address is now confirmed.');
                                    }
                                }
                            });
                            return move;
                        } else {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }else if(currentIndex == 2) {
                    if(newIndex > 3) {
                        form = $('#events');
                        if(sponsoringEvents.length == 0) {
                            validator.displayAlertError(form, true, "Please select the event you are sponsoring.");
                            return false;
                        }
                        data.sponsoring_events = sponsoringEvents;
                        validator.displayAlertError(form, false);
                    }
                    return true;
                } else if(currentIndex == 3) {
                    if(newIndex > 2) {
                        form = $('#level-of-sponsorship');
                        if(selectedLevelId == 0) {
                            validator.displayAlertError(form, true, "You must select a level or skip to continue.");
                            return false;
                        } else {
                            data.level_id = selectedLevelId;
                            validator.displayAlertError(form, false);
                        }
                    }
                    return true;
                } else if(currentIndex == 4) {

                }
            }
        });

        $(".switch").bootstrapSwitch({
            onText: "Sponsoring",
            offText: "Sponsor",
            inverse: true,
            onSwitchChange: function(event, state) {
                var eventId = $(this).data('event-id');
                if(state) {
                    sponsoringEvents.push(eventId);
                } else {
                    var index = $.inArray(eventId, sponsoringEvents);
                    sponsoringEvents.splice(index, 1);
                }
            }
        });

        $('.btn-pricing').on('click', function() {
            if($(this).parent('.plan').hasClass('featured')) {
                $('.plan').removeClass('featured');
                $('.btn-pricing').html('Select');
                selectedLevelId = 0;
            } else {
                $('.plan').removeClass('featured');
                $('.btn-pricing').html('Select');
                $(this).parent('.plan').addClass('featured');
                $(this).html('<i class="fa fa-check fa-2x"></i>');
                selectedLevelId = $(this).parent('.plan').find('.level-id').val();
            }
        });

    });

    function updateSummaryTable() {
        var events = [];
        var levelId = $('.plan.featured').find('.level-id').val();
        $('.switch').each(function() {
            if($(this).is(':checked')) {
                events.push($(this).data('event-id'));
            }
        });
        $.post(actionUrl + "/generate_registration_payment", {events: events, level_id: levelId, user_id: userId}, function(res) {
            $('#paymentSummary').html(res);
        });
    }

    function submitPaypalForm() {
        $('#paypalForm').submit();
    }

</script>
