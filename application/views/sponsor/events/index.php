<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="event-search" style="font-size: 18px !important;">Search</label>
                    <form class="form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="search-type">Search Type</label>
                            <select id="search-type" class="form-control">
                                <option value="name" selected>Name</option>
                                <option value="zip">Zip</option>
                                <option value="address">Address</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="search-text">Search Text</label>
                            <input id="search-text" type="text" class="form-control"  style="width: 400px;"/>
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-2 col-sm-offset-2">
                <div class="form-group">
                    <label for="event-status" style="font-size: 18px !important;">Status</label>
                    <select id="event-status" class="form-control">
                        <option value="sponsored">Sponsored</option>
                        <option value="active">Active</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
<!--                <p>Search Result for:</p>-->
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <?php foreach($events as $e): ?>
            <div class="danero-box" style="margin-bottom: 20px; padding: 0; <?php if($e->status == "completed") { echo "opacity: .7;"; } ?>">
                <div class="row-eq-height">
                    <div class="media-img col-sm-5 col-md-4 col-lg-4" style="background-image: url('<?php echo base_url() . "resources/uploads/events/" . $e->image1; ?>'); ">
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-8 media-content">
                        <div class="media-info" style="margin-bottom: 0">
                            <h2><?php echo $e->name; ?></h2>
                            <p class="block-with-text">
                                <?php echo $e->description; ?>
                            </p>
                        </div>

                        <?php if(isset($e->es_id)) { ?>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <h2 style="color: #008000">
                                        <?php if($e->status == "completed") { ?>
                                            <i class="fa fa-check"></i> COMPLETED
                                        <?php } ?>
                                        &nbsp; &nbsp; &nbsp; <span style="color: #E89435;"><i class="fa fa-star"></i> SPONSORED</span></h2>
                                </div>
                            </div>
                            <div class="media-actions" style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a class="btn btn-default" href="<?php echo $e->info_link; ?>" target="_blank">View Details</a>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a href="<?php echo $client_base_url . "/sponsor/events/guests/" . $e->es_id; ?>" class="btn btn-default"><i class="fa fa-users"></i> My Guests</a>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <h2 style="color: #008000">
                                        <?php if($e->status == "completed") { ?>
                                            <i class="fa fa-check"></i> COMPLETED
                                        <?php } ?>
                                </div>
                            </div>
                            <div class="media-actions" style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a class="btn btn-default" href="<?php echo $e->info_link; ?>">View Details</a>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-default"><i class="fa fa-star"></i> Sponsor Event</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    $(function() {
        $('#nav-events-link').addClass('active');
    });
</script>