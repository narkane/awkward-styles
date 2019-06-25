<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();
$params = $this->get( 'listParams', [] );
$catPath = $this->get( 'listCatPath', [] );

$target = $this->config( 'client/html/catalog/lists/url/target' );
$cntl = $this->config( 'client/html/catalog/lists/url/controller', 'catalog' );
$action = $this->config( 'client/html/catalog/lists/url/action', 'list' );
$config = $this->config( 'client/html/catalog/lists/url/config', [] );

$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );


$classes = '';
foreach( (array) $this->get( 'listCatPath', [] ) as $cat )
{
	$catConfig = $cat->getConfig();
	if( isset( $catConfig['css-class'] ) ) {
		$classes .= ' ' . $catConfig['css-class'];
	}
}


/** client/html/catalog/lists/head/text-types
 * The list of text types that should be rendered in the catalog list head section
 *
 * The head section of the catalog list view at least consists of the category
 * name. By default, all short and long descriptions of the category are rendered
 * as well.
 *
 * You can add more text types or remove ones that should be displayed by
 * modifying these list of text types, e.g. if you've added a new text type
 * and texts of that type to some or all categories.
 *
 * @param array List of text type names
 * @since 2014.03
 * @category User
 * @category Developer
 */
$textTypes = $this->config( 'client/html/catalog/lists/head/text-types', array( 'short', 'long' ) );


$quoteItems = [];
if( $catPath !== [] && ( $catItem = end( $catPath ) ) !== false ) {
	$quoteItems = $catItem->getRefItems( 'text', 'quote', 'default' );
}


$pagination = '';
if( $this->get( 'listProductTotal', 0 ) > 1 )
{
	/** client/html/catalog/lists/partials/pagination
	 * Relative path to the pagination partial template file for catalog lists
	 *
	 * Partials are templates which are reused in other templates and generate
	 * reoccuring blocks filled with data from the assigned values. The pagination
	 * partial creates an HTML block containing a page browser and sorting links
	 * if necessary.
	 *
	 * @param string Relative path to the template file
	 * @since 2017.01
	 * @category Developer
	 */
	$pagination = $this->partial(
		$this->config( 'client/html/catalog/lists/partials/pagination', 'catalog/lists/pagination-standard.php' ),
		array(
			'params' => $params,
			'size' => $this->get( 'listPageSize', 48 ),
			'total' => $this->get( 'listProductTotal', 0 ),
			'current' => $this->get( 'listPageCurr', 0 ),
			'prev' => $this->get( 'listPagePrev', 0 ),
			'next' => $this->get( 'listPageNext', 0 ),
			'last' => $this->get( 'listPageLast', 0 ),
		)
	);
}

?>



    <!-- slider -->
     
     <div class="owl-carousel home-slider" id="owl-main" style="display:block">
        <div class="item">
            <img src="images/slider/letsspringbanner.jpg" width="100%">
        </div>
        <div class="item">
            <img src="images/slider/letsspringbanner2.jpg" width="100%">
        </div>
    </div>

    <!-- slider End -->

    <div class="container">
	<div class="pannel">
<section>
            <h3 class="section-title">Shop By</h3>
            <div class="row">
                <div class="col-3">
                   <div class="image-div">
                        <div class="having-hover-image">
                            <img src="images/home/shopby-1.png" class="img-100 img-1" alt="">
                            <img src="images/home/shopby-hover-1.jpg" class="img-100 img-2" alt="">
                        </div>
                        <div class="image-info">
                            <h5>CUSTOM DESIGNS</h5>
                            <a href="/mockupgen">Shop Now  ></a>
                        </div>
                    </div>

                </div>
                <div class="col-3">
                    <div class="image-div">
                        <img src="images/home/shopby-2.png" class="img-100" alt="">
                        <h5>PREMIUM DESIGNS</h5>
                        <a href="/search/premium">Shop Now  ></a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="image-div">
                        <img src="images/home/mens-clothing.png" class="img-100" alt="">
                        <h5>MEN'S CLOTHING</h5>
                        <a href="/search/men">Shop Now  ></a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="image-div">
                        <img src="images/home/womens-clothing.png" class="img-100" alt="">
                        <h5>WOMEN'S CLOTHING</h5>
                        <a href="/search/women">Shop Now  ></a>
                    </div>
                </div>


            </div>
        </section>

<section>
            <h3 class="section-title">Trending</h3>
            <div class="row">
                <div class="col-4">
                    <div class="image-div">
                        <a href="/collections"><img src="images/home/Trending-01.png" class="img-100" alt=""></a>
                        <a href="/collections"><h4>OUTDOOR COLLECTION</h4></a>
                        <span>Starts at $ 15.00</span>
                    </div>

                </div>
                <div class="col-4">
                    <div class="image-div">
                        <a href="/collections"><img src="images/home/Trending-02.png" class="img-100" alt=""></a>
                        <a href="/collections"><h4>WILD COLLECTION</h4></a>
                        <span>Starts at $ 18.00</span>
                    </div>

                </div>
                <div class="col-4">
                    <div class="image-div">
                        <a href="/collections"><img src="images/home/Trending-03.png" class="img-100" alt=""></a>
                        <a href="/collections"><h4>FUN COLLECTION</h4></a>
                        <span>Starts at $ 14.00</span>
                    </div>

                </div>
                <div class="col-4">
                    <div class="image-div">
                        <img src="images/home/Trending-04.png" class="img-100" alt="">
                        <h4>EIGHTEES COLLECTION</h4>
                        <span>Starts at $ 15.00</span>
                    </div>

                </div>
                <div class="col-4">
                    <div class="image-div">
                        <img src="images/home/Trending-05.png" class="img-100" alt="">
                        <h4>FRIENDSHIP COLLECTION</h4>
                        <span>Starts at $ 15.00</span>
                    </div>

                </div>
                <div class="col-4">
                    <div class="image-div">
                        <img src="images/home/Trending-06.png" class="img-100" alt="">
                        <h4>INSPIRATION COLLECTION</h4>
                        <span>Starts at $ 15.00</span>
                    </div>

                </div>


            </div>
        </section>
   
      <section>
            <div class="row FeaturedArtist">
                <div class="col-sm-8">
                    <h3>Featured Artist / Fincy Heatrow</h3>
                    <p><a href="/artiststorefront/25"> View more designs of this artist!</a></p>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="having-hover-image">
                                <img src="images/home/feat-artist-block-01.jpg" class="img-100 img-1" alt="">
                                <img src="images/home/feat-artist-block-hover-01.jpg" class="img-100 img-2" alt="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="having-hover-image">
                                <img src="images/home/feat-artist-block-02.jpg" class="img-100 img-1" alt="">
                                <img src="images/home/feat-artist-block-hover-02.jpg" class="img-100 img-2" alt="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="having-hover-image">
                                <img src="images/home/feat-artist-block-03.jpg" class="img-100 img-1" alt="">
                                <img src="images/home/feat-artist-block-hover-03.jpg" class="img-100 img-2" alt="">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4 pr-0">
                    <div class="feat-artist-img">
                        <img src="images/home/feat-artist-block.jpg" class="img-100 img-1" alt="">
                        <a href="/artiststorefront/25" class="FOLLOW">FOLLOW</a>
                    </div>
                </div>
            </div>
        </section>
   </div>
   </div>

    	<section class="product-section" style="display:none">
        <div class="container">
            <h3 class="section-title color-purple">Product Gallery</h3>
            <div class="row products-row">                    
               <?php echo $this->block()->get( 'catalog/lists/items' ); ?>
            </div>
        </div>

        
        
    </section>




   