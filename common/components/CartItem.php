<?php

namespace common\components;

use Yii;
use yii\base\Model;

class CartItem extends Model
{

  public const MODE_COLOR_SIZE = 1;

  public ?int $id = null;
  public ?string $brand = '';
  public ?int $brand_id = null;
  public ?int $category_id = null;
  public ?string $code = '';
  public ?array $colors = [];
  public ?int $created_at = null;
  public ?string $description = '';
  public ?array $images = [];
  public ?bool $inCart = false;
  public ?bool $inFavorite = false;
  public ?bool $main = false;
  public ?array $manufacturer = [];
  public ?int $manufacturer_id = null;
  public ?string $name = '';
  public ?int $packaging_type_id = null;
  public ?int $price = null;
  public ?array $property = [];
  public ?bool $show = false;
  public ?int $updated_at = null;
  public ?string $weight = '';
  public ?string $mode = '';

  public function __construct()
  {

  }

  public function init()
  {

    $this->setMode();
  }

  public function setMode(int $mode = self::MODE_COLOR_SIZE)
  {

    $this->mode = $mode;
  }

  public function formName()
  {
    return '';
  }

}
