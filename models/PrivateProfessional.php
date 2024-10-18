<?php

namespace app\models;
use app\core\DBModel;

class PrivateProfessional extends DBModel
{

  public int $priv_pro_id = 0;

  public string $last_veto = '';


  public static function tableName(): string
  {
    return 'private_professional';
  }

  public function attributes(): array
  {
    return ['priv_pro_id', 'last_veto'];
  }

  public static function pk(): string
  {
    return 'priv_pro_id';
  }


  public function rules(): array
  {
    return [
      'last_veto' => [self::RULE_REQUIRED]
    ];
  }
}