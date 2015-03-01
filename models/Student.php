<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property string $stud_id
 * @property string $name
 * @property string $dept_id
 *
 * @property Mark[] $marks
 * @property Course[] $courseCodes
 * @property Department $dept
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stud_id', 'name', 'dept_id'], 'required'],
            [['stud_id'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 50],
            [['dept_id'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stud_id' => 'Stud ID',
            'name' => 'Name',
            'dept_id' => 'Dept ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarks()
    {
        return $this->hasMany(Mark::className(), ['stud_id' => 'stud_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseCodes()
    {
        return $this->hasMany(Course::className(), ['course_code' => 'course_code'])->viaTable('mark', ['stud_id' => 'stud_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Department::className(), ['dept_id' => 'dept_id']);
    }
}
