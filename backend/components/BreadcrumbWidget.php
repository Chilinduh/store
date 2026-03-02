<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 09.10.19
 * Time: 16:33
 */


namespace app\components;

use yii\base\Widget;
use yii\web\View;
use yii\widgets\Breadcrumbs;

/**
 * Class Panel
 * @package infinitiweb\widgets\yii2\panel
 */
class BreadcrumbWidget extends Widget
{

  public $title = '';
  public $id = '';
  public $content = '';
  public $modal = '';
  public string $createUrl = '';
  public array $breadcrumbs = [];

  public function init()
  {

    parent::init();
  }

  public function run()
  {

    $html = '
      <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
          <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">' . $this->title . '</h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
              <li class="breadcrumb-item text-muted">
                <a href="/" class="text-muted text-hover-primary">Главная</a>
              </li>';

    if (count($this->breadcrumbs)) {

      foreach ($this->breadcrumbs as $item) {

        $html .= '
              <li class="breadcrumb-item">
                <span class="bullet bg-gray-400 w-5px h-2px"></span>
              </li>';
        if (isset($item['url'])) {
          $html .= '
              <li class="breadcrumb-item text-muted">
                <a href="' . $item['url'] . '" class="text-muted text-hover-primary">' . $item['label'] . '</a>
              </li>';
        } else {
          $html .= '
              <li class="breadcrumb-item text-muted">' . $item['label'] . '</li>';
        }
      }
    }

    $html .= '</ul>
          </div>';

    if(!empty($this->createUrl)) {

      $html .= '
          <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="' . $this->createUrl . '" class="btn btn-sm fw-bold btn-primary">Создать</a>
          </div>';
    }

    $html .= '
        </div>
      </div>';

    return $html;

  }

}
