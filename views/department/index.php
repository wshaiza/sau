<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal; 
use yii\bootstrap\Button; 


/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Department', ['create'], ['class' => 'btn btn-success']) ?>
        
        <?= 
             Button::widget([
             'label' => 'Create Department',
                'options' => ['class' => 'btn btn-success','id'=>'createDeptButton'],
                ]);

        ?>
    </p>
    <?php
        Modal::begin([
        'header' => '<h2>Hello world</h2>',
        ]);

        echo 'Say hello...';

        Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dept_id',
            'dept_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
