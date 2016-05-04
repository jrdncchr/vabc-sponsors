<div class="slide-image" style="background-image: url('<?php echo base_url() . 'resources/images/sponsor-slide-img1.jpg'; ?>')">

    <div class="container">

        <div class="col-sm-5">
            <div class="vabc-login-box">
                <h2 class="text-center"><i class="fa fa-key"></i> Login</h2>
                <form action="<?php echo $client_base_url . "/sponsor/login"; ?>" method="post" style="padding-bottom: 30px;">
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
                    <button class="btn btn-default btn-white pull-right">Login</button>
                </form>
            </div>
        </div>

        <div class="col-sm-5 col-sm-offset-2">
            <div class="vabc-login-box">
                <h2 class="text-center"><i class="fa fa-smile-o"></i> Why become a Sponsor</h2>
                <p><i class="fa fa-arrow-right"></i> Cras et tortor nec metus convallis sodales a eget magna.</p>
                <p><i class="fa fa-arrow-right"></i> Aenean quis dolor vitae lectus ornare accumsan.</p>
                <p><i class="fa fa-arrow-right"></i> Duis tristique lacus quis nulla eleifend, in efficitur libero venenatis.</p>
                <p><i class="fa fa-arrow-right"></i> Nulla sit amet enim nec massa eleifend aliquet.</p>
                <p><i class="fa fa-arrow-right"></i> Pellentesque finibus nulla in consequat bibendum.</p>
                <p><i class="fa fa-arrow-right"></i> Aenean sodales erat ac nulla rutrum hendrerit.</p>
                <a href="<?php echo $client_base_url . '/sponsor/register'; ?>" class="btn btn-default btn-block btn-white" style="margin-top: 15px;">Become a Sponsor Now</a>
            </div>
        </div>
    </div>


</div>