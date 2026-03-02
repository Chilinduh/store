<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.07.19
 * Time: 16:26
 */

namespace common\components;

use yii\base\Widget;
use yii\web\View;

/**
 * Class Panel
 * @package infinitiweb\widgets\yii2\panel
 */
class CopyToBufferWidget extends Widget
{

	public $text = 'copy text';
	public $class = 'copy';

	public function init()
	{

//		CropAsset::register( $this->getView() );
		parent::init();
	}

	public function run()
	{

		$view = $this->getView();

		echo '<div class="' . (!empty($this->class) ? $this->class : ' copy') . '">' . $this->text . '</div>';
//
		$view->registerJs("(function () {

			document.body.onclick = (event) => {
				const elem = event.target;

				if (elem.classList.contains('" . (!empty($this->class) ? $this->class : ' copy') . "')) {

					  if (navigator.clipboard) {
						return navigator.clipboard.writeText(elem.innerHTML);
					  }

					  const element = document.createElement('span');
					  element.textContent = elem.innerHTML;
					  element.style.whiteSpace = 'pre';
					  document.body.appendChild(element);
					  const selection = window.getSelection();
					  const range = document.createRange();
					  selection.removeAllRanges();
					  range.selectNode(element);
					  selection.addRange(range);
					  document.execCommand('copy');
					  selection.removeAllRanges();
					  document.body.removeChild(element);

				}
			}
        })();", View::POS_END);

	}

}

?>
