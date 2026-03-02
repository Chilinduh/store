<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.07.19
 * Time: 16:26
 */

namespace app\components;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;

/**
 * Class Panel
 * @package infinitiweb\widgets\yii2\panel
 */
class PanelWidget extends Widget
{
  const PANEL_CLASS = 'panel';
  const PANEL_FOOTER_CLASS = 'panel-footer';
  const PANEL_BODY_CLASS = 'panel-body';
  const PANEL_HEADING_CLASS = 'panel-heading';
  const SLIM_SCROLL_DATA_KEY = 'data-slim';
  const SLIM_SCROLL_PANEL_CLASS = 'slimScrollPanel';
  const PANEL_INVERSE_CLASS = 'panel';
  const PANEL_TITLE = 'panel-title';
  /**
   * @var array the HTML attributes for the widget container tag.
   * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
   */
  public $options = [];
  /** @var array */
  public $bodyOptions = [];
  /** @var  string the panel-title */
  public $title;
  /** @var bool */
  public $heading = false;

  public $headerActions = false;
  /** @var */
  public $content;

  public $id;
  /** @var */
  public $header;

  public $idr;
  /** @var */
  public $footer;
  /** @var bool */
  public $slimScroll = false;
  /** @var array */
  public $slimOptions = [];

  public function init()
  {
    $this->initOptions();
    echo Html::beginTag('div', $this->options, ['class' => self::PANEL_CLASS]);
    if ($this->heading) {
      echo Html::tag(
        'div',
        sprintf('%s%s', Html::tag('h4', $this->title, ['class' => self::PANEL_TITLE]), $this->header),
        ['class' => self::PANEL_HEADING_CLASS]
      );
    }
    Html::addCssClass($this->bodyOptions, self::PANEL_BODY_CLASS);
    echo Html::beginTag('div', $this->bodyOptions, ['id' => 'panel-' . $this->id]);
    echo $this->content;
  }

  public function run()
  {
    echo Html::endTag('div');
    if ($this->footer !== null) {
      echo Html::tag('div', $this->footer, ['class' => self::PANEL_FOOTER_CLASS]);
    }
    echo Html::endTag('div');
  }

  public static function finish(bool $card = true)
  {

    $html = '';
    if ($card)
      $html = '
                  </div>

                </div>
                <!--end::Row-->
              </div>
              <!--end::Card body-->
            </div>';

    $html .= '
        </div>
        <!--end::Content container-->
      </div>
      <!--end::Content-->
      ';

    echo $html;
  }

  public static function start(bool $card = true, array $options = [])
  {

    $html = '
    <div id="kt_app_content" class="app-content">
        <div id="kt_app_content_container" class="app-container">';


    if ($card)
      $html .= '
          <!--begin::Card-->
          <div class="card">';

    if ($options['heading'] ?? false) {

      $html .= '
            <div class="card-header">
              <!--begin::Card title-->
              <div class="card-title m-0">
                <!--begin::Title-->
                '.($options['heading']??'').'
                <!--end::Title-->
              </div>
              <!--end::Card title-->
            </div>';
    }


    $body = '';
    if(isset($options['body']) && is_array($options['body'])) {

      foreach ($options['body'] as $key=>$item) {

        $body = $key.'="'.$item.'"';

      }
    }

    $html .= '
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body" '.$body.'>
              <!--begin::Row-->
              <div class="row">
                <!--begin::Col-->
                <div class="col-md-12">';
    echo $html;

  }

//    private function prepareOptionsToAttr(string $attrName, array $options = [])
//    {
//        $strArr = [];
//        foreach ($options as $key => $option) {
//            $strArr[sprintf('%s-%s', $attrName, $key)] = $option;
//        }
//        return $strArr;
//    }

  private function initOptions()
  {
    /** @var View $view */
    $view = $this->getView();

    if (!array_key_exists('id', $this->options)) {
//            $this->options['id'] = $this->getId();
      $this->options['id'] = $this->id ? $this->id : $this->getId();
    }
    if (!array_key_exists('class', $this->options)) {
      $this->options['class'] = self::PANEL_INVERSE_CLASS;
    }
//        PanelAsset::register($view);
  }
}
