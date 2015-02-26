<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Course;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_code')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'course_title')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'dept_id')->dropDownList(
    													ArrayHelper::map(Department::find()->all(),'dept_id','dept_name'), 
    													["prompt"=> "Select Dept"]
    												);  ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
