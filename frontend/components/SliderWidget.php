<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class SliderWidget extends Widget
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
			<!-- BEGIN content_for_index -->
			<div id="shopify-section-1525938982707"
				class="shopify-section home-section">

				<div class="widget-slideshow widget-slideshow1">
					<div class="row">
						<div class="col-slider col-xl-9 col-lg-8 col-sm-12 col_2">

							<div class="tp-banner-container"
								data-section-id="1525938982707"
								data-section-type="slideshow-section"
								style="height: 450px; visibility: visible; opacity: 1; overflow: visible;">
								<span class="slider-preload" style="display: none;"></span>
								<div
									class="tp-banner-1525938982707 revslider-initialised tp-simpleresponsive"
									data-speed="5000" id="revslider-980"
									style="height: 450px;">
									<ul class="tp-revslider-mainul"
										style="display: block; overflow: hidden; width: 100%; height: 100%; max-height: none;">


										<li data-transition="fade" data-slotamount="1"
											data-masterspeed="1000"
											class="tp-revslider-slidesli active-revslide"
											style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: inherit; opacity: 0.570025;">
											<div class="slotholder"
												style="width: 100%; height: 100%;"
												data-duration="undefined" data-zoomstart="undefined"
												data-zoomend="undefined" data-rotationstart="undefined"
												data-rotationend="undefined" data-ease="undefined"
												data-bgpositionend="undefined"
												data-bgposition="center center"
												data-kenburns="undefined" data-easeme="undefined"
												data-bgfit="cover" data-bgfitend="undefined"
												data-owidth="undefined" data-oheight="undefined">
												<div class="tp-bgimg defaultimg"
													data-lazyload="undefined" data-bgfit="cover"
													data-bgposition="center center"
													data-bgrepeat="no-repeat" data-lazydone="undefined"
													src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/slider-2_x1024.png?v=1525940593"
													data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/slider-2_x1024.png?v=1525940593"
													style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url(&quot;//cdn.shopify.com/s/files/1/0017/0770/4386/files/slider-2_x1024.png?v=1525940593&quot;); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;"></div>
											</div>








											<div class="caption stb lfb a-center tp-caption start"
												data-x="center" data-y="center" data-speed="500"
												data-start="800" data-easing="Power4.easeOut"
												data-endspeed="300" data-endeasing="Power4.easeIn"
												data-captionhidden="off"
												style="z-index: 6; min-height: 0px; min-width: 0px; line-height: 22px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-size: 14px; left: 262.5px; top: 126.5px; visibility: visible; opacity: 0; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, -0.0025, 0, 50, 0, 1); transition: all 0s ease 0s;">

												<div class="tp-caption-slide-1"
													style="color: #000000; font-size: 24px;">Office
													furniture</div>


												<div class="tp-caption-slide-2"
													style="color: #ff3c20; font-size: 44px;">sale up to
													50% OFF</div>


												<div class="tp-caption-slide-3"
													style="color: #000000; font-size: 14px;">
													They key is to have every key, the key to open every
													door.<br> We don’t see them, we will never see them
												</div>



												<div class="tp-caption-button">
													<a href="/collections/furniture"
														class="slide-link-button" target="_blank"
														data-text=""
														style="font-size: 14px; background-color: #ff3c20; color: #ffffff">Shop
														now</a>
												</div>

											</div>


										</li>


										<li data-transition="fade" data-slotamount="1"
											data-masterspeed="1000"
											class="tp-revslider-slidesli active-revslide current-sr-slide-visible"
											style="width: 100%; height: 100%; overflow: hidden; z-index: 20; visibility: inherit; opacity: 1;">
											<div class="slotholder"
												style="width: 100%; height: 100%;"
												data-duration="undefined" data-zoomstart="undefined"
												data-zoomend="undefined" data-rotationstart="undefined"
												data-rotationend="undefined" data-ease="undefined"
												data-bgpositionend="undefined"
												data-bgposition="center center"
												data-kenburns="undefined" data-easeme="undefined"
												data-bgfit="cover" data-bgfitend="undefined"
												data-owidth="undefined" data-oheight="undefined">
												<div class="tp-bgimg defaultimg"
													data-lazyload="undefined" data-bgfit="cover"
													data-bgposition="center center"
													data-bgrepeat="no-repeat" data-lazydone="undefined"
													src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/v1-slide2_x1024_f1e9ac72-fe4e-4c61-9e55-d20e180db8a7_x1024.png?v=1526526103"
													data-src="//cdn.shopify.com/s/files/1/0017/0770/4386/files/v1-slide2_x1024_f1e9ac72-fe4e-4c61-9e55-d20e180db8a7_x1024.png?v=1526526103"
													style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url(&quot;//cdn.shopify.com/s/files/1/0017/0770/4386/files/v1-slide2_x1024_f1e9ac72-fe4e-4c61-9e55-d20e180db8a7_x1024.png?v=1526526103&quot;); background-size: cover; background-position: center center; width: 100%; height: 100%; visibility: inherit; opacity: 1;"></div>
											</div>








											<div class="caption stb lfb a-center tp-caption start"
												data-x="center" data-y="center" data-speed="500"
												data-start="800" data-easing="Power4.easeOut"
												data-endspeed="300" data-endeasing="Power4.easeIn"
												data-captionhidden="off"
												style="z-index: 6; min-height: 0px; min-width: 0px; line-height: 22px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-size: 14px; left: 263px; top: 126.5px; visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, -0.0025, 0, 0, 0, 1); transition: all 0s ease 0s;">

												<div class="tp-caption-slide-1"
													style="color: #222222; font-size: 24px;">Office
													Afurnicom</div>


												<div class="tp-caption-slide-2"
													style="color: #ff3c20; font-size: 44px;">sale up to
													50% OFF</div>


												<div class="tp-caption-slide-3"
													style="color: #222222; font-size: 14px;">
													They key is to have every key, the key to open every
													door.<br> We don’t see them, we will never see them
												</div>



												<div class="tp-caption-button">
													<a href="/" class="slide-link-button" target="_blank"
														data-text=""
														style="font-size: 14px; background-color: #ff3c20; color: #ffffff">Shop
														now</a>
												</div>

											</div>


										</li>


										<li data-transition="fade" data-slotamount="1"
											data-masterspeed="1000"
											class="tp-revslider-slidesli active-revslide"
											style="width: 100%; height: 100%; overflow: hidden; visibility: hidden; opacity: 0; z-index: 18;">
											<div class="slotholder"
												style="width: 100%; height: 100%;"
												data-duration="undefined" data-zoomstart="undefined"
												data-zoomend="undefined" data-rotationstart="undefined"
												data-rotationend="undefined" data-ease="undefined"
												data-bgpositionend="undefined"
												data-bgposition="center center"
												data-kenburns="undefined" data-easeme="undefined"
												data-bgfit="cover" data-bgfitend="undefined"
												data-owidth="undefined" data-oheight="undefined">
												<div class="tp-bgimg defaultimg"
													data-lazyload="undefined" data-bgfit="cover"
													data-bgposition="center center"
													data-bgrepeat="no-repeat" data-lazydone="undefined"
													src="images/slider-1_x1024.jpg?v=1526526291"
													data-src="images/slider-1_x1024.jpg?v=1526526291"
													style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url(&quot;//cdn.shopify.com/s/files/1/0017/0770/4386/files/slider-1_x1024.jpg?v=1526526291&quot;); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;"></div>
											</div>








											<div class="caption stb lfb a-center tp-caption start"
												data-x="center" data-y="center" data-speed="500"
												data-start="800" data-easing="Power4.easeOut"
												data-endspeed="300" data-endeasing="Power4.easeIn"
												data-captionhidden="off"
												style="z-index: 6; min-height: 0px; min-width: 0px; line-height: 22px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-size: 14px; left: 263px; top: 126.5px; visibility: visible; opacity: 0; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, -0.0025, 0, 50, 0, 1); transition: all 0s ease 0s;">

												<div class="tp-caption-slide-1"
													style="color: #ffffff; font-size: 24px;">Office
													Afurniture</div>


												<div class="tp-caption-slide-2"
													style="color: #ff3c20; font-size: 44px;">Sale up to
													50% OFF</div>


												<div class="tp-caption-slide-3"
													style="color: #ffffff; font-size: 14px;">
													They key is to have every key, the key to open every
													door.<br> We don’t see them, we will never see them
												</div>



												<div class="tp-caption-button">
													<a href="/" class="slide-link-button" target="_blank"
														data-text=""
														style="font-size: 14px; background-color: #ff3c20; color: #ffffff">Shop
														now</a>
												</div>

											</div>


										</li>

									</ul>
									<div class="tp-bannertimer"
										style="width: 8.14%; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div>
									<div class="tp-loader spinner0" style="display: none;">
										<div class="dot1"></div>
										<div class="dot2"></div>
										<div class="bounce1"></div>
										<div class="bounce2"></div>
										<div class="bounce3"></div>
									</div>
								</div>
								<div class="tp-bullets hidebullets simplebullets round"
									style="bottom: 20px; left: 50%; margin-left: -59px;">
									<div class="bullet first"></div>
									<div class="bullet selected"></div>
									<div class="bullet last"></div>
									<div class="tpclear"></div>
								</div>
								<div style="display: none; visibility: hidden;"
									class="tp-leftarrow hidearrows tparrows round">
									<div class="tp-arr-allwrapper">
										<div class="tp-arr-iwrapper">
											<div class="tp-arr-imgholder"
												style="visibility: inherit; opacity: 1; background-image: url(&quot;images/slider-2_x1024.png?v=1525940593&quot;);"></div>
											<div class="tp-arr-imgholder2"></div>
											<div class="tp-arr-titleholder"></div>
											<div class="tp-arr-subtitleholder"></div>
										</div>
									</div>
								</div>
								<div style="display: none; visibility: hidden;"
									class="tp-rightarrow hidearrows tparrows round">
									<div class="tp-arr-allwrapper">
										<div class="tp-arr-iwrapper">
											<div class="tp-arr-imgholder"
												style="visibility: inherit; opacity: 1; background-image: url(&quot;images/slider-1_x1024.jpg?v=1526526291&quot;);"></div>
											<div class="tp-arr-imgholder2"></div>
											<div class="tp-arr-titleholder"></div>
											<div class="tp-arr-subtitleholder"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-lg-4 col-sm-12 col_3">
							<div class="banners banners1">
								<div class="b-img">

									<a href="/collections/ellectronic" title="ss-emarket2"> <img
										class="img-responsive" alt="ss-emarket2"
										src="images/1.png?v=1525939112">

									</a>
								</div>
								<div class="b-img2">


									<img class="img-responsive" alt="ss-emarket2"
										src="images/2.png?v=1525939193">


								</div>
							</div>
						</div>

					</div>

				</div>

			</div>';
    }
}