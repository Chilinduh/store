<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class ItemsWidget extends Widget
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

            <div class="product-item" data-id="product-665866928194">
              <div class="product-item-container  ">
                <div class="row">
                  <div class="left-block col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-image-container product-image">
                      <a class="grid-view-item__link image-ajax" href="/product/">
                        <img class="img-responsive lazyautosizes lazyloaded" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/36_be604602-4ec6-4e18-83ab-4e4de73c43ea_320x320_crop_center@2x.jpg?v=1524710318" data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/36_be604602-4ec6-4e18-83ab-4e4de73c43ea_320x320_crop_center@2x.jpg?v=1524710318" alt="Filet mignon capico" sizes="320px">

                      </a>

                      <span class="label-product label-sale"><span class="hidden">Sale</span>
                        -15%</span>


                      <div class="button-link">

                        <div class="btn-button add-to-cart action  ">
                          <form action="/cart/add" method="post" class="variants" data-id="AddToCartForm-665866928194" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="12636652404802">
                            <a class="btn-addToCart grl btn_df" href="javascript:void(0)" title="Add to cart"><i class="fa fa-shopping-basket"></i><span class="hidden-xs hidden-sm hidden-md">Add to cart</span></a>
                          </form>
                        </div>

                        <div class="quickview-button">
                          <a class="quickview iframe-link d-none d-xl-block btn_df" href="javascript:void(0)" data-variants_id="12636652404802" data-toggle="modal" data-target="#myModal" data-id="boudin-capicola" title="Quick View"><i class="fa fa-search"></i><span class="hidden-xs hidden-sm hidden-md">Quick View</span></a>
                        </div>
                        <div class="product-addto-links">

                        <a class="btn_df btnProduct" href="/account/login" title="Wishlist">
                            <i class="fa fa-heart"></i>
                            <span class="hidden-xs hidden-sm hidden-md">Wishlist</span>
                        </a>

                </div>
                      </div>

                    </div>
                  </div>
                  <div class="right-block col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="caption">


                      <h4 class="title-product text-truncate"><a class="product-name" href="/products/boudin-capicola">Filet mignon capico</a></h4>

                      <div class="price">
                        <!-- snippet/product-price.liquid -->


                        <span class="visually-hidden">Regular price</span>
                        <span class="price-new"><span class="money" data-currency-usd="$123.00">$123.00</span></span>
                        <span class="price-old"> <span class="money" data-currency-usd="$145.00">$145.00</span> </span>

                      </div>

                    </div>


                    <div class="rte description">
                      <label class="d-none">Quick Overview</label>
                      Curabitur egestas malesuada volutpat. Nunc vel vestibulum odio, ac pellentesque lacus. Pellentesque dapibus nunc nec...
                    </div>


                    <div class="qt">

                       We currently have <b>1</b> in stock.

                    </div>

                    <div class="countdown_tabs">
                      <div class="time-title d-none d-lg-block"><span>Hurry Up!</span> Offer ends in:</div>
                      <div class="countdown_inner">
                        <div id="665866928194"><div class="deals-time day"><div class="num-time">18</div><div class="title-time">days</div></div> <div class="deals-time hour"><div class="num-time">09</div> <div class="title-time">hours</div></div><div class="deals-time minute"><div class="num-time">33</div><div class="title-time">mins</div></div><div class="deals-time second"><div class="num-time">20</div><div class="title-time">secs</div></div></div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>

                    ';
      
    }
}


