<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal; 
use yii\bootstrap\Button; 
use yii\helpers\Url;

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
      
        <?= 
             Button::widget([
             'label' => 'Create Department',
                'options' => ['class' => 'btn btn-success','id'=>'createDeptButton',
                              'data-url'=>Url::to(['department/create'])
                              ],
                ]);

        ?>
    </p>
    
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


    <?php 

        //modal for Create Department
        Modal::begin([
        'header' => '<h2>Create Department</h2>', 
        'footer' => Button::widget([
                            'label'=> 'close',
                            'options'=> ['class'=>'btn ','data-dismiss'=>'modal']
                                ]),
        'id' => 'modalDeptCreate'

        ]);

        echo "<div id='deptCreateModalContainer'> </div>";

        Modal::end();
    ?>


</div>
