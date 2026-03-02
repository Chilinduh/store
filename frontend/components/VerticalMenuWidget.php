<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Category;

class VerticalMenuWidget extends Widget
{
    public $message;
    public $model;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }

        $this->model = Category::Category();

    }
    
    public function run()
    {
        //         return Html::encode($this->message);
        
        return $this->render('verticalMenu', ['model'=>$this->model]);
        
        $menu = '
        <div class="widget-verticalmenu">
                <div class="vertical-content">

                        <div class="navbar-vertical">
                                <button style="background: #ff3c20" type="button" id="show-verticalmenu" class="navbar-toggles">
                                        <i class="fa fa-bars"></i> 
            <span class="title-nav">ALL CATEGORIES</span>
                                </button>
                        </div>
                        <div class="vertical-wrapper" >
                                <div class="menu-remove d-block d-lg-none">
                                        <div class="close-vertical">
                                                <i class="material-icons"></i>
                                        </div>
                                </div>

                                <ul class="vertical-group" >

                                        <li
                                                class="vertical-item level1 toggle-menu vertical_drop mega_parent">
                                                <a class="menu-link" href="/collections/ellectronic"> <span
                                                        class="icon_items"><i class="fa fa-television"></i></span>

                                                        <span class="menu-title">Electronics</span> <span
                                                        class="caret"><i class="fa fa-angle-down"css_drop
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

';
        
          
    }
}