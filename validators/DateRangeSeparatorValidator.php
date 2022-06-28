<?php

namespace app\validators;

use Yii;
use yii\base\InvalidConfigException;
use yii\validators\DateValidator;
use yii\validators\Validator;

class DateRangeSeparatorValidator extends Validator
{
    const INTERVAL_DAY = 'day';

    public $separator = ' - ';
    public $startAttribute;
    public $endAttribute;
    public $startTimestampAttribute;
    public $endTimestampAttribute;
    public $interval;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->startAttribute === null) {
            throw new InvalidConfigException();
        }
        if ($this->endAttribute === null) {
            throw new InvalidConfigException();
        }
        if ($this->message === null) {
            $this->message = Yii::t('yii', 'Диапазон {attribute} имеет не верный формат.');
        }
    }

    /**
     * @inheritdoc
     */
    public function validateAttribute($model, $attribute)
    {
        $dates = explode($this->separator, $model->$attribute);
        if (count($dates) == 2) {
            $dateValidator = new DateValidator();
            if ($dateValidator->validate($dates[0]) && $dateValidator->validate($dates[1])) {
                $model->{$this->startAttribute} = $dates[0];
                $model->{$this->endAttribute} = $dates[1];
            } else {
                $model->addError($attribute, $this->message);
            }
        } else {
            $model->addError($attribute, $this->message);
        }

        if ($this->startTimestampAttribute !== null) {
            if ($this->interval == self::INTERVAL_DAY) {
                $model->{$this->startTimestampAttribute} = (int)Yii::$app->formatter->asTimestamp(Yii::$app->formatter->asDate($model->{$this->startAttribute}));
            } else {
                $model->{$this->startTimestampAttribute} = (int)Yii::$app->formatter->asTimestamp($model->{$this->startAttribute});
            }
        }
        if ($this->endTimestampAttribute !== null) {
            if ($this->interval == self::INTERVAL_DAY) {
                $model->{$this->endTimestampAttribute} = ((int)Yii::$app->formatter->asTimestamp(Yii::$app->formatter->asDate($model->{$this->endAttribute})) + 24 * 60 * 60);
            } else {
                $model->{$this->endTimestampAttribute} = (int)Yii::$app->formatter->asTimestamp($model->{$this->endAttribute});
            }
        }
    }
}
