<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2018
 */

$enc = $this->encoder();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php $this->block()->start('jqadm_content'); ?>

<nav class="main-navbar log">
	<span class="navbar-brand">
		<?= $enc->html($this->translate('admin', 'Artwork')); ?>
		<span class="navbar-secondary">(<?= $enc->html($this->site()->label()); ?>)</span>
	</span>
    <span class="placeholder">&nbsp;</span>
</nav>

<div class="dashboard">
    <div class="dashboard-order row" data-currencies="[&quot;USD&quot;]">
        <div class="order-latest card col-lg-12">
            <div id="order-latest-head" class="card-header header" role="tab" data-toggle="collapse"
                 data-target="#order-latest-data" aria-expanded="true" aria-controls="order-latest-data">
                <h3>Latest</h3>
                <div class="card-tools-left">
                </div>
            </div>
            <div id="order-latest-data" class="card-block content collapse show" role="tabpanel"
                 aria-labelledby="order-latest-head">

                <table class="table" id="artwork_management">

                    <thead>
                    <th scope="col" class="text-left" width="20%">Thumbnail</th>
                    <th scope="col" class="text-left">Art Details</th>
                    </thead>

                    <tbody>
                    <?php

                    // Gather Artwork
                    $artwork = \Illuminate\Support\Facades\DB::table(DB::raw('tbl_art_work as art'))
                        ->select(DB::raw('art.*, med.full_url AS imgurl'))
                        ->leftJoin(DB::raw('tbl_media_library AS med'), function($join){
                            $join->on('art.mediaid', '=', 'med.id');
                        })
                        ->limit(10)
                        ->orderBy("art.mtime")
                        ->get();


                    foreach ($artwork as $art) {
                        ?>
                        <tr>
                            <td scope="row" class="text-left">
                                <img class="thumbview" src="<?php echo $art->imgurl; ?>"
                                />
                            </td>
                            <td scope="row" class="text-left">
                                <h4><?php echo $art->artname; ?></h4>
                                <div class="row m-2 border border-top-0 border-left-0 border-right-0 border-bottom-1">
                                    <div class="col-sm-2">
                                        <h6>Description</h6>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>
                                            <?php echo $art->description ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row m-2 border border-top-0 border-left-0 border-right-0 border-bottom-1">
                                    <div class="col-sm-2">
                                        <h6>Tags</h6>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>
                                            <?php echo $art->tag_name; ?>
                                        </p>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                    </tbody>

                </table>

                <!-- Modal -->
                <div id="thumbnailModal" class="modal fade" id="imageView" tabindex="-1" role="dialog" aria-labelledby="modelTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <img id="thumbnailer" src="" alt="" style="max-width: 600px;"/>

                        </div>
                    </div>
                </div>

                <style type="text/css">
                    .thumbview {
                        max-width: 250px;
                        cursor: pointer;
                        -webkit-filter: brightness(100%);
                    }

                    .thumbview:hover {
                        -webkit-filter: brightness(70%);
                        -webkit-transition: all 1s ease;
                        -moz-transition: all 1s ease;
                        -o-transition: all 1s ease;
                        -ms-transition: all 1s ease;
                        transition: all 1s ease;
                    }

                </style>

                <script>
                    $(document).ready(function(){

                        var modal = $("#thumbnailModal");
                        var nailer = $("#thumbnailer");

                        $(".thumbview").on('click', function(){
                            nailer.attr('src', $(this).attr('src'));
                            modal.modal('show');
                        });

                        $(".thumbview").on('mouseout', function(){
                            modal.modal('hide');
                        });

                    });
                </script>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        jQuery.ajax({
            url: 'http://ec2-18-234-126-164.compute-1.amazonaws.com/artworkmanagement',
            success: function (html) {
                if (html == "no") {
                } else {
                    $('#artwork_management').html(html);
                }
            },
            async: true
        });
    </script>
    <script>
        function checkEvent(v, s) {
            if ($('#artwork_status_' + v).prop('checked', true)) {
                if (s == 'accept') {
                    console.log('#artwork_status_' + v + ' accepted');
                    $('#reason_' + v).prop('disabled', true);
                    $('#button_' + v).prop('disabled', false);
                }
                if (s == 'reject') {
                    console.log('#artwork_status_' + v + ' rejected');
                    $('#reason_' + v).prop('disabled', false);
                    $('#button_' + v).prop('disabled', false);
                }
            }
        }

        function saveStatus(v) {
            var status = 'accepted';
            var reason = '';
            var readytosave = 'yes';
            if ($("#reason_" + v).is(":disabled") == false) {
                status = 'rejected';
                reason = $('#reason_' + v).val();
                if (reason == '') {
                    console.log('empty');
                    $("#reason_" + v).focus();
                    readytosave = 'no';
                } else {
                    readytosave = 'yes';
                }
            } else {
                reason = '';
                readytosave = 'yes';
            }
            if (readytosave == 'yes') {
                jQuery.ajax({
                    url: 'http://ec2-18-234-126-164.compute-1.amazonaws.com/updateartworkstatus',
                    data: 'status=' + status + '&reason=' + reason + '&id=' + v,
                    method: 'get',
                    success: function (html) {
                        if (html == 'success') {
                            $('#row_' + v).css('display', 'none');
                        }
                    },
                    async: true
                });
            }
        }

        $(document).ready(function () {
            $(document).on('click', '.show_more', function () {
                var ID = $('td:last').attr('id');
                $('.show_more').hide();
                $('.loding').show();
                $.ajax({
                    type: 'GET',
                    url: 'http://ec2-18-234-126-164.compute-1.amazonaws.com/loadmore',
                    data: 'id=' + ID,
                    success: function (html) {
                        if (html == 'nodata') {
                            $('.show_more').hide();
                            $('.loding').hide();
                        } else {
                            $('#show_more_main' + ID).remove();
                            $('#postList').append(html);
                            $('.show_more').show();
                            $('.loding').hide();
                        }
                    }
                });
            });
        });

    </script>

    <?php $this->block()->stop(); ?>

    <?= $this->render($this->config('admin/jqadm/template/page', 'common/page-standard.php')); ?>
