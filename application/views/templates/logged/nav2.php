<nav class="navbar navbar-default" style="margin-bottom: 20px;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <a class="navbar-brand">SPONSORS</a>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav logged-nav">
                <li>
                    <a id="nav-dashboard-link" href="<?php echo base_url() . 'dashboard'; ?>">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a id="nav-events-link" href="<?php echo base_url() . 'events'; ?>">
                        <i class="fa fa-calendar-check-o"></i> Events
                    </a>
                </li>
                <li>
                    <a id="nav-shop-link" href="<?php echo base_url() . 'shop'; ?>">
                        <i class="fa fa-shopping-basket"></i> Shop
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" id="nav-user-link" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo "Welcome, " .  $user->details->company_name; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url() . 'profile'; ?>"><i class="fa fa-user"></i> Profile</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="<?php echo base_url() . 'logout'; ?>">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

