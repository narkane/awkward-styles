@extends('layouts.dashboard')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="pannel">
                <div class="row">
                    <div class="col-sm-8">
                        <h5 class="title2">Products</h5>
                    </div>
                    <div class="col-sm-4 text-right">
                        <div class="btn-group btnSort-section" role="group">
                            <span>
                                Sort:
                            </span>
                            <button id="btnSort" type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Top Selling
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnSort">
                                <a class="dropdown-item" href="#">Top Selling</a>
                                <a class="dropdown-item" href="#">Top Selling</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row products-row" id="art-product-list">
                <!-- <script type="text/javascript" language="javascript"> -->
                    <!-- print('{{$request}}'); -->
                <!-- </script>                     -->
                
                
                <?php echo html_entity_decode($request) ?>
                    
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center" style="justify-content: flex-end !important;" id="mypagination">
                        
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @endsection
    @section('footer_scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $("#collections-slider").owlCarousel({
            margin: 10,
            nav: true,
            slideSpeed: 800,
            paginationSpeed: 800,
            singleItem: true,
            pagination: true,
            autoPlay: true,
            stopOnHover: true,
            items: 8,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 8
                }
            }
        });

        
    });
    </script>
    @endsection