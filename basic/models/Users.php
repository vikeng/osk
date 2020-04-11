<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Users".
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 *
 * @property City $city
 * @property UsersSkills[] $usersSkills
 * @property Skills[] $skills
 */
class Users extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'city_id'], 'required'],
            [['city_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [
                ['city_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => City::className(),
                'targetAttribute' => ['city_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Пользователь',
            'city_id' => 'Город',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * Gets query for [[UsersSkills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersSkills()
    {
        return $this->hasMany(UsersSkills::className(), ['user_id' => 'id']);
    }

    /**
     * @return $this
     */
    public function getSkills()
    {
        return $this->hasMany(Skills::className(), ['id' => 'skill_id'])
            ->via('usersSkills');
    }

    /**
     * @return string
     */
    public function getSkillsAsString()
    {
        return implode(', ', ArrayHelper::getColumn($this->skills, 'name'));
    }
}
