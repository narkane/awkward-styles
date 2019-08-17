<template>
  <div class="container">
    <link
      type="text/css"
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,300"
    >
    <div class="col-md-8 col-md-offset-2">
      <div class="pannel panel-default">
        <div class="row">
          <div class="spacer"/>
          <div>
            <img id="logo" src="/../images/logo.png">
          </div>
        </div>
        <div style="zIndex:1;" class="pannel-heading">
          <div>Coming Soon!</div>
        </div>
        <div class="pannel-body">
          <br>THIS PAGE IS CURRENTLY
          UNDER CONSTRUCTION
          AND WILL BE BACK UP AND OPERATIONAL
          AS SOON AS POSSIBLE!
          <br>
          <br>
          <SMALL>
            <div id="fineprint">
              <i>ANY TECHNICAL QUESTIONS REGARDING THIS PAGE MAY BE DIRECTED TO john@thummel.site</i> - - - - - AGR-US
            </div>
          </SMALL>
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
  padding-top: 100px;
  display: flex;
  justify-content: space-around;
}
.pannel {
  background-image: url(https://loftcinema.org/files/2015/06/const.jpg);
  display: flex;
  flex-direction: column;
}
.row {
  justify-content: space-between;
}
.pannel-heading {
  position: relative;
  top: -30px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: 700;
  height: calc(20pt + 10px);
  width: 300px;
  padding-top: 20px;
  font-size: 20pt;
  color: white;
  text-shadow: 0px 0px 10px yellow;
  background-color: rgba(0, 0, 0, 0.5);
  border: 2px inset #555;
  border-bottom: 0px;
}
.pannel-body {
  text-align: center;
  position: relative;
  top: -30px;
  padding: 0 50px 0 50px;
  margin-bottom: -20px;
  border: 2px inset #555;
  border-top: 0px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-size: 12pt;
  color: white;
  background-color: rgba(0, 0, 0, 0.5);
}
#fineprint {
  font-size: 8pt;
  color: rgba(255, 255, 255, 0.8);
  text-shadow: 0px 0px 10px yellow;
  /* text-shadow: none; */
}
#logo {
  border: 3px outset goldenrod;
  position: relative;
  left: -20px;
}
img {
  border-radius: 10px;
}
</style>