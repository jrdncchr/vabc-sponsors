<style>
    .wizard > .actions > ul > li.disabled {
        display: none;
    }
</style>
<h2 class="text-center vabc-h2" style="margin-top: 30px;">Sponsor Registration</h2>
<div class="row" style="margin-top: 10px;">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="danero-box">

            <div id="registration-steps">
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
                                <input id="name" type="text" class="form-control required" />
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
                                        <label for="daytime-phone">* Daytime Phone </label>
                                        <input id="daytime-phone" type="text" class="form-control required" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="evening-phone">* Evening Phone </label>
                                        <input id="evening-phone" type="text" class="form-control required" />
                                    </div>
                                </div>
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
                                <label for="facebook">Facebook </label>
                                <input id="facebook" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input id="twitter" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input id="linkedin" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="googleplus">Google+</label>
                                <input id="googleplus" type="text" class="form-control" />
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
                        </div>

                    </div>
                </section>
                <h3>Level of Sponsorship</h3>
                <section>
                    <div class="row" id="level-of-sponsorship">
                        <div class="col-sm-8 col-sm-offset-2" style="padding: 10px 0; border-radius:7px;">
                            <div class="notice"></div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="plan">
                                <input class="level-id" type="hidden" value="1" />
                                <p class="icon bronze">
                                    <i class="fa fa-user fa-fw"></i>
                                </p>
                                <h2>Present</h2>
                                <p class="price">$500</p>
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
                                <p class="price">$3,000</p>
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
                                <p class="price">$1,000</p>
                                <p class="level-sub">Support printed marketing material</p>
                                <p class="level-feature">Promotional table at the event for marketing collateral</p>
                                <p class="level-feature">Social media mention</p>
                                <p class="level-feature" style="border-bottom: none;">Free race entries for 4 participants for the city event.</p>
                                <button class="btn btn-pricing">Select</button>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-sm-4">
                            <button class="btn btn-block" style="background-color: #fff">Register as a Pending Sponsor</button>
                        </div>
                    </div>
                </section>
                <h3>Events</h3>
                <section>
                    <div class="row">
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
                                                <?php echo $e->description; ?>
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
                <h3>Payment</h3>
                <section>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="vabc-box">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="lead">Select Payment option: </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-primary">
                                            <div class="panel-body text-center">
                                                <i class="fa fa-cc-paypal fa-4x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-default">
                                            <div class="panel-body text-center">
                                                <i class="fa fa-cc-stripe fa-4x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-default">
                                            <div class="panel-body text-center">
                                                <i class="fa fa-cc-visa fa-4x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>
</div>

<footer class="footer text-center">&copy; Copyright <?php echo date('Y') . " " . $project; ?></footer>

<script>
    var selectedLevelId = 0;

    $(function() {
        $('#nav-register').addClass('active');

        var steps = $("#registration-steps").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "fade",
            autoFocus: true,
            enableFinishButton: false,
            onStepChanging: function (event, currentIndex, newIndex) {
                var form;
                if(currentIndex == 0) {
                    form = $('#sponsor-details');
                    if(!validator.validateForm(form)) {
                        return false;
                    }
                    if($('#password').val() !== $('#confirm-password').val()) {
                        validator.displayAlertError(form, true, "Password did not match!");
                        return false;
                    }
                    return true;
                } else if(currentIndex == 1) {
                    form = $('#level-of-sponsorship');
                    if(selectedLevelId == 0) {
                        validator.displayAlertError(form, true, "You must select a level to continue.");
                        return false;
                    } else {
                        validator.displayAlertError(form, false);
                        return true;
                    }
                } else if(currentIndex == 2) {
                    return true;
                }

            }
        });

        $(".switch").bootstrapSwitch({
            onText: "Sponsoring",
            offText: "Sponsor",
            inverse: true,
            onSwitchChange: function(event, state) {
                console.log(event.data);
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
</script>
