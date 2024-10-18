<?php

namespace app\models;

use app\core\DBModel;

class Offer extends DBModel
{
    public const STATUS_ONLINE = 0;
    public const STATUS_OFFLINE = 1;

    public int $id = 0;
    public string $title = '';
    public string $summary = '';
    public string $description = '';
    public int $likes = 0;
    public int $offline = self::STATUS_OFFLINE;
    public string $offline_date = '';
    public string $last_online_date = '';
    public int $view_counter = 0;
    public int $click_counter = 0;
    public string $website = '';
    public string $phone_number = '';
    public string $created_at = '';
    public string $updated_at = '';

    public static function tableName(): string
    {
        return 'offer';
    }

    public function attributes(): array
    {
        return ['title', 'summary', 'description', 'likes', 'offline', 'offline_date', 'last_online_date', 'view_counter', 'click_counter', 'website', 'phone_number', 'created_at', 'updated_at'];
    }

    public function updateAttributes(): array
    {
        return ['title', 'summary', 'description', 'likes', 'offline', 'offline_date', 'last_online_date', 'view_counter', 'click_counter', 'website', 'phone_number', 'created_at', 'updated_at'];
    }

    public function rules(): array
    {
        return [
            'title' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 60]],
            'summary' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 128]],
            'description' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 1024]],
            'website' => [],
        ];
    }

    public function labels(): array
    {
        return [
            'title' => 'Titre',
            'summary' => 'Résumé',
            'website' => 'Site web',
            'phone_number' => 'Numéro de téléphone',
        ];
    }
}