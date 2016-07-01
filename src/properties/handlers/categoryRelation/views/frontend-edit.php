<?php

/**
 * @var $attribute_name string
 * @var $form \yii\widgets\ActiveForm
 * @var $label string
 * @var $model \app\properties\AbstractModel
 * @var $multiple boolean
 * @var $property_id integer
 * @var $property_key string
 * @var $this \yii\web\View
 * @var $values \app\properties\PropertyValue
 */

use app\modules\shop\models\Category;
use yii\helpers\ArrayHelper;

$categoriesIds = ArrayHelper::getColumn($values->values, 'value');

$data = [];
foreach ($values->values as $value) {
    $category = Category::findById($value['value']);
    if ($category !== null) {
        $data [$category->id] = $category->name;
    }
}

?>

<?=\app\backend\widgets\Select2Ajax::widget(
    [
        'initialData' => $data,
        'form' => $form,
        'model' => $model,
        'modelAttribute' => $property_key,
        'multiple' => $multiple === 1,
        'searchUrl' => '/CategoryRelationProperty/category/ajax-related-category',
        'additional' => [
            'placeholder' => Yii::t('app', 'Search'),
        ],
    ]
);
