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

use app\models\Property;
use app\modules\shop\models\Category;
use yii\helpers\ArrayHelper;
use kartik\helpers\Html;

$categoriesIds = ArrayHelper::getColumn($values->values, 'value');
/** @var Category[] $categories */

$categories = [];
foreach ($categoriesIds as $id) {
    $categories[] = Category::findOne($id);
}

?>

<dl>
    <?php
    if (count($categoriesIds) == 0) {
        return;
    }
    $property = Property::findById($property_id);
    echo Html::tag('dt', $property->name);
    foreach ($categories as $category) {
        echo Html::tag('dd', Html::a($category->name, ['@category', 'model' => $category]));
    }
    ?>
</dl>
