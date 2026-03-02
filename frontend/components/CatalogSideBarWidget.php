<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class CatalogSideBarWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }

    public function run()
    {
        //         return Html::encode($this->message);


        return '

            <div class="col-sidebar sidebar-fixed col-lg-3">
            <span id="close-sidebar" class="btn-fixed d-lg-none"><i class="fa fa-times"></i></span>

            <div class="block block-category spaceBlock">

            <h3 class="block-title">
            Categories
            </h3>

            <div class="widget-content">
            <ul class="toggle-menu list-menu">

            <li>

            <a href="/collections/ellectronic">Ellectronic<span class="count">( 12 )</span></a>
            </li>

            <li class=" toggle-content">

            <a href="/collections/mens-clothing">Fashion<span class="count"></span><span class="caret"><i class="fa fa-angle-down"></i></span></a>
            <ul class="sub-menu level-1">
            <li>
            <a href="/collections/mens-clothing">Mens clothing<span class="count">( 17 )</span></a>
                        </li>
                        <li>
                          <a href="/collections/women-s-clothing">Women?s clothing<span class="count">( 18 )</span><span class="caret"><i class="fa fa-angle-down"></i></span></a>
                          <ul class="sub-menu level-2">

                            <li>
                              <a href="/collections/cables-connectors">Bags &amp; shoes<span class="count"></span></a>
                            </li>

                            <li>
                              <a href="/collections/health-beauty">Health &amp; beauty<span class="count"></span></a>
                            </li>

                            <li>
                              <a href="/collections/memory-cards">Jewelry &amp; watches<span class="count"></span></a>
                            </li>

                          </ul>
                        </li>

                        <li>
                          <a href="/collections/sports-outdoors">Sports &amp; outdoors<span class="count">( 16 )</span></a>
                        </li>


                      </ul>
                    </li>

                    <li class="active">

                      <a href="/collections/furniture">Furniture<span class="count">( 17 )</span></a>
                    </li>
                    <li>
                      <a href="/collections/phones-accessories">Phones &amp; accessories<span class="count">( 12 )</span></a>
                    </li>

                    <li>
                      <a href="/collections/tablets-phones">Tablets &amp; phones<span class="count">( 12 )</span></a>
                    </li>
                    <li>
                      <a href="/collections/toys-kids-baby">Toys, kids &amp; baby<span class="count">( 2 )</span></a>
                    </li>


                  </ul>
              </div>
            </div>


            <div class="block widget-prd-featured best-seller spaceBlock">

              <h3 class="block-title"><strong><span>Featured Products</span></strong></h3>

              <div class="wrap">


            <div class="product-item clearfix  on-sale">
              <a href="/collections/furniture/products/capicola-brisket" class="product-img">
                <img class="lazyautosizes lazyloaded" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_80x80.jpg?v=1524712739" data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_80x80.jpg?v=1524712739" alt="Labor occaecat bee" sizes="40px">
              </a>
              <div class="product-info">
                <div class="text-truncate"><a href="/collections/furniture/products/capicola-brisket" title="Labor occaecat bee" class="product-name">Labor occaecat bee</a></div>
                <div class="custom-reviews a-left hidden-xs">
                  <span class="spr-badge" id="spr_badge_665869320258" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i></span><span class="spr-badge-caption">No reviews</span>
            </span>

                </div>
                <div class="price">
                  <!-- snippet/product-price.liquid -->

                <span class="visually-hidden">Regular price</span>
                <span class="price-new"><span class="money" data-currency-usd="$34.00">$34.00</span></span>
                <span class="price-old"> <span class="money" data-currency-usd="$42.00">$42.00</span> </span>


                </div>
              </div>
            </div>

            <div class="product-item clearfix  on-sale">
              <a href="/collections/furniture/products/aliquip-sintfugia" class="product-img">
                <img class="lazyautosizes lazyloaded" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf_80x80.jpg?v=1524718937" data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf_80x80.jpg?v=1524718937" alt="Short ribs shank pork" sizes="40px">
              </a>
              <div class="product-info">
                <div class="text-truncate"><a href="/collections/furniture/products/aliquip-sintfugia" title="Short ribs shank pork" class="product-name">Short ribs shank pork</a></div>
                <div class="custom-reviews a-left hidden-xs">
                  <span class="spr-badge" id="spr_badge_665870860354" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i></span><span class="spr-badge-caption">No reviews</span>
            </span>

                </div>
                <div class="price">
                  <!-- snippet/product-price.liquid -->



                <span class="visually-hidden">Regular price</span>
                <span class="price-new"><span class="money" data-currency-usd="$126.00">$126.00</span></span>
                <span class="price-old"> <span class="money" data-currency-usd="$154.00">$154.00</span> </span>

                </div>
              </div>
            </div>


            <div class="product-item clearfix  on-sale">
              <a href="/collections/furniture/products/capicola-drumstic" class="product-img">
                <img class="lazyautosizes lazyloaded" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/40_80x80.jpg?v=1524712075" data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/40_80x80.jpg?v=1524712075" alt="Irure rump cow bris" sizes="40px">
              </a>
              <div class="product-info">
                <div class="text-truncate"><a href="/collections/furniture/products/capicola-drumstic" title="Irure rump cow bris" class="product-name">Irure rump cow bris</a></div>
                <div class="custom-reviews a-left hidden-xs">
                  <span class="spr-badge" id="spr_badge_665868468290" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i></span><span class="spr-badge-caption">No reviews</span>
            </span>

                </div>
                <div class="price">
                  <!-- snippet/product-price.liquid -->



                <span class="visually-hidden">Regular price</span>
                <span class="price-new"><span class="money" data-currency-usd="$234.00">$234.00</span></span>
                <span class="price-old"> <span class="money" data-currency-usd="$245.00">$245.00</span> </span>





                </div>
              </div>
            </div>




              </div>
            </div>


            <div class="block sidebar-html">

              <h3 class="block-title"><strong><span>Custom Services</span></strong></h3>

              <div class="widget-content">

                <div class="rte-setting"><div class="services-sidebar">
            	<ul>
            		<li>
            			<div class="service-content">
            				<div class="service-icon" style="font-size: 30px;">
            					<em class="fa fa-truck"></em>
            				</div>

            				<div class="service-info">
            					<h4><a href="#" title="Free Delivery">Free Delivery</a></h4>
            					<p>From $59.89</p>
            				</div>
            			</div>
            		</li>

            		<li>
            			<div class="service-content">
            				<div class="service-icon" style="font-size: 30px;">
            					<em class="fa fa-support"></em>
            				</div>

            				<div class="service-info">
            					<h4><a href="#" title="Support 24/7">Support 24/7</a></h4>
            					<p>Online 24 hours</p>
            				</div>
            			</div>
            		</li>

            		<li>
            			<div class="service-content">
            				<div class="service-icon" style="font-size: 30px;">
            					<em class="fa fa-refresh"></em>
            				</div>

            				<div class="service-info">
            					<h4><a href="#" title="Free return">Free return</a></h4>
            					<p>365 a day</p>
            				</div>
            			</div>
            		</li>

            		<li>
            			<div class="service-content">
            				<div class="service-icon" style="font-size: 25px; position: relative; top: 4px;">
            					<em class="fa fa-cc-paypal"></em>
            				</div>

            				<div class="service-info">
            					<h4><a href="#" title="payment method">payment method</a></h4>
            					<p>Secure payment</p>
            				</div>
            			</div>
            		</li>
            	</ul>
            </div></div>

              </div>
            </div>


            <div class="block sidebar-banner spaceBlock banners">
              <div>


                <a href="/collections/furniture" title="">
                  <img class="img-responsive lazyload" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/icon-loadings.svg?13" alt="files/sidebar-banner.png" data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/sidebar-banner.png?v=1524563328">
                </a>

              </div>
            </div>

            </div>';
    }
}