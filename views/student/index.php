<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Button; 
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    <?=
         Button::widget([
             'label' => 'New Student',
                'options' => ['class' => 'btn btn-success','id'=>'createStudentButton',
                              'data-url'=>Url::to(['student/create'])
                              ],
                ]);
    ?>
    </p>
<?php Pjax::begin();  ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stud_id',
            'name',
            'dept_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>

    <?php 

        //modal for New Student
        Modal::begin([
        'header' => '<h2>New Student</h2>', 
        'footer' => Button::widget([
                            'label'=> 'close',
                            'options'=> ['class'=>'btn ','data-dismiss'=>'modal']
                                ]),
        'id' => 'modalStudentCreate'

        ]);

        echo "<div id='courseStudentModalContainer'> </div>";

        Modal::end();
        

    ?>  

</div>
