<?php

namespace app\controllers;


use yii\web\Controller;
use yii\web\Response;
use app\models\Users;
use yii\data\ActiveDataProvider;
use app\models\City;
use app\models\Skills;
use app\models\UsersSkills;
use yii\db\Expression;
use Yii;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionAjaxTable()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find()->joinWith('city')->joinWith('usersSkills'),
            'pagination' => false,
        ]);
        return $this->renderAjax('ajaxTable', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionAjaxAddUser()
    {
        $names = ['Иванов', 'Сергеев', 'Антонов', 'Столяров', 'Петрухин'];
        $name = $names[array_rand($names)];
        $city = City::find()->orderBy(new Expression('RAND()'))->limit(1)->one();
        $skills = Skills::find()->orderBy(new Expression('RAND()'))->limit(mt_rand(1, 3))->all();

        $transaction = Yii::$app->db->beginTransaction();
        try {
            $user = new Users(['name' => $name, 'city_id' => $city->id]);
            $user->save();
            foreach ($skills as $skill) {
                (new UsersSkills(['user_id' => $user->id, 'skill_id' => $skill->id]))->save();
            }
            $transaction->commit();
            $success = true;
            $message = 'Пользователь добавлен';
        } catch (\Exception $e) {
            $transaction->rollBack();
            $success = false;
            $message = 'Не удалось добавить пользователя';
        }
        Yii::$app->response->format = Response::FORMAT_JSON;

        return ['success' => $success, 'message' => $message];
    }
}
