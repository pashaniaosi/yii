<?php

namespace app\models;

use app\models\base\Base;
use Yii;

/**
 * This is the model class for table "relation_post_tags".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $tag_id
 */
class RelationPostTag extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relation_post_tags';
    }

    /**
     * 得到关联的 tags 表
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['post_id', 'tag_id'],
                'integer'
            ],
            [
                ['post_id', 'tag_id'],
                'unique', 'targetAttribute' => ['post_id', 'tag_id'],
                'message' => 'The combination of 文章ID and 标签ID has already been taken.'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '自增ID'),
            'post_id' => Yii::t('app', '文章ID'),
            'tag_id' => Yii::t('app', '标签ID'),
        ];
    }
}
