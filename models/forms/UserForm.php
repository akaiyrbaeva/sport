<?php

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\web\UploadedFile;

class UserForm extends User
{
    public $avatar_file;
    public $password;

    public function rules()
    {
        $rules = parent::rules();

        $rules[] = ['avatar_file', 'file'];
        $rules[] = ['password', 'string'];

        return $rules;
    }

    public function beforeSave($insert)
    {
        $instance = UploadedFile::getInstance($this, 'avatar_file');
        if ($instance !== null) {
            $this->avatar_path = '/uploads/avatars/' . $instance->baseName . '.' . $instance->extension;
            $instance->saveAs(Yii::getAlias('@webroot') . $this->avatar_path);
        }

        if ($this->password) {
            $this->setPassword($this->password);
            $this->generateAuthKey();
        }

        return parent::beforeSave($insert);
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['avatar_file'] = 'Аватар';

        return $labels;
    }
}
