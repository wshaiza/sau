<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property string $course_code
 * @property string $course_title
 * @property string $dept_id
 *
 * @property Department $dept
 * @property Mark[] $marks
 * @property Student[] $studs
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_code', 'course_title', 'dept_id'], 'required'],
            [['course_code'], 'string', 'max' => 15],
            [['course_title'], 'string', 'max' => 50],
            [['dept_id'], 'string', 'max' => 10],
            [['dept_id'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_code' => 'Course Code',
            'course_title' => 'Course Title',
            'dept_id' => 'Dept Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Department::className(), ['dept_id' => 'dept_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarks()
    {
        return $this->hasMany(Mark::className(), ['course_code' => 'course_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuds()
    {
        return $this->hasMany(Student::className(), ['stud_id' => 'stud_id'])->viaTable('mark', ['course_code' => 'course_code']);
    }
}
