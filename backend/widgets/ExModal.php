<?php
namespace backend\widgets;

use yii\helpers\Html;

/**
 * ExModal модифицированный виджет отрисовки модали.
 * Особенности - footer и header на входе могут получать значения
 * в виде массива.
 *
 * @author Прусов Александр <a.prusov@smileexpo.ru>
 */
class ExModal extends \yii\bootstrap\Modal
{
    /**
     * Renders the header HTML markup of the modal
     * @return string the rendering result
     */
    protected function renderHeader()
    {
        $this->header = $this->parseOption($this->header);

        $button = $this->renderCloseButton();
        if ($button !== null) {
            $this->header = $button . "\n" . $this->header;
        }
        if ($this->header !== null) {
            Html::addCssClass($this->headerOptions, ['widget' => 'modal-header']);
            return Html::tag('div', "\n" . $this->header . "\n", $this->headerOptions);
        } else {
            return null;
        }
    }

    /**
     * Renders the HTML markup for the footer of the modal
     * @return string the rendering result
     */
    protected function renderFooter()
    {
        if ($this->footer !== null) {

            $this->footer = $this->parseOption($this->footer);

            Html::addCssClass($this->footerOptions, ['widget' => 'modal-footer']);
            return Html::tag('div', "\n" . $this->footer . "\n", $this->footerOptions);
        } else {
            return null;
        }
    }

    /**
     * Возвращает значение опции в виде строки.
     *
     * @param array/string $value
     * @return string the rendering result
     */
    private function parseOption($value)
    {
        $returnedValue = null;

        if (is_array($value)) {
            foreach ($value as $item) {
                $returnedValue .= $item;
            }
            return $returnedValue;
        }
        return $value;
    }
}
