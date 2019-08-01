@extends('layouts.dashboard')

@section('content')
    <script type="text/javascript" src="{{ asset('js/mockup/fabric.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mockup/tshirtEditor.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/mockup/jquery.miniColors.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/mockup/color-picker.min.js') }}"></script>

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

    </style>
<div class="container"> <!-- mt-0 pt-0 w-75"> -->

    <section id="typography">
        <div class="page-header">
            <h1>Create Your Product</h1>
        </div>

        <div class="row">

            <div class="col-md-2">

                <div class="mock-block border-primary" id="show-text-editor" data-toggle="text-editor">
                    <div class="mock-block-contents">
                        <h2 class="far fa-edit"></h2>
                        <p>Add Text</p>
                    </div>
                </div>
                <div class="mock-block border-primary">
                    <div class="mock-block-contents">
                        <h2 class="fas fa-palette"></h2>
                        <p>Designs</p>
                    </div>
                </div>

                <div class="mock-block border-primary">
                    <div class="mock-block-contents">
                        <h1 class="fas fa-upload"></h1>
                        <p>Upload Image</p>
                    </div>
                </div>

                <div class="mock-block border-primary">
                    <div class="mock-block-contents">
                        <h2 class="fas fa-tshirt"></h2>
                        <p>Products</p>
                    </div>
                </div>

            </div>

            <div class="col-md-10">

                <div class="container edit-function" id="text-editor">

                    <div class="container p-2 w-50">
                        <button id="text-bold" class="btn" data-toggle="tooltip" data-placement="top" title="BOLD" onclick="setBold()">
                            <h4 class="fas fa-bold d-inline pr-2"></h4>
                        </button>

                        <button id="text-italic" class="btn" data-toggle="tooltip" data-placement="top" title="ITALIC" onclick="setItalic()">
                            <h4 class="fas fa-italic d-inline pr-2"></h4>
                        </button>

                        <button id="text-underline" class="btn" data-toggle="tooltip" data-placement="top" title="UNDERLINE" onclick="setUnderline()">
                            <h4 class="fas fa-underline d-inline pr-2" id="text-underline"></h4>
                        </button>

                        <button id="text-color" class="btn" data-toggle="tooltip" data-placement="top" title="COLOR">
                            <h4 class="fas fa-circle d-inline pr-2 text-primary"></h4>
                        </button>
                        <script>
                            var picker = new CP(document.querySelector('button[id="text-color"]'));
                            picker.on("change", function(color) {
                                setColor(color);
                            });
                        </script>

                        <button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown"
                                title="Font Style"><i class="icon-font" style="width:19px;height:19px;"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Arial');" class="Arial">Arial</a></li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a>
                            </li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad
                                    Pro</a></li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Delicious');" class="Delicious">Delicious</a>
                            </li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Verdana');" class="Verdana">Verdana</a>
                            </li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Georgia');" class="Georgia">Georgia</a>
                            </li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Courier');" class="Courier">Courier</a>
                            </li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic
                                    Sans MS</a></li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Impact');" class="Impact">Impact</a>
                            </li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Monaco');" class="Monaco">Monaco</a>
                            </li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Optima');" class="Optima">Optima</a>
                            </li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler
                                    Text</a></li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Plaster');" class="Plaster">Plaster</a>
                            </li>
                            <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Engagement');" class="Engagement">Engagement</a>
                            </li>
                        </ul>

                    </div>

                    <input type="text" class="form-control w-50 mx-auto" id="text-string" placeholder="Enter your text here.."/>
                    <input type="button" class="btn d-inline" id="add-text" value="Add/Edit Text"/>

                </div>

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

                <div class="container">

                <div class="well">
                    <ul class="nav">
                        <li class="color-preview" title="White" style="background-color:#ffffff;"></li>
                        <li class="color-preview" title="Dark Heather"
                            style="background-color:#616161;"></li>
                        <li class="color-preview" title="Gray" style="background-color:#f0f0f0;"></li>
                        <li class="color-preview" title="Charcoal" style="background-color:#5b5b5b;"></li>
                        <li class="color-preview" title="Black" style="background-color:#222222;"></li>
                        <li class="color-preview" title="Heather Orange"
                            style="background-color:#fc8d74;"></li>
                        <li class="color-preview" title="Heather Dark Chocolate"
                            style="background-color:#432d26;"></li>
                        <li class="color-preview" title="Salmon" style="background-color:#eead91;"></li>
                        <li class="color-preview" title="Chesnut" style="background-color:#806355;"></li>
                        <li class="color-preview" title="Dark Chocolate"
                            style="background-color:#382d21;"></li>
                        <li class="color-preview" title="Citrus Yellow"
                            style="background-color:#faef93;"></li>
                        <li class="color-preview" title="Avocado" style="background-color:#aeba5e;"></li>
                        <li class="color-preview" title="Kiwi" style="background-color:#8aa140;"></li>
                        <li class="color-preview" title="Irish Green"
                            style="background-color:#1f6522;"></li>
                        <li class="color-preview" title="Scrub Green"
                            style="background-color:#13afa2;"></li>
                        <li class="color-preview" title="Teal Ice" style="background-color:#b8d5d7;"></li>
                        <li class="color-preview" title="Heather Sapphire"
                            style="background-color:#15aeda;"></li>
                        <li class="color-preview" title="Sky" style="background-color:#a5def8;"></li>
                        <li class="color-preview" title="Antique Sapphire"
                            style="background-color:#0f77c0;"></li>
                        <li class="color-preview" title="Heather Navy"
                            style="background-color:#3469b7;"></li>
                        <li class="color-preview" title="Cherry Red" style="background-color:#c50404;"></li>
                    </ul>
                </div>

                </div>

            </div>
            <!--
            <div class="span6">
                <div align="center" style="min-height: 32px;">
                    <div class="clearfix">
                        <div class="btn-group inline pull-left" id="texteditor" style="display:none">
                            <button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown"
                                    title="Font Style"><i class="icon-font" style="width:19px;height:19px;"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Arial');" class="Arial">Arial</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad
                                        Pro</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Delicious');" class="Delicious">Delicious</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Verdana');" class="Verdana">Verdana</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Georgia');" class="Georgia">Georgia</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Courier');" class="Courier">Courier</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic
                                        Sans MS</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Impact');" class="Impact">Impact</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Monaco');" class="Monaco">Monaco</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Optima');" class="Optima">Optima</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler
                                        Text</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Plaster');" class="Plaster">Plaster</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Engagement');" class="Engagement">Engagement</a>
                                </li>
                            </ul>
                            <button id="text-bold" class="btn" data-original-title="Bold"><img src="{{ asset('images/mockup/font_bold.png') }}" height="" width="">
                            </button>
                            <button id="text-italic" class="btn" data-original-title="Italic"><img
                                        src="{{ asset('images/mockup/font_italic.png') }}" height="" width=""></button>
                            <button id="text-strike" class="btn" title="Strike" style=""><img
                                        src="{{ asset('images/mockup/font_strikethrough.png') }}" height="" width=""></button>
                            <button id="text-underline" class="btn" title="Underline" style=""><img
                                        src="{{ asset('images/mockup/font_underline.png') }}"></button>
                            <a class="btn" href="javascript:void(0)" rel="tooltip" data-placement="top" data-original-title="Font Color"><input
                                        type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000"></a>
                            <a class="btn" href="javascript:void(0)" rel="tooltip" data-placement="top"
                               data-original-title="Font Border Color"><input type="hidden" id="text-strokecolor"
                                                                              class="color-picker" size="7"
                                                                              value="#000000"></a>
                            --- Background <input type="hidden" id="text-bgcolor" class="color-picker" size="7" value="#ffffff"> ---
                        </div>
                        <div class="pull-right" align="" id="imageeditor" style="display:none">
                            <div class="btn-group">
                                <button class="btn" id="bring-to-front" title="Bring to Front"><i
                                            class="icon-fast-backward rotate" style="height:19px;"></i></button>
                                <button class="btn" id="send-to-back" title="Send to Back"><i
                                            class="icon-fast-forward rotate" style="height:19px;"></i></button>
                                <button id="flip" type="button" class="btn" title="Show Back View"><i
                                            class="icon-retweet" style="height:19px;"></i></button>
                                <button id="remove-selected" class="btn" title="Delete selected item"><i
                                            class="icon-trash" style="height:19px;"></i></button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>-->

        </div>

    </section>

</div>

    <script>
        templateVars = {
            pid: '{{ $pid }}',
            size: 'XS',
            url: null
        };

        setShirtImage('{{ $images[0]->full_url }}');
    </script>

                  @endsection