<?php

namespace common\components\Services;

use common\components\Catalog;
use yii\helpers\ArrayHelper;


class CatalogService
{

  public function getCatalogCounts() {

    $categories = new Catalog();
    $counts = [];
    $categories = $categories->getCatalog();

    foreach ($categories as $key=>$one) {

      if(isset($one['items']) && count($one['items'])) {

        foreach ($one['items'] as $twoKey => $two) {

            foreach ($two['items'] as $threeKey => $three) {

              echo "1<pre>";
              print_r($three);
              echo "</pre>1";

            if (isset($three['items']) && count($three['items'])) {

              foreach ($three['items'] as $fourKey => $four) {

                echo "<pre>";
                print_r($four['count']);
                echo "</pre>";


                $counts[$threeKey] += $four['count'];
              }
            }
          }
        }
      }

      $categories[$key] = array_merge($categories[$key], ['count' => $counts[$key]]);
    }

    echo "<pre>";
    print_r($counts);
    echo "</pre>";
    die;


  }
}


