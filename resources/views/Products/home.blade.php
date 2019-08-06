@extends('layouts.dashboard')

@section('content')
    <div class="product-container bg-white">

        <div class="row">

            <div class="col-md-6 p-0 m-0">
                <div class="men-bg bg-primary" onclick="redirect('mens')">
                    <div class="inner-msg p-5 text-success">
                        <h1>Mens Clothing and Design</h1>
                        <h4>
                            Whether it's funny, for the dad in you, or just because you're proud to be an America;
                            this is the place for you.
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 m-0 p-0">
                        <div class="girls-bg bg-orange" onclick="redirect('girls')">
                            <div class="inner-msg p-5 text-white" style="padding-left: 50px !important">
                                <h1>Girls</h1>
                                <h4>
                                    Designs and clothes for girls.
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="boys-bg" onclick="redirect('boys')">
                            <div class="inner-msg p-5 text-white">
                                <h1>Boys</h1>
                                <h4>
                                    Find the best items for boys.
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-0 m-0">
                <div class="women-bg bg-success" onclick="redirect('womens')">
                    <div class="inner-msg p-5 text-primary text-center">
                        <h1>Strong Women</h1>
                        <h4>
                            Embrace yourself with a strong message, something funny, or a good old fashioned 'Mom' shirt.
                        </h4>
                    </div>
                </div>
                <div class="other-bg bg-secondary" onclick="redirect('other')">
                    <div class="inner-msg p-5 text-orange" style="bottom: 100px;">
                        <h1>Others</h1>
                        <h4>
                            Pillows, mugs, canvas, and other items can be designed just the way you like!
                        </h4>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <style>
        .men-bg {
            background-image: url('{{ asset('images/product-image-m.jpg') }}');
            height: 600px;
            background-size: cover;
            background-blend-mode: luminosity;
            opacity: 0.7;
            content: "";
            min-width: 100%;
            min-height: 500px;
            position: relative;
            cursor: pointer;
        }
        .women-bg {
            background-image: url('{{ asset('images/product-image-w2.jpg') }}');
            height: 600px;
            background-size: cover;
            background-blend-mode: luminosity;
            background-position-y: -100px;
            opacity: 0.7;
            content: "";
            min-width: 100%;
            min-height: 850px;
            position: relative;
            cursor: pointer;
        }
        .boys-bg,
        .girls-bg{
            background-image: url('{{ asset('images/product-image-boys.jpg') }}');
            background-color: #0d71bb;
            height: 600px;
            background-size: cover;
            background-blend-mode: luminosity;
            opacity: 0.7;
            position: relative;
            cursor: pointer;
        }
        .girls-bg{
            background-image: url('{{ asseT('images/product-image-girls.jpg') }}');
        }
        .other-bg {
            background-image: url('{{ asset('images/product-image-other.jpg') }}');
            height: 350px;
            background-size: cover;
            background-blend-mode: screen;
            background-position-y: center;
            position: relative;
            cursor: pointer;
            /*opacity: 0.7;*/
        }
        .men-bg:hover,
        .women-bg:hover,
        .girls-bg:hover,
        .boys-bg:hover,
        .other-bg:hover
        {
            background-size: auto;
            background-position-x: center;
            background-position-y: center;
        }
        .women-bg:hover {
            background-position-y: -350px;
        }

        .boys-bg:hover,
        .girls-bg:hover {
            background-size: 150%;
        }

        .inner-msg {
            position:absolute;
            bottom: 300px;
            background-color: rgba(0,0,0,0.8);
            width:100%;
            margin: 0;
            /*
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

             */
        }
    </style>
    <script>
        function redirect(page){
            window.location.href = "{{ url("/products") }}/"+page;
        }
    </script>

@endsection