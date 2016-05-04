<style>
    .event-image {
        min-height: 200px;;
    }
</style>
<ol class="breadcrumb">
    <li><a href="<?php echo $client_base_url . '/sponsor/events'; ?>">Library</a></li>
    <li class="active"><?php echo $event->name; ?></li>
</ol>
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading" style="border-bottom: none;"><i class="fa fa-calendar-o"></i> Event Details</div>
            <div class="panel-body" style="padding:0;">
                <div class="event-image" style="background-image: url('<?php echo base_url() . "resources/uploads/events/" . $event->image1; ?>');"></div>
                <div style="padding: 10px;">
                    <div class="form-group">
                        <label for="event-name">Event Name</label>
                        <p><?php echo $event->name; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="event-name">Description</label>
                        <p style="font-size: 13px"><?php echo $event->description; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="event-name">Location</label>
                        <p><?php echo $event->country . ", " . $event->state . " " . $event->zip; ?></p>
                    </div>
                    <a href="<?php echo $event->info_link; ?>" class="btn btn-default btn-block">Event Detailed Information</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-users"></i> Guests</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-default pull-left"><i class="fa fa-globe"></i> Guest Registration</button>
                        <button class="btn btn-default pull-right" id="invite-btn"><i class="fa fa-user-plus"></i> Invite Guest</button>
                    </div>
                </div>
                <table id="guest-list-dt" class="display table table-hover table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Joined</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="invite-guest-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width: 450px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> Invite Guest</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fa fa-question-circle"></i>
                    Use comma for multiple email address.
                </div>
                <div class="form-group">
                    <label for="guest-emails">* Email Address</label> <br />
                    <input id="guest-emails" type="email" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-default">Send Invitation <i class="fa fa-send"></i></button>
            </div>
        </div>
    </div>
</div>

<div id="guest-details-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width: 450px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Guest Details</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <p id="guest-email" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Name</label>
                        <div class="col-sm-8">
                            <p id="guest-name" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Phone</label>
                        <div class="col-sm-8">
                            <p id="guest-phone" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Date Joined</label>
                        <div class="col-sm-8">
                            <p id="guest-date-joined" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var actionUrl = "<?php echo $client_base_url . '/sponsor/events/action'; ?>";
    var shopEnabled = "<?php echo isset($shop) ? ($shop->enabled == 1 ? true : false) : false; ?>";
    var shopId = "<?php echo isset($shop) ? $shop->shop_id : 0; ?>";

    $(function() {
        $('#nav-events-link').addClass('active');
        $('#guest-emails').tagsinput({
            allowDuplicates: false
        });

        $('#invite-btn').on('click', function() {
            $('#invite-guest-modal').modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            });
        });

        $('#guest-list-dt').dataTable({
            destroy: true,
            filter: false,
            paginate: false,
            lengthChange: false,
            info: false,
            ajax: {
                type: "POST",
                url: actionUrl,
                data: {action: "guest_list"}
            },
            columns: [
                {data: "name", width: "40%"},
                {data: "email", width: "30%"},
                {data: "date_created", width: "30%"},
                {data: "guest_id", visible: false},
                {data: "user_id", visible: false}
            ],
            "fnDrawCallback": function (oSettings) {
                var table = $("#guest-list-dt").dataTable();
                $('#guest-list-dt tbody tr').on('dblclick', function () {
                    var pos = table.fnGetPosition(this);
                    var data = table.fnGetData(pos);
                    showGuestInfo(data);
                });
            }
        });

    });

    function showGuestInfo(guest) {
        $('#guest-details-modal').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
        $('#guest-email').html(guest.email);
        $('#guest-name').html(guest.name);
        $('#guest-phone').html(guest.phone);
        $('#guest-date-joined').html(guest.date_created);
    }
</script>