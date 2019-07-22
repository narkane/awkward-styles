
<header>
    <div class="head-top bg-dark py-2">
        <ul class="head-top-ul">
                <li>
                    <a href="/createstore">Open Your Store</a>
                </li>
                <li>
                    <a href="/seller">Sell Anything</a>
                </li>
                <li>
                    <a href="/seller">Sell Everywhere</a>
                </li>
            </ul>
    </div>
    <div class="head-middle">
        <div class="container">
            <div class="row justify-content-between align-items-center">

            </div>

        </div>

    </div>

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm  bg-light ">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mega-menu" aria-controls="mega-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mega-menu">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item nav-home">
                        <a href="/list" class="nav-link">
                            <span class="icon-home" style="borderRadius:20px;"></span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            START DESIGNING
                            <span>Create your own style</span>
                        </a>
                        <div class="dropdown-menu mega-menu-dropdown">
                            <ul class="multi-level">
                                <li class="dropdown-submenu dropdown-submenu-toggle active">
                                    <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">Clothing</a>
                                    <ul class="dropdown-menu" style="display: block;">
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="/thetool/112" class="nav-l3-title">T-Shirt</a>

                                                </div>
                                                <div class="col-md-3">
                                                    <a href="/thetool/88" class="nav-l3-title">Tank Top</a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="/thetool/111" class="nav-l3-title">Hoodie</a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="/comingsoon" class="nav-l3-title">More</a>
                                                </div>

                                            </div>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown-submenu dropdown-submenu-toggle">
                                    <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">Home</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <a href="/comingsoon" class="nav-l3-title">Mugs</a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="/comingsoon" class="nav-l3-title">Pillows</a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="/mockupgenerator/1033" class="nav-l3-title">Canvas</a>
                                                </div>

                                            </div>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown-submenu dropdown-submenu-toggle">
                                    <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">Accessories</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="/thetool/336" class="nav-l3-title">Bag</a>

                                                </div>
                                                <div class="col-md-3">
                                                    <a href="/thetool/684" class="nav-l3-title">Hat</a>
                                                </div>


                                            </div>
                                        </li>

                                    </ul>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">
                            SHOP
                            <span>Custom design products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            EXPLORE
                            <span>Artists and more</span>
                        </a>
                    </li>
                    <li class="nav-logo">


                        <div class="col">
                            <a href="/list">
                                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="">
                            </a>
                        </div>
                    </li>
                    <li class="nav-login">
                        <div class="col">
                            <ul class="head-middle-list">

                                <script type = "text/javascript" language = "javascript">

                                    function searchfunc(){
                                        window.location.href = "/search/" + document.getElementById("searchKeyword").value;
                                        //var action_src = "/search/" + document.getElementsByName("keywords")[0].value;
                                        //var form = document.getElementById('searcharea');
                                        //form.action = action_src ;
                                    }</script>

                                <li>
                                    <div class="dropdown">
                                        <a href="#" class="iconlinks dropdown-toggle" id="userdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-search"></span></a>

                                        <form id="searcharea" onSubmit="event.preventDefault(); searchfunc()" class="dropdown-menu dropdown-menu-right p-4" style="width: 400px;" aria-labelledby="userdropdown">
                                            <div class="input-group">
                                                <input type="text" id="searchKeyword" name="keywords" class="form-control" placeholder="Search.." aria-label="Search" aria-describedby="button-addon2">
                                                <div class="input-group-append">
                                                    <input class="btn btn-outline-secondary" type="submit" id="button-addon2" value="Search">
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </li>
                                <!-- <li>
                                <div class="dropdown">
                                    <a href="#" class="iconlinks dropdown-toggle" id="userdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-search"></span></a>
                                    <div id="app" class="dropdown-menu">
                                        <searchbar class="dropdown-item"/>
                                    </div>
                                </div>


                                </li> -->


                                <li><a href="/basket#" class="iconlinks"><span class="icon-shopping-cart"></span>
                                    </a></li>



                                <?php if(Auth::guest()): ?>

                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="iconlinks dropdown-toggle" id="userdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-user-circle"></span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userdropdown">
                                                <a class="dropdown-item" href="/login#">Login</a>
                                                <a class="dropdown-item" href="/register#">Register</a>

                                                <!-- <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Logout</a> -->
                                            </div>
                                        </div>
                                    </li>

                                <?php else: ?>
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="iconlinks dropdown-toggle" id="userdropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?> <span class="caret"></span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userdropdown">
                                                <a class="dropdown-item" href="/dashboard" title="My account">My Dashboard</a>
                                            <!-- <li><a href="<?php echo e(route('aimeos_shop_account',['site'=>Route::current()->parameter('site','default'),'locale'=>Route::current()->parameter('locale','en'),'currency'=>Route::current()->parameter('currency','DOL')])); ?>" title="My account">My account</a></li> -->
                                                <form id="logout" action="/logout" method="POST"><?php echo e(csrf_field()); ?></form><a  class="dropdown-item" href="javascript: document.getElementById('logout').submit();">Logout</a>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>


                            </ul>
                        </div>
                    </li>
                </ul>


            </div>
        </div>
    </nav>
</header>