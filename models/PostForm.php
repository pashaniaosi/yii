<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16
 * Time: 10:44
 */

namespace app\models;

use Yii;
use yii\base\Model;

class PostForm extends Model
{
    public $id;
    public $tag;
    public $cat_id;
    public $label_img;
    public $title;
    public $content;

//    记录最新的错误
    public $_lastError;

    /**
     * 定义场景
     */
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public function scenarios()
    {
        $scenarios = [
            self::SCENARIO_CREATE => ['title', 'content', 'label_img', 'tag', 'cat_id'],
            self::SCENARIO_UPDATE => ['title', 'content', 'label_img', 'tag', 'cat_id'],
        ];
        return array_merge(parent::scenarios(), $scenarios);
    }

    public function rules()
    {
        return [
            [['id', 'cat_id', 'title', 'content'], 'required'],
            ['title', 'string', 'min' => 4, 'max' => 20],
            [['id', 'cat_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id'=>Yii::t('app', '编号'),
            'tag' => Yii::t('app', '标签'),
            'cat_id' => Yii::t('app', '类别'),
            'label_img' => Yii::t('app', '图标'),
            'title' => Yii::t('app', '标题'),
            'content' => Yii::t('app', '内容'),
        ];

    }

    public function create()
    {
//        事务
        $transaction= Yii::$app->db->beginTransaction();
        try{
            $model = new Post();
            $model->setAttributes($this->attributes);
//            获取文章的简介
            $model->summary = $this->_getSummary();
            $model->user_id = Yii::$app->user->identity->id;
            $model->user_id = Yii::$app->user->identity->username;
            $model->created_at = time();
            $model->updated_at = time();
            if(!$model->save())
                throw new \Exception(Yii::t('app', '文章保存失败'));
            $transaction->commit();
            return true;
        } catch (\Exception $exception){
           $transaction->rollBack();
           $this->_lastError = $exception->getMessage();
           return false;
        }
    }
}