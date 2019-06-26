<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;

class OrdersTrackingController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ordertracking()
    {
        if (Auth::user()) {
        	$user_id = Auth::user()->id;
        	$data['orderTracking'] = array (
						  'list' => 
						  array (
						    'meta' => 
						    array (
						      'totalCount' => 34681,
						      'limit' => 10,
						      'nextCursor' => '?limit=10&hasMoreElements=true&soIndex=34681&poIndex=10&partnerId=10000005613&sellerId=5528&createdStartDate=2016-12-30T18:30:00Z&createdEndDate=2019-04-26T16:46:14.795Z',
						    ),
						    'elements' => 
						    array (
						      'order' => 
						      array (
						        0 => 
						        array (
						          'purchaseOrderId' => '2791175660107',
						          'customerOrderId' => '3871956328401',
						          'customerEmailId' => '80E67030D42F42A6B578F7F69A16CEF9@relay.walmart.com',
						          'orderDate' => 1556296936000,
						          'shippingInfo' => 
						          array (
						            'phone' => '8064666440',
						            'estimatedDeliveryDate' => 1557255600000,
						            'estimatedShipDate' => 1556690400000,
						            'methodCode' => 'Standard',
						            'postalAddress' => 
						            array (
						              'name' => 'Ricka Siegel',
						              'address1' => '1211 9th ST',
						              'address2' => NULL,
						              'city' => 'Shallowater',
						              'state' => 'TX',
						              'postalCode' => '79363',
						              'country' => 'USA',
						              'addressType' => 'RESIDENTIAL',
						            ),
						          ),
						          'orderLines' => 
						          array (
						            'orderLine' => 
						            array (
						              0 => 
						              array (
						                'lineNumber' => '1',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Proud Autism Mom Shirts Autism Awareness Mom T-shirt Autism Gifts for Her Autistic Spectrum Awareness Tshirt Proud Mother Autistic Support Shirts for Women Autism Awareness T Shirt',
						                  'sku' => 'QU3246180-BLUE-XL',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                    1 => 
						                    array (
						                      'chargeType' => 'SHIPPING',
						                      'chargeName' => 'Shipping',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 0.99,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556297048000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Created',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'STANDARD',
						                  'storeId' => NULL,
						                  'offerId' => '4504ADAAD4C547C38287390B6B207785',
						                  'pickUpDateTime' => 1556823600000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						            ),
						          ),
						        ),
						        1 => 
						        array (
						          'purchaseOrderId' => '4791175652303',
						          'customerOrderId' => '3871955898343',
						          'customerEmailId' => '367D7D89FD1E4928860291F94E4AEDEB@relay.walmart.com',
						          'orderDate' => 1556295151000,
						          'shippingInfo' => 
						          array (
						            'phone' => '7725013666',
						            'estimatedDeliveryDate' => 1556823600000,
						            'estimatedShipDate' => 1556690400000,
						            'methodCode' => 'Express',
						            'postalAddress' => 
						            array (
						              'name' => 'Cinthya Valera',
						              'address1' => '434 22nd Pl SE',
						              'address2' => NULL,
						              'city' => 'Vero Beach',
						              'state' => 'FL',
						              'postalCode' => '32962',
						              'country' => 'USA',
						              'addressType' => 'RESIDENTIAL',
						            ),
						          ),
						          'orderLines' => 
						          array (
						            'orderLine' => 
						            array (
						              0 => 
						              array (
						                'lineNumber' => '1',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s I Wear Grey for Someone Special Graphic T-shirt Tops Brain Cancer Awareness',
						                  'sku' => 'JW1835180-BLACK-M',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                    1 => 
						                    array (
						                      'chargeType' => 'SHIPPING',
						                      'chargeName' => 'Shipping',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 1.33,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556295249000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Created',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'EXPEDITED',
						                  'storeId' => NULL,
						                  'offerId' => '51E5BADA6298445699ACF1761C0EDBCE',
						                  'pickUpDateTime' => 1556823600000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						              1 => 
						              array (
						                'lineNumber' => '2',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s I Wear Grey for Someone Special Graphic T-shirt Tops Brain Cancer Awareness',
						                  'sku' => 'JW1835180-BLACK-XL',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                    1 => 
						                    array (
						                      'chargeType' => 'SHIPPING',
						                      'chargeName' => 'Shipping',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 2.67,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556295249000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Created',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'EXPEDITED',
						                  'storeId' => NULL,
						                  'offerId' => 'D5363A1EBCAD4965B9BF702105D696D4',
						                  'pickUpDateTime' => 1556823600000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						              2 => 
						              array (
						                'lineNumber' => '3',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s I Wear Grey for Someone Special Graphic T-shirt Tops Brain Cancer Awareness',
						                  'sku' => 'JW1835180-BLACK-L',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                    1 => 
						                    array (
						                      'chargeType' => 'SHIPPING',
						                      'chargeName' => 'Shipping',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 0.9,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556295249000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Created',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'EXPEDITED',
						                  'storeId' => NULL,
						                  'offerId' => '6AB3C90B64BB477F843B01A0E72BEFD5',
						                  'pickUpDateTime' => 1556823600000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						              3 => 
						              array (
						                'lineNumber' => '4',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s I Wear Grey for Someone Special Graphic T-shirt Tops Brain Cancer Awareness',
						                  'sku' => 'JW1835180-BLACK-M',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                    1 => 
						                    array (
						                      'chargeType' => 'SHIPPING',
						                      'chargeName' => 'Shipping',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 1.33,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556295249000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Created',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'EXPEDITED',
						                  'storeId' => NULL,
						                  'offerId' => '51E5BADA6298445699ACF1761C0EDBCE',
						                  'pickUpDateTime' => 1556823600000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						              4 => 
						              array (
						                'lineNumber' => '5',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s I Wear Grey for Someone Special Graphic T-shirt Tops Brain Cancer Awareness',
						                  'sku' => 'JW1835180-BLACK-L',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                    1 => 
						                    array (
						                      'chargeType' => 'SHIPPING',
						                      'chargeName' => 'Shipping',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 0.88,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556295249000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Created',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'EXPEDITED',
						                  'storeId' => NULL,
						                  'offerId' => '6AB3C90B64BB477F843B01A0E72BEFD5',
						                  'pickUpDateTime' => 1556823600000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						              5 => 
						              array (
						                'lineNumber' => '6',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s I Wear Grey for Someone Special Graphic T-shirt Tops Brain Cancer Awareness',
						                  'sku' => 'JW1835180-BLACK-L',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                    1 => 
						                    array (
						                      'chargeType' => 'SHIPPING',
						                      'chargeName' => 'Shipping',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 0.88,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556295249000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Created',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'EXPEDITED',
						                  'storeId' => NULL,
						                  'offerId' => '6AB3C90B64BB477F843B01A0E72BEFD5',
						                  'pickUpDateTime' => 1556823600000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						            ),
						          ),
						        ),
						        2 => 
						        array (
						          'purchaseOrderId' => '1794865623203',
						          'customerOrderId' => '3871956629360',
						          'customerEmailId' => '1E5A76EDCEAC4DB5B5E96921BC088A66@relay.walmart.com',
						          'orderDate' => 1556294603000,
						          'shippingInfo' => 
						          array (
						            'phone' => '4055329158',
						            'estimatedDeliveryDate' => 1557428400000,
						            'estimatedShipDate' => 1556690400000,
						            'methodCode' => 'Value',
						            'postalAddress' => 
						            array (
						              'name' => 'Carla Clanton',
						              'address1' => '12905 Beth Ct',
						              'address2' => NULL,
						              'city' => 'Oklahoma City',
						              'state' => 'OK',
						              'postalCode' => '73120',
						              'country' => 'USA',
						              'addressType' => 'RESIDENTIAL',
						            ),
						          ),
						          'orderLines' => 
						          array (
						            'orderLine' => 
						            array (
						              0 => 
						              array (
						                'lineNumber' => '1',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s Mother Amazing Loving Strong Happy Graphic T-shirt Tops Mother\'s Day Gift',
						                  'sku' => 'CD780180-PINK-L',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => 
						                      array (
						                        'taxName' => 'Tax1',
						                        'taxAmount' => 
						                        array (
						                          'currency' => 'USD',
						                          'amount' => 0.86,
						                        ),
						                      ),
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556294679000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Created',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => 'D57FF6EC1B504EEEB473A4ACF7A7F962',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						              1 => 
						              array (
						                'lineNumber' => '2',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s Mother Amazing Loving Strong Happy Graphic T-shirt Tops Mother\'s Day Gift',
						                  'sku' => 'CD780180-PINK-S',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.89,
						                      ),
						                      'tax' => 
						                      array (
						                        'taxName' => 'Tax1',
						                        'taxAmount' => 
						                        array (
						                          'currency' => 'USD',
						                          'amount' => 0.86,
						                        ),
						                      ),
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556294679000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Created',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => '83EE3FEB33374394AE9F007E05C2A710',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						            ),
						          ),
						        ),
						        3 => 
						        array (
						          'purchaseOrderId' => '4791175645670',
						          'customerOrderId' => '3871956637331',
						          'customerEmailId' => 'E72097C89D2143A9B2C9CD5E9FAFE028@relay.walmart.com',
						          'orderDate' => 1556293623000,
						          'shippingInfo' => 
						          array (
						            'phone' => '5054140026',
						            'estimatedDeliveryDate' => 1557428400000,
						            'estimatedShipDate' => 1556690400000,
						            'methodCode' => 'Value',
						            'postalAddress' => 
						            array (
						              'name' => 'Sheila Perkins',
						              'address1' => '3311 Stanford Dr NE',
						              'address2' => NULL,
						              'city' => 'Albuquerque',
						              'state' => 'NM',
						              'postalCode' => '87107',
						              'country' => 'USA',
						              'addressType' => 'OFFICE',
						            ),
						          ),
						          'orderLines' => 
						          array (
						            'orderLine' => 
						            array (
						              0 => 
						              array (
						                'lineNumber' => '9',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s Tacos & Tequila Graphic Racerback Tank Tops Taco Mexican Drinking Party Gift',
						                  'sku' => 'LG637175-RED-L',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 11.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556293700000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Created',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => '0AD85775F3024185BA68F48245A085AC',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => 'sheila perkins',
						                ),
						              ),
						            ),
						          ),
						        ),
						        4 => 
						        array (
						          'purchaseOrderId' => '1794865613443',
						          'customerOrderId' => '3871956334044',
						          'customerEmailId' => '21449D566A484EBAA2F52BCBB6929F51@relay.walmart.com',
						          'orderDate' => 1556292468000,
						          'shippingInfo' => 
						          array (
						            'phone' => '6314715528',
						            'estimatedDeliveryDate' => 1557428400000,
						            'estimatedShipDate' => 1556690400000,
						            'methodCode' => 'Value',
						            'postalAddress' => 
						            array (
						              'name' => 'Denise Flores',
						              'address1' => '634 Johnson Ave',
						              'address2' => NULL,
						              'city' => 'Ronkonkoma',
						              'state' => 'NY',
						              'postalCode' => '11779',
						              'country' => 'USA',
						              'addressType' => 'RESIDENTIAL',
						            ),
						          ),
						          'orderLines' => 
						          array (
						            'orderLine' => 
						            array (
						              0 => 
						              array (
						                'lineNumber' => '2',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Papa T Shirt for Men Men\'s Graphic T-shirt Tops Vintage Father`s Day Gift for Daddy Best Dad Ever Shirts Papa Gifts from Daughter Father Gifts from Son Dad Tshirt',
						                  'sku' => 'XC1177412-CHARCOAL-L',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556292983000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Acknowledged',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => 'BDA6FF22F3954A8DAEE88F42EDF9B0BB',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						            ),
						          ),
						        ),
						        5 => 
						        array (
						          'purchaseOrderId' => '1794865610868',
						          'customerOrderId' => '3871956728620',
						          'customerEmailId' => '66707871A93E4B298008C88C109FF7D5@relay.walmart.com',
						          'orderDate' => 1556291871000,
						          'shippingInfo' => 
						          array (
						            'phone' => '9176810244',
						            'estimatedDeliveryDate' => 1557428400000,
						            'estimatedShipDate' => 1556690400000,
						            'methodCode' => 'Value',
						            'postalAddress' => 
						            array (
						              'name' => 'tykesha johnson',
						              'address1' => '2907 Cottage Pl',
						              'address2' => 'Apt H',
						              'city' => 'Greensboro',
						              'state' => 'NC',
						              'postalCode' => '27455',
						              'country' => 'USA',
						              'addressType' => 'RESIDENTIAL',
						            ),
						          ),
						          'orderLines' => 
						          array (
						            'orderLine' => 
						            array (
						              0 => 
						              array (
						                'lineNumber' => '2',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles 80s Party Shirt Totally 80\'s Shirt 80s T-shirt Mens 80s Accessories 80s Rock T Shirt 80s T Shirt Neon T-Shirt 80s Costume 80s Clothes for Men 80s Outfit 80s Party Boy',
						                  'sku' => 'UO3326412-WHITE-L',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556292985000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Acknowledged',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => '0BFA983FE3794ECBA0B846511A378ADB',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						              1 => 
						              array (
						                'lineNumber' => '3',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles 80s Party Shirt Totally 80\'s Shirt 80s T-shirt Mens 80s Accessories 80s Rock T Shirt 80s T Shirt Neon T-Shirt 80s Costume 80s Clothes for Men 80s Outfit 80s Party Boy',
						                  'sku' => 'UO3326412-ORANGE-L',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556292985000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Acknowledged',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => '076FAB64516F41CC9E2DF9272D0CA093',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						            ),
						          ),
						        ),
						        6 => 
						        array (
						          'purchaseOrderId' => '2791175637163',
						          'customerOrderId' => '3871955899913',
						          'customerEmailId' => '89C8290F85DF4A218B14B043B379171F@relay.walmart.com',
						          'orderDate' => 1556291695000,
						          'shippingInfo' => 
						          array (
						            'phone' => '5024840055',
						            'estimatedDeliveryDate' => 1557428400000,
						            'estimatedShipDate' => 1556690400000,
						            'methodCode' => 'Value',
						            'postalAddress' => 
						            array (
						              'name' => 'Bradley Haydon',
						              'address1' => '315 Monterey Pike',
						              'address2' => NULL,
						              'city' => 'Owenton',
						              'state' => 'KY',
						              'postalCode' => '40359',
						              'country' => 'USA',
						              'addressType' => 'RESIDENTIAL',
						            ),
						          ),
						          'orderLines' => 
						          array (
						            'orderLine' => 
						            array (
						              0 => 
						              array (
						                'lineNumber' => '1',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Dinosaur Puzzle Piece for Autism Awareness Men\'s Autism T Shirt Autism Awareness Shirts Autistic Pride Gifts for Him Autism Tshirt Dinosaur Gifts for Autism Autism Support Tshirt',
						                  'sku' => 'WF4269412-GREY-2XL',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 12.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556292986000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Acknowledged',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => '314CC31D4C394353AE2EE296CED536D6',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						              1 => 
						              array (
						                'lineNumber' => '2',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Men\'s Love Puzzles Autism Awareness Graphic T-shirt Tops Autistic Support',
						                  'sku' => 'UK594182-NAVY-2XL',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 12.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556292986000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Acknowledged',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => '74F556A180694E499444FAACA32A9360',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						            ),
						          ),
						        ),
						        7 => 
						        array (
						          'purchaseOrderId' => '4791175634282',
						          'customerOrderId' => '3871956730483',
						          'customerEmailId' => '65A1081A22E24F5690269F78AB23F65F@relay.walmart.com',
						          'orderDate' => 1556291050000,
						          'shippingInfo' => 
						          array (
						            'phone' => '2024129137',
						            'estimatedDeliveryDate' => 1557428400000,
						            'estimatedShipDate' => 1556690400000,
						            'methodCode' => 'Value',
						            'postalAddress' => 
						            array (
						              'name' => 'SABRINA COOPER',
						              'address1' => '11711 Marston Moor Lane',
						              'address2' => NULL,
						              'city' => 'WALDORF',
						              'state' => 'MD',
						              'postalCode' => '20602',
						              'country' => 'USA',
						              'addressType' => 'RESIDENTIAL',
						            ),
						          ),
						          'orderLines' => 
						          array (
						            'orderLine' => 
						            array (
						              0 => 
						              array (
						                'lineNumber' => '1',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Police Tshirt for Men Police Shirt with Usa Flag Sleeve Military Police Shirts Police Officer Gifts Police Men\'s Shirt American Flag Sleeve Police Shirt Police Gifts for Him Cop Shirt',
						                  'sku' => 'TF4997412-POLICE2-M',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556292987000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Acknowledged',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => '8256A5755F7E4C209370602226EB1318',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						            ),
						          ),
						        ),
						        8 => 
						        array (
						          'purchaseOrderId' => '3794865602559',
						          'customerOrderId' => '3871956331442',
						          'customerEmailId' => '040D92BC5A874F02B4F7CCA486243729@relay.walmart.com',
						          'orderDate' => 1556289931000,
						          'shippingInfo' => 
						          array (
						            'phone' => '4057432097',
						            'estimatedDeliveryDate' => 1557428400000,
						            'estimatedShipDate' => 1556690400000,
						            'methodCode' => 'Value',
						            'postalAddress' => 
						            array (
						              'name' => 'Mehan Union Church  Melanie Ballard',
						              'address1' => '8300 E 68th St',
						              'address2' => NULL,
						              'city' => 'Stillwater',
						              'state' => 'OK',
						              'postalCode' => '74074',
						              'country' => 'USA',
						              'addressType' => 'RESIDENTIAL',
						            ),
						          ),
						          'orderLines' => 
						          array (
						            'orderLine' => 
						            array (
						              0 => 
						              array (
						                'lineNumber' => '1',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s USA Flag Faith Graphic T-shirt Tops 4th of July Gift Independence Day',
						                  'sku' => 'BC1326180-RED-XL',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => 
						                      array (
						                        'taxName' => 'Tax1',
						                        'taxAmount' => 
						                        array (
						                          'currency' => 'USD',
						                          'amount' => 0.53,
						                        ),
						                      ),
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556292989000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Acknowledged',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => '6AB94F593C0442ACAD82079AA2248613',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						              1 => 
						              array (
						                'lineNumber' => '2',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Women\'s USA Flag Faith Graphic T-shirt Tops 4th of July Gift Independence Day',
						                  'sku' => 'BC1326180-RED-L',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => 
						                      array (
						                        'taxName' => 'Tax1',
						                        'taxAmount' => 
						                        array (
						                          'currency' => 'USD',
						                          'amount' => 0.53,
						                        ),
						                      ),
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556292989000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Acknowledged',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => '373E5C280C0544E2A8CF27773B83F5B9',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						            ),
						          ),
						        ),
						        9 => 
						        array (
						          'purchaseOrderId' => '4791175629365',
						          'customerOrderId' => '3871956332087',
						          'customerEmailId' => 'A8DAA5956E374212BCD1E6CFE13BE898@relay.walmart.com',
						          'orderDate' => 1556289871000,
						          'shippingInfo' => 
						          array (
						            'phone' => '3372074265',
						            'estimatedDeliveryDate' => 1557428400000,
						            'estimatedShipDate' => 1556690400000,
						            'methodCode' => 'Value',
						            'postalAddress' => 
						            array (
						              'name' => 'Tina Bearb',
						              'address1' => '208 St. James Drive',
						              'address2' => NULL,
						              'city' => 'Lafayette',
						              'state' => 'LA',
						              'postalCode' => '70506',
						              'country' => 'USA',
						              'addressType' => 'RESIDENTIAL',
						            ),
						          ),
						          'orderLines' => 
						          array (
						            'orderLine' => 
						            array (
						              0 => 
						              array (
						                'lineNumber' => '2',
						                'item' => 
						                array (
						                  'productName' => 'Awkward Styles Panda Skull Tshirt for Women Christian Panda Shirt Sugar Skull Shirts for Women Dia de los Muertos Gifts for Her Day of the Dead T Shirt Christian Tshirt Women\'s Paisley Panda T-Shirt',
						                  'sku' => 'KR4094409-BLUE-L',
						                ),
						                'charges' => 
						                array (
						                  'charge' => 
						                  array (
						                    0 => 
						                    array (
						                      'chargeType' => 'PRODUCT',
						                      'chargeName' => 'ItemPrice',
						                      'chargeAmount' => 
						                      array (
						                        'currency' => 'USD',
						                        'amount' => 9.95,
						                      ),
						                      'tax' => NULL,
						                    ),
						                  ),
						                ),
						                'orderLineQuantity' => 
						                array (
						                  'unitOfMeasurement' => 'EACH',
						                  'amount' => '1',
						                ),
						                'statusDate' => 1556292990000,
						                'orderLineStatuses' => 
						                array (
						                  'orderLineStatus' => 
						                  array (
						                    0 => 
						                    array (
						                      'status' => 'Acknowledged',
						                      'statusQuantity' => 
						                      array (
						                        'unitOfMeasurement' => 'EACH',
						                        'amount' => '1',
						                      ),
						                      'cancellationReason' => NULL,
						                      'trackingInfo' => NULL,
						                    ),
						                  ),
						                ),
						                'refund' => NULL,
						                'fulfillment' => 
						                array (
						                  'fulfillmentOption' => 'S2H',
						                  'shipMethod' => 'VALUE',
						                  'storeId' => NULL,
						                  'offerId' => 'CF5212B0DEFF4359A09486AAD6FE265E',
						                  'pickUpDateTime' => 1556910000000,
						                  'pickUpBy' => NULL,
						                ),
						              ),
						            ),
						          ),
						        ),
						      ),
						    ),
						  ),
						);
			
			
        	return view('ordertracking',$data);
        }
        
    }
}
