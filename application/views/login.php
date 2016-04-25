<h2 class="text-center vabc-h2" style="margin-top: 30px;">Sponsor Login</h2>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="danero-box" style="padding: 30px 60px 50px 60px;">
            <form action="<?php echo base_url() . "login"; ?>" method="post">
                <?php
                $error = $this->session->flashdata('error');
                if(isset($error)) { ?>
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-circle"></i>
                        <?php echo $error; ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                </div>
                <a href="<?php echo base_url() . "register"; ?>" style="font-size: 14px;">Become a sponsor now</a>
                <button class="btn btn-default pull-right">Login</button>
            </form>
            <br />
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#nav-login').addClass('active');
    });
</script>
