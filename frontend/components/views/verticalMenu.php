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
                                    <?php foreach ($model as $item) { ?>
                                    <li class="vertical-item level1 toggle-menu vertical_drop mega_parent">
                                        <a class="menu-link" href="/collections/ellectronic"> 
                                            <span class="icon_items"><i class="fa fa-television"></i></span>
                                            <span class="menu-title"><?= $item->name ?></span>
                                            <span class="caret"><i class="fa fa-angle-down"css_drop aria-hidden="true"></i></span>
                                        </a>
                                        <div class="vertical-drop drop-mega drop-lv1 sub-menu " style="width: 720px;">
                                            <div class="row">

                                                <div class="ss_megamenu_col col_menu col-lg-9">
                                                    <div class="row">
                                                        <div class="ss_megamenu_col col-lg-6">
                                                            <ul class="content-links">
                                                                <li class="ss_megamenu_lv2 menuTitle active"><a href="/" title="">Tops &amp; Sets</a></li>

                                                                <li class="ss_megamenu_lv3 active"><a href="/" title="">Tops &amp; Sets</a></li>

                                                                <li class="ss_megamenu_lv3 active"><a href="/" title="">Blouses &amp; Shirts</a></li>

                                                                <li class="ss_megamenu_lv3 active">
                                                                    <a href="/" title="">Suits &amp; Sets</a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="ss_megamenu_col banner_first col-lg-3 space_vetical">
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

                                    <?php } ?>
                                </ul>
                        </div>
                </div>
        </div>