<?php
use app\components\SliderWidget;
use app\components\ItemsWidget;
use app\components\TrendingItemsWidget;
use app\components\VerticalMenuWidget;
use app\components\DropDownLoginFormWidget;
use app\components\HeaderMenuWidget;
use frontend\assets\AppAsset;
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html
    class="no-js wf-roboto-n1-active wf-roboto-n2-active wf-roboto-n3-active wf-roboto-n4-active wf-roboto-n5-active wf-roboto-n6-active wf-roboto-n7-active wf-roboto-n8-active wf-roboto-n9-active wf-robotocondensed-n1-active wf-robotocondensed-n2-active wf-robotocondensed-n3-active wf-robotocondensed-n4-active wf-robotocondensed-n5-active wf-robotocondensed-n6-active wf-robotocondensed-n7-active wf-robotocondensed-n8-active wf-robotocondensed-n9-active wf-active"
    lang="en" style="padding-bottom: 60px;">
    <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Basic page -->
        <meta name="viewport" content="width=device-width,user-scalable=1">
        <meta name="theme-color" content="#7796a8">
        <!-- Favicon -->
        <!-- Title and description -->
        <title>eMarket - Sectioned | Drag &amp; Drop Responsive Multipurpose
            Shopify – ss-emarket2</title>
        <meta name="description" content="eMarket - Multipurpose Shopify theme is modern, user friendly, responsive and functional theme that is ideal for you to start up any kinds of business stores.">
        <!-- Script -->
<?php $this->head() ?>
    </head>
    <body class="<?= $this->context->bodyClass ?>">
<?php $this->beginBody() ?>
        <div id="wrapper" class="page-wrapper wrapper-full effect_10">
            <!--   Loading Site -->
            <div id="loadingSite" style="display: none;">
                <div class="cssload-loader">
                    <span class="block-1"></span> <span class="block-2"></span> <span
                        class="block-3"></span> <span class="block-4"></span> <span
                        class="block-5"></span> <span class="block-6"></span> <span
                        class="block-7"></span> <span class="block-8"></span> <span
                        class="block-9"></span> <span class="block-10"></span> <span
                        class="block-11"></span> <span class="block-12"></span> <span
                        class="block-13"></span> <span class="block-14"></span> <span
                        class="block-15"></span> <span class="block-16"></span>
                </div>
            </div>
            <div id="shopify-section-header" class="shopify-section"></div>
            <!-- eMarket 1-->
            <header id="header" class="header header-style1">
                <div class="header-top compad_hidden d-none d-lg-block">
                    <div class="container">
                        <div class="row">
                            <div class="header-top-left col-xl-6 col-lg-8 hidden-sm hidden-xs">
                                <div class="telephone hidden-xs hidden-sm">
                                </div>
                            </div>
                            <div
                                class="header-top-right no__at col-xl-6 col-lg-4 col-sm-12 col-12">
                                <div class="toplink-item account hidden-lg hidden-md"
                                     id="my_account">
                                    <a href="#" class="dropdown-toggle"> <i class="fa fa-user"
                                                                            aria-hidden="true"></i> <span>My Account</span> <span
                                                                            class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-content dropdown-menu sn">
                                        <li class="s-login"><i class="fa fa-user-circle-o"></i><a
                                                href="/account/login" id="customer_login_link">Login</a></li>
                                        <li><a href="/pages/wishlist" title="My Wishlist"><i
                                                    class="fa fa-heart"></i>My Wishlist</a></li>
                                        <li><a href="/account/addresses" title=""><i class="fa fa-book"></i>Order
                                                History</a></li>
                                        <li><a href="/checkout" title="Checkout"><i
                                                    class="fa fa-external-link-square" aria-hidden="true"></i>Checkout</a></li>
                                        <li><a href="/" title="buy on credit"><i
                                                    class="fa fa-address-card-o"></i>Buy on credit</a></li>
                                    </ul>
                                </div>
                                <div class="toplink-item checkout no__at">
                                    <div class="language-theme">
                                        <button class="btn btn-primary dropdown-toggle" type="button">
                                            <img src="/images/en.png?2" alt="English">English <span
                                                class="fa fa-angle-down"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-content">
                                            <li><a href="#" title="English" data-value="English"><img
                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/en.png?2"
                                                        alt="English">English</a></li>
                                            <li><a href="#" title="Arab" data-value="Arab"><img
                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/ar.png?2"
                                                        alt="Arab">Arabic</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="toplink-item checkout no__at">
                                    <div class="currency-wrapper">
                                        <label class="currency-picker__wrapper"> <select
                                                class="currency-picker" name="currencies"
                                                style="display: inline; width: auto; vertical-align: inherit;">
                                                <option value="USD" selected="selected">USD</option>
                                                <option value="EUR">EUR</option>
                                                <option value="GBP">GBP</option>
                                            </select>
                                        </label>
                                        <div class="pull-right currency-Picker">
                                            <a class="dropdown-toggle" href="#" title="USD">USD<i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="drop-left dropdown-content">
                                                <li><a href="#" title="USD" data-value="USD">USD</a></li>
                                                <li><a href="#" title="EUR" data-value="EUR">EUR</a></li>
                                                <li><a href="#" title="GBP" data-value="GBP">GBP</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-center">
                    <div class="container">
                        <div class="row">
                            <div class="navbar-logo col-lg-2 d-none d-lg-block">
                                <div class="site-header-logo title-heading" itemscope=""
                                     itemtype="http://schema.org/Organization">
                                    <a href="/" itemprop="url" class="site-header-logo-image"> <img
                                            src="images/logo_136x.png?v=1525747930"
                                            srcset="//cdn.shopify.com/s/files/1/0017/0770/4386/files/logo_136x.png?v=1525747930"
                                            alt="ss-emarket2" itemprop="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="horizontal_menu col-xl-6 col-lg-7 col-12">
                                <div id="shopify-section-ss-mainmenu" class="shopify-section">
                                    <div class="main-megamenu d-none d-lg-block">
                                        <nav class="main-wrap">
                                            <ul
                                                class="main-navigation nav hidden-tablet hidden-sm hidden-xs">
                                                <li class="ss_menu_lv1 menu_item menu_item_drop arrow active">
                                                    <a href="/" title=""> <span class="ss_megamenu_title">Home</span>
                                                    </a>
                                                    <div
                                                        class="ss_megamenu_dropdown megamenu_dropdown width-custom left "
                                                        style="width: 650px; margin-left: 0px !important;">
                                                        <div class="row">
                                                            <div class="ss_megamenu_col col-lg-12 spaceMega">
                                                                <div class="mega-page">
                                                                    <div class="feature-layout">
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-12"
                                                                                 style="text-align: center; padding: 0 10px;">
                                                                                <a href="#" class="image-link" target="_self">
                                                                                    <div class="thumbnail">
                                                                                        <img
                                                                                            class="img-responsive lazyautosizes lazyloaded"
                                                                                            data-sizes="auto"
                                                                                            src="//cdn.shopify.com/s/files/1/2644/9252/files/index1_large.jpg?v=1515750879"
                                                                                            data-src="//cdn.shopify.com/s/files/1/2644/9252/files/index1_large.jpg?v=1515750879"
                                                                                            alt="" sizes="193px"><span class="btn">View More</span>
                                                                                    </div>
                                                                                    <h3 class="caption">Home page - (Default)</h3>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-4 col-12"
                                                                                 style="text-align: center; padding: 0 10px;">
                                                                                <a href="#/?preview_theme_id=31950995522"
                                                                                   class="image-link" target="_self">
                                                                                    <div class="thumbnail">
                                                                                        <img
                                                                                            class="img-responsive lazyautosizes lazyloaded"
                                                                                            data-sizes="auto"
                                                                                            src="//cdn.shopify.com/s/files/1/2644/9252/files/index2_large.jpg?v=1515750890"
                                                                                            data-src="//cdn.shopify.com/s/files/1/2644/9252/files/index2_large.jpg?v=1515750890"
                                                                                            alt="" sizes="193px"><span class="btn">View More</span>
                                                                                    </div>
                                                                                    <h3 class="caption">Home page - Layout 2</h3>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-4 col-12"
                                                                                 style="text-align: center; padding: 0 10px;">
                                                                                <a href="#/?preview_theme_id=31956238402"
                                                                                   class="image-link" target="_self">
                                                                                    <div class="thumbnail">
                                                                                        <img
                                                                                            class="img-responsive lazyautosizes lazyloaded"
                                                                                            data-sizes="auto"
                                                                                            src="//cdn.shopify.com/s/files/1/2644/9252/files/index5_large.png?v=1516435301"
                                                                                            data-src="//cdn.shopify.com/s/files/1/2644/9252/files/index5_large.png?v=1516435301"
                                                                                            alt="" sizes="193px"><span class="btn"><span
                                                                                                class="btn">View More</span></span>
                                                                                    </div>
                                                                                    <h3 class="caption">Home page - Layout 3</h3>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-4 col-12"
                                                                                 style="text-align: center; padding: 0 10px;">
                                                                                <a href="#/?preview_theme_id=31965642818"
                                                                                   class="image-link" target="_self">
                                                                                    <div class="thumbnail">
                                                                                        <img
                                                                                            class="img-responsive lazyautosizes lazyloaded"
                                                                                            data-sizes="auto"
                                                                                            src="//cdn.shopify.com/s/files/1/2644/9252/files/index4_large.png?v=1516435294"
                                                                                            data-src="//cdn.shopify.com/s/files/1/2644/9252/files/index4_large.png?v=1516435294"
                                                                                            alt="" sizes="193px"><span class="btn"><span
                                                                                                class="btn">View More</span></span>
                                                                                    </div>
                                                                                    <h3 class="caption">Home page - Layout 4</h3>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-4 col-12"
                                                                                 style="text-align: center; padding: 0 10px;">
                                                                                <a href="#/?preview_theme_id=31998378050"
                                                                                   class="image-link" target="_self">
                                                                                    <div class="thumbnail">
                                                                                        <img
                                                                                            class="img-responsive lazyautosizes lazyloaded"
                                                                                            data-sizes="auto"
                                                                                            src="//cdn.shopify.com/s/files/1/2644/9252/files/home-5_large.jpg?v=1516613303"
                                                                                            data-src="//cdn.shopify.com/s/files/1/2644/9252/files/home-5_large.jpg?v=1516613303"
                                                                                            alt="" sizes="193px"><span class="btn"><span
                                                                                                class="btn">View More</span></span>
                                                                                    </div>
                                                                                    <h3 class="caption">Home page - Layout 5</h3>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-4 col-12"
                                                                                 style="text-align: center; padding: 0 10px;">
                                                                                <a href="#/?preview_theme_id=32004407362"
                                                                                   class="image-link" target="_self">
                                                                                    <div class="thumbnail">
                                                                                        <img
                                                                                            class="img-responsive lazyautosizes lazyloaded"
                                                                                            data-sizes="auto"
                                                                                            src="//cdn.shopify.com/s/files/1/2644/9252/files/index6_large.jpg?v=1518497869"
                                                                                            data-src="//cdn.shopify.com/s/files/1/2644/9252/files/index6_large.jpg?v=1518497869"
                                                                                            alt="" sizes="193px"><span class="btn">View More</span>
                                                                                    </div>
                                                                                    <h3 class="caption">Home page - Layout 6</h3>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-4 col-12"
                                                                                 style="text-align: center; padding: 0 10px;">
                                                                                <a href="#/?preview_theme_id=32044810306"
                                                                                   class="image-link" target="_self">
                                                                                    <div class="thumbnail">
                                                                                        <img
                                                                                            class="img-responsive lazyautosizes lazyloaded"
                                                                                            data-sizes="auto"
                                                                                            src="//cdn.shopify.com/s/files/1/2644/9252/files/04_Homepage_v4_large.jpg?v=1518495801"
                                                                                            data-src="//cdn.shopify.com/s/files/1/2644/9252/files/04_Homepage_v4_large.jpg?v=1518495801"
                                                                                            alt="" sizes="193px"><span class="btn">View More</span>
                                                                                    </div>
                                                                                    <h3 class="caption">Home page - Layout 7</h3>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-4 col-12"
                                                                                 style="text-align: center; padding: 0 10px;">
                                                                                <a href="#/?preview_theme_id=32048578626"
                                                                                   class="image-link" target="_self">
                                                                                    <div class="thumbnail">
                                                                                        <img
                                                                                            class="img-responsive lazyautosizes lazyloaded"
                                                                                            data-sizes="auto"
                                                                                            src="//cdn.shopify.com/s/files/1/2644/9252/files/rtl_large.jpg?v=1522221501"
                                                                                            data-src="//cdn.shopify.com/s/files/1/2644/9252/files/rtl_large.jpg?v=1522221501"
                                                                                            alt="" sizes="193px"><span class="btn">View More</span>
                                                                                    </div>
                                                                                    <h3 class="caption">Home page - RTL</h3>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="ss_menu_lv1 menu_item menu_item_drop arrow"><a
                                                        href="#" title=""> <span class="ss_megamenu_icon mega-new">new1</span>
                                                        <span class="ss_megamenu_title">Features</span>
                                                    </a>
                                                    <div
                                                        class="ss_megamenu_dropdown megamenu_dropdown width-custom left "
                                                        style="width: 850px; margin-left: 0px !important;">
                                                        <div class="row">
                                                            <div class="ss_megamenu_col col-lg-12 spaceMega">
                                                                <div class="mega-page">
                                                                    <div class="row shop_page">
                                                                        <div class="col-lg-3 col-12">
                                                                            <div class="megatitle" style="margin-top: 7px;">
                                                                                <a href="/collections" class="title-shoppage">
                                                                                    COLLECTION STYLES </a>
                                                                            </div>
                                                                            <ul class="tt-megamenu-submenu">
                                                                                <li><a
                                                                                        href="#/collections/frontpage/?preview_theme_id=13318586434"><span>With
                                                                                            Left Sidebar</span></a></li>
                                                                                <li><a
                                                                                        href="#/collections/frontpage/?preview_theme_id=31950995522"><span>With
                                                                                            Right Sidebar</span></a></li>
                                                                                <li><a
                                                                                        href="#/collections/frontpage/?preview_theme_id=31956238402"><span>Without
                                                                                            Sidebar and Filters</span></a></li>
                                                                                <li><a
                                                                                        href="#/collections/frontpage/?preview_theme_id=32048578626"><span>Without
                                                                                            Scrolling </span></a></li>
                                                                                <li><a
                                                                                        href="#/collections/frontpage/?preview_theme_id=32004407362"><span>Without
                                                                                            Loadmore</span></a></li>
                                                                                <li><a
                                                                                        href="#/collections/frontpage/?preview_theme_id=32051396674"><span>Collection
                                                                                            List</span></a></li>
                                                                                <li></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-lg-3 col-12">
                                                                            <div class="megatitle" style="margin-top: 7px;">
                                                                                <a href="/products/all" class="title-shoppage">
                                                                                    PRODUCT STYLES </a>
                                                                            </div>
                                                                            <ul class="tt-megamenu-submenu">
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>Product
                                                                                            Left Sidebar</span></a></li>
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=31950995522"><span>Product
                                                                                            Right Sidebar</span></a></li>
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=31956238402"><span>Product
                                                                                            Without Sidebar</span></a></li>
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=32004407362"><span>Product
                                                                                            Scroll Media</span></a></li>
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>Tabs
                                                                                            Vertical</span></a></li>
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=31950995522"><span>Tabs
                                                                                            Horizontal</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-lg-3 col-12">
                                                                            <div class="megatitle" style="margin-top: 7px;">
                                                                                <a href="/products/copy-of-cotton-linen-cardigan"
                                                                                   class="tt-title-submenu"> PRODUCT TYPES </a>
                                                                            </div>
                                                                            <ul class="tt-megamenu-submenu">
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>Simple
                                                                                            Product</span></a></li>
                                                                                <li><a
                                                                                        href="#/products/cupidatat-consec/?preview_theme_id=13318586434"><span>Varians
                                                                                            Product</span></a></li>
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=32004407362"><span>Grouped
                                                                                            Product</span></a></li>
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>New
                                                                                            Product</span></a></li>
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>Sale
                                                                                            Product</span></a></li>
                                                                                <li><a
                                                                                        href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>Sold
                                                                                            Out Product</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-lg-3 col-12">
                                                                            <div class="megatitle" style="margin-top: 7px;">
                                                                                <a href="/pages/about" class="tt-title-submenu"> PAGE
                                                                                    OTHERS </a>
                                                                            </div>
                                                                            <ul class="tt-megamenu-submenu">
                                                                                <li><a href="/cart"><span>Cart</span></a></li>
                                                                                <li><a href="/pages/track-order"><span>Track Order</span></a></li>
                                                                                <li><a href="/account/addresses"><span>Order History</span></a></li>
                                                                                <li><a href="/checkout"><span>Checkout</span></a></li>
                                                                                <li><a href="/account/login"><span>Account</span></a></li>
                                                                                <li><a href="/account/register"><span>Register</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div></li>
                                                <li class="ss_menu_lv1 menu_item menu_item_drop arrow"><a
                                                        href="/collections/frontpage" title=""> <span
                                                            class="ss_megamenu_title">Collections</span>
                                                    </a>
                                                    <div
                                                        class="ss_megamenu_dropdown megamenu_dropdown width-custom left "
                                                        style="width: 850px; margin-left: -80px !important;">
                                                        <div class="row">
                                                            <div class="ss_megamenu_col col_menu col-lg-9">
                                                                <div class="ss_inner">
                                                                    <div class="row">
                                                                        <div class="ss_megamenu_col col-md-4">
                                                                            <ul class="menulink">
                                                                                <li class="ss_megamenu_lv2 megatitle active"><a
                                                                                        href="/" title="">Tops &amp; Sets</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Tops &amp; Sets</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Blouses &amp; Shirts</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Suits &amp; Sets</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="ss_megamenu_col col-md-4">
                                                                            <ul class="menulink">
                                                                                <li class="ss_megamenu_lv2 megatitle active"><a
                                                                                        href="/" title="">Basic Jackets</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Rompers</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Tops &amp; Sets</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Jumpsuits</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="ss_megamenu_col col-md-4">
                                                                            <ul class="menulink">
                                                                                <li class="ss_megamenu_lv2 megatitle active"><a
                                                                                        href="/" title="">Dresses Prean</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Jumpsuits</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Tops &amp; Sets</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Intimates</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="ss_megamenu_col col-md-4">
                                                                            <ul class="menulink">
                                                                                <li class="ss_megamenu_lv2 megatitle active"><a
                                                                                        href="/" title="">Blouses &amp; Shirt</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Sleep &amp; Lounge</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Real Furiera</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Tops &amp; Sets</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Intimates</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="ss_megamenu_col col-md-4">
                                                                            <ul class="menulink">
                                                                                <li class="ss_megamenu_lv2 megatitle active"><a
                                                                                        href="/" title="">Suits &amp; Sets</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Tops &amp; Sets</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Wool &amp; Blends</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Real Furiera</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Basic Jackets</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="ss_megamenu_col col-md-4">
                                                                            <ul class="menulink">
                                                                                <li class="ss_megamenu_lv2 megatitle active"><a
                                                                                        href="/" title="">Accessories</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Blazers Bon</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Tops &amp; Sets</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Trending Shoes</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Real Furiera</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ss_megamenu_col col_product col-lg-3">
                                                                <div class="ss_product_mega">
                                                                    <div class="megatitle">
                                                                        <span>Featured Product</span>
                                                                    </div>
                                                                    <div class="ss_product_content products-listing grid">
                                                                        <div class="ss_inner ss-owl">
                                                                            <div class="owl-carousel owl-loaded owl-drag"
                                                                                 data-nav="false" data-dots="true" data-margin="0"
                                                                                 data-autoplay="true" data-autospeed="3333"
                                                                                 data-speed="3333" data-column1="1" data-column2="1"
                                                                                 data-column3="1" data-column4="1" data-column5="1">
                                                                                <div class="owl-stage-outer">
                                                                                    <div class="owl-stage"
                                                                                         style="width: 540px; transform: translate3d(-360px, 0px, 0px); transition: all 0.25s ease 0s;">
                                                                                        <div class="owl-item" style="width: 180px;">
                                                                                            <div class="item product-layout">
                                                                                                <div class="product-item"
                                                                                                     data-id="product-665869320258">
                                                                                                    <div
                                                                                                        class="product-item-container grid-view-item   ">
                                                                                                        <div class="left-block">
                                                                                                            <div
                                                                                                                class="product-image-container product-image">
                                                                                                                <a class="grid-view-item__link image-ajax"
                                                                                                                   href="/products/capicola-brisket"> <img
                                                                                                                        class="img-responsive s-img lazyautosizes lazyloaded"
                                                                                                                        data-sizes="auto"
                                                                                                                        src="/images/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_large_crop_center.jpg?v=1524712739"
                                                                                                                        data-src="images/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_large_crop_center.jpg?v=1524712739/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_large_crop_center.jpg?v=1524712739"
                                                                                                                        alt="Labor occaecat bee" sizes="180px">
                                                                                                                </a>
                                                                                                                <div class="box-countdown">
                                                                                                                    <div class="countdown_tab box-countdown">
                                                                                                                        <div class="countdown_inner">
                                                                                                                            <div id="665869320258">
                                                                                                                                <div class="deals-time day">
                                                                                                                                    <div class="num-time">212</div>
                                                                                                                                    <div class="title-time">days</div>
                                                                                                                                </div>
                                                                                                                                <div class="deals-time hour">
                                                                                                                                    <div class="num-time">00</div>
                                                                                                                                    <div class="title-time">hours</div>
                                                                                                                                </div>
                                                                                                                                <div class="deals-time minute">
                                                                                                                                    <div class="num-time">39</div>
                                                                                                                                    <div class="title-time">mins</div>
                                                                                                                                </div>
                                                                                                                                <div class="deals-time second">
                                                                                                                                    <div class="num-time">59</div>
                                                                                                                                    <div class="title-time">secs</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <script>
                                                                                                                        $(document).ready(function () {
                                                                                                                            //       $("#665869320258").countdown('2019/11/31', function(event) {
                                                                                                                            //         $(this).html(event.strftime('<div class="deals-time day"><div class="num-time">%D</div><div class="title-time">days</div></div> <div class="deals-time hour"><div class="num-time">%H</div> <div class="title-time">hours</div></div><div class="deals-time minute"><div class="num-time">%M</div><div class="title-time">mins</div></div><div class="deals-time second"><div class="num-time">%S</div><div class="title-time">secs</div></div>'));
                                                                                                                            // 		$(this).on('finish.countdown', function(event){ $(this).hide();});
                                                                                                                            //       });
                                                                                                                        })
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                                <ul
                                                                                                                    class="product-card__right product-card__gallery">
                                                                                                                    <li class="item-img thumb-active"
                                                                                                                        data-src="images/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_large_crop_center.jpg?v=1524712739/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517.jpg?v=1524712739">
                                                                                                                        <img class="lazyload" data-sizes="auto"
                                                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                             data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_40x40.jpg?v=1524712739"
                                                                                                                             alt="Labor occaecat bee">
                                                                                                                    </li>
                                                                                                                    <li class="item-img"
                                                                                                                        data-src="images/40_884c75a2-6d5a-4998-a94c-b1f3ead16e06.jpg?v=1524712739">
                                                                                                                        <img class="lazyload" data-sizes="auto"
                                                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                             data-src="/images/40_884c75a2-6d5a-4998-a94c-b1f3ead16e06_40x40.jpg?v=1524712739"
                                                                                                                             alt="Labor occaecat bee">
                                                                                                                    </li>
                                                                                                                    <li class="item-img"
                                                                                                                        data-src="images/37_f352473f-5db5-4461-93f6-b783ce921276.jpg?v=1524712739">
                                                                                                                        <img class="lazyload" data-sizes="auto"
                                                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                             data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/37_f352473f-5db5-4461-93f6-b783ce921276_40x40.jpg?v=1524712739"
                                                                                                                             alt="Labor occaecat bee">
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                            <span class="label-product label-new">new</span>
                                                                                                            <span class="label-product label-sale"><span
                                                                                                                    class="d-none">Sale</span> -19%</span>
                                                                                                            <div class="button-link">
                                                                                                                <div class="btn-button add-to-cart action  ">
                                                                                                                    <form action="/cart/add" method="post"
                                                                                                                          class="variants"
                                                                                                                          data-id="AddToCartForm-665869320258"
                                                                                                                          enctype="multipart/form-data">
                                                                                                                        <input type="hidden" name="id"
                                                                                                                               value="7545633931330"> <a
                                                                                                                               class="btn-addToCart grl btn_df"
                                                                                                                               href="javascript:void(0)"
                                                                                                                               title="Add to cart"><i
                                                                                                                                class="fa fa-shopping-basket"></i><span
                                                                                                                                class="hidden-xs hidden-sm hidden-md">Add
                                                                                                                                to cart</span></a>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                                <div class="quickview-button">
                                                                                                                    <a
                                                                                                                        class="quickview iframe-link d-none d-xl-block btn_df"
                                                                                                                        href="javascript:void(0)"
                                                                                                                        data-variants_id="7545633931330"
                                                                                                                        data-toggle="modal" data-target="#myModal"
                                                                                                                        data-id="capicola-brisket"
                                                                                                                        title="Quick View"><i class="fa fa-search"></i><span
                                                                                                                            class="hidden-xs hidden-sm hidden-md">Quick
                                                                                                                            View</span></a>
                                                                                                                </div>
                                                                                                                <div class="product-addto-links">
                                                                                                                    <a class="btn_df btnProduct"
                                                                                                                       href="/account/login" title="Wishlist"> <i
                                                                                                                            class="fa fa-heart"></i> <span
                                                                                                                            class="hidden-xs hidden-sm hidden-md">Wishlist</span>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="right-block">
                                                                                                            <div class="caption">
                                                                                                                <h4 class="title-product">
                                                                                                                    <a class="product-name"
                                                                                                                       href="/products/capicola-brisket">Labor
                                                                                                                        occaecat bee</a>
                                                                                                                </h4>
                                                                                                                <div class="price">
                                                                                                                    <!-- snippet/product-price.liquid -->
                                                                                                                    <span class="visually-hidden">Regular price</span>
                                                                                                                    <span class="price-new"><span class="money"
                                                                                                                                                  data-currency-usd="$34.00">$34.00</span></span>
                                                                                                                    <span class="price-old"> <span class="money"
                                                                                                                                                   data-currency-usd="$42.00">$42.00</span>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="owl-item" style="width: 180px;">
                                                                                            <div class="item product-layout">
                                                                                                <div class="product-item"
                                                                                                     data-id="product-665870336066">
                                                                                                    <div
                                                                                                        class="product-item-container grid-view-item   ">
                                                                                                        <div class="left-block">
                                                                                                            <div
                                                                                                                class="product-image-container product-image">
                                                                                                                <a class="grid-view-item__link image-ajax"
                                                                                                                   href="/products/consequat-burgdogis"> <img
                                                                                                                        class="img-responsive s-img lazyautosizes lazyloaded"
                                                                                                                        data-sizes="auto"
                                                                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/22_2ec1ae0b-097d-406b-a59e-c79db22776dc_large_crop_center.jpg?v=1524718003"
                                                                                                                        data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/22_2ec1ae0b-097d-406b-a59e-c79db22776dc_large_crop_center.jpg?v=1524718003"
                                                                                                                        alt="Repre hende labor" sizes="180px">
                                                                                                                </a>
                                                                                                                <div class="box-countdown"></div>
                                                                                                                <ul
                                                                                                                    class="product-card__right product-card__gallery">
                                                                                                                    <li class="item-img thumb-active"
                                                                                                                        data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/22_2ec1ae0b-097d-406b-a59e-c79db22776dc.jpg?v=1524718003">
                                                                                                                        <img class="lazyload" data-sizes="auto"
                                                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                             data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/22_2ec1ae0b-097d-406b-a59e-c79db22776dc_40x40.jpg?v=1524718003"
                                                                                                                             alt="Repre hende labor">
                                                                                                                    </li>
                                                                                                                    <li class="item-img"
                                                                                                                        data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/27_83c3561c-b79e-4001-8ff5-a4e5034852a2.jpg?v=1524718003">
                                                                                                                        <img class="lazyload" data-sizes="auto"
                                                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                             data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/27_83c3561c-b79e-4001-8ff5-a4e5034852a2_40x40.jpg?v=1524718003"
                                                                                                                             alt="Repre hende labor">
                                                                                                                    </li>
                                                                                                                    <li class="item-img"
                                                                                                                        data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/20_1042d60c-6db8-4f78-833a-8c5af8256b9c.jpg?v=1524718003">
                                                                                                                        <img class="lazyload" data-sizes="auto"
                                                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                             data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/20_1042d60c-6db8-4f78-833a-8c5af8256b9c_40x40.jpg?v=1524718003"
                                                                                                                             alt="Repre hende labor">
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                            <span class="label-product label-sale"><span
                                                                                                                    class="d-none">Sale</span> -26%</span>
                                                                                                            <div class="button-link">
                                                                                                                <div class="btn-button add-to-cart action  ">
                                                                                                                    <form action="/cart/add" method="post"
                                                                                                                          class="variants"
                                                                                                                          data-id="AddToCartForm-665870336066"
                                                                                                                          enctype="multipart/form-data">
                                                                                                                        <input type="hidden" name="id"
                                                                                                                               value="7545641271362"> <a
                                                                                                                               class="btn-addToCart grl btn_df"
                                                                                                                               href="javascript:void(0)"
                                                                                                                               title="Add to cart"><i
                                                                                                                                class="fa fa-shopping-basket"></i><span
                                                                                                                                class="hidden-xs hidden-sm hidden-md">Add
                                                                                                                                to cart</span></a>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                                <div class="quickview-button">
                                                                                                                    <a
                                                                                                                        class="quickview iframe-link d-none d-xl-block btn_df"
                                                                                                                        href="javascript:void(0)"
                                                                                                                        data-variants_id="7545641271362"
                                                                                                                        data-toggle="modal" data-target="#myModal"
                                                                                                                        data-id="consequat-burgdogis"
                                                                                                                        title="Quick View"><i class="fa fa-search"></i><span
                                                                                                                            class="hidden-xs hidden-sm hidden-md">Quick
                                                                                                                            View</span></a>
                                                                                                                </div>
                                                                                                                <div class="product-addto-links">
                                                                                                                    <a class="btn_df btnProduct"
                                                                                                                       href="/account/login" title="Wishlist"> <i
                                                                                                                            class="fa fa-heart"></i> <span
                                                                                                                            class="hidden-xs hidden-sm hidden-md">Wishlist</span>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="right-block">
                                                                                                            <div class="caption">
                                                                                                                <h4 class="title-product">
                                                                                                                    <a class="product-name"
                                                                                                                       href="/products/consequat-burgdogis">Repre
                                                                                                                        hende labor</a>
                                                                                                                </h4>
                                                                                                                <div class="price">
                                                                                                                    <!-- snippet/product-price.liquid -->
                                                                                                                    <span class="visually-hidden">Regular price</span>
                                                                                                                    <span class="price-new"><span class="money"
                                                                                                                                                  data-currency-usd="$31.00">$31.00</span></span>
                                                                                                                    <span class="price-old"> <span class="money"
                                                                                                                                                   data-currency-usd="$42.00">$42.00</span>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="owl-item active" style="width: 180px;">
                                                                                            <div class="item product-layout">
                                                                                                <div class="product-item"
                                                                                                     data-id="product-665870860354">
                                                                                                    <div
                                                                                                        class="product-item-container grid-view-item   ">
                                                                                                        <div class="left-block">
                                                                                                            <div
                                                                                                                class="product-image-container product-image">
                                                                                                                <a class="grid-view-item__link image-ajax"
                                                                                                                   href="/products/aliquip-sintfugia"> <img
                                                                                                                        class="img-responsive s-img lazyautosizes lazyloaded"
                                                                                                                        data-sizes="auto"
                                                                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf_large_crop_center.jpg?v=1524718937"
                                                                                                                        data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf_large_crop_center.jpg?v=1524718937"
                                                                                                                        alt="Short ribs shank pork" sizes="180px">
                                                                                                                </a>
                                                                                                                <div class="box-countdown">
                                                                                                                    <div class="countdown_tab box-countdown">
                                                                                                                        <div class="countdown_inner">
                                                                                                                            <div id="665870860354"
                                                                                                                                 style="display: none;">
                                                                                                                                <div class="deals-time day">
                                                                                                                                    <div class="num-time">00</div>
                                                                                                                                    <div class="title-time">days</div>
                                                                                                                                </div>
                                                                                                                                <div class="deals-time hour">
                                                                                                                                    <div class="num-time">00</div>
                                                                                                                                    <div class="title-time">hours</div>
                                                                                                                                </div>
                                                                                                                                <div class="deals-time minute">
                                                                                                                                    <div class="num-time">00</div>
                                                                                                                                    <div class="title-time">mins</div>
                                                                                                                                </div>
                                                                                                                                <div class="deals-time second">
                                                                                                                                    <div class="num-time">00</div>
                                                                                                                                    <div class="title-time">secs</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <script>
                                                                                                                        $(document).ready(function () {
                                                                                                                            //       $("#665870860354").countdown('2019/02/22', function(event) {
                                                                                                                            //         $(this).html(event.strftime('<div class="deals-time day"><div class="num-time">%D</div><div class="title-time">days</div></div> <div class="deals-time hour"><div class="num-time">%H</div> <div class="title-time">hours</div></div><div class="deals-time minute"><div class="num-time">%M</div><div class="title-time">mins</div></div><div class="deals-time second"><div class="num-time">%S</div><div class="title-time">secs</div></div>'));
                                                                                                                            // 		$(this).on('finish.countdown', function(event){ $(this).hide();});
                                                                                                                            //       });
                                                                                                                        })
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                                <ul
                                                                                                                    class="product-card__right product-card__gallery">
                                                                                                                    <li class="item-img thumb-active"
                                                                                                                        data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf.jpg?v=1524718937">
                                                                                                                        <img class="lazyload" data-sizes="auto"
                                                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                             data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf_40x40.jpg?v=1524718937"
                                                                                                                             alt="Short ribs shank pork">
                                                                                                                    </li>
                                                                                                                    <li class="item-img"
                                                                                                                        data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/41_4bbf7a78-b6bd-4f06-8402-3536b1930632.jpg?v=1524718937">
                                                                                                                        <img class="lazyload" data-sizes="auto"
                                                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                             data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/41_4bbf7a78-b6bd-4f06-8402-3536b1930632_40x40.jpg?v=1524718937"
                                                                                                                             alt="Short ribs shank pork">
                                                                                                                    </li>
                                                                                                                    <li class="item-img"
                                                                                                                        data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/46_0022741a-2958-4c73-a5e2-01fd4715f84b.jpg?v=1524718937">
                                                                                                                        <img class="lazyload" data-sizes="auto"
                                                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                             data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/46_0022741a-2958-4c73-a5e2-01fd4715f84b_40x40.jpg?v=1524718937"
                                                                                                                             alt="Short ribs shank pork">
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                            <span class="label-product label-new">new</span>
                                                                                                            <span class="label-product label-sale"><span
                                                                                                                    class="d-none">Sale</span> -18%</span>
                                                                                                            <div class="button-link">
                                                                                                                <div class="btn-button add-to-cart action  ">
                                                                                                                    <form action="/cart/add" method="post"
                                                                                                                          class="variants"
                                                                                                                          data-id="AddToCartForm-665870860354"
                                                                                                                          enctype="multipart/form-data">
                                                                                                                        <input type="hidden" name="id"
                                                                                                                               value="7545645727810"> <a
                                                                                                                               class="btn-addToCart grl btn_df"
                                                                                                                               href="javascript:void(0)"
                                                                                                                               title="Add to cart"><i
                                                                                                                                class="fa fa-shopping-basket"></i><span
                                                                                                                                class="hidden-xs hidden-sm hidden-md">Add
                                                                                                                                to cart</span></a>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                                <div class="quickview-button">
                                                                                                                    <a
                                                                                                                        class="quickview iframe-link d-none d-xl-block btn_df"
                                                                                                                        href="javascript:void(0)"
                                                                                                                        data-variants_id="7545645727810"
                                                                                                                        data-toggle="modal" data-target="#myModal"
                                                                                                                        data-id="aliquip-sintfugia"
                                                                                                                        title="Quick View"><i class="fa fa-search"></i><span
                                                                                                                            class="hidden-xs hidden-sm hidden-md">Quick
                                                                                                                            View</span></a>
                                                                                                                </div>
                                                                                                                <div class="product-addto-links">
                                                                                                                    <a class="btn_df btnProduct"
                                                                                                                       href="/account/login" title="Wishlist"> <i
                                                                                                                            class="fa fa-heart"></i> <span
                                                                                                                            class="hidden-xs hidden-sm hidden-md">Wishlist</span>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="right-block">
                                                                                                            <div class="caption">
                                                                                                                <h4 class="title-product">
                                                                                                                    <a class="product-name"
                                                                                                                       href="/products/aliquip-sintfugia">Short
                                                                                                                        ribs shank pork</a>
                                                                                                                </h4>
                                                                                                                <div class="price">
                                                                                                                    <!-- snippet/product-price.liquid -->
                                                                                                                    <span class="visually-hidden">Regular price</span>
                                                                                                                    <span class="price-new"><span class="money"
                                                                                                                                                  data-currency-usd="$126.00">$126.00</span></span>
                                                                                                                    <span class="price-old"> <span class="money"
                                                                                                                                                   data-currency-usd="$154.00">$154.00</span>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="owl-nav disabled">
                                                                                    <div class="owl-prev">
                                                                                        <i class="fa fa-angle-left"></i>
                                                                                    </div>
                                                                                    <div class="owl-next">
                                                                                        <i class="fa fa-angle-right"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="owl-dots">
                                                                                    <div class="owl-dot">
                                                                                        <span></span>
                                                                                    </div>
                                                                                    <div class="owl-dot">
                                                                                        <span></span>
                                                                                    </div>
                                                                                    <div class="owl-dot active">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div></li>
                                                <li class="ss_menu_lv1 menu_item menu_item_drop arrow"><a
                                                        href="/collections/furniture" title=""> <span
                                                            class="ss_megamenu_title">Shop</span>
                                                    </a>
                                                    <div
                                                        class="ss_megamenu_dropdown megamenu_dropdown width-custom left "
                                                        style="width: 840px; margin-left: 0 !important;">
                                                        <div class="row">
                                                            <div class="ss_megamenu_col col_menu col-lg-12">
                                                                <div class="ss_inner">
                                                                    <div class="row">
                                                                        <div class="ss_megamenu_col col-md-3">
                                                                            <ul class="menulink">
                                                                                <li class="ss_megamenu_lv2 megatitle"><a
                                                                                        href="/collections/ellectronic" title="">Electronics</a>
                                                                                </li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Laptop &amp; Accessories</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Storage &amp; External Drives</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Mainboards, CPUs</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Networking &amp; Wireless</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="ss_megamenu_col col-md-3">
                                                                            <ul class="menulink">
                                                                                <li class="ss_megamenu_lv2 megatitle"><a
                                                                                        href="/collections/tablets-phones" title="">Tablets
                                                                                        &amp; Phones</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Power Banks</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Memory Cards</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Destop &amp; Sicurity</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Memory Cards</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="ss_megamenu_col col-md-3">
                                                                            <ul class="menulink">
                                                                                <li class="ss_megamenu_lv2 megatitle"><a
                                                                                        href="/collections/phones-accessories" title="">Phones
                                                                                        &amp; Accessories</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Mobile Accessories</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Headphones/Headsets</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Cases &amp; Covers</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Watches &amp; Access</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="ss_megamenu_col col-md-3">
                                                                            <ul class="menulink">
                                                                                <li class="ss_megamenu_lv2 megatitle"><a
                                                                                        href="/collections/desktop-pc" title="">Computers</a>
                                                                                </li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Watches &amp; Access</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Printers, Scanners</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Networking</a></li>
                                                                                <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                      title="">Macbooks &amp; iMacs</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="ss_megamenu_col col_banner banner_1 col-lg-4 spaceMega">
                                                                <div class="first">
                                                                    <img class="img-responsive lazyautosizes lazyloaded"
                                                                         data-sizes="auto"
                                                                         src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/mega-bn1.png?v=1525322644"
                                                                         alt="ss-emarket2"
                                                                         data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/mega-bn1.png?v=1525322644"
                                                                         sizes="40px">
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="ss_megamenu_col col_banner banner_2 col-lg-4 spaceMega">
                                                                <div class="first">
                                                                    <a href="/collections/tablets-phones"> <img
                                                                            class="img-responsive lazyautosizes lazyloaded"
                                                                            data-sizes="auto"
                                                                            src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/mega-bn2.png?v=1525322648"
                                                                            alt="ss-emarket2"
                                                                            data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/mega-bn2.png?v=1525322648"
                                                                            sizes="40px">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="ss_megamenu_col col_banner banner_3 col-lg-4 spaceMega">
                                                                <div class="first">
                                                                    <a href="/collections/furniture"> <img
                                                                            class="img-responsive lazyautosizes lazyloaded"
                                                                            data-sizes="auto"
                                                                            src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/Untitled-1.jpg?v=1525340533"
                                                                            alt="ss-emarket2"
                                                                            data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/Untitled-1.jpg?v=1525340533"
                                                                            sizes="40px">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div></li>
                                                <li
                                                    class="ss_menu_lv1 menu_item menu_item_drop menu_item_css arrow">
                                                    <a href="/pages/deals" class="ss_megamenu_head" title=""> <span
                                                            class="ss_megamenu_icon mega-hot">hot</span> <span
                                                            class="ss_megamenu_title">Pages</span> <span
                                                            class="visually-hidden">expand</span>
                                                    </a>
                                                    <ul class="ss_megamenu_dropdown dropdown_lv1">
                                                        <li class="ss_megamenu_lv2 menu_item_drop"><a
                                                                href="/pages/about" class="" title="">About Us</a>
                                                            <ul class="ss_megamenu_dropdown dropdown_lv2">
                                                                <li class="ss_megamenu_lv3"><a href="/pages/about"
                                                                                               title="">Demo 1</a></li>
                                                                <li class="ss_megamenu_lv3 active"><a href="/" title="">Demo
                                                                        2</a></li>
                                                            </ul></li>
                                                        <li class="ss_megamenu_lv2 "><a href="/pages/contact"
                                                                                        title="">Contact Us</a></li>
                                                        <li class="ss_megamenu_lv2 "><a href="/pages/deals"
                                                                                        title="">Pages Deals</a></li>
                                                        <li class="ss_megamenu_lv2 "><a href="/pages/faqs" title="">Faqs</a>
                                                        </li>
                                                        <li class="ss_megamenu_lv2 "><a href="/pages/support-24-7"
                                                                                        title="">Support 24/7</a></li>
                                                        <li class="ss_megamenu_lv2 "><a href="/pages/photo-gallery"
                                                                                        title="">Photo gallery</a></li>
                                                    </ul>
                                                </li>
                                                <li
                                                    class="ss_menu_lv1 menu_item menu_item_drop menu_item_css arrow">
                                                    <a href="/blogs/news" class="ss_megamenu_head" title=""> <span
                                                            class="ss_megamenu_title">Blog</span> <span
                                                            class="visually-hidden">expand</span>
                                                    </a>
                                                    <ul class="ss_megamenu_dropdown dropdown_lv1">
                                                        <li class="ss_megamenu_lv2 menu_item_drop"><a
                                                                href="#/blogs/news/?preview_theme_id=32004407362" class=""
                                                                title="">Blog Without Sidebar</a>
                                                            <ul class="ss_megamenu_dropdown dropdown_lv2">
                                                                <li class="ss_megamenu_lv3"><a
                                                                        href="#/blogs/news/?preview_theme_id=31965642818"
                                                                        title="">Blog 1 column</a></li>
                                                                <li class="ss_megamenu_lv3"><a
                                                                        href="#/blogs/news/?preview_theme_id=31965642818"
                                                                        title="">Blog 2 column</a></li>
                                                                <li class="ss_megamenu_lv3"><a
                                                                        href="#/blogs/news/?preview_theme_id=13318586434"
                                                                        title="">Blog 3 column</a></li>
                                                                <li class="ss_megamenu_lv3"><a
                                                                        href="#/blogs/news/?preview_theme_id=32004407362"
                                                                        title="">Blog 4 column</a></li>
                                                            </ul></li>
                                                        <li class="ss_megamenu_lv2 "><a
                                                                href="#/blogs/news/?preview_theme_id=13318586434" title="">Blog
                                                                With Left Sidebar</a></li>
                                                        <li class="ss_megamenu_lv2 "><a
                                                                href="#/blogs/news/?preview_theme_id=31950995522" title="">Blog
                                                                With Right Sidebar</a></li>
                                                        <li class="ss_megamenu_lv2 "><a
                                                                href="#/blogs/news/heard-of-shopify/?preview_theme_id=31956238402"
                                                                title="">Article Without Sidebar</a></li>
                                                        <li class="ss_megamenu_lv2 "><a
                                                                href="#/blogs/news/heard-of-shopify/?preview_theme_id=13318586434"
                                                                title="">Article With Left Sidebar</a></li>
                                                        <li class="ss_megamenu_lv2 "><a
                                                                href="#/blogs/news/heard-of-shopify/?preview_theme_id=31950995522"
                                                                title="">Article With Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="navigation-mobile mobile-menu d-block d-lg-none">
                                        <div class="logo-nav">
                                            <a href="/" class="site-header-logo-image"> <img
                                                    src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/logo_161x.png?v=1525747930"
                                                    srcset="//cdn.shopify.com/s/files/1/0017/0770/4386/files/logo_161x.png?v=1525747930"
                                                    alt="ss-emarket2" itemprop="logo">
                                            </a>
                                            <div class="menu-remove">
                                                <div class="close-megamenu">
                                                    <i class="material-icons">clear</i>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="site_nav_mobile active_mobile">
                                            <li class="menu-item toggle-menu active "><a href="/" title=""
                                                                                         class="ss_megamenu_title"> Home <span class="caret"><i
                                                            class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                </a>
                                                <div class="sub-menu">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12">
                                                            <div class="mega-page">
                                                                <div class="feature-layout">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-12"
                                                                             style="text-align: center; padding: 0 10px;">
                                                                            <a href="#/?preview_theme_id=13318586434"
                                                                               class="image-link" target="_self">
                                                                                <div class="thumbnail">
                                                                                    <img class="img-responsive lazyload"
                                                                                         data-sizes="auto"
                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                         data-src="//cdn.shopify.com/s/files/1/2644/9252/files/index1_large.jpg?v=1515750879"
                                                                                         alt=""><span class="btn">View More</span>
                                                                                </div>
                                                                                <h3 class="caption">Home page - (Default)</h3>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12"
                                                                             style="text-align: center; padding: 0 10px;">
                                                                            <a href="#/?preview_theme_id=31950995522"
                                                                               class="image-link" target="_self">
                                                                                <div class="thumbnail">
                                                                                    <img class="img-responsive lazyload"
                                                                                         data-sizes="auto"
                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                         data-src="//cdn.shopify.com/s/files/1/2644/9252/files/index2_large.jpg?v=1515750890"
                                                                                         alt=""><span class="btn">View More</span>
                                                                                </div>
                                                                                <h3 class="caption">Home page - Layout 2</h3>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12"
                                                                             style="text-align: center; padding: 0 10px;">
                                                                            <a href="#/?preview_theme_id=31956238402"
                                                                               class="image-link" target="_self">
                                                                                <div class="thumbnail">
                                                                                    <img class="img-responsive lazyload"
                                                                                         data-sizes="auto"
                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                         data-src="//cdn.shopify.com/s/files/1/2644/9252/files/index5_large.png?v=1516435301"
                                                                                         alt=""><span class="btn"><span class="btn">View
                                                                                            More</span></span>
                                                                                </div>
                                                                                <h3 class="caption">Home page - Layout 3</h3>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12"
                                                                             style="text-align: center; padding: 0 10px;">
                                                                            <a href="#/?preview_theme_id=31965642818"
                                                                               class="image-link" target="_self">
                                                                                <div class="thumbnail">
                                                                                    <img class="img-responsive lazyload"
                                                                                         data-sizes="auto"
                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                         data-src="//cdn.shopify.com/s/files/1/2644/9252/files/index4_large.png?v=1516435294"
                                                                                         alt=""><span class="btn"><span class="btn">View
                                                                                            More</span></span>
                                                                                </div>
                                                                                <h3 class="caption">Home page - Layout 4</h3>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12"
                                                                             style="text-align: center; padding: 0 10px;">
                                                                            <a href="#/?preview_theme_id=31998378050"
                                                                               class="image-link" target="_self">
                                                                                <div class="thumbnail">
                                                                                    <img class="img-responsive lazyload"
                                                                                         data-sizes="auto"
                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                         data-src="//cdn.shopify.com/s/files/1/2644/9252/files/home-5_large.jpg?v=1516613303"
                                                                                         alt=""><span class="btn"><span class="btn">View
                                                                                            More</span></span>
                                                                                </div>
                                                                                <h3 class="caption">Home page - Layout 5</h3>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12"
                                                                             style="text-align: center; padding: 0 10px;">
                                                                            <a href="#/?preview_theme_id=32004407362"
                                                                               class="image-link" target="_self">
                                                                                <div class="thumbnail">
                                                                                    <img class="img-responsive lazyload"
                                                                                         data-sizes="auto"
                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                         data-src="//cdn.shopify.com/s/files/1/2644/9252/files/index6_large.jpg?v=1518497869"
                                                                                         alt=""><span class="btn">View More</span>
                                                                                </div>
                                                                                <h3 class="caption">Home page - Layout 6</h3>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12"
                                                                             style="text-align: center; padding: 0 10px;">
                                                                            <a href="#/?preview_theme_id=32044810306"
                                                                               class="image-link" target="_self">
                                                                                <div class="thumbnail">
                                                                                    <img class="img-responsive lazyload"
                                                                                         data-sizes="auto"
                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                         data-src="//cdn.shopify.com/s/files/1/2644/9252/files/04_Homepage_v4_large.jpg?v=1518495801"
                                                                                         alt=""><span class="btn">View More</span>
                                                                                </div>
                                                                                <h3 class="caption">Home page - Layout 7</h3>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12"
                                                                             style="text-align: center; padding: 0 10px;">
                                                                            <a href="#/?preview_theme_id=32048578626"
                                                                               class="image-link" target="_self">
                                                                                <div class="thumbnail">
                                                                                    <img class="img-responsive lazyload"
                                                                                         data-sizes="auto"
                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                         data-src="//cdn.shopify.com/s/files/1/2644/9252/files/rtl_large.jpg?v=1522221501"
                                                                                         alt=""><span class="btn">View More</span>
                                                                                </div>
                                                                                <h3 class="caption">Home page - RTL</h3>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div></li>
                                            <li class="menu-item toggle-menu "><a href="#" title=""
                                                                                  class="ss_megamenu_title"> Features <span class="caret"><i
                                                            class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                </a>
                                                <div class="sub-menu">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12">
                                                            <div class="mega-page">
                                                                <div class="row shop_page">
                                                                    <div class="col-lg-3 col-12">
                                                                        <div class="megatitle" style="margin-top: 7px;">
                                                                            <a href="/collections" class="title-shoppage">
                                                                                COLLECTION STYLES </a>
                                                                        </div>
                                                                        <ul class="tt-megamenu-submenu">
                                                                            <li><a
                                                                                    href="#/collections/frontpage/?preview_theme_id=13318586434"><span>With
                                                                                        Left Sidebar</span></a></li>
                                                                            <li><a
                                                                                    href="#/collections/frontpage/?preview_theme_id=31950995522"><span>With
                                                                                        Right Sidebar</span></a></li>
                                                                            <li><a
                                                                                    href="#/collections/frontpage/?preview_theme_id=31956238402"><span>Without
                                                                                        Sidebar and Filters</span></a></li>
                                                                            <li><a
                                                                                    href="#/collections/frontpage/?preview_theme_id=32048578626"><span>Without
                                                                                        Scrolling </span></a></li>
                                                                            <li><a
                                                                                    href="#/collections/frontpage/?preview_theme_id=32004407362"><span>Without
                                                                                        Loadmore</span></a></li>
                                                                            <li><a
                                                                                    href="#/collections/frontpage/?preview_theme_id=32051396674"><span>Collection
                                                                                        List</span></a></li>
                                                                            <li></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-3 col-12">
                                                                        <div class="megatitle" style="margin-top: 7px;">
                                                                            <a href="/products/all" class="title-shoppage">
                                                                                PRODUCT STYLES </a>
                                                                        </div>
                                                                        <ul class="tt-megamenu-submenu">
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>Product
                                                                                        Left Sidebar</span></a></li>
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=31950995522"><span>Product
                                                                                        Right Sidebar</span></a></li>
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=31956238402"><span>Product
                                                                                        Without Sidebar</span></a></li>
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=32004407362"><span>Product
                                                                                        Scroll Media</span></a></li>
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>Tabs
                                                                                        Vertical</span></a></li>
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=31950995522"><span>Tabs
                                                                                        Horizontal</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-3 col-12">
                                                                        <div class="megatitle" style="margin-top: 7px;">
                                                                            <a href="/products/copy-of-cotton-linen-cardigan"
                                                                               class="tt-title-submenu"> PRODUCT TYPES </a>
                                                                        </div>
                                                                        <ul class="tt-megamenu-submenu">
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>Simple
                                                                                        Product</span></a></li>
                                                                            <li><a
                                                                                    href="#/products/cupidatat-consec/?preview_theme_id=13318586434"><span>Varians
                                                                                        Product</span></a></li>
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=32004407362"><span>Grouped
                                                                                        Product</span></a></li>
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>New
                                                                                        Product</span></a></li>
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>Sale
                                                                                        Product</span></a></li>
                                                                            <li><a
                                                                                    href="#/products/capicola-drumstic/?preview_theme_id=13318586434"><span>Sold
                                                                                        Out Product</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-3 col-12">
                                                                        <div class="megatitle" style="margin-top: 7px;">
                                                                            <a href="/pages/about" class="tt-title-submenu"> PAGE
                                                                                OTHERS </a>
                                                                        </div>
                                                                        <ul class="tt-megamenu-submenu">
                                                                            <li><a href="/cart"><span>Cart</span></a></li>
                                                                            <li><a href="/pages/track-order"><span>Track Order</span></a></li>
                                                                            <li><a href="/account/addresses"><span>Order History</span></a></li>
                                                                            <li><a href="/checkout"><span>Checkout</span></a></li>
                                                                            <li><a href="/account/login"><span>Account</span></a></li>
                                                                            <li><a href="/account/register"><span>Register</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div></li>
                                            <li class="menu-item toggle-menu "><a
                                                    href="/collections/frontpage" title=""
                                                    class="ss_megamenu_title"> Collections <span class="caret"><i
                                                            class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                </a>
                                                <div class="sub-menu">
                                                    <div class="row">
                                                        <div class="col-lg-9 col-12 spaceMega">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a class="megatitle active" href="/" title=""> Tops
                                                                        &amp; Sets<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item active"><a href="/" title="">Tops
                                                                                &amp; Sets</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Blouses
                                                                                &amp; Shirts</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Suits
                                                                                &amp; Sets</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a class="megatitle active" href="/" title=""> Basic
                                                                        Jackets<span class="caret"><i class="fa fa-angle-down"
                                                                                                      aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item active"><a href="/" title="">Rompers</a>
                                                                        </li>
                                                                        <li class="menu-item active"><a href="/" title="">Tops
                                                                                &amp; Sets</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Jumpsuits</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a class="megatitle active" href="/" title=""> Dresses
                                                                        Prean<span class="caret"><i class="fa fa-angle-down"
                                                                                                    aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item active"><a href="/" title="">Jumpsuits</a>
                                                                        </li>
                                                                        <li class="menu-item active"><a href="/" title="">Tops
                                                                                &amp; Sets</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Intimates</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a class="megatitle active" href="/" title=""> Blouses
                                                                        &amp; Shirt<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item active"><a href="/" title="">Sleep
                                                                                &amp; Lounge</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Real
                                                                                Furiera</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Tops
                                                                                &amp; Sets</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Intimates</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a class="megatitle active" href="/" title=""> Suits
                                                                        &amp; Sets<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item active"><a href="/" title="">Tops
                                                                                &amp; Sets</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Wool
                                                                                &amp; Blends</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Real
                                                                                Furiera</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Basic
                                                                                Jackets</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a class="megatitle active" href="/" title="">
                                                                        Accessories<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item active"><a href="/" title="">Blazers
                                                                                Bon</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Tops
                                                                                &amp; Sets</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Trending
                                                                                Shoes</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Real
                                                                                Furiera</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ss_megamenu_col col-lg-3 col-12 spaceMega">
                                                            <div class="ss_product_mega">
                                                                <div class="megatitle">
                                                                    <span>Featured Product</span>
                                                                </div>
                                                                <div class="ss_product_content products-listing grid">
                                                                    <div class="ss_inner ss-owl">
                                                                        <div class="owl-carousel owl-loaded owl-drag"
                                                                             data-nav="false" data-dots="true" data-margin="0"
                                                                             data-autoplay="true" data-autospeed="3333"
                                                                             data-speed="3333" data-column1="1" data-column2="1"
                                                                             data-column3="1" data-column4="1" data-column5="1">
                                                                            <div class="owl-stage-outer">
                                                                                <div class="owl-stage"
                                                                                     style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                                                                                    <div class="owl-item">
                                                                                        <div class="item product-layout">
                                                                                            <div class="product-item"
                                                                                                 data-id="product-665869320258">
                                                                                                <div
                                                                                                    class="product-item-container grid-view-item   ">
                                                                                                    <div class="left-block">
                                                                                                        <div
                                                                                                            class="product-image-container product-image">
                                                                                                            <a class="grid-view-item__link image-ajax"
                                                                                                               href="/products/capicola-brisket"> <img
                                                                                                                    class="img-responsive s-img lazyload"
                                                                                                                    data-sizes="auto"
                                                                                                                    src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/icon-loadings.svg?2"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_161x_crop_center.jpg?v=1524712739"
                                                                                                                    alt="Labor occaecat bee">
                                                                                                            </a>
                                                                                                            <div class="box-countdown">
                                                                                                                <div class="countdown_tab box-countdown">
                                                                                                                    <div class="countdown_inner">
                                                                                                                        <div id="665869320258"></div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <script>
                                                                                                                    $(document).ready(function () {
                                                                                                                        //       $("#665869320258").countdown('2019/11/31', function(event) {
                                                                                                                        //         $(this).html(event.strftime('<div class="deals-time day"><div class="num-time">%D</div><div class="title-time">days</div></div> <div class="deals-time hour"><div class="num-time">%H</div> <div class="title-time">hours</div></div><div class="deals-time minute"><div class="num-time">%M</div><div class="title-time">mins</div></div><div class="deals-time second"><div class="num-time">%S</div><div class="title-time">secs</div></div>'));
                                                                                                                        // 		$(this).on('finish.countdown', function(event){ $(this).hide();});
                                                                                                                        //       });
                                                                                                                    })
                                                                                                                </script>
                                                                                                            </div>
                                                                                                            <ul
                                                                                                                class="product-card__right product-card__gallery">
                                                                                                                <li class="item-img thumb-active"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517.jpg?v=1524712739">
                                                                                                                    <img class="lazyload" data-sizes="auto"
                                                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                         data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/42_6a728b1a-e67d-4f8f-919f-70ddf28b5517_40x40.jpg?v=1524712739"
                                                                                                                         alt="Labor occaecat bee">
                                                                                                                </li>
                                                                                                                <li class="item-img"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/40_884c75a2-6d5a-4998-a94c-b1f3ead16e06.jpg?v=1524712739">
                                                                                                                    <img class="lazyload" data-sizes="auto"
                                                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                         data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/40_884c75a2-6d5a-4998-a94c-b1f3ead16e06_40x40.jpg?v=1524712739"
                                                                                                                         alt="Labor occaecat bee">
                                                                                                                </li>
                                                                                                                <li class="item-img"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/37_f352473f-5db5-4461-93f6-b783ce921276.jpg?v=1524712739">
                                                                                                                    <img class="lazyload" data-sizes="auto"
                                                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                         data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/37_f352473f-5db5-4461-93f6-b783ce921276_40x40.jpg?v=1524712739"
                                                                                                                         alt="Labor occaecat bee">
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                        <span class="label-product label-new">new</span>
                                                                                                        <span class="label-product label-sale"><span
                                                                                                                class="d-none">Sale</span> -19%</span>
                                                                                                        <div class="button-link">
                                                                                                            <div class="btn-button add-to-cart action  ">
                                                                                                                <form action="/cart/add" method="post"
                                                                                                                      class="variants"
                                                                                                                      data-id="AddToCartForm-665869320258"
                                                                                                                      enctype="multipart/form-data">
                                                                                                                    <input type="hidden" name="id"
                                                                                                                           value="7545633931330"> <a
                                                                                                                           class="btn-addToCart grl btn_df"
                                                                                                                           href="javascript:void(0)"
                                                                                                                           title="Add to cart"><i
                                                                                                                            class="fa fa-shopping-basket"></i><span
                                                                                                                            class="hidden-xs hidden-sm hidden-md">Add
                                                                                                                            to cart</span></a>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                            <div class="quickview-button">
                                                                                                                <a
                                                                                                                    class="quickview iframe-link d-none d-xl-block btn_df"
                                                                                                                    href="javascript:void(0)"
                                                                                                                    data-variants_id="7545633931330"
                                                                                                                    data-toggle="modal" data-target="#myModal"
                                                                                                                    data-id="capicola-brisket"
                                                                                                                    title="Quick View"><i class="fa fa-search"></i><span
                                                                                                                        class="hidden-xs hidden-sm hidden-md">Quick
                                                                                                                        View</span></a>
                                                                                                            </div>
                                                                                                            <div class="product-addto-links">
                                                                                                                <a class="btn_df btnProduct"
                                                                                                                   href="/account/login" title="Wishlist"> <i
                                                                                                                        class="fa fa-heart"></i> <span
                                                                                                                        class="hidden-xs hidden-sm hidden-md">Wishlist</span>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="right-block">
                                                                                                        <div class="caption">
                                                                                                            <h4 class="title-product">
                                                                                                                <a class="product-name"
                                                                                                                   href="/products/capicola-brisket">Labor
                                                                                                                    occaecat bee</a>
                                                                                                            </h4>
                                                                                                            <div class="price">
                                                                                                                <!-- snippet/product-price.liquid -->
                                                                                                                <span class="visually-hidden">Regular price</span>
                                                                                                                <span class="price-new"><span class="money"
                                                                                                                                              data-currency-usd="$34.00">$34.00</span></span>
                                                                                                                <span class="price-old"> <span class="money"
                                                                                                                                               data-currency-usd="$42.00">$42.00</span>
                                                                                                                </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="owl-item">
                                                                                        <div class="item product-layout">
                                                                                            <div class="product-item"
                                                                                                 data-id="product-665870336066">
                                                                                                <div
                                                                                                    class="product-item-container grid-view-item   ">
                                                                                                    <div class="left-block">
                                                                                                        <div
                                                                                                            class="product-image-container product-image">
                                                                                                            <a class="grid-view-item__link image-ajax"
                                                                                                               href="/products/consequat-burgdogis"> <img
                                                                                                                    class="img-responsive s-img lazyload"
                                                                                                                    data-sizes="auto"
                                                                                                                    src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/icon-loadings.svg?2"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/22_2ec1ae0b-097d-406b-a59e-c79db22776dc_161x_crop_center.jpg?v=1524718003"
                                                                                                                    alt="Repre hende labor">
                                                                                                            </a>
                                                                                                            <div class="box-countdown"></div>
                                                                                                            <ul
                                                                                                                class="product-card__right product-card__gallery">
                                                                                                                <li class="item-img thumb-active"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/22_2ec1ae0b-097d-406b-a59e-c79db22776dc.jpg?v=1524718003">
                                                                                                                    <img class="lazyload" data-sizes="auto"
                                                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                         data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/22_2ec1ae0b-097d-406b-a59e-c79db22776dc_40x40.jpg?v=1524718003"
                                                                                                                         alt="Repre hende labor">
                                                                                                                </li>
                                                                                                                <li class="item-img"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/27_83c3561c-b79e-4001-8ff5-a4e5034852a2.jpg?v=1524718003">
                                                                                                                    <img class="lazyload" data-sizes="auto"
                                                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                         data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/27_83c3561c-b79e-4001-8ff5-a4e5034852a2_40x40.jpg?v=1524718003"
                                                                                                                         alt="Repre hende labor">
                                                                                                                </li>
                                                                                                                <li class="item-img"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/20_1042d60c-6db8-4f78-833a-8c5af8256b9c.jpg?v=1524718003">
                                                                                                                    <img class="lazyload" data-sizes="auto"
                                                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                         data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/20_1042d60c-6db8-4f78-833a-8c5af8256b9c_40x40.jpg?v=1524718003"
                                                                                                                         alt="Repre hende labor">
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                        <span class="label-product label-sale"><span
                                                                                                                class="d-none">Sale</span> -26%</span>
                                                                                                        <div class="button-link">
                                                                                                            <div class="btn-button add-to-cart action  ">
                                                                                                                <form action="/cart/add" method="post"
                                                                                                                      class="variants"
                                                                                                                      data-id="AddToCartForm-665870336066"
                                                                                                                      enctype="multipart/form-data">
                                                                                                                    <input type="hidden" name="id"
                                                                                                                           value="7545641271362"> <a
                                                                                                                           class="btn-addToCart grl btn_df"
                                                                                                                           href="javascript:void(0)"
                                                                                                                           title="Add to cart"><i
                                                                                                                            class="fa fa-shopping-basket"></i><span
                                                                                                                            class="hidden-xs hidden-sm hidden-md">Add
                                                                                                                            to cart</span></a>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                            <div class="quickview-button">
                                                                                                                <a
                                                                                                                    class="quickview iframe-link d-none d-xl-block btn_df"
                                                                                                                    href="javascript:void(0)"
                                                                                                                    data-variants_id="7545641271362"
                                                                                                                    data-toggle="modal" data-target="#myModal"
                                                                                                                    data-id="consequat-burgdogis"
                                                                                                                    title="Quick View"><i class="fa fa-search"></i><span
                                                                                                                        class="hidden-xs hidden-sm hidden-md">Quick
                                                                                                                        View</span></a>
                                                                                                            </div>
                                                                                                            <div class="product-addto-links">
                                                                                                                <a class="btn_df btnProduct"
                                                                                                                   href="/account/login" title="Wishlist"> <i
                                                                                                                        class="fa fa-heart"></i> <span
                                                                                                                        class="hidden-xs hidden-sm hidden-md">Wishlist</span>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="right-block">
                                                                                                        <div class="caption">
                                                                                                            <h4 class="title-product">
                                                                                                                <a class="product-name"
                                                                                                                   href="/products/consequat-burgdogis">Repre
                                                                                                                    hende labor</a>
                                                                                                            </h4>
                                                                                                            <div class="price">
                                                                                                                <!-- snippet/product-price.liquid -->
                                                                                                                <span class="visually-hidden">Regular price</span>
                                                                                                                <span class="price-new"><span class="money"
                                                                                                                                              data-currency-usd="$31.00">$31.00</span></span>
                                                                                                                <span class="price-old"> <span class="money"
                                                                                                                                               data-currency-usd="$42.00">$42.00</span>
                                                                                                                </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="owl-item">
                                                                                        <div class="item product-layout">
                                                                                            <div class="product-item"
                                                                                                 data-id="product-665870860354">
                                                                                                <div
                                                                                                    class="product-item-container grid-view-item   ">
                                                                                                    <div class="left-block">
                                                                                                        <div
                                                                                                            class="product-image-container product-image">
                                                                                                            <a class="grid-view-item__link image-ajax"
                                                                                                               href="/products/aliquip-sintfugia"> <img
                                                                                                                    class="img-responsive s-img lazyload"
                                                                                                                    data-sizes="auto"
                                                                                                                    src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/icon-loadings.svg?2"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf_161x_crop_center.jpg?v=1524718937"
                                                                                                                    alt="Short ribs shank pork">
                                                                                                            </a>
                                                                                                            <div class="box-countdown">
                                                                                                                <div class="countdown_tab box-countdown">
                                                                                                                    <div class="countdown_inner">
                                                                                                                        <div id="665870860354"></div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <script>
                                                                                                                    $(document).ready(function () {
                                                                                                                        //       $("#665870860354").countdown('2019/02/22', function(event) {
                                                                                                                        //         $(this).html(event.strftime('<div class="deals-time day"><div class="num-time">%D</div><div class="title-time">days</div></div> <div class="deals-time hour"><div class="num-time">%H</div> <div class="title-time">hours</div></div><div class="deals-time minute"><div class="num-time">%M</div><div class="title-time">mins</div></div><div class="deals-time second"><div class="num-time">%S</div><div class="title-time">secs</div></div>'));
                                                                                                                        // 		$(this).on('finish.countdown', function(event){ $(this).hide();});
                                                                                                                        //       });
                                                                                                                    })
                                                                                                                </script>
                                                                                                            </div>
                                                                                                            <ul
                                                                                                                class="product-card__right product-card__gallery">
                                                                                                                <li class="item-img thumb-active"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf.jpg?v=1524718937">
                                                                                                                    <img class="lazyload" data-sizes="auto"
                                                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                         data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf_40x40.jpg?v=1524718937"
                                                                                                                         alt="Short ribs shank pork">
                                                                                                                </li>
                                                                                                                <li class="item-img"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/41_4bbf7a78-b6bd-4f06-8402-3536b1930632.jpg?v=1524718937">
                                                                                                                    <img class="lazyload" data-sizes="auto"
                                                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                         data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/41_4bbf7a78-b6bd-4f06-8402-3536b1930632_40x40.jpg?v=1524718937"
                                                                                                                         alt="Short ribs shank pork">
                                                                                                                </li>
                                                                                                                <li class="item-img"
                                                                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/46_0022741a-2958-4c73-a5e2-01fd4715f84b.jpg?v=1524718937">
                                                                                                                    <img class="lazyload" data-sizes="auto"
                                                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                                                         data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/46_0022741a-2958-4c73-a5e2-01fd4715f84b_40x40.jpg?v=1524718937"
                                                                                                                         alt="Short ribs shank pork">
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                        <span class="label-product label-new">new</span>
                                                                                                        <span class="label-product label-sale"><span
                                                                                                                class="d-none">Sale</span> -18%</span>
                                                                                                        <div class="button-link">
                                                                                                            <div class="btn-button add-to-cart action  ">
                                                                                                                <form action="/cart/add" method="post"
                                                                                                                      class="variants"
                                                                                                                      data-id="AddToCartForm-665870860354"
                                                                                                                      enctype="multipart/form-data">
                                                                                                                    <input type="hidden" name="id"
                                                                                                                           value="7545645727810"> <a
                                                                                                                           class="btn-addToCart grl btn_df"
                                                                                                                           href="javascript:void(0)"
                                                                                                                           title="Add to cart"><i
                                                                                                                            class="fa fa-shopping-basket"></i><span
                                                                                                                            class="hidden-xs hidden-sm hidden-md">Add
                                                                                                                            to cart</span></a>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                            <div class="quickview-button">
                                                                                                                <a
                                                                                                                    class="quickview iframe-link d-none d-xl-block btn_df"
                                                                                                                    href="javascript:void(0)"
                                                                                                                    data-variants_id="7545645727810"
                                                                                                                    data-toggle="modal" data-target="#myModal"
                                                                                                                    data-id="aliquip-sintfugia"
                                                                                                                    title="Quick View"><i class="fa fa-search"></i><span
                                                                                                                        class="hidden-xs hidden-sm hidden-md">Quick
                                                                                                                        View</span></a>
                                                                                                            </div>
                                                                                                            <div class="product-addto-links">
                                                                                                                <a class="btn_df btnProduct"
                                                                                                                   href="/account/login" title="Wishlist"> <i
                                                                                                                        class="fa fa-heart"></i> <span
                                                                                                                        class="hidden-xs hidden-sm hidden-md">Wishlist</span>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="right-block">
                                                                                                        <div class="caption">
                                                                                                            <h4 class="title-product">
                                                                                                                <a class="product-name"
                                                                                                                   href="/products/aliquip-sintfugia">Short
                                                                                                                    ribs shank pork</a>
                                                                                                            </h4>
                                                                                                            <div class="price">
                                                                                                                <!-- snippet/product-price.liquid -->
                                                                                                                <span class="visually-hidden">Regular price</span>
                                                                                                                <span class="price-new"><span class="money"
                                                                                                                                              data-currency-usd="$126.00">$126.00</span></span>
                                                                                                                <span class="price-old"> <span class="money"
                                                                                                                                               data-currency-usd="$154.00">$154.00</span>
                                                                                                                </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="owl-nav disabled">
                                                                                <div class="owl-prev">
                                                                                    <i class="fa fa-angle-left"></i>
                                                                                </div>
                                                                                <div class="owl-next">
                                                                                    <i class="fa fa-angle-right"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="owl-dots">
                                                                                <div class="owl-dot">
                                                                                    <span></span>
                                                                                </div>
                                                                                <div class="owl-dot">
                                                                                    <span></span>
                                                                                </div>
                                                                                <div class="owl-dot active">
                                                                                    <span></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div></li>
                                            <li class="menu-item toggle-menu "><a
                                                    href="/collections/furniture" title=""
                                                    class="ss_megamenu_title"> Shop <span class="caret"><i
                                                            class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                </a>
                                                <div class="sub-menu">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 spaceMega">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a class="megatitle" href="/collections/ellectronic"
                                                                       title=""> Electronics<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item active"><a href="/" title="">Laptop
                                                                                &amp; Accessories</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Storage
                                                                                &amp; External Drives</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Mainboards,
                                                                                CPUs</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Networking
                                                                                &amp; Wireless</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a class="megatitle" href="/collections/tablets-phones"
                                                                       title=""> Tablets &amp; Phones<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item active"><a href="/" title="">Power
                                                                                Banks</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Memory
                                                                                Cards</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Destop
                                                                                &amp; Sicurity</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Memory
                                                                                Cards</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a class="megatitle"
                                                                       href="/collections/phones-accessories" title=""> Phones
                                                                        &amp; Accessories<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item active"><a href="/" title="">Mobile
                                                                                Accessories</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Headphones/Headsets</a>
                                                                        </li>
                                                                        <li class="menu-item active"><a href="/" title="">Cases
                                                                                &amp; Covers</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Watches
                                                                                &amp; Access</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a class="megatitle" href="/collections/desktop-pc"
                                                                       title=""> Computers<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item active"><a href="/" title="">Watches
                                                                                &amp; Access</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Printers,
                                                                                Scanners</a></li>
                                                                        <li class="menu-item active"><a href="/" title="">Networking</a>
                                                                        </li>
                                                                        <li class="menu-item active"><a href="/" title="">Macbooks
                                                                                &amp; iMacs</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col_banner col-lg-4 col-12 spaceMega">
                                                            <div class="first">
                                                                <img class="img-responsive" alt="ss-emarket2"
                                                                     src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/mega-bn1.png?v=1525322644">
                                                            </div>
                                                        </div>
                                                        <div class="col_banner col-sm-4 col-12 spaceMega">
                                                            <div class="first">
                                                                <a href="/collections/tablets-phones"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/mega-bn2.png?v=1525322648">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col_banner col-lg-4 col-12 spaceMega">
                                                            <div class="first">
                                                                <a href="/collections/furniture"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/Untitled-1.jpg?v=1525340533">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div></li>
                                            <li class="menu-item toggle-menu  dropdown"><a
                                                    class="ss_megamenu_title" href="/pages/deals" title=""> Pages
                                                    <span class="caret"><i class="fa fa-angle-down"
                                                                           aria-hidden="true"></i></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="menu_item toggle-menu"><a href="/pages/about"
                                                                                         class="menu-title" title="">About Us <span class="caret"><i
                                                                    class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                                        <ul class="sub-menu">
                                                            <li class="menu_item"><a class="menu-title"
                                                                                     href="/pages/about" title="">Demo 1</a></li>
                                                            <li class="menu_item active"><a class="menu-title"
                                                                                            href="/" title="">Demo 2</a></li>
                                                        </ul></li>
                                                    <li class="menu_item "><a class="menu-title"
                                                                              href="/pages/contact" title="">Contact Us</a></li>
                                                    <li class="menu_item "><a class="menu-title"
                                                                              href="/pages/deals" title="">Pages Deals</a></li>
                                                    <li class="menu_item "><a class="menu-title"
                                                                              href="/pages/faqs" title="">Faqs</a></li>
                                                    <li class="menu_item "><a class="menu-title"
                                                                              href="/pages/support-24-7" title="">Support 24/7</a></li>
                                                    <li class="menu_item "><a class="menu-title"
                                                                              href="/pages/photo-gallery" title="">Photo gallery</a></li>
                                                </ul></li>
                                            <li class="menu-item toggle-menu  dropdown"><a
                                                    class="ss_megamenu_title" href="/blogs/news" title=""> Blog <span
                                                        class="caret"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="menu_item toggle-menu"><a
                                                            href="#/blogs/news/?preview_theme_id=32004407362"
                                                            class="menu-title" title="">Blog Without Sidebar <span
                                                                class="caret"><i class="fa fa-angle-down"
                                                                             aria-hidden="true"></i></span></a>
                                                        <ul class="sub-menu">
                                                            <li class="menu_item"><a class="menu-title"
                                                                                     href="#/blogs/news/?preview_theme_id=31965642818"
                                                                                     title="">Blog 1 column</a></li>
                                                            <li class="menu_item"><a class="menu-title"
                                                                                     href="#/blogs/news/?preview_theme_id=31965642818"
                                                                                     title="">Blog 2 column</a></li>
                                                            <li class="menu_item"><a class="menu-title"
                                                                                     href="#/blogs/news/?preview_theme_id=13318586434"
                                                                                     title="">Blog 3 column</a></li>
                                                            <li class="menu_item"><a class="menu-title"
                                                                                     href="#/blogs/news/?preview_theme_id=32004407362"
                                                                                     title="">Blog 4 column</a></li>
                                                        </ul></li>
                                                    <li class="menu_item "><a class="menu-title"
                                                                              href="#/blogs/news/?preview_theme_id=13318586434" title="">Blog
                                                            With Left Sidebar</a></li>
                                                    <li class="menu_item "><a class="menu-title"
                                                                              href="#/blogs/news/?preview_theme_id=31950995522" title="">Blog
                                                            With Right Sidebar</a></li>
                                                    <li class="menu_item "><a class="menu-title"
                                                                              href="#/blogs/news/heard-of-shopify/?preview_theme_id=31956238402"
                                                                              title="">Article Without Sidebar</a></li>
                                                    <li class="menu_item "><a class="menu-title"
                                                                              href="#/blogs/news/heard-of-shopify/?preview_theme_id=13318586434"
                                                                              title="">Article With Left Sidebar</a></li>
                                                    <li class="menu_item "><a class="menu-title"
                                                                              href="#/blogs/news/heard-of-shopify/?preview_theme_id=31950995522"
                                                                              title="">Article With Right Sidebar</a></li>
                                                </ul></li>
                                        </ul>
                                    </div>
                                    <div class="mobile-screen d-block d-lg-none">&nbsp;</div>
                                </div>
                            </div>
                            <div class="middle-right col-xl-4 col-lg-3 d-none d-lg-block">
                                <div class="minilink-header hidden-sm hidden-xs">
                                    <div class="inner">
                                        <ul class="welcome-msg font-ct">
                                            <li class="log login login-dropdown"><a
                                                    class="login dropdown-toggle" href="javascript:void(0)">Login</a>
                                                <div class="dropdown-content dropdown-menu">
                                                    <h6 class="title-login d-none">Login</h6>
                                                    <form class="form-login" accept-charset="UTF-8"
                                                          action="/account/login" method="post">
                                                        <div class="form-group">
                                                            <label for="customer_email">Email<em>*</em></label> <input
                                                                class="form-control" type="email" value=""
                                                                name="customer[email]">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="customer_password">Password<em>*</em></label>
                                                            <input class="form-control" type="password" value=""
                                                                   name="customer[password]">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit"
                                                                   class="btn btn-default btn-full mg-bt10" value="Login">
                                                        </div>
                                                        <div class="form-group">
                                                            <a href="/account/register"
                                                               class="btn btn-secondary btn-full">Create account</a>
                                                        </div>
                                                        <div class="dropdown-divider"></div>
                                                        <div class="dropdown-item text-center">
                                                            <a href="/account/login#recover">Forgot your password?</a>
                                                        </div>
                                                    </form>
                                                </div></li>
                                            <li class="regis"><a class="" href="/account/register">Create
                                                    account</a></li>
                                            <li class="txt-oder"><a href=""><i class="fa fa-truck"></i>track
                                                    your order</a></li>
                                            <li class="txt-phone"><a href="#"><i
                                                        class="fa fa-phone-square"></i>Hotline (+123)4 567 890</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-mobile d-lg-none">
                    <div class="container">
                        <div class="d-flex justify-content-between">
                            <div class="logo-mobiles">
                                <div class="site-header-logo title-heading" itemscope=""
                                     itemtype="http://schema.org/Organization">
                                    <a href="/" itemprop="url" class="site-header-logo-image"> <img
                                            src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/logo-footer_120x@3x.png?v=1524796853"
                                            srcset="//cdn.shopify.com/s/files/1/0017/0770/4386/files/logo-footer_120x@3x.png?v=1524796853"
                                            alt="ss-emarket2" itemprop="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="group-nav">
                                <div class="group-nav__ico group-nav__menu">
                                    <div class="mob-menu">
                                        <i class="material-icons">?</i>
                                    </div>
                                </div>
                                <div class="group-nav__ico group-nav__search no__at">
                                    <div class="btn-search-mobi dropdown-toggle">
                                        <i class="material-icons">?</i>
                                    </div>
                                    <div class="form_search dropdown-content" style="display: none;">
                                        <form class="formSearch" action="/search" method="get"
                                              style="position: relative;">
                                            <input type="hidden" name="type" value="product"> <input
                                                class="form-control" type="search" name="q" value=""
                                                placeholder="Enter keywords here... " autocomplete="off">
                                            <button class="btn btn-search" type="submit">
                                                <span class="btnSearchText hidden">Search</span> <i
                                                    class="fa fa-search"></i>
                                            </button>
                                            <ul class="box-results"
                                                style="position: absolute; left: 0px; top: 0px; display: none;"></ul>
                                        </form>
                                    </div>
                                </div>
                                <div class="group-nav__ico group-nav__account no__at">
                                    <a href="#" class="dropdown-toggle"> <i class="material-icons">?</i>
                                    </a>
                                    <ul class="dropdown-content dropdown-menu sn">
                                        <li class="s-login"><i class="fa fa-user"></i><a
                                                href="/account/login" id="customer_login_link">Login</a></li>
                                        <li><a href="/pages/wishlist" title="My Wishlist"><i
                                                    class="fa fa-heart"></i>My Wishlist</a></li>
                                        <li><a href="/account/addresses" title=""><i class="fa fa-book"></i>Order
                                                History</a></li>
                                        <li><a href="/checkout" title="Checkout"><i
                                                    class="fa fa-external-link-square" aria-hidden="true"></i>Checkout</a></li>
                                        <li><a href="/" title="buy on credit"><i
                                                    class="fa fa-address-card-o"></i>Buy on credit</a></li>
                                    </ul>
                                </div>
                                <div class="group-nav__ico group-nav__cart no__at">
                                    <div class="minicart-header">
                                        <a href="/cart"
                                           class="site-header__carts shopcart dropdown-toggle"> <span
                                                class="cart_icos"><i class="material-icons">?</i> </span>
                                        </a>
                                        <div class="block-content dropdown-content dropdown-menu"
                                             style="display: none;">
                                            <div class="no-items">
                                                <p>Your cart is currently empty.</p>
                                                <p class="text-continue btn">
                                                    <a href="/">Continue Shopping</a>
                                                </p>
                                            </div>
                                            <div class="block-inner has-items" style="display: none;">
                                                <div class="head-minicart">
                                                    <span class="label-products">Your Products</span> <span
                                                        class="label-price hidden">Price</span>
                                                </div>
                                                <ol id="minicart-sidebar" class="mini-products-list">
                                                </ol>
                                                <div class="bottom-action actions">
                                                    <div class="price-total-w">
                                                        <span class="label-price-total">Subtotal:</span> <span
                                                            class="price-total"><span class="price"><span
                                                                    class="money" data-currency-usd="$0.00">$0.00</span></span></span>
                                                        <div style="clear: both;"></div>
                                                    </div>
                                                    <div class="button-wrapper">
                                                        <a href="/cart" class="link-button btn-gotocart"
                                                           title="View your cart">View cart</a> <a href="/checkout"
                                                           class="link-button btn-checkout" title="Checkout">Checkout</a>
                                                        <div style="clear: both;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom compad_hidden">
                    <div class="container">
                        <div class="wrap">
                            <div class="row">
                                <div class="vertical_menu col-xl-2 col-lg-3 col-12">
                                    <div id="shopify-section-ss-vertical-menu" class="shopify-section">

                                    <?= VerticalMenuWidget::widget(['message' => 'Good morning']) ?>
                                        <div style="display:none" class="widget-verticalmenu">
                                            <div class="vertical-content">
                                                <div class="navbar-vertical">
                                                    <button style="background: #ff3c20" type="button"
                                                            id="show-verticalmenu" class="navbar-toggles">
                                                        <i class="fa fa-bars"></i> <span class="title-nav">ALL CATEGORIE</span>
                                                    </button>
                                                </div>
                                                <div class="vertical-wrapper">
                                                    <div class="menu-remove d-block d-lg-none">
                                                        <div class="close-vertical">
                                                            <i class="material-icons">?</i>
                                                        </div>
                                                    </div>
                                                    <ul class="vertical-group">
                                                        <li class="vertical-item level1 toggle-menu vertical_drop css_parent">
                                                            <a class="menu-link" href="/collections/ellectronic"> <span
                                                                    class="icon_items"><i class="fa fa-television"></i></span>
                                                                <span class="menu-title">Electronics</span> <span
                                                                    class="caret"><i class="fa fa-angle-down"
                                                                                 aria-hidden="true"></i></span>
                                                            </a>
                                                            <div class="vertical-drop drop-mega drop-lv1 sub-menu "
                                                                 style="width: 720px;">
                                                                <div class="row">
                                                                    <div class="ss_megamenu_col col_menu col-lg-9">
                                                                        <div class="row">
                                                                            <div class="ss_megamenu_col col-lg-6">
                                                                                <ul class="content-links">
                                                                                    <li class="ss_megamenu_lv2 menuTitle active"><a
                                                                                            class="Tops &amp; Sets" href="/" title="">Tops
                                                                                            &amp; Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tops &amp; Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Blouses &amp; Shirts</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Suits &amp; Sets</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="ss_megamenu_col col-lg-6">
                                                                                <ul class="content-links">
                                                                                    <li class="ss_megamenu_lv2 menuTitle active"><a
                                                                                            class="Basic Jackets" href="/" title="">Basic
                                                                                            Jackets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Rompers</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tops &amp; Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Jumpsuits</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="ss_megamenu_col col-lg-6">
                                                                                <ul class="content-links">
                                                                                    <li class="ss_megamenu_lv2 menuTitle active"><a
                                                                                            class="Dresses Prean" href="/" title="">Dresses
                                                                                            Prean</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Jumpsuits</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tops &amp; Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Intimates</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="ss_megamenu_col col-lg-6">
                                                                                <ul class="content-links">
                                                                                    <li class="ss_megamenu_lv2 menuTitle active"><a
                                                                                            class="Blouses &amp; Shirt" href="/" title="">Blouses
                                                                                            &amp; Shirt</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Sleep &amp; Lounge</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Real Furiera</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tops &amp; Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Intimates</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="ss_megamenu_col col-lg-6">
                                                                                <ul class="content-links">
                                                                                    <li class="ss_megamenu_lv2 menuTitle active"><a
                                                                                            class="Suits &amp; Sets" href="/" title="">Suits
                                                                                            &amp; Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tops &amp; Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Wool &amp; Blends</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Real Furiera</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Basic Jackets</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="ss_megamenu_col col-lg-6">
                                                                                <ul class="content-links">
                                                                                    <li class="ss_megamenu_lv2 menuTitle active"><a
                                                                                            class="Accessories" href="/" title="">Accessories</a>
                                                                                    </li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Blazers Bon</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tops &amp; Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Trending Shoes</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Real Furiera</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="ss_megamenu_col banner_first col-lg-3 space_vetical">
                                                                        <div class="first vertical-banner">
                                                                            <img class="img-responsive lazyautosizes lazyloaded"
                                                                                 data-sizes="auto"
                                                                                 src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/mgea.png?v=1528432705"
                                                                                 alt="ss-emarket2"
                                                                                 data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/mgea.png?v=1528432705"
                                                                                 sizes="147px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="vertical-item level1 toggle-menu vertical_drop mega_parent">
                                                            <a class="menu-link" href="/collections/women-s-clothing">
                                                                <span class="icon_items"><i class="fa fa-eercast"></i></span>
                                                                <span class="menu-title">Women Clothing</span> <span
                                                                    class="caret"><i class="fa fa-angle-down"
                                                                                 aria-hidden="true"></i></span>
                                                            </a>
                                                            <div class="vertical-drop drop-mega drop-lv1 sub-menu "
                                                                 style="width: 700px;">
                                                                <div class="row">
                                                                    <div class="ss_megamenu_col col_menu col-lg-12">
                                                                        <div class="row">
                                                                            <div class="ss_megamenu_col col-lg-4">
                                                                                <ul class="content-links">
                                                                                    <li class="ss_megamenu_lv2 menuTitle active"><a
                                                                                            class="Jeans Short" href="/" title="">Jeans Short</a>
                                                                                    </li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Accessories Fre</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tops &amp; Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Gloves &amp; Mittens</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Hats &amp; Caps</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Leggings</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Ription Glasses</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="ss_megamenu_col col-lg-4">
                                                                                <ul class="content-links">
                                                                                    <li class="ss_megamenu_lv2 menuTitle active"><a
                                                                                            class="Robes Renk" href="/" title="">Robes Renk</a>
                                                                                    </li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Basic Jackets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Trench Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Blazers</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Real Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Down Coats</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tops &amp; Sets</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="ss_megamenu_col col-lg-4">
                                                                                <ul class="content-links">
                                                                                    <li class="ss_megamenu_lv2 menuTitle active"><a
                                                                                            class="Clone TShirt" href="/" title="">Clone TShirt</a>
                                                                                    </li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Intimates</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tops Parkas</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Jumpsuits</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Suits &amp; Sets</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tank Tops</a></li>
                                                                                    <li class="ss_megamenu_lv3 active"><a href="/"
                                                                                                                          title="">Tops &amp; Sets</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="ss_megamenu_col banner_first col-lg-12 space_vetical">
                                                                        <div class="first vertical-banner">
                                                                            <img class="img-responsive lazyautosizes lazyloaded"
                                                                                 data-sizes="auto"
                                                                                 src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/9.jpg?v=1525832904"
                                                                                 alt="ss-emarket2"
                                                                                 data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/9.jpg?v=1525832904"
                                                                                 sizes="658px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="vertical-item level1 toggle-menu"><a
                                                                class="menu-link" href="/collections/health-beauty"> <span
                                                                    class="icon_items"><i class="fa fa-deaf"></i></span> <span
                                                                    class="menu-title">Health &amp; Beauty</span>
                                                            </a></li>
                                                        <li class="vertical-item level1 toggle-menu"><a
                                                                class="menu-link" href="/collections/office-electronics">
                                                                <span class="icon_items"><i class="fa fa-camera-retro"></i></span>
                                                                <span class="menu-title">Camera &amp; Photo</span>
                                                            </a></li>
                                                        <li class="vertical-item level1 toggle-menu"><a
                                                                class="menu-link" href="/collections/toys-kids-baby"> <span
                                                                    class="icon_items"><i class="fa fa-gift"></i></span> <span
                                                                    class="menu-title">Gifts, Sport, Toys</span>
                                                            </a></li>
                                                        <li
                                                            class="vertical-item level1 toggle-menu vertical_drop css_parent">
                                                            <a class="menu-link"
                                                               href="/collections/phones-accessories"> <span
                                                                    class="icon_items"><i class="fa fa-snowflake-o"></i></span>
                                                                <span class="menu-title">Digital &amp; Electric</span> <span
                                                                    class="caret"><i class="fa fa-angle-down"
                                                                                 aria-hidden="true"></i></span>
                                                            </a>
                                                            <ul class="vertical-drop drop-css drop-lv1 sub-menu"
                                                                style="width: 200px;">
                                                                <li class="vertical-item level1 sub-dropdown toggle-menu">
                                                                    <a class="menu-link" href="/collections/ellectronic"
                                                                       title="">Electronics<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                                                    <ul
                                                                        class="vertical-drop drop-lv2 dropdown-content sub-menu">
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Laptop &amp; Accessories</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Storage &amp; External Drives</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Mainboards, CPUs</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Networking &amp; Wireless</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="vertical-item level1 sub-dropdown toggle-menu">
                                                                    <a class="menu-link" href="/collections/tablets-phones"
                                                                       title="">Tablets &amp; Phones<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                                                    <ul
                                                                        class="vertical-drop drop-lv2 dropdown-content sub-menu">
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Power Banks</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Memory Cards</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Destop &amp; Sicurity</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Memory Cards</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="vertical-item level1 sub-dropdown toggle-menu">
                                                                    <a class="menu-link"
                                                                       href="/collections/phones-accessories" title="">Phones
                                                                        &amp; Accessories<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                                    </a>
                                                                    <ul
                                                                        class="vertical-drop drop-lv2 dropdown-content sub-menu">
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Mobile Accessories</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Headphones/Headsets</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Cases &amp; Covers</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Watches &amp; Access</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="vertical-item level1 sub-dropdown toggle-menu">
                                                                    <a class="menu-link" href="/collections/desktop-pc"
                                                                       title="">Computers<span class="caret"><i
                                                                                class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                                                    <ul
                                                                        class="vertical-drop drop-lv2 dropdown-content sub-menu">
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Watches &amp; Access</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Printers, Scanners</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Networking</a></li>
                                                                        <li class="vertical-item level2 active"><a href="/"
                                                                                                                   title="">Macbooks &amp; iMacs</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="vertical-item level1 toggle-menu"><a
                                                                class="menu-link" href="/collections/toys-kids-baby"> <span
                                                                    class="icon_items"><i class="fa fa-grav"></i></span> <span
                                                                    class="menu-title">Toys, Kids &amp; Baby</span>
                                                            </a></li>
                                                        <li class="vertical-item level1 toggle-menu"><a
                                                                class="menu-link" href="/collections/sports-outdoors"> <span
                                                                    class="icon_items"><i class="fa fa-futbol-o"></i></span>
                                                                <span class="menu-title">Sports &amp; Shoes</span>
                                                            </a></li>
                                                        <li class="vertical-item level1 toggle-menu"><a
                                                                class="menu-link" href="/collections/cables-connectors"> <span
                                                                    class="icon_items"><i class="fa fa-shopping-bag"></i></span>
                                                                <span class="menu-title">Bags &amp; Shoes</span>
                                                            </a></li>
                                                        <li class="vertical-item level1 toggle-menu"><a
                                                                class="menu-link" href="/collections/furniture"> <span
                                                                    class="icon_items"><i class="fa fa-bath"></i></span> <span
                                                                    class="menu-title">Packag &amp; office</span>
                                                            </a></li>
                                                        <li class="vertical-item level1 toggle-menu"><a
                                                                class="menu-link" href="/collections/furniture"> <span
                                                                    class="icon_items"><i class="fa fa-desktop"></i></span> <span
                                                                    class="menu-title">Furniture New</span>
                                                            </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vertical-screen d-block d-lg-none">&nbsp;</div>
                                    </div>
                                </div>
                                <div class="header-search col-xl-7 col-lg-6 d-none d-lg-block">
                                    <div class="search-header-w">
                                        <div class="btn btn-search-mobi hidden">
                                            <i class="fa fa-search"></i>
                                        </div>
                                        <div class="form_search">
                                            <form class="formSearch" action="/search" method="get"
                                                  style="position: relative;">
                                                <input type="hidden" name="type" value="product"> <input
                                                    class="form-control" type="search" name="q" value=""
                                                    placeholder="Enter keywords here... " autocomplete="off">
                                                <button class="btn btn-search" type="submit">
                                                    <span class="btnSearchText hidden">Search</span> <i
                                                        class="fa fa-search"></i>
                                                </button>
                                                <ul class="box-results"
                                                    style="position: absolute; left: 0px; top: 40px; display: none;"></ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-sub col-xl-3 col-lg-3 d-none d-lg-block">
                                    <ul>
                                        <li class="toplink-item checkout d-none d-xl-block"><a
                                                href="/checkout"><i class="fa fa-external-link"
                                                                aria-hidden="true"></i><span class="hidden">Checkout</span></a></li>
                                        <li class="toplink-item wishlist d-none d-xl-block"><a
                                                href="/pages/wishlist" title=""><i class="fa fa-heart"
                                                                               aria-hidden="true"></i> <span class="hidden">My Wishlist</span></a></li>
                                        <li>
                                            <div class="minicart-header">
                                                <a href="/cart"
                                                   class="site-header__carts shopcart dropdown-toggle font-ct">
                                                    <span class="cart_ico"><i class="fa fa-shopping-bag"></i> <span
                                                            id="CartCount" class="cout_cart font-ct">0 <span
                                                                class="hidden">item - </span></span> </span> <span
                                                        class="cart_info"> <span class="cart-title"><span
                                                                class="title-cart">My Cart</span></span> <span
                                                            class="cart-total"> <span id="CartTotal" class="total_cart">-
                                                                <span class="money" data-currency-usd="$0.00">$0.00</span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                                <div class="block-content dropdown-content"
                                                     style="display: none;">
                                                    <div class="no-items">
                                                        <p>Your cart is currently empty.</p>
                                                        <p class="text-continue btn">
                                                            <a href="/">Continue Shopping</a>
                                                        </p>
                                                    </div>
                                                    <div class="block-inner has-items" style="display: none;">
                                                        <div class="head-minicart">
                                                            <span class="label-products">Your Products</span> <span
                                                                class="label-price hidden">Price</span>
                                                        </div>
                                                        <ol id="minicart-sidebar" class="mini-products-list">
                                                        </ol>
                                                        <div class="bottom-action actions">
                                                            <div class="price-total-w">
                                                                <span class="label-price-total">Subtotal:</span> <span
                                                                    class="price-total"><span class="price"><span
                                                                            class="money" data-currency-usd="$0.00">$0.00</span></span></span>
                                                                <div style="clear: both;"></div>
                                                            </div>
                                                            <div class="button-wrapper">
                                                                <a href="/cart" class="link-button btn-gotocart"
                                                                   title="View your cart">View cart</a> <a href="/checkout"
                                                                   class="link-button btn-checkout" title="Checkout">Checkout</a>
                                                                <div style="clear: both;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="quick-view"></div>
            <div class="page-container" id="PageContainer">
                <div class="main-content" id="MainContent">
<?= $content ?>
                    <div class="section-bottom">
                        <div id="shopify-section-homepage-logolist" class="shopify-section home-section">
                            <div class="widget-logolist">
                                <div class="container">
                                    <div class="wrap">
                                        <div class="ss-carousel ss-owl logo-bars">
                                            <div class="product-layout owl-carousel owl-loaded owl-drag"
                                                 data-nav="true" data-margin="30" data-autoplay="false"
                                                 data-autospeed="10000" data-speed="300" data-column1="8"
                                                 data-column2="6" data-column3="5" data-column4="4"
                                                 data-column5="3">
                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage"
                                                         style="width: 1888px; transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                                                        <div class="owl-item active"
                                                             style="width: 179.75px; margin-right: 30px;">
                                                            <div class="logo-item">
                                                                <a href="/" class="logo-bar__link"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/b1_140x73.png?v=1525851652">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                             style="width: 179.75px; margin-right: 30px;">
                                                            <div class="logo-item">
                                                                <a href="/" class="logo-bar__link"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/b2_140x73.png?v=1525851665">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                             style="width: 179.75px; margin-right: 30px;">
                                                            <div class="logo-item">
                                                                <a href="/" class="logo-bar__link"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/b3_140x73.png?v=1525851773">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                             style="width: 179.75px; margin-right: 30px;">
                                                            <div class="logo-item">
                                                                <a href="/" class="logo-bar__link"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/b4_140x73.png?v=1525852272">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                             style="width: 179.75px; margin-right: 30px;">
                                                            <div class="logo-item">
                                                                <a href="/" class="logo-bar__link"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/b5_140x73.png?v=1525852312">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                             style="width: 179.75px; margin-right: 30px;">
                                                            <div class="logo-item">
                                                                <a href="/" class="logo-bar__link"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/b6_140x73.png?v=1525852324">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                             style="width: 179.75px; margin-right: 30px;">
                                                            <div class="logo-item">
                                                                <a href="/" class="logo-bar__link"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/b3_170x100.png?v=1525851773">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                             style="width: 179.75px; margin-right: 30px;">
                                                            <div class="logo-item">
                                                                <a href="/" class="logo-bar__link"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/b4_140x73.png?v=1525852272">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 179.75px; margin-right: 30px;">
                                                            <div class="logo-item">
                                                                <a href="/" class="logo-bar__link"> <img
                                                                        class="img-responsive" alt="ss-emarket2"
                                                                        src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/b1_140x73.png?v=1525851652">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-nav">
                                                    <div class="owl-prev disabled">
                                                        <i class="fa fa-angle-left"></i>
                                                    </div>
                                                    <div class="owl-next">
                                                        <i class="fa fa-angle-right"></i>
                                                    </div>
                                                </div>
                                                <div class="owl-dots">
                                                    <div class="owl-dot active">
                                                        <span></span>
                                                    </div>
                                                    <div class="owl-dot">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="shopify-section-homepage-product-carousel"
                             class="shopify-section home-section">
                            <div class="widget-product-carousel owl-style2 style1">
                                <div class="container">
                                    <div class="widget-head">
                                        <div class="home-title">
                                            <span>MOST VIEWED</span>
                                        </div>
                                    </div>
                                    <div class="products-mini">
                                        <div class="product-layout block-content">
                                            <div class="ss-carousel ss-owl">
                                                <div class="owl-carousel owl-loaded owl-drag" data-nav="true"
                                                     data-margin="30" data-autoplay="false"
                                                     data-autospeed="10000" data-speed="300" data-column1="4"
                                                     data-column2="3" data-column3="2" data-column4="2"
                                                     data-column5="1">
                                                    <div class="owl-stage-outer">
                                                        <div class="owl-stage"
                                                             style="width: 3360px; transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                                                            <div class="owl-item active"
                                                                 style="width: 390px; margin-right: 30px;">
                                                                <div class="item">
                                                                    <div class="product-item clearfix  on-sale">
                                                                        <a href="/products/jaeger-nobrisket"
                                                                           class="product-img"> <img
                                                                                class="lazyautosizes lazyloaded" data-sizes="auto"
                                                                                src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/4_90781396-f998-4d40-8520-2180f0d8ca99_270x270.jpg?v=1524712263"
                                                                                data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/4_90781396-f998-4d40-8520-2180f0d8ca99_270x270.jpg?v=1524712263"
                                                                                alt="Jaeger nobrisket" sizes="130px">
                                                                        </a>
                                                                        <div class="product-info">
                                                                            <div class="price">
                                                                                <!-- snippet/product-price.liquid -->
                                                                                <span class="visually-hidden">Regular price</span> <span
                                                                                    class="price-new"><span class="money"
                                                                                                        data-currency-usd="$200.00">$200.00</span></span> <span
                                                                                    class="price-old"><span class="money"
                                                                                                        data-currency-usd="$210.00">$210.00</span> </span>
                                                                            </div>
                                                                            <a href="/products/jaeger-nobrisket"
                                                                               title="Jaeger nobrisket" class="product-name">Jaeger
                                                                                nobrisket</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="owl-item active"
                                                                 style="width: 390px; margin-right: 30px;">
                                                                <div class="item">
                                                                    <div class="product-item clearfix  on-sale">
                                                                        <a href="/products/exercitation-kielbasa"
                                                                           class="product-img"> <img
                                                                                class="lazyautosizes lazyloaded" data-sizes="auto"
                                                                                src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/13_f189ef81-d63d-4609-acf7-15877ec2d664_270x270.jpg?v=1524721429"
                                                                                data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/13_f189ef81-d63d-4609-acf7-15877ec2d664_270x270.jpg?v=1524721429"
                                                                                alt="Tender pican adipis" sizes="130px">
                                                                        </a>
                                                                        <div class="product-info">
                                                                            <div class="price">
                                                                                <!-- snippet/product-price.liquid -->
                                                                                <span class="visually-hidden">Regular price</span> <span
                                                                                    class="price-new"><span class="money"
                                                                                                        data-currency-usd="$266.00">$266.00</span></span> <span
                                                                                    class="price-old"> <span class="money"
                                                                                                         data-currency-usd="$275.00">$275.00</span>
                                                                                </span>
                                                                            </div>
                                                                            <a href="/products/exercitation-kielbasa"
                                                                               title="Tender pican adipis" class="product-name">Tender
                                                                                pican adipis</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="owl-item active"
                                                                 style="width: 390px; margin-right: 30px;">
                                                                <div class="item">
                                                                    <div class="product-item clearfix  on-sale">
                                                                        <a href="/products/dolore-nisifile" class="product-img">
                                                                            <img class="lazyautosizes lazyloaded"
                                                                                 data-sizes="auto"
                                                                                 src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/19_0c19a070-01db-4168-b8f8-31f294770b4a_270x270.jpg?v=1524718562"
                                                                                 data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/19_0c19a070-01db-4168-b8f8-31f294770b4a_270x270.jpg?v=1524718562"
                                                                                 alt="salami ipsum pancet" sizes="130px">
                                                                        </a>
                                                                        <div class="product-info">
                                                                            <div class="price">
                                                                                <!-- snippet/product-price.liquid -->
                                                                                <span class="visually-hidden">Regular price</span> <span
                                                                                    class="price-new"><span class="money"
                                                                                                        data-currency-usd="$80.00">$80.00</span></span> <span
                                                                                    class="price-old"> <span class="money"
                                                                                                         data-currency-usd="$90.00">$90.00</span>
                                                                                </span>
                                                                            </div>
                                                                            <a href="/products/dolore-nisifile"
                                                                               title="salami ipsum pancet" class="product-name">salami
                                                                                ipsum pancet</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="owl-item active"
                                                                 style="width: 390px; margin-right: 30px;">
                                                                <div class="item">
                                                                    <div class="product-item clearfix ">
                                                                        <a href="/products/fibeye-bresaola" class="product-img">
                                                                            <img class="lazyautosizes lazyloaded"
                                                                                 data-sizes="auto"
                                                                                 src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/11_3f4dbb3e-8903-4372-b69f-f3c625359669_270x270.jpg?v=1524713616"
                                                                                 data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/11_3f4dbb3e-8903-4372-b69f-f3c625359669_270x270.jpg?v=1524713616"
                                                                                 alt="Picanha corned bilto" sizes="130px">
                                                                        </a>
                                                                        <div class="product-info">
                                                                            <div class="price">
                                                                                <!-- snippet/product-price.liquid -->
                                                                                <span class="visually-hidden">Regular price</span> <span
                                                                                    class="price-new"><span class="money"
                                                                                                        data-currency-usd="$54.00">$54.00</span></span>
                                                                            </div>
                                                                            <a href="/products/fibeye-bresaola"
                                                                               title="Picanha corned bilto" class="product-name">Picanha
                                                                                corned bilto</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="owl-item"
                                                                 style="width: 390px; margin-right: 30px;">
                                                                <div class="item">
                                                                    <div class="product-item clearfix  on-sale">
                                                                        <a href="/products/cididunt-nullatas"
                                                                           class="product-img"> <img
                                                                                class="lazyautosizes lazyloaded" data-sizes="auto"
                                                                                src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/10_0db77c82-38ed-4d38-adfc-71f39de34141_270x270.jpg?v=1524713440"
                                                                                data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/10_0db77c82-38ed-4d38-adfc-71f39de34141_270x270.jpg?v=1524713440"
                                                                                alt="Pariat kielbas conse" sizes="130px">
                                                                        </a>
                                                                        <div class="product-info">
                                                                            <div class="price">
                                                                                <!-- snippet/product-price.liquid -->
                                                                                <span class="visually-hidden">Regular price</span> <span
                                                                                    class="price-new"><span class="money"
                                                                                                        data-currency-usd="$268.00">$268.00</span></span> <span
                                                                                    class="price-old"> <span class="money"
                                                                                                         data-currency-usd="$286.00">$286.00</span>
                                                                                </span>
                                                                            </div>
                                                                            <a href="/products/cididunt-nullatas"
                                                                               title="Pariat kielbas conse" class="product-name">Pariat
                                                                                kielbas conse</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="owl-item"
                                                                 style="width: 390px; margin-right: 30px;">
                                                                <div class="item">
                                                                    <div class="product-item clearfix  on-sale">
                                                                        <a href="/products/chicken-salami" class="product-img">
                                                                            <img class="lazyautosizes lazyloaded"
                                                                                 data-sizes="auto"
                                                                                 src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/35_1f867717-5869-41c7-8e2b-c259885870d8_270x270.jpg?v=1524712983"
                                                                                 data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/35_1f867717-5869-41c7-8e2b-c259885870d8_270x270.jpg?v=1524712983"
                                                                                 alt="Pancetnulla brisket" sizes="130px">
                                                                        </a>
                                                                        <div class="product-info">
                                                                            <div class="price">
                                                                                <!-- snippet/product-price.liquid -->
                                                                                <span class="visually-hidden">Regular price</span> <span
                                                                                    class="price-new"><span class="money"
                                                                                                        data-currency-usd="$241.00">$241.00</span></span> <span
                                                                                    class="price-old"> <span class="money"
                                                                                                         data-currency-usd="$257.00">$257.00</span>
                                                                                </span>
                                                                            </div>
                                                                            <a href="/products/chicken-salami"
                                                                               title="Pancetnulla brisket" class="product-name">Pancetnulla
                                                                                brisket</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="owl-item"
                                                                 style="width: 390px; margin-right: 30px;">
                                                                <div class="item">
                                                                    <div class="product-item clearfix  on-sale">
                                                                        <a href="/products/haborum-shoul" class="product-img">
                                                                            <img class="lazyload" data-sizes="auto"
                                                                                 src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/icon-loadings.svg?13"
                                                                                 data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/9_b0da4f3a-b347-41be-a819-280968569ad2_270x270.jpg?v=1524711945"
                                                                                 alt="Irure conseq shankle">
                                                                        </a>
                                                                        <div class="product-info">
                                                                            <div class="price">
                                                                                <!-- snippet/product-price.liquid -->
                                                                                <span class="visually-hidden">Regular price</span> <span
                                                                                    class="price-new"><span class="money"
                                                                                                        data-currency-usd="$222.00">$222.00</span></span> <span
                                                                                    class="price-old"> <span class="money"
                                                                                                         data-currency-usd="$232.00">$232.00</span>
                                                                                </span>
                                                                            </div>
                                                                            <a href="/products/haborum-shoul"
                                                                               title="Irure conseq shankle" class="product-name">Irure
                                                                                conseq shankle</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="owl-item"
                                                                 style="width: 390px; margin-right: 30px;">
                                                                <div class="item">
                                                                    <div class="product-item clearfix ">
                                                                        <a href="/products/incididunt-picanha"
                                                                           class="product-img"> <img class="lazyload"
                                                                                                  data-sizes="auto"
                                                                                                  src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/icon-loadings.svg?13"
                                                                                                  data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/1_4fb2bf83-aa4d-441f-abd0-c8a3a833b24d_270x270.jpg?v=1524711407"
                                                                                                  alt="Incididunt picanha">
                                                                        </a>
                                                                        <div class="product-info">
                                                                            <div class="price">
                                                                                <!-- snippet/product-price.liquid -->
                                                                                <span class="visually-hidden">Regular price</span> <span
                                                                                    class="price-new"><span class="money"
                                                                                                        data-currency-usd="$66.00">$66.00</span></span>
                                                                            </div>
                                                                            <a href="/products/incididunt-picanha"
                                                                               title="Incididunt picanha" class="product-name">Incididunt
                                                                                picanha</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="owl-nav">
                                                        <div class="owl-prev disabled">
                                                            <i class="fa fa-angle-left"></i>
                                                        </div>
                                                        <div class="owl-next">
                                                            <i class="fa fa-angle-right"></i>
                                                        </div>
                                                    </div>
                                                    <div class="owl-dots">
                                                        <div class="owl-dot active">
                                                            <span></span>
                                                        </div>
                                                        <div class="owl-dot">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shopify-section-footer" class="shopify-section">
                    <footer data-section-id="footer" data-section-type="header-section"
                            class="site-footer clearfix">
                        <div class="footer-1">
                            <div class="footer-top" style="background: #232f3e">
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="news-letter align-items-center col-xl-8 col-lg-10 col-md-9 col-sm-9 col-12">
                                            <div class="footer-newsletter">
                                                <div class="title-block d-none d-xl-block d-lg-block">
                                                    <h3 class="footer-block-title">Signup For Newsletter</h3>
                                                    <p class="hidden-sm hidden-xs">We’ll never share your email
                                                        address with a third-party.</p>
                                                </div>
                                                <div class="footer-block-content">
                                                    <div class="newsletter">
                                                        <form
                                                            action="//magentech.us16.list-manage.com/subscribe/post?u=74b0f77582219cf039a743aa5&amp;id=e872bd5efa"
                                                            method="post" name="mc-embedded-subscribe-form"
                                                            target="_blank" class="input-group">
                                                            <input class="inputinput-box" type="email" value=""
                                                                   placeholder="Email address" name="EMAIL"
                                                                   aria-label="Email Address"> <span
                                                                   class="input-group__btn">
                                                                <button type="submit"
                                                                        class="btn newsletter__submit font-ct" name="commit"
                                                                        id="Subscribe">
                                                                    <i class="fa fa-envelope hidden"></i> <span
                                                                        class="newsletter__submit-text--large">Subscribe</span>
                                                                </button>
                                                            </span>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="socials-wraps d-flex align-items-center justify-content-end col-xl-4 col-lg-2 col-md-3 col-sm-3 col-12">
                                            <ul>
                                                <li class="facebook"><a class="_blank"
                                                                        href="http://www.facebook.com/MagenTech" target="_blank"><i
                                                            class="fa fa-facebook"></i> <span class="social_title">Facebook</span></a></li>
                                                <li class="twitter"><a class="_blank"
                                                                       href="https://twitter.com/MagenTech" target="_blank"><i
                                                            class="fa fa-twitter"></i><span class="social_title">Twitter</span></a></li>
                                                <li class="google_plus"><a class="_blank"
                                                                           href="https://plus.google.com/u/0/+Smartaddons"
                                                                           target="_blank"><i class="fa  fa-google-plus"></i><span
                                                            class="social_title">Google Plus</span></a></li>
                                                <li class="instagram"><a class="_blank"
                                                                         href="http://www.instagram.com" target="_blank"><i
                                                            class="fa  fa-instagram"></i><span class="social_title">Instagram</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-center" style="background: #fff">
                                <div class="footer-main">
                                    <div class="container">
                                        <div class="footer-wrapper row">
                                            <div class="col-xl-3 col-lg-3 col-sm-12 col-12 ft-2">
                                                <div class="collapsed-block footer-block footer-about">
                                                    <h3 class="footer-block-title hidden-lg">
                                                        Customer Care<span class="expander"><i class="fa fa-plus"></i></span>
                                                    </h3>
                                                    <ul class="footer-block-content">
                                                        <div class="logo">
                                                            <a href="#" title="ss-emarket2"> <img
                                                                    class="img-payment lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/logo-footer.png?v=1524796853"
                                                                    alt="ss-emarket2"
                                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/logo-footer.png?v=1524796853"
                                                                    sizes="136px">
                                                            </a>
                                                        </div>
                                                        <li class="address"><span>San Luis Potos?, Centro
                                                                Historico, 78000 San Luis Potos?, SPL, Mexico</span></li>
                                                        <li class="phone"><span>(+0214)0 315 215 - (+0214)0 315 215</span>
                                                        </li>
                                                        <li class="email"><span>Marketing@MagenTech.Com</span></li>
                                                        <li class="time"><span>Open time: 8:00AM - 6:00PM</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-12 ft-2">
                                                <div class="collapsed-block footer-block">
                                                    <h3 class="footer-block-title">
                                                        Customer Care<span class="expander"><i class="fa fa-plus"></i></span>
                                                    </h3>
                                                    <ul class="footer-block-content">
                                                        <li><a href="/">Track your order</a></li>
                                                        <li><a href="/pages/wishlist">Wishlist</a></li>
                                                        <li><a href="/">Customer Service</a></li>
                                                        <li><a href="http://support.ytcvn.com">24/7 support</a></li>
                                                        <li><a href="/pages/faqs">Forums</a></li>
                                                        <li><a href="/pages/deals">Point of sale</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-12 ft-3">
                                                <div class="collapsed-block footer-block">
                                                    <h3 class="footer-block-title">
                                                        Categories<span class="expander"><i class="fa fa-plus"></i></span>
                                                    </h3>
                                                    <ul class="footer-block-content">
                                                        <li><a href="/">Parts &amp; Tools</a></li>
                                                        <li><a href="/">Health &amp; Beauty</a></li>
                                                        <li><a href="/">Sports &amp; Toys</a></li>
                                                        <li><a href="/">Bags &amp; Shoes</a></li>
                                                        <li><a href="/">Electronics</a></li>
                                                        <li><a href="/">Fashion &amp; Shoes</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-12 ft-3">
                                                <div class="collapsed-block footer-block">
                                                    <h3 class="footer-block-title">
                                                        Infomation<span class="expander"><i class="fa fa-plus"></i></span>
                                                    </h3>
                                                    <ul class="footer-block-content">
                                                        <li><a href="/pages/about">About Us</a></li>
                                                        <li><a href="/">Product Support</a></li>
                                                        <li><a href="/pages/contact">Contact Us</a></li>
                                                        <li><a href="/">Investors</a></li>
                                                        <li><a href="/checkouts/">Checkout</a></li>
                                                        <li><a href="/blogs/news">Post topics</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-sm-12 col-12 instagram ft-3">
                                                <div class="collapsed-block footer-block">
                                                    <h3 class="footer-block-title">
                                                        INSTAGRAM GALLERY<span class="expander"><i
                                                                class="fa fa-plus"></i></span>
                                                    </h3>
                                                    <div class="footer-block-contents">
                                                        <div id="instafeedfooter" class="instagram-slide"
                                                             data-id="instafeedfooter" data-userid="7441584291"
                                                             data-accesstoken="7441584291.1677ed0.643c27f05b38436cad8032a1fcf3a623"
                                                             data-limit="5" data-resolution="low_resolution"
                                                             data-navigation="">
                                                            <a class="item-in col-4" target="_blank"
                                                               href="https://www.instagram.com/p/BhNoTkSg0NT/" title=""><img
                                                                    class="img-responsive lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="//scontent.cdninstagram.com/vp/25c518e12b9cf0ade631524cc72d7656/5D524D99/t51.2885-15/e15/s320x320/29416454_1534958253280420_9000611732686635008_n.jpg?_nc_ht=scontent.cdninstagram.com"
                                                                    alt=""
                                                                    data-src="//scontent.cdninstagram.com/vp/25c518e12b9cf0ade631524cc72d7656/5D524D99/t51.2885-15/e15/s320x320/29416454_1534958253280420_9000611732686635008_n.jpg?_nc_ht=scontent.cdninstagram.com"
                                                                    sizes="190px"><span class="ss_likes d-none">0</span></a><a
                                                                class="item-in col-4" target="_blank"
                                                                href="https://www.instagram.com/p/BhNoSWYARk4/" title=""><img
                                                                    class="img-responsive lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="//scontent.cdninstagram.com/vp/3a85f724e63a09989c52bb23a6d48d84/5D74B1A8/t51.2885-15/e15/s320x320/29416325_184685132173431_477353149292609536_n.jpg?_nc_ht=scontent.cdninstagram.com"
                                                                    alt=""
                                                                    data-src="//scontent.cdninstagram.com/vp/3a85f724e63a09989c52bb23a6d48d84/5D74B1A8/t51.2885-15/e15/s320x320/29416325_184685132173431_477353149292609536_n.jpg?_nc_ht=scontent.cdninstagram.com"
                                                                    sizes="90px"><span class="ss_likes d-none">0</span></a><a
                                                                class="item-in col-4" target="_blank"
                                                                href="https://www.instagram.com/p/BhNoRQwANhF/" title=""><img
                                                                    class="img-responsive lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="//scontent.cdninstagram.com/vp/f1501abde4e8e97d9fe73eb89cb1b7eb/5D70D217/t51.2885-15/e15/s320x320/30085709_157226991634430_4625078417946050560_n.jpg?_nc_ht=scontent.cdninstagram.com"
                                                                    alt=""
                                                                    data-src="//scontent.cdninstagram.com/vp/f1501abde4e8e97d9fe73eb89cb1b7eb/5D70D217/t51.2885-15/e15/s320x320/30085709_157226991634430_4625078417946050560_n.jpg?_nc_ht=scontent.cdninstagram.com"
                                                                    sizes="90px"><span class="ss_likes d-none">0</span></a><a
                                                                class="item-in col-4" target="_blank"
                                                                href="https://www.instagram.com/p/BhNoPemgffD/" title=""><img
                                                                    class="img-responsive lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="//scontent.cdninstagram.com/vp/211bac17375bc86c721f9144e5246f51/5D662ED6/t51.2885-15/e15/s320x320/30078302_1983378728646741_341089870103445504_n.jpg?_nc_ht=scontent.cdninstagram.com"
                                                                    alt=""
                                                                    data-src="//scontent.cdninstagram.com/vp/211bac17375bc86c721f9144e5246f51/5D662ED6/t51.2885-15/e15/s320x320/30078302_1983378728646741_341089870103445504_n.jpg?_nc_ht=scontent.cdninstagram.com"
                                                                    sizes="90px"><span class="ss_likes d-none">0</span></a><a
                                                                class="item-in col-4" target="_blank"
                                                                href="https://www.instagram.com/p/BhNoJ6XA6bu/" title=""><img
                                                                    class="img-responsive lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="//scontent.cdninstagram.com/vp/cb7ce6208b3b9d66dbbed846ab4575ff/5D572763/t51.2885-15/e15/s320x320/29417307_385971588532866_8540123614295359488_n.jpg?_nc_ht=scontent.cdninstagram.com"
                                                                    alt=""
                                                                    data-src="//scontent.cdninstagram.com/vp/cb7ce6208b3b9d66dbbed846ab4575ff/5D572763/t51.2885-15/e15/s320x320/29417307_385971588532866_8540123614295359488_n.jpg?_nc_ht=scontent.cdninstagram.com"
                                                                    sizes="90px"><span class="ss_likes d-none">0</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer-menu">
                                            <ul>
                                                <li><a href="/">Online Shopping</a></li>
                                                <li><a href="/">Promotions</a></li>
                                                <li><a href="/">Privacy Policy</a></li>
                                                <li><a href="/">Site Map</a></li>
                                                <li><a href="/">Orders and Returns</a></li>
                                                <li><a href="/">Help</a></li>
                                                <li><a href="/">Contact Us</a></li>
                                                <li><a href="http://support.ytcvn.com">Support</a></li>
                                                <li><a href="/">Most Populars</a></li>
                                                <li><a href="/">New Arrivals</a></li>
                                                <li><a href="/">Special Products</a></li>
                                                <li><a href="/">Manufacturers</a></li>
                                                <li><a href="/">Shipping</a></li>
                                                <li><a href="/">Payments</a></li>
                                                <li><a href="/">Returns</a></li>
                                                <li><a href="/">Warantee</a></li>
                                                <li><a href="/">Promotions</a></li>
                                                <li><a href="/">Customer Service</a></li>
                                                <li><a href="/">Our Stores</a></li>
                                                <li><a href="/">Discount</a></li>
                                            </ul>
                                        </div>
                                        <div class="inner_payment text-center">
                                            <a href="#" title="ss-emarket2"> <img
                                                    class="img-payment lazyautosizes lazyloaded"
                                                    data-sizes="auto"
                                                    src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/payment.png?v=1524209002"
                                                    alt="ss-emarket2"
                                                    data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/payment.png?v=1524209002"
                                                    sizes="334px">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-bottom" style="background: #232f3e">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12 copyright">
                                            <address>
                                                © 2018 <a href="#">eMarket</a>. Designed by <a
                                                    href="http://www.revotheme.com/" target="_blank">Revotheme.com.</a>
                                                All Rights Reserved
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="goToTop" class="hidden-xs">
                                <span></span>
                            </div>
                        </div>
                    </footer>
                </div>
                <div id="shopify-section-ss-tools" class="shopify-section">
                    <div id="so-groups" class="right so-groups-sticky hidden-md hidden-sm hidden-xs" style="top: 100px">
                        <a class="sticky-categories" data-target="popup" data-popup="#popup-categories"><span>Collection</span><i class="material-icons">
                                tune</i></a>
                        <a class="sticky-mycart" data-target="popup" data-popup="#popup-mycart"><span>Shopping Cart</span><i class="material-icons">
                                add_shopping_cart</i></a>
                        <a class="sticky-myaccount" data-target="popup" data-popup="#popup-myaccount"><span>My Account</span><i class="material-icons">
                                supervisor_account</i></a>
                        <a class="sticky-mysearch" data-target="popup" data-popup="#popup-mysearch"><span>Search</span><i class="material-icons">
                                search</i></a>
                        <a class="sticky-recent" data-target="popup" data-popup="#popup-recent"><span>Recent View Product</span><i class="material-icons">
                                wb_sunny</i></a>
                        <div class="popup popup-categories popup-hidden" id="popup-categories">
                            <div class="popup-screen">
                                <div class="popup-position">
                                    <div class="popup-container popup-small">
                                        <div class="popup-header">
                                            <span>All Collection</span>
                                            <a class="popup-close" data-target="popup-close" data-popup-close="#popup-categories">?</a>
                                        </div>
                                        <div class="popup-content">
                                            <div class="nav-secondary">
                                                <ul>
                                                    <li>
                                                        <a href="/collections/frontpage"><i class="fa fa-chevron-down nav-arrow"></i>All site</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/cables-connectors"><i class="fa fa-chevron-down nav-arrow"></i>Bags &amp; Shoes</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/daily-deals"><i class="fa fa-chevron-down nav-arrow"></i>Daily Deals</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/desktop-pc"><i class="fa fa-chevron-down nav-arrow"></i>Desktop &amp; Computer</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/ellectronic"><i class="fa fa-chevron-down nav-arrow"></i>Ellectronic</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/furniture"><i class="fa fa-chevron-down nav-arrow"></i>Furniture</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/health-beauty"><i class="fa fa-chevron-down nav-arrow"></i>Health &amp; Beauty</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/memory-cards"><i class="fa fa-chevron-down nav-arrow"></i>Jewelry &amp; Watches</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/mens-clothing"><i class="fa fa-chevron-down nav-arrow"></i>Men's Clothing</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/office-electronics"><i class="fa fa-chevron-down nav-arrow"></i>Office Electronics</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/phones-accessories"><i class="fa fa-chevron-down nav-arrow"></i>Phones &amp; Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/sports-outdoors"><i class="fa fa-chevron-down nav-arrow"></i>Sports &amp; Outdoors</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/tablets-phones"><i class="fa fa-chevron-down nav-arrow"></i>Tablets &amp; Phones</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/toys-kids-baby"><i class="fa fa-chevron-down nav-arrow"></i>Toys, Kids &amp; Baby</a>
                                                    </li>
                                                    <li>
                                                        <a href="/collections/women-s-clothing"><i class="fa fa-chevron-down nav-arrow"></i>Women’s Clothing</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popup popup-mycart popup-hidden" id="popup-mycart">
                            <div class="popup-screen">
                                <div class="popup-position">
                                    <div class="popup-container popup-small">
                                        <div class="popup-html">
                                            <div class="popup-header">
                                                <span><i class="fa fa-shopping-cart"></i>Shopping Cart</span>
                                                <a class="popup-close" data-target="popup-close" data-popup-close="#popup-mycart">?</a>
                                            </div>
                                            <div class="popup-content">
                                                <div class="cart-header">
                                                    <div class="notification gray no-items">
                                                        <i class="fa fa-shopping-cart info-icon"></i>
                                                        <p>Your cart is currently empty.</p>
                                                    </div>
                                                    <div class="has-items" style="display: none;">
                                                        <div class="notification gray ">
                                                            <p>There are <span class="text-color"><span id="scartcount">0</span> item(s)</span> in your cart</p>
                                                        </div>
                                                        <table class="table table-striped list-cart">
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                        <div class="cart-bottom">
                                                            <table class="table table-striped">
                                                                <tbody><tr>
                                                                        <td class="text-left"><strong>Subtotal</strong></td>
                                                                        <td class="text-right"><span class="money" data-currency-usd="$0.00">$0.00</span></td>
                                                                    </tr>
                                                                </tbody></table>
                                                            <p class="text-center">
                                                                <a href="/cart" class="btn btn-view-cart"><strong>View Cart</strong></a>
                                                                <a href="/checkout" class="btn btn-checkout"><strong>Checkout</strong></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popup popup-myaccount popup-hidden" id="popup-myaccount">
                            <div class="popup-screen">
                                <div class="popup-position">
                                    <div class="popup-container popup-small">
                                        <div class="popup-html">
                                            <div class="popup-header">
                                                <span>My Account</span>
                                                <a class="popup-close" data-target="popup-close" data-popup-close="#popup-myaccount">?</a>
                                            </div>
                                            <div class="popup-content">
                                                <div class="form-content">
                                                    <div class="row space">
                                                        <div class="col col-sm-4 col-xs-6 txt-center">
                                                            <div class="form-box">
                                                                <a class="account-url" href="/account">
                                                                    <span class="ico ico-32 ico-sm"><i class="material-icons">history</i></span><br>
                                                                    <span class="account-txt">History</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-4 col-xs-6 txt-center">
                                                            <div class="form-box">
                                                                <a class="account-url" href="/cart">
                                                                    <span class="ico ico-32 ico-sm"><i class="material-icons">
                                                                            add_shopping_cart</i></span><br>
                                                                    <span class="account-txt">Shopping Cart</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-4 col-xs-6 txt-center">
                                                            <div class="form-box">
                                                                <a class="account-url" href="/account/login">
                                                                    <span class="ico ico-32 ico-sm"><i class="material-icons">
                                                                            lock_open</i></span><br>
                                                                    <span class="account-txt">Login</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-4 col-xs-6 txt-center">
                                                            <div class="form-box">
                                                                <a class="account-url" href="/account/register">
                                                                    <span class="ico ico-32 ico-sm"><i class="material-icons">
                                                                            how_to_reg</i></span><br>
                                                                    <span class="account-txt">Register</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-4 col-xs-6 txt-center">
                                                            <div class="form-box">
                                                                <a class="account-url" href="/account">
                                                                    <span class="ico ico-32 ico-sm"><i class="material-icons">
                                                                            supervisor_account</i></span><br>
                                                                    <span class="account-txt">My Account</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-4 col-xs-6 txt-center">
                                                            <div class="form-box">
                                                                <a class="account-url" href="/account">
                                                                    <span class="ico ico-32 ico-sm"><i class="material-icons">
                                                                            event_note</i></span><br>
                                                                    <span class="account-txt">Order History</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popup popup-mysearch popup-hidden" id="popup-mysearch">
                            <div class="popup-screen">
                                <div class="popup-position">
                                    <div class="popup-container popup-small">
                                        <div class="popup-html">
                                            <div class="popup-header">
                                                <span>Search</span>
                                                <a class="popup-close" data-target="popup-close" data-popup-close="#popup-mysearch">?</a>
                                            </div>
                                            <div class="popup-content">
                                                <div class="form-content">
                                                    <div class="row space no-gutters">
                                                        <div class="col-9">
                                                            <div class="form-box">
                                                                <input type="text" name="search" value="" placeholder="Search" id="input-search" class="field">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-box">
                                                                <button type="button" id="button-search" class="btn button-search">Search</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popup popup-recent popup-hidden" id="popup-recent">
                            <div class="popup-screen">
                                <div class="popup-position">
                                    <div class="popup-container popup-small">
                                        <div class="popup-html">
                                            <div class="popup-header">
                                                <span>Recent Viewed Products</span>
                                                <a class="popup-close" data-target="popup-close" data-popup-close="#popup-recent">?</a>
                                            </div>
                                            <div class="popup-content">
                                                <div class="form-content">
                                                    <div class="row space">
                                                        <div id="recently-viewed-products" style="">
                                                            <div id="product-boudin-capicola" class="product col col-sm-6 col-xs-6">                        <div class="form-box">                          <div class="item">                              <div class="product-thumb transition">                                 <div class="image">                                                                            <span class="bt-sale">Sale</span>                                                                            <a href="/products/boudin-capicola">                                      <img src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/36_be604602-4ec6-4e18-83ab-4e4de73c43ea_medium.jpg?v=1524710318">                     </a>                     </div>                                     <div class="caption">                                      <h4><a href="/products/boudin-capicola" title="Filet mignon capico">Filet mignon capico</a></h4>                                         <p class="price">                                          <span class="price-new">$123.00</span>                                             <span class="price-old">$145.00</span>                     </p>                     </div>                     </div>                     </div>                     </div>                     </div><div id="product-bresaola-volupta" class="product col col-sm-6 col-xs-6">                        <div class="form-box">                          <div class="item">                              <div class="product-thumb transition">                                 <div class="image">                                                                            <span class="bt-sale">Sale</span>                                                                            <a href="/products/bresaola-volupta">                                      <img src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/38_10b49095-1c0e-4b9c-a382-cc63001c822d_medium.jpg?v=1524708739">                     </a>                     </div>                                     <div class="caption">                                      <h4><a href="/products/bresaola-volupta" title="Boudin ando bualo">Boudin ando bualo</a></h4>                                         <p class="price">                                          <span class="price-new">$37.00</span>                                             <span class="price-old">$36.00</span>                     </p>                     </div>                     </div>                     </div>                     </div>                     </div><div id="product-aliquip-sintfugia" class="product col col-sm-6 col-xs-6">                        <div class="form-box">                          <div class="item">                              <div class="product-thumb transition">                                 <div class="image">                                                                            <span class="bt-sale">Sale</span>                                                                            <a href="/products/aliquip-sintfugia">                                      <img src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/47_2eb5cd23-6b89-4df6-99b4-aa29a608afbf_medium.jpg?v=1524718937">                     </a>                     </div>                                     <div class="caption">                                      <h4><a href="/products/aliquip-sintfugia" title="Short ribs shank pork">Short ribs shank pork</a></h4>                                         <p class="price">                                          <span class="price-new">$126.00</span>                                             <span class="price-old">$154.00</span>                     </p>                     </div>                     </div>                     </div>                     </div>                     </div></div>
                                                        <script id="recently-viewed-product-template" type="text/x-jquery-tmpl">
                                                            <div id="product-${handle}" class="product col col-sm-6 col-xs-6">
                                                            <div class="form-box">
                                                            <div class="item">
                                                            <div class="product-thumb transition">
                                                            <div class="image">
                                                            {{if compare_at_price}}
                                                            <span class="bt-sale">Sale</span>
                                                            {{/if}}
                                                            <a href="${url}">
                                                            <img src="${Shopify.Products.resizeImage(featured_image, "medium")}" />
                                                            </a>
                                                            </div>
                                                            <div class="caption">
                                                            <h4><a href="${url}" title="${title}">${title}</a></h4>
                                                            <p class="price">
                                                            <span class="price-new">${Shopify.formatMoney(price)}</span>
                                                            <span class="price-old">{{if compare_at_price}}${Shopify.formatMoney(compare_at_price)}{{/if}}</span>
                                                            </p>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                        </script>
                                                        <script>
                                                            var limit_product = 6;
                                                            //                     Shopify.Products.showRecentlyViewed( { howManyToShow: limit_product } );
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="model-popup">
                <!--   Popup Cart -->
                <div class="popup_cart bg_1 modal-pu pu-cart">
                    <div class="popup_content">
                        <div class="container a-center">
                            <div class="popup_inner">
                                <a class="popup_close close-pu" href="#" title=""><svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 37 40"><path d="M21.3 23l11-11c.8-.8.8-2 0-2.8-.8-.8-2-.8-2.8 0l-11 11-11-11c-.8-.8-2-.8-2.8 0-.8.8-.8 2 0 2.8l11 11-11 11c-.8.8-.8 2 0 2.8.4.4.9.6 1.4.6s1-.2 1.4-.6l11-11 11 11c.4.4.9.6 1.4.6s1-.2 1.4-.6c.8-.8.8-2 0-2.8l-11-11z"></path></svg></a>
                                <div class="modal-header ">
                                    <p class="cart-success-messages"> Added To Your Shopping Cart!</p>
                                </div>
                                <div class="modal-body ">
                                    <div class="row">
                                        <div class="col-xl-9 col-lg-8 col-md-6 col-sm-12 cart-popup-left">
                                            <div class="product-image col-lg-6 d-none d-sm-block">
                                                <img alt="" src="//cdn.shopify.com/s/files/1/0017/0770/4386/t/3/assets/ajax-loader.gif?13">
                                            </div>
                                            <div class="cart-popup-info col-lg-6">
                                                <h3 class="product-name"></h3>
                                                <p class="product-type"><span class="label-quantity"> Product type:</span>  <span class="product-type--value">1</span>	</p>
                                                <p class="cart-price-total price"><span class="price-total">1</span> x <span class="price-new"> $00.00</span>  </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 cart-popup-right">
                                            <div class="cart-popup-action">
                                                <button class="btn btn-danger" onclick="window.location = '/checkout'">Check out</button>
                                                <div class="cart-popup-imgbottom">
                                                    Subtotal:
                                                    <span class="previewCartCheckout-price">$00.00</span>
                                                    <p class="cart-popup-total" data-itemtotal="Your cart contains {itemsTotal} items"> </p>
                                                </div>
                                                <a href="#" class="btn btn-dark close-pu">Continue shopping</a>
                                                <button class="btn btn-dark" onclick="window.location = '/cart'">View Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popup_bg">&nbsp;</div>
                    </div>
                </div>
                <!-- Social Fixed -->
                <div class="socials-wrap left hidden-sm hidden-xs" style="top: 100px">
                    <ul>
                        <li class="li-social facebook-social">
                            <a title="Facebook" href="http://www.facebook.com/MagenTech" target="_blank">
                                <span class="fa fa-facebook icon-social"></span>
                            </a>
                        </li>
                        <li class="li-social twitter-social">
                            <a title="Twitter" href="https://twitter.com/MagenTech" target="_blank">
                                <span class="fa fa-twitter icon-social"></span>
                            </a>
                        </li>
                        <li class="li-social google-social">
                            <a title="Google+" href="https://plus.google.com/u/0/+Smartaddons" target="_blank">
                                <span class="fa fa-google-plus icon-social"></span>
                            </a>
                        </li>
                        <li class="li-social pinterest-social">
                            <a title="Pinterest" href="https://www.pinterest.com/magentech/" target="_blank">
                                <span class="fa fa-pinterest icon-social"></span>
                            </a>
                        </li>
                        <li class="li-social instagram-social">
                            <a title="Instagram" href="" target="_blank">
                                <span class="fa fa-instagram icon-social"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--   Loading Icon -->
                <div class="ss-loading" style="display: none;"></div>
            </div>
        </div>
<?php $this->endBody() ?>
    </body>
</html>
        <?php $this->endPage() ?>