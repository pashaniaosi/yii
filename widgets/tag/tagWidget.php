<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/21
 * Time: 17:35
 */
namespace app\widgets\tag;

use app\models\Tag;
use Yii;
use yii\bootstrap\Widget;

class tagWidget extends Widget
{
    public $title = '';

    public $limit = 20;

    public function run()
    {
        $res = Tag::find()
            ->orderBy(['post_num' => SORT_DESC])
            ->limit($this->limit)
            ->all();

        $result['title'] = $this->title?:'标签云';
        $result['body'] = $res?:[];

        return $this->render('index', ['data' => $result]);
    }
}