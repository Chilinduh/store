<?php

use app\components\TrendingItemsWidget;
?>
<section id="breadcrumbs" class=" breadcrumbbg">
    <div class="breadcrumbwrapper">
        <div class="container">
            <nav>
                <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemlistelement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="/" title="Back to the frontpage" itemprop="item">
                            <span itemprop="name">Home</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="active" itemprop="itemlistelement" itemscope="" itemtype="http://schema.org/ListItem">
                        <span itemprop="item"><span itemprop="name">Electronic</span></span>
                        <meta itemprop="position" content="2">
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<div class="container positon-sidebar">
    <div class="row">
        <div class="col-sidebar sidebar-fixed col-lg-3">
            <span id="close-sidebar" class="btn-fixed d-lg-none"><i class="fa fa-times"></i></span>
            <div class="block block-category spaceBlock">
                <h3 class="block-title">
                    Categories
                </h3>
                <div class="widget-content">  
                    <ul class="toggle-menu list-menu">     
                        <li class="active">
                            <a href="/collections/ellectronic">Ellectronic<span class="count">( 12 )</span></a>
                        </li>
                        <li class=" toggle-content">
                            <a href="/collections/mens-clothing">Fashion<span class="count"></span><span class="caret"><i class="fa fa-angle-down"></i></span></a>
                            <ul class="sub-menu level-1">
                                <li>
                                    <a href="/collections/mens-clothing">Men's clothing<span class="count">( 17 )</span></a>              
                                </li>
                                <li>
                                    <a href="/collections/women-s-clothing">Women’s clothing<span class="count">( 18 )</span><span class="caret"><i class="fa fa-angle-down"></i></span></a>              
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
                        <li>
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
            <div id="shopify-section-sidebar-filter-collection" class="shopify-section"><script src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/jquery.history.js?13797" type="text/javascript"></script>
                <script src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/ss-filter-shopby.js?13797" type="text/javascript"></script>
                <div class="block widget-filter yt-left-wrap clearfix">
                    <div id="layered-navigation">
                        <div class="block block-layered-nav">
                            <div class="block-title">
                                <strong><span>Shop By</span></strong>
                            </div>
                            <div class="block-content">
                                <dl id="narrow-by-list">
                                    <div class="filter-tags">
                                        <div class="Price">
                                            <dt>
                                                <span class="category-filter">Price</span>
                                                <a href="javascript:void(0)" class="clear" style="display:none">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Clear
                                                </a>
                                            </dt>
                                            <dd>
                                                <ol>
                                                    <li class="">
                                                        <input type="checkbox" value="0-99">
                                                        <label>0 - $99</label>
                                                    </li>
                                                    <li class="">
                                                        <input type="checkbox" value="100-199">
                                                        <label>$100 - $199</label>
                                                    </li>
                                                    <li class="">
                                                        <input type="checkbox" value="200-299">
                                                        <label>$200 - $299</label>
                                                    </li>
                                                    <li class="">
                                                        <input type="checkbox" value="above-400">
                                                        <label>Above $400</label>
                                                    </li>
                                                </ol>
                                            </dd>
                                        </div>
                                        <div class="Color">
                                            <dt>
                                                <span class="category-filter">Color</span>
                                                <a href="javascript:void(0)" class="clear" style="display:none">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Clear
                                                </a>
                                            </dt>
                                            <dd class="filter-color">
                                                <ol>
                                                    <li class="brown ">
                                                        <input type="checkbox" value="brown">
                                                        <a href="javascript:void(0)" title="Brown">
                                                            <img src="" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="green ">
                                                        <input type="checkbox" value="green">
                                                        <a href="javascript:void(0)" title="Green">
                                                            <img src="" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="black ">
                                                        <input type="checkbox" value="black">
                                                        <a href="javascript:void(0)" title="Black">
                                                            <img src="" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="sliver ">
                                                        <input type="checkbox" value="sliver">
                                                        <a href="javascript:void(0)" title="Sliver">
                                                            <img src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/sliver_34x34_416c0dae-3521-4508-8e69-3752f70e52d1_34x34.png?v=1528441018" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="white ">
                                                        <input type="checkbox" value="white">
                                                        <a href="javascript:void(0)" title="White">
                                                            <img src="" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="sliver ">
                                                        <input type="checkbox" value="sliver">
                                                        <a href="javascript:void(0)" title="Sliver">
                                                            <img src="" alt="">
                                                        </a>
                                                    </li>
                                                </ol>
                                            </dd>
                                        </div>
                                        <div class="Size">
                                            <dt>
                                                <span class="category-filter">Size</span>
                                                <a href="javascript:void(0)" class="clear" style="display:none">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Clear
                                                </a>
                                            </dt>
                                            <dd>
                                                <ol>
                                                    <li class="">
                                                        <input type="checkbox" value="one-size">
                                                        <label>ONE SIZE</label>
                                                    </li>
                                                </ol>
                                            </dd>
                                        </div>
                                        <div class="Brand">
                                            <dt>
                                                <span class="category-filter">Brand</span>
                                                <a href="javascript:void(0)" class="clear" style="display:none">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Clear
                                                </a>
                                            </dt>
                                            <dd>
                                                <ol>
                                                    <li class="">
                                                        <input type="checkbox" value="dior">
                                                        <label>Dior</label>
                                                    </li>
                                                    <li class="">
                                                        <input type="checkbox" value="lion">
                                                        <label>Lion</label>
                                                    </li>
                                                    <li class="">
                                                        <input type="checkbox" value="cherry">
                                                        <label>Cherry</label>
                                                    </li>
                                                    <li class="">
                                                        <input type="checkbox" value="lime">
                                                        <label>Lime</label>
                                                    </li>
                                                </ol>
                                            </dd>
                                        </div>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix clr clear"></div>
            </div>
            <div class="block widget-prd-featured best-seller spaceBlock">
                <h3 class="block-title"><strong><span>Featured Products</span></strong></h3>
                <div class="wrap">
                    <div class="product-item clearfix  on-sale">
                        <a href="/collections/ellectronic/products/capicola-brisket" class="product-img">
                            <img class="lazyautosizes lazyloaded" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_80x80.jpg?v=1524712739" data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_80x80.jpg?v=1524712739" alt="Labor occaecat bee" sizes="80px">
                        </a>
                        <div class="product-info"> 
                            <div class="text-truncate"><a href="/collections/ellectronic/products/capicola-brisket" title="Labor occaecat bee" class="product-name">Labor occaecat bee</a></div>
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
                        <a href="/collections/ellectronic/products/aliquip-sintfugia" class="product-img">
                            <img class="lazyautosizes lazyloaded" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf_80x80.jpg?v=1524718937" data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf_80x80.jpg?v=1524718937" alt="Short ribs shank pork" sizes="80px">
                        </a>
                        <div class="product-info"> 
                            <div class="text-truncate"><a href="/collections/ellectronic/products/aliquip-sintfugia" title="Short ribs shank pork" class="product-name">Short ribs shank pork</a></div>
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
                        <a href="/collections/ellectronic/products/capicola-drumstic" class="product-img">
                            <img class="lazyautosizes lazyloaded" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/40_80x80.jpg?v=1524712075" data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/40_80x80.jpg?v=1524712075" alt="Irure rump cow bris" sizes="80px">
                        </a>
                        <div class="product-info"> 
                            <div class="text-truncate"><a href="/collections/ellectronic/products/capicola-drumstic" title="Irure rump cow bris" class="product-name">Irure rump cow bris</a></div>
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
                        <img class="img-responsive lazyautosizes lazyloaded" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/sidebar-banner.png?v=1524563328" alt="files/sidebar-banner.png" data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/sidebar-banner.png?v=1524563328" sizes="270px">
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-overlay"></div>
        <div class="col-main col-lg-9 col-12">
            <a href="javascript:void(0)" class="open-sidebar d-lg-none"><i class="fa fa-bars"></i> Sidebar</a>
            <div id="shopify-section-collection-infos" class="shopify-section">
                <div class="collection-info banners">
                    <div class="collection-info-full">
                        <h1 class="collection-tille">Electronic</h1>
                        <div class="rte des">
                            Curabitur egestas malesuada volutpat. Nunc vel vestibulum odio, ac pellentesque lacus. Pellentesque dapibus nunc nec est imperdiet, a malesuada sem rutrum. Sed
                        </div>
                    </div>
                </div>
                <div class="category-carousel ss-carousel ss-owl">
                    <div class="owl-carousel owl-loaded owl-drag" data-nav="true" data-margin="30" data-column1="5" data-column2="4" data-column3="3" data-column4="3" data-column5="2">
                        <div class="owl-stage-outer"><div class="owl-stage" style="width: 2687px; transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;"><div class="owl-item active" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/memory-cards"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/8_400x480_crop_center.jpg?v=1523327161" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">Jewelry &amp; Watches</h5>
                                                <div class="category-info__count">12 items</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="owl-item active" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/office-electronics"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/1_400x480_crop_center.jpg?v=1523324784" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">Office Electronics</h5>
                                                <div class="category-info__count">12 items</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="owl-item active" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/cables-connectors"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/bg_400x480_crop_center.png?v=1526368551" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">Bags &amp; Shoes</h5>
                                                <div class="category-info__count">17 items</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="owl-item active" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/phones-accessories"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/6_400x480_crop_center.jpg?v=1523326364" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">Phones &amp; Accessories</h5>
                                                <div class="category-info__count">12 items</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="owl-item active" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/women-s-clothing"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/17_400x480_crop_center.jpg?v=1523328807" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">Women’s Clothing</h5>
                                                <div class="category-info__count">18 items</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="owl-item" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/mens-clothing"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/15_400x480_crop_center.jpg?v=1523328665" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">Men's Clothing</h5>
                                                <div class="category-info__count">17 items</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="owl-item" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/sports-outdoors"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/11_400x480_crop_center.jpg?v=1523328026" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">Sports &amp; Outdoors</h5>
                                                <div class="category-info__count">16 items</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="owl-item" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/toys-kids-baby"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/13_400x480_crop_center.jpg?v=1523328300" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">Toys, Kids &amp; Baby</h5>
                                                <div class="category-info__count">2 items</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="owl-item" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/furniture"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/99_400x480_crop_center.jpg?v=1523327565" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">Furniture</h5>
                                                <div class="category-info__count">17 items</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="owl-item" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/tablets-phones"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/2_400x480_crop_center.jpg?v=1523324826" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">Tablets &amp; Phones</h5>
                                                <div class="category-info__count">12 items</div>
                                            </div>
                                        </div>
                                    </div></div><div class="owl-item" style="width: 214.2px; margin-right: 30px;"><div class="product-category">
                                        <a href="/collections/frontpage"><img src="//cdn.shopify.com/s/files/1/0017/0770/4386/collections/20_c55257f3-d1c4-44c4-926e-452b8819f8df_400x480_crop_center.jpg?v=1523349375" alt="#"></a>
                                        <div class="category-info">
                                            <div class="category">
                                                <h5 class="category-info__title">All site</h5>
                                                <div class="category-info__count">46 items</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="owl-nav">
                            <div class="owl-prev disabled"><i class="fa fa-angle-left"></i>
                            </div>
                            <div class="owl-next"><i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                        <div class="owl-dots"><div class="owl-dot active"><span></span></div>
                            <div class="owl-dot"><span></span></div><div class="owl-dot"><span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="collection-main">
                    <div class="filters-toolbar-wrapper">
                        <div class="filters-toolbar">
                            <div class="row">
                                <div class="col col-6 col-sm-6 col-lg-6">
                                    <div class="view-mode sn">
                                        <button type="button" title="Grid" class="hidden-xs changeView mode-grid active" data-view="grid">
                                            <i class="material-icons"></i></button>
                                        <button type="button" title="List" class="hidden-xs changeView mode-list" data-view="list">
                                            <i class="material-icons"></i></button>
                                    </div>
                                </div>
                                <div class="col col-6 col-sm-6 col-lg-6">
                                    <div class="filters-toolbar-item filter-fiel"><label for="SortBy" class="label-sortby hidden-xs">Sort By:</label>
                                        <select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort filters-toolbar-sort">
                                            <option value="manual">Featured</option>
                                            <option value="title-ascending">Alphabetically, A-Z</option>
                                            <option value="title-descending">Alphabetically, Z-A</option>
                                            <option value="price-ascending">Price, low to high</option>
                                            <option value="price-descending">Price, high to low</option>
                                            <option value="created-descending">Date, new to old</option>
                                            <option value="created-ascending">Date, old to new</option>
                                        </select>
                                        <input class="collection-header__default-sort" type="hidden" value="best-selling">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
           
            <div id="shopify-section-collection-template" class="shopify-section">
                <div data-section-id="collection-template" data-section-type="collection-template" class="products-collection">
                    <div class="product-wrapper" id="Collection">
                        <div class="products-listing products-grid grid row EndlessScroll">
                            
                            <div class="product product-layout grid__item grid__item--collection-template col-xl-15 col-lg-4 col-md-4 col-sm-4 col-xs-6 grid_5">
                                <span class="d-none"><span class="money" data-currency-usd="$31.00">$31.00</span></span>
                                <?= TrendingItemsWidget::widget(['message' => 'Good morning']) ?>    
                            </div>
                            <div class="product product-layout grid__item grid__item--collection-template col-xl-15 col-lg-4 col-md-4 col-sm-4 col-xs-6 grid_5">
                                <span class="d-none"><span class="money" data-currency-usd="$31.00">$31.00</span></span>
                                <?= TrendingItemsWidget::widget(['message' => 'Good morning']) ?>    
                            </div>
                            <div class="product product-layout grid__item grid__item--collection-template col-xl-15 col-lg-4 col-md-4 col-sm-4 col-xs-6 grid_5">
                                <span class="d-none"><span class="money" data-currency-usd="$31.00">$31.00</span></span>
                                <?= TrendingItemsWidget::widget(['message' => 'Good morning']) ?>    
                            </div>
                            <div class="product product-layout grid__item grid__item--collection-template col-xl-15 col-lg-4 col-md-4 col-sm-4 col-xs-6 grid_5">
                                <span class="d-none"><span class="money" data-currency-usd="$31.00">$31.00</span></span>
                                <?= TrendingItemsWidget::widget(['message' => 'Good morning']) ?>    
                            </div>
                            <div class="product product-layout grid__item grid__item--collection-template col-xl-15 col-lg-4 col-md-4 col-sm-4 col-xs-6 grid_5">
                                <span class="d-none"><span class="money" data-currency-usd="$31.00">$31.00</span></span>
                                <?= TrendingItemsWidget::widget(['message' => 'Good morning']) ?>    
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
