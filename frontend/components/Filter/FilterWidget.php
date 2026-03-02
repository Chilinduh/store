<?php

namespace frontend\components\Filter;

use yii\base\Widget;
use yii\helpers\Html;

class FilterWidget extends Widget
{

  public array $filters = [];
  public ?string $type = 'checkbox';
  public array $items = [];
  public string $html = '';

  public function init()
  {

    if (count($this->filters)) {

      foreach ($this->filters as $filter) {

        switch ($filter['type']) {

          case 'checkbox':

            $this->html .= $this->render('checkbox',
              [
                'id' => $filter['id']??'',
                'title' => $filter['title'],
                'items' => $filter['items'],
                'value' => $filter['value'],
                'field' => $filter['field']
              ]);
            break;

          case 'slider':
            $this->html .= $this->render('slider',
              [
                'id' => $filter['id']??'',
                'title' => $filter['title']??'',
                'field' => $filter['field']??'',
                'items' => $filter['items']??[],
                'value' => $filter['value']??'',
                'min' => $filter['min']??0,
                'max' => $filter['max']??0,
                'from' => $filter['from']??0,
                'to' => $filter['to']??0
              ]);
            break;
        }

      }

    }

    parent::init();
  }

  public function run()
  {

    echo $this->html;
  }

  public function filterCheckBox($value)
  {

    return $this->render('checkbox', ['categories' => $this->categories]);
  }


  public function filterSlider($value)
  {

    return $this->render('navBar', ['categories' => $this->categories]);
  }

}
