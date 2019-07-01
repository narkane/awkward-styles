<template>
  <div class="container">
    <link
      type="text/css"
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,300"
    >
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div>Free Sign up</div>
            <div class="vl"/>
            <div>Custom branding</div>
            <div class="vl"/>
            <div>Low shipping rates</div>
          </div>
          <div class="panel-body">
            <br>
            <br>
            <div class="row">
              <div id="col-1">
                USEFUL LINKS
                <ul style="list-style: none;">
                  <li>
                    <a href="/affiliates">BECOME AN AFFILIATE</a>
                  </li>
                  <li>MY ACCOUNT</li>
                  <li>SIZE GUIDE</li>
                  <li>TERMS & CONDITIONS</li>
                  <li>RETURN & EXCHANGES</li>
                </ul>
              </div>
              <div id="col-2">
                STORE
                <ul style="list-style: none;">
                  <li>WOMEN</li>
                  <li>MEN</li>
                  <li>KIDS</li>
                  <li>WHOLESALE</li>
                </ul>
              </div>
              <div id="col-3">
                HELP
                <ul style="list-style: none;">
                  <li>CONTACT</li>
                  <li>TRACK ORDERS</li>
                  <li>FAQS</li>
                  <li>SHIPPING & DELIVERY</li>
                  <li>PRIVACY POLICY</li>
                </ul>
              </div>
              <div id="col-4">
                JOIN OUR NEWSLETTER
                <ul>
                  <li style="list-style: none;">
                    Subscribe to our newsletter to get tlatest new info about our newest products and promotional campaigns.
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
              <div id="row-filler"/>
            </div>
            <br>
            <div class="row">
              <div id="col-1-bottom">
                OUR PAYMENT METHODS
                <br>

                <img src="/../images/payments.png">
              </div>
              <div id="col-2-bottom"></div>
              <div id="col-3-bottom">
                GET IN TOUCH
                <br>
                <img src="/../images/getintouch.png">
              </div>
              <div id="row-filler"/>
              <div id="col-4-bottom">
                <img id="logo" src="/../images/logo.png">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => {
    return {};
  }
};
</script>

<style scoped>
* {
  --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI",
    Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
    "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas,
    "Liberation Mono", "Courier New", monospace;
  /* font-family: sans-serif; */
}
.container {
  margin: 0 0 0 0;
  padding: 0 0 0 0;
  background-color: #f7bf22;
  width: 100vw;
}
.row {
  width: calc(100vw - 115px);
}
.panel-heading {
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
.panel-body {
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
  height: 300px;
}
.panel-body > div {
  /* display: inline-block; */
  /* position: relative; */
  /* top: 0px; */
}
#col-1 {
  white-space: nowrap;
  flex: 0 16%;
}
#col-1-bottom {
  flex: 0 30%;
}
#col-2 {
  flex: 0 12%;
}
#col-3 {
  white-space: nowrap;
  flex: 0 19%;
}
#col-2-bottom {
  flex: 0 13%;
}
#col-4 {
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
#col-4-bottom {
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

.vl {
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
</style>