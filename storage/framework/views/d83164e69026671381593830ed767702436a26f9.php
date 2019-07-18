<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo $__env->yieldContent('aimeos_header'); ?>
    <title>AWKWARD Styles</title>
<?php echo $__env->yieldContent('aimeos_styles'); ?>
    <link type="text/css" rel="stylesheet" href='https://fonts.googleapis.com/css?family=Roboto:400,300'>
      <link href="<?php echo e(asset('css/graphic-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/theme.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <link href="<?php echo e(asset('css/Custom.css')); ?>" rel="stylesheet">
   
</head>
<body>
    
<header>

    <div class="head-top bg-dark">
            <div class="container">
                <ul class="head-top-ul">
                    <li>
                        <a href="#">Open Your Store</a>
                    </li>
                    <li>
                        <a href="#">Sell Anything</a>
                    </li>
                    <li>
                        <a href="#">Sell Everywhere</a>
                    </li>
                </ul>
            </div>

        </div>
      
        <div class="head-middle">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <a href="/list">
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <ul class="head-middle-list">

                            <li>
                            <div class="dropdown">
                                    <a href="#" class="iconlinks dropdown-toggle" id="userdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-search"></span></a>

                                    <form class="dropdown-menu dropdown-menu-right p-4" style="width: 400px;" aria-labelledby="userdropdown">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search.." aria-label="Search" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </li>


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
                </div>

            </div>

        </div>
    </header>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
     <footer>
         <div id="app">
             <example />
            </div>
            <?php echo $__env->yieldContent('footer_scripts'); ?>
        </footer>
        <!-- Scripts -->    
        
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
     <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet" type="text/css" media="all" />
 <script type="text/javascript" src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
</body>
</html>