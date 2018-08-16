<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Comment;

/**
 * CommentSearch represents the model behind the search form of `common\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'entity_id'], 'integer'],
            [['entity_class'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Comment::find();
        $query->select('*, a.content AS articleContent, p.content AS postContent')
            ->from('comment c')
            ->leftJoin('article a', 'c.entity_id = a.id AND c.entity_class = "\\' . addslashes('\\' . Article::className()) . '"')
            ->leftJoin('post p', 'c.entity_id = p.id AND c.entity_class = "' . addslashes('\\' . Post::className()) . '"');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'entity_id' => $this->entity_id,
        ]);

        $query->andFilterWhere(['like', 'entity_class', $this->entity_class]);

        return $dataProvider;
    }
}
