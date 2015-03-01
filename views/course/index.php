<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Button; 
use yii\helpers\Url;
use yii\bootstrap\Modal; 
use app\models\Course; 
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
     
        <?= 
             Button::widget([
             'label' => 'Create Course',
                'options' => ['class' => 'btn btn-success','id'=>'createCourseButton',
                              'data-url'=>Url::to(['course/create'])
                              ],
                ]);

        ?>

    </p>

 <?php Pjax::begin();  ?>
    <?= 

    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'course_code',
            'course_title',
            'dept.dept_id',
            'dept.dept_name',
            [
                'attribute'=>'dept_id',
                'value'=>'dept.dept_name'    
            ],
            //To do: search functionality with dept name isn't working yet ...
           /* [ 
              'attribute'=>'dept_id',
              'value'=>'dept.dept_name'
            ],*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end();  ?>
    <?php 

        //modal for Create Course
        Modal::begin([
        'header' => '<h2>Create Course</h2>', 
        'footer' => Button::widget([
                            'label'=> 'close',
                            'options'=> ['class'=>'btn ','data-dismiss'=>'modal']
                                ]),
        'id' => 'modalCourseCreate'

        ]);

        echo "<div id='courseCreateModalContainer'> </div>";

        Modal::end();
        
   

    ?>    


</div>
