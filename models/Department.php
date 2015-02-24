<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property string $dept_id
 * @property string $dept_name
 *
 * @property Student[] $students
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dept_id', 'dept_name'], 'required'],
            [['dept_id'], 'string', 'max' => 10],
            [['dept_name'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dept_id' => 'Dept Code',
            'dept_name' => 'Dept Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['dept_id' => 'dept_id']);
    }
}
