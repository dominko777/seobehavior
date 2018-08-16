1 . Полиморфный DataProvider - см метод search в CommentSearch
2 . SEO Behavior - добавить поведение в модели
     public function behaviors() {
         return [
                    'seo' => [
                        'class' => 'common\behaviors\SeoBehavior',
                    ],
                ];
    }

    Добавить сео-свойства для редактирование в модели

    public $seoTitle;
    public $seoDescription;
    ....

    public function rules()
    {
        return [
            [['content'], 'string'],
            [['seoTitle', 'seoDescription', 'seoKeywords', 'seoViewport', 'seoCanonical', 'seoCg_title', 'seoOg_image', 'seoTwitter_site', 'seoTwitter_title'], 'string', 'max' => 255],
        ];
    }

    Добавить эти поля в форму модели

    <?= $form->field($model, 'seoTitle')->textInput() ?>
    <?= $form->field($model, 'seoDescription')->textInput() ?>
    ....

    Добавить хэлпер во вьющке

    \common\components\SeoHelper::registerMetaTags($model)