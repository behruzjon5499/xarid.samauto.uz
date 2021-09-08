<?php

namespace backend\controllers;

use backend\models\TestView;
use common\models\VacancyStudy;
use common\models\VacancyWork;
use Yii;
use common\models\Vacancy;
use common\models\VacancySearch;
use yii\base\BaseObject;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VacancyController implements the CRUD actions for Vacancy model.
 */
class VacancyController extends Controller
{


    /**
     * Lists all Vacancy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VacancySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vacancy model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $studies= VacancyStudy::find()->where(['vacancy_id'=>$id])->all();
        $works= VacancyWork::find()->where(['vacancy_id'=>$id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'studies' => $studies,
            'works' =>$works,
        ]);
    }

    /**
     * Creates a new Vacancy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vacancy();

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $new_model = new Vacancy();
                $new_model->full_name = $model->full_name;
                $new_model->birth_day = $model->birth_day;
                $new_model->nation = $model->nation;
                $new_model->phone = str_replace( "-","",$model->phone);
                $new_model->email = $model->email;
                $new_model->save();

                if ($model->Study) {
                    foreach ($model->Study as $study){
                        $model_study = new VacancyStudy();
                        $model_study->vacancy_id =$new_model->id;
                        $model_study->university =  $study['university'];
                        $model_study->end_year =  $study['end_year'];
                        $model_study->type = $study['type'];
                        $model_study->save();
//                        VarDumper::dump($model_study,12,true);
//                        die();
                    }
                }

                if ($model->Work) {
                    foreach ($model->Work as $work){
                    $model_work = new VacancyWork();
                    $model_work->vacancy_id = $new_model->id;
                    $model_work->work = $work['work'];
                    $model_work->start_date = $work['start_date'];
                    $model_work->end_date = $work['end_date'];
                    $model_work->save();
                }
                }
                return $this->redirect(['view', 'id' => $new_model->id]);
            }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vacancy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $new_model = Vacancy::find()->where(['id'=>$model->id])->one();
            $new_model->full_name = $model->full_name;
            $new_model->birth_day = $model->birth_day;
            $new_model->nation = $model->nation;
            $new_model->phone = str_replace( "-","",$model->phone);
            $new_model->email = $model->email;
            $new_model->save();

            if ($model->Study) {
                foreach ($model->Study as $study){
                    $old_study = VacancyStudy::find()->where(['id'=>$study['id']])->one();
                    $model_study = $old_study ?$old_study:new VacancyStudy();
                    $model_study->vacancy_id =$model->id;
                    $model_study->university =  $study['university'];
                    $model_study->end_year =  $study['end_year'];
                    $model_study->type = $study['type'];
                    $model_study->save();

                }
            }

            if ($model->Work) {
                foreach ($model->Work as $work){
                    $old_work =  VacancyWork::find()->where(['id'=>$work['id']])->one();
                    $model_work =  $old_work ? $old_work : new VacancyWork();
                    $model_work->vacancy_id = $model->id;
                    $model_work->work = $work['work'];
                    $model_work->start_date = $work['start_date'];
                    $model_work->end_date = $work['end_date'];
                    $model_work->save();
                }
            }
            return $this->redirect(['view', 'id' => $new_model->id]);
        }

        $studies = VacancyStudy::find()->where(['vacancy_id'=>$id])->all();
        $works = VacancyWork::find()->where(['vacancy_id'=>$id])->all();
        $test = new Vacancy();
        $test->full_name =$model->full_name;
        $test->nation =$model->nation;
        $test->birth_day =$model->birth_day;
        $test->phone =$model->phone;
        $test->email =$model->email;
        foreach ($studies as $study){
            $item =[];
            $item['id']=$study->id;
            $item['university']=$study->university;
            $item['end_year']=$study->end_year;
            $item['type']=$study->type;

            $test->Study[] = $item;
        }
        foreach ($works as $work){
            $item1 =[];
            $item1['id']=$work->id;
            $item1['work']=$work->work;
            $item1['start_date']=$work->start_date;
            $item1['end_date']=$work->end_date;
            $test->Work[] = $item1;

        }

        return $this->render('update', [
            'model' => $test,
        ]);
    }

    /**
     * Deletes an existing Vacancy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->get('id');
            $this->findModel($id)->delete();
            return $this->asJson(['ok']);
        }
        return $this->asJson([]);
    }

    /**
     * Finds the Vacancy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vacancy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vacancy::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPrint($id)
    {
        $vacancy = Vacancy::findOne($id);
        $studies = VacancyStudy::find()->where(['vacancy_id'=>$id])->all();
        $works = VacancyWork::find()->where(['vacancy_id'=>$id])->all();
        $mpdf = new \Mpdf\Mpdf();
        $study_html = '';
        $i=1;
        foreach ($studies as $study) {

            $study_html .= '<tr>
<td style="padding: 10px 20px;">
            ' . $i . '
</td>
<td style="padding: 10px 20px;">
            ' . $study->university . '
</td>
<td style="padding: 10px 20px;">
            ' . $study->end_year . '
</td>
<td style="padding: 10px 20px;">
            ' . $study->type . '
</td>
</tr>';
            $i = $i+1;
        }
        $work_html = '';
        $i=1;
        foreach ($works as $work) {

            $work_html .= '<tr>
<td style="padding: 10px 20px;">
            ' . $i . '
</td>
<td style="padding: 10px 20px;">
            ' . $work->work . '
</td>
<td style="padding: 10px 20px;">
            ' . $work->start_date . '
</td>
<td style="padding: 10px 20px;">
            ' . $work->end_date . '
</td>
</tr>';
            $i = $i+1;
        }
        $mpdf->WriteHTML('
<h1 style="text-align: center;">'.$vacancy->full_name.'</h1>
<h3>'.$vacancy->email.'</h3>
<h3>'.$vacancy->birth_day.'</h3>
<h3>'.$vacancy->nation.'</h3>
<h2 style="text-align: center;">Studies</h2>
  <table  border="1" cellpadding="0" cellspacing="0"
           style="width: 100%; font-family: margin: 50px auto;font-size: 18px;">


'.$study_html.'
</table>
<h2 style="text-align: center;">Wokks</h2>
  <table  border="1" cellpadding="0" cellspacing="0"
           style="width: 100%; font-family: margin: 50px auto;font-size: 18px;">

'.$work_html.'
</table>
');
        $mpdf->Output('resume.pdf','D');

    }
}
