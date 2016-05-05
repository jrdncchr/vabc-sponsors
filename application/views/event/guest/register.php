<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?php echo $client_base_url . '/event'; ?>">Events</a></li>
        <li class="active"><?php echo $event->name; ?>
    </ol>
    <div class="col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading" style="border-bottom: none;"><i class="fa fa-calendar-o"></i> Event</div>
            <div class="panel-body" style="padding:0;">
                <p class="sdc-title"><?php echo $event->name; ?></p>


                <div id="event-image-carousel" class="carousel slide" style="width: 100%;">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="item active" style="background-image: url('<?php echo base_url() . "resources/uploads/events/" . $event->image1; ?>');">
                        </div>
                        <div class="item" style="background-image: url('<?php echo base_url() . "resources/uploads/events/" . $event->image2; ?>');">
                        </div>
                        <div class="item" style="background-image: url('<?php echo base_url() . "resources/uploads/events/" . $event->image1; ?>') ">
<!--                            <div class="carousel-caption">-->
<!--                                <h4>Third Thumbnail label</h4>-->
<!--                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
<!--                            </div>-->
                        </div>
                    </div>

                    <a class="left carousel-control" href="#event-image-carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#event-image-carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>



                <div style="padding: 10px;">
                    <div class="form-group">
                        <label>Date</label>
                        <p><?php echo date("F j, Y", strtotime($event->start_date)); ?> - <?php echo date("F j, Y", strtotime($event->end_date)); ?></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p><?php echo $event->long_description; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <p><?php echo  $event->street_address. ", " . $event->state_province . " " . $event->zip . ", " . $event->country; ?></p>
                        <div id="event-map" style="width: 100%; height: 300px;"></div>
                    </div>
                    <div class="form-group">
                        <label>Updates</label>
                        <p><?php echo $event->updates ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading" style="border-bottom: none;"><i class="fa fa-user"></i> Guest</div>
            <div class="panel-body" style="padding:0;">
                <div style="padding: 10px;">
                    <div class="form-group">
                        <label for="event-name">Why join us?</label>
                        <p><?php echo $sponsor->join_us_message; ?></p>
                    </div>
                    <button class="btn btn-default btn-block btn-lg" style="font-weight: bold;">Join as Guest</button>
                    <button class="btn btn-default btn-block btn-lg" style="font-weight: bold;">Join as a free Member</button>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" style="border-bottom: none;"><i class="fa fa-user-secret"></i> Sponsor</div>
            <div class="panel-body" style="padding:0;">
                <p class="sdc-title"><?php echo $sponsor->company_name;?></p>
                <div class="sdc-image" style="background-image: url('<?php echo base_url() . "resources/uploads/sponsor/logo/" . $sponsor->logo; ?>');"></div>
                <div style="padding: 10px;">
                    <div class="form-group">
                        <label>About Us</label>
                        <p><?php echo $sponsor->about_us; ?></p>
                    </div>
                </div>
                <div class="sdc-image" style="background-image: url('<?php echo base_url() . "resources/uploads/sponsor/main/" . $sponsor->main_photo; ?>');"></div>
                <div style="padding: 10px;">
                    <div class="form-group">
                        <label>Contact</label>
                        <div class="row"><span class="col-sm-2 text-center"><i class="fa fa-user"></i></span> <?php echo $sponsor->contact_name; ?></p></div>
                        <div class="row"><span class="col-sm-2 text-center"><i class="fa fa-sun-o"></i></span> <?php echo $sponsor->phone1; ?></p></div>
                        <div class="row"><span class="col-sm-2 text-center"><i class="fa fa-moon-o"></i></span> <?php echo $sponsor->phone2; ?></p></div>
                        <div class="row"><span class="col-sm-2 text-center"><i class="fa fa-globe"></i></span> <a target="_blank" href="<?php echo $sponsor->website_url; ?>"><?php echo $sponsor->website_url; ?></a></p></div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p><?php echo $sponsor->unit_address . " " . $sponsor->street_address . " " . $sponsor->city . ", " . $sponsor->country; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Social Networks</label>
                        <p>
                            <a target="_blank" href="<?php echo $sponsor->facebook_url?>"><i class="fa fa-facebook-square fa-2x"></i></a>
                            <a target="_blank" href="<?php echo $sponsor->twitter_url?>"><i class="fa fa-twitter-square fa-2x"></i></a>
                            <a target="_blank" href="<?php echo $sponsor->linkedin_url?>"><i class="fa fa-linkedin-square fa-2x"></i></a>
                            <a target="_blank" href="<?php echo $sponsor->googleplus_url?>"><i class="fa fa-google-plus-square fa-2x"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
    var geocoder;
    var map;
    var eventAddress = "<?php echo  $event->street_address. ", " . $event->state_province . " " . $event->zip . ", " . $event->country; ?>";

    $(function() {
        $('#nav-events-link').addClass('active');
        initializeMap();
    });

    function initializeMap() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var myOptions = {
            zoom: 14,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("event-map"), myOptions);
        if (geocoder) {
            geocoder.geocode( { 'address': eventAddress}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                        map.setCenter(results[0].geometry.location);

                        var infowindow = new google.maps.InfoWindow(
                            { content: '<b>'+eventAddress+'</b>',
                                size: new google.maps.Size(150,50)
                            });

                        var marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map,
                            title:eventAddress
                        });
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.open(map,marker);
                        });

                    } else {
                        alert("No results found");
                    }
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
        }
    }
</script>
