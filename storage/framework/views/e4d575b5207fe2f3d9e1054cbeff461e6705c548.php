<div id="accordion">


                    <ul class="custom-accor">

                        <li>
                            <div class="card-link accor-header" data-toggle="collapse" href="#collapseOne" <?php if(isset($menu)&&$menu == 'account') echo'aria-expanded="true"'; ?>>
                                <a href="#"> <span class="icon-user-circle"></span><label>My Account</label> <span class="icon-angle-down right-arrow1"></span> </a>
                            </div>
                            <div id="collapseOne" class="collapse <?php if(isset($menu)&&$menu == 'account') echo "show"; ?>" data-parent="#accordion">
                                <ul class="inner-nav">
                                    <li>
                                        <a href="<?php echo url('dashboard'); ?>" <?php if(isset($menuitem)&&$menuitem == 'myaccount') echo 'style="background-color: #f5f5f5;"'; ?>> <span class="icon-user-circle"></span><label>Personal Details</label> </a>
                                    </li>

                                    <li>
                                        <a href="#"> <span class="icon-user-circle"></span><label>My Cart</label> </a>
                                    </li>

                                    <li>
                                        <a href="#"> <span class="icon-user-circle"></span><label>My Orders</label> </a>
                                    </li>

                                    <li>
                                        <a href="#"> <span class="icon-user-circle"></span><label>Billing</label> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <span class="icon-user-circle"></span><label>Preferences</label> </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li>
                            <div class="card-link accor-header" data-toggle="collapse" href="#collapseTwo" <?php if(isset($menu)&&$menu == 'stores') echo 'aria-expanded="true"'; ?>>
                                <span class="icon-store"></span><label>Artwork & Stores</label> <span class="icon-angle-down right-arrow1"></span>
                            </div>
                            <div id="collapseTwo" class="collapse <?php if(isset($menu)&&$menu == 'stores') echo 'show';?>"  data-parent="#accordion">
                                <ul class="inner-nav">
                                    <li>
                                        <a href="<?php echo  url('addartwork') ; ?>" <?php if(isset($menuitem)&&$menuitem == 'artwork') echo 'style="background-color: #f5f5f5;"'; ?>> <span class="icon-store"></span><label>Manage Artworks</label> </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo  url('addproducts') ; ?>" <?php if(isset($menuitem)&&$menuitem == 'products') echo 'style="background-color: #f5f5f5;"'; ?>> <span class="icon-store"></span><label>Manage Products</label> </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo  url('managedesigns') ; ?>" <?php if(isset($menuitem)&&$menuitem == 'designs') echo 'style="background-color: #f5f5f5;"'; ?>> <span class="icon-store"></span><label>Manage Designs</label> </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo  url('createstore') ; ?>" <?php if(isset($menuitem)&&$menuitem == 'createstore') echo'style="background-color: #f5f5f5;"';?>> <span class="icon-store"></span><label>Manage Stores</label> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>



                        <li>
                            <div class="card-link accor-header" data-toggle="collapse" href="#collapseFour">
                                <span class="icon-chart-bar"></span><label>Reports</label> <span class="icon-angle-down right-arrow1"></span>
                            </div>
                            <div id="collapseFour" class="collapse" data-parent="#accordion">
                                <ul class="inner-nav">
                                    <li>
                                        <a href="#"> <span class="icon-film"></span><label>My Artworks</label> </a>
                                    </li>

                                    <li>
                                        <a href="#"> <span class="icon-dollar-sign"></span><label>Add Products & Pricing</label> </a>
                                    </li>

                                    <li>
                                        <a href="#"> <span class="icon-home"></span><label>Payout & Taxes</label> </a>
                                    </li>

                                    <li>
                                        <a href="#"> <span class="icon-download"></span><label>Preview & Taxes</label> </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li>
                            <div class="card-link accor-header">
                                <a href="<?php echo url('/ordertracking'); ?>" style="text-decoration: none;"><span class="icon-sun"></span>Orders Tracking</a> <!-- <span class="icon-angle-down right-arrow1"></span> -->
                            </div>
                            
                        </li>
                        <li>
                            <div class="card-link accor-header" data-toggle="collapse" href="#collapseFive">
                                <span class="icon-sun"></span><label>Settings</label> <span class="icon-angle-down right-arrow1"></span>
                            </div>
                            <div id="collapseFive" class="collapse" data-parent="#accordion">
                                <ul class="inner-nav">
                                    <li>
                                        <a href="#"> <span class="icon-film"></span><label>My Artworks</label> </a>
                                    </li>

                                    <li>
                                        <a href="#"> <span class="icon-dollar-sign"></span><label>Add Products & Pricing</label> </a>
                                    </li>

                                    <li>
                                        <a href="#"> <span class="icon-home"></span><label>Payout & Taxes</label> </a>
                                    </li>

                                    <li>
                                        <a href="#"> <span class="icon-download"></span><label>Preview & Taxes</label> </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                    </ul>







                </div>