<ul class="blocks blocks-100 blocks-md-6 ">

    <?php

    foreach($images as $image) {

        ?>

  <li class="images_bottom align-middle">
    <div class="card card-shadow">
      <figure class="card-img-top overlay-hover overlay">
        <img class="overlay-figure overlay-scale img-bordered img-bordered-gray"  src="http://theme<?= $image->original ?>">
        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
          <a class="icon wb-search" href="http://theme<?= $image->thumbnail ?>" ></a>
          <a class="icon wb-close" href="http://theme<?= $image->thumbnail ?>" ></a>
        </figcaption>
      </figure>
    </div>
  </li>

    <?php } ?>
</ul>