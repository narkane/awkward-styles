<div id="accordion">


                    <ul class="custom-accor">

                        <li>
                            <div class="card-link accor-header" data-toggle="collapse" href="#collapseOne" @if(isset($menu)&&$menu == 'account') aria-expanded="true" @endif>
                                <a href="#"> <span class="icon-user-circle"></span><label>My Account</label> <span class="icon-angle-down right-arrow1"></span> </a>
                            </div>
                            <div id="collapseOne" class="collapse @if(isset($menu)&&$menu == 'account') show @endif" data-parent="#accordion">
                                <ul class="inner-nav">
                                    <li>
                                        <a href="{{ url('account') }}" @if(isset($menuitem)&&$menuitem == 'myaccount') style="background-color: #f5f5f5;" @endif> <span class="icon-user-circle"></span><label>Personal Details</label> </a>
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
                            <div class="card-link accor-header" data-toggle="collapse" href="#collapseTwo" @if(isset($menu)&&$menu == 'stores') aria-expanded="true" @endif>
                                <span class="icon-store"></span><label>Stores</label> <span class="icon-angle-down right-arrow1"></span>
                            </div>
                            <div id="collapseTwo" class="collapse @if(isset($menu)&&$menu == 'stores') show @endif"  data-parent="#accordion">
                                <ul class="inner-nav">
                                    <li>
                                        <a href="{{ url('createstore') }}" @if(isset($menuitem)&&$menuitem == 'createstore') style="background-color: #f5f5f5;" @endif> <span class="icon-store"></span><label>Manage Stores</label> </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('addartwork') }}" @if(isset($menuitem)&&$menuitem == 'artwork') style="background-color: #f5f5f5;" @endif> <span class="icon-store"></span><label>Manage Artworks</label> </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('addproducts') }}" @if(isset($menuitem)&&$menuitem == 'products') style="background-color: #f5f5f5;" @endif> <span class="icon-store"></span><label>Manage Products</label> </a>
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
                                <a href="{{url('/ordertracking')}}" style="text-decoration: none;"><span class="icon-sun"></span>Orders Tracking</a> <!-- <span class="icon-angle-down right-arrow1"></span> -->
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