<div class="row">


    <div class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="slide-image" style="background-image: url('<?php echo base_url() . 'resources/images/sponsor-slide-img1.jpg'; ?>')">
                </div>
            </div>
            <div class="item">
                <div class="slide-image" style="background-image: url('<?php echo base_url() . 'resources/images/sponsor-slide-img2.jpg'; ?>')">
                </div>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="col-sm-4 login-slide-block">
            <div class="danero-box" style="padding: 30px; background-color: rgba(255,255,255,0.7);">
                <h2>Sponsor Login</h2>
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
                    <button class="btn btn-vabc pull-right btn-lg">Login</button>
                </form>
                <br /><br />
            </div>
        </div>

        <div class="col-sm-4 col-sm-offset-5 login-slide-block">
            <div class="danero-box" style="padding: 30px; background-color: rgba(255,255,255,0.7);">
                <h2>Why become a Sponsor</h2>
                <p><i class="fa fa-arrow-right"></i> Cras et tortor nec metus convallis sodales a eget magna.</p>
                <p><i class="fa fa-arrow-right"></i> Aenean quis dolor vitae lectus ornare accumsan.</p>
                <p><i class="fa fa-arrow-right"></i> Duis tristique lacus quis nulla eleifend, in efficitur libero venenatis.</p>
                <p><i class="fa fa-arrow-right"></i> Nulla sit amet enim nec massa eleifend aliquet.</p>
                <p><i class="fa fa-arrow-right"></i> Pellentesque finibus nulla in consequat bibendum.</p>
                <p><i class="fa fa-arrow-right"></i> Aenean sodales erat ac nulla rutrum hendrerit.</p>
                <a href="<?php echo base_url() . 'register'; ?>" class="btn btn-vabc btn-block btn-lg" style="margin-top: 15px;">Become a Sponsor Now</a>
                <br />
            </div>
        </div>
    </div>


</div>

<footer class="footer text-center" style="margin-top: 0;">&copy; Copyright <?php echo date('Y') . " " . $project; ?></footer>

<script>
    $(function() {
        $('#nav-login').addClass('active');
        $('.carousel').carousel({
            interval: 10000
        })
    });
</script>
