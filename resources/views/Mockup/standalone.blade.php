<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mockup/fabric.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mockup/tshirtEditor.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/mockup/jquery.miniColors.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/mockup/color-picker.min.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/packages/aimeos/shop/themes/elegance/aimeos.css">
    <link href="{{ asset('css/color-picker.min.css') }}" rel="stylesheet"/>
    <style type="text/css">
        .footer {
            padding: 70px 0;
            margin-top: 70px;
            border-top: 1px solid #E5E5E5;
            background-color: whiteSmoke;
        }

        body {
            padding-top: 60px;
        }

        .color-preview {
            border: 1px solid #CCC;
            margin: 2px;
            zoom: 1;
            vertical-align: top;
            display: inline-block;
            cursor: pointer;
            overflow: hidden;
            width: 20px;
            height: 20px;
        }

        .rotate {
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
        }

        .Arial {
            font-family: "Arial";
        }

        .Helvetica {
            font-family: "Helvetica";
        }

        .MyriadPro {
            font-family: "Myriad Pro";
        }

        .Delicious {
            font-family: "Delicious";
        }

        .Verdana {
            font-family: "Verdana";
        }

        .Georgia {
            font-family: "Georgia";
        }

        .Courier {
            font-family: "Courier";
        }

        .ComicSansMS {
            font-family: "Comic Sans MS";
        }

        .Impact {
            font-family: "Impact";
        }

        .Monaco {
            font-family: "Monaco";
        }

        .Optima {
            font-family: "Optima";
        }

        .HoeflerText {
            font-family: "Hoefler Text";
        }

        .Plaster {
            font-family: "Plaster";
        }

        .Engagement {
            font-family: "Engagement";
        }

        .mock-block {
            border: 1px solid #000000;
            text-align: center;
            height: 150px;
            width: 150px;
            min-width: 100px;
            min-height: 100px;
            text-transform: uppercase;
            position: relative;
            cursor: pointer;
        }

        .mock-block-contents {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
        }

        .mock-block:hover {
            background-color: #f7bf22;
            color: #000000;
        }

        .shirt-block {
            width: max-content;
            width: -moz-max-content;
            margin-left: auto;
            margin-right:auto;
            min-height:500px;
        }

        body {
            background-color: #ffffff;
        }

        .design-images {
            cursor: pointer;
        }

        .select-entry-color {
            display: inline-block;
            cursor: pointer;
        }

        label.select-label {
            cursor: pointer;
        }

        ul.select-list-color {
            padding: 0;
        }

        label.select-label.active {
            border: solid 3px #ea972ef7 !important;
        }

    </style>
</head>
<body>

<div class="container shirt-block">

    <div id="shirtDiv" class="page"
         style="position: relative; background-color: rgb(255, 255, 255);">
        <img id="hoodieFacing" src=""/>
        <div id="hoddieDrawingArea"
             style="position: absolute;top: 0px;left: 0px;z-index: 10;">
            <canvas id="tcanvas" class="hover"
                    style="-webkit-user-select: none; max-width:400px; max-height: 400px;"></canvas>
        </div>
    </div>

</div>

<script>
    templateVars = {
        pid: '{{ $pid }}',
        size: 'XS',
        url: null
    };

    // MAIN IMAGE
    setShirtImage('{{ $images[0]->full_url }}');

</script>

</body>
</html>