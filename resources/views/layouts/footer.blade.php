<div class="container foot m-0 p-0">
    <link
            type="text/css"
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:400,300"
    >
    <div class="row foot">
        <div class="col-md-8 col-md-offset-2 p-0 m-0">
            <div class="panel panel-default p-0">
                <div class="panel-heading-footer">
                    <ul class="panel-heading-list">
                        <li><a class="text-primary" href="/register" alt="Free Sign up">Free Sign up</a></li>
                        <li>Custom Branding</li>
                        <li>Low Shipping Rates</li>
                    </ul>
                </div>
                <div class="panel-body foot">
                    <br>
                    <br>
                    <div class="row foot">
                        <div id="col-1 foot">
                            USEFUL LINKS
                            <ul style="list-style: none;">
                                <li>
                                    <a href="/affiliates">BECOME AN AFFILIATE</a>
                                </li>
                                <div class="notset">
                                    <li>
                                        @if(Auth::check())
                                            <a href="/dashboard" title="My Account">MY ACCOUNT</a>
                                        @else
                                            <a href="/login" title="Login To Account">LOGIN TO ACCOUNT</a>
                                        @endif
                                    </li>
                                    <li>SIZE GUIDE</li>
                                    <li>TERMS & CONDITIONS</li>
                                    <li>RETURN & EXCHANGES</li>
                                </div>
                            </ul>
                        </div>
                        <div id="col-2 foot">
                            STORE
                            <ul style="list-style: none;">
                                <!-- FIX LINKS TO APPROXIMATE LOCATIONS -->
                                <li><a href="/product/womens" title="WOMEN">WOMEN</a></li>
                                <li><a href="/product/mens" title="MEN">MEN</a></li>
                                <li><a href="/product/boys" title="BOYS">BOYS</a></li>
                                <li><a href="/product/girls" title="GIRLS">GIRLS</a></li>
                                <li><a href="/search/wholesale" title="WHOLESALE">WHOLESALE</a></li>
                            </ul>
                        </div>
                        <div id="col-3 foot">
                            HELP
                            <ul class="notset" style="list-style: none;">
                                <li><a href="/contact" title="CONTACT">CONTACT</a></li>
                                <li>TRACK ORDERS</li>
                                <li>FAQS</li>
                                <li>SHIPPING & DELIVERY</li>
                                <li>PRIVACY POLICY</li>
                            </ul>
                        </div>
                        <div id="col-4 foot">
                            JOIN OUR NEWSLETTER
                            <ul>
                                <li style="list-style: none;">
                                    Subscribe to our newsletter to get tlatest new info about our newest products and
                                    promotional campaigns.
                                    <br>
                                    <br>
                                    <input
                                            id="email"
                                            placeholder=" EMAIL"
                                            style="border: 0px solid black; border-bottom: 1px solid black; background: #F7BF22;"
                                    >
                                </li>
                            </ul>
                        </div>
                        <div id="row-filler"></div>
                    </div>
                    <br>
                    <div class="row foot">
                        <div id="col-1-bottom foot">
                            OUR PAYMENT METHODS
                            <br>

                            <img src="/../images/payments.png">
                        </div>
                        <div id="col-2-bottom"></div>
                        <div id="col-3-bottom">
                            <h3 class="d-inline"">GET IN TOUCH:</h3>
                            <span class="m-0 p-0">
                                <a href="http://facebook.com/awkwardstyles" title="Find us on Facebook"
                                   class="footImage" target="_blank">
                                    <i class="fab fa-facebook-f h3"></i>
                                </a>
                                <a href="http://twitter.com/" title="Twitter" class="footImage" target="_blank">
                                    <i class="fab fa-twitter h3"></i>
                                </a>
                                <a href="http://youtube.com" title="YouTube" class="footImage" target="_blank">
                                    <i class="fab fa-youtube h3"></i>
                                </a>
                                <a href="https://instagram.com/awkward__styles" title="Find us on Instagram"
                                   class="footImage" target="_blank">
                                    <i class="fab fa-instagram h3"></i>
                                </a>
                            </span>
                        </div>
                        <div id="row-filler"></div>
                        <div id="col-4-bottom">
                            <img id="logo" src="/../images/logo.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    * {
        --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
        "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas,
        "Liberation Mono", "Courier New", monospace;
        /* font-family: sans-serif; */
    }

    .container .foot {
        margin: 0 0 0 0;
        padding: 0 0 0 0;
        background-color: #f7bf22;
        width: 100vw;
    }

    .row .foot {
        width: calc(100vw - 115px);
    }

    a.footImage, a.footImage:visited {
        color: #444444;
        padding-right: 5px;
    }

    a.footImage:hover {
        text-decoration: none;
        color: #f7bf22;
        text-shadow: 1px 1px 5px #444444;
        padding-right: 5px;
    }

    .panel-heading-footer {
        box-shadow: 0 -2px 0.45rem 1px rgba(0, 0, 0, 0.95);
        /* box-shadow: 0px 0px 5px 4px black; */
        border-top: 2px outset grey;
        font-weight: 500;
        text-shadow: 0px 0px 1px lightgrey;
        color: lightgrey;
        background-color: #444;
        width: 100vw;
        height: 115px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .panel-body .foot {
        box-shadow: 0 -2px 0.45rem 1px rgba(0, 0, 0, 0.95);
        /* box-shadow: 0px 0px 5px 4px black; */
        border-top: 2px outset yellow;
        background-color: #f7bf22;
        display: flex;
        flex-direction: column;
        justify-content: left;
        text-shadow: 0px 0px 2px rgba(0, 0, 0, 80%);
        font-size: 12pt;
        padding-left: 115px;
        color: black;
        font-weight: 650;
        width: 100vw;
        max-height: 300px;
    }

    .panel-body .foot > div {
        /* display: inline-block; */
        /* position: relative; */
        /* top: 0px; */
    }

    #col-1 .foot {
        white-space: nowrap;
        flex: 0 16%;
    }

    #col-1-bottom .foot {
        flex: 0 30%;
    }

    #col-2 .foot {
        flex: 0 12%;
    }

    #col-3 .foot {
        white-space: nowrap;
        flex: 0 19%;
    }

    #col-2-bottom .foot {
        flex: 0 13%;
    }

    #col-4 .foot {
        flex: 0 28%;
        flex-direction: column;
        padding-top: 15px;
    }

    #col-3-bottom {
        flex: 0 12%;
    }

    #row-filler {
        flex: 1;
    }

    #col-4-bottom .foot {
        position: relative;
        right: 10px;
    }

    #logo {
        border: 3px outset goldenrod;
    }

    img {
        border-radius: 10px;
    }

    #email {
        font-size: 14pt;
        width: 375px;
    }

    .vl .foot {
        margin: 0px 75px 0px 75px;
        border-left: 1px solid grey;
        height: 75px;
    }

    ul {
        padding: 10px 0 0 0;
    }

    li {
        font-weight: 100;
        font-size: 9pt;
        padding: 0px 0px 3px 5px;
    }

    ul.notset {
        text-decoration-line: line-through;
    }

    ul.panel-heading-list {
        -moz-column-count: 4;
        -moz-column-gap: 20px;
        -webkit-column-count: 4;
        -webkit-column-gap: 20px;
        column-count: 4;
        column-gap: 20px;
    }

    li a {
        color: black;
        text-decoration-line: none;
    }
</style>