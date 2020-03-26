<?php
namespace Isb\Language;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * @var string
     */
    protected $table = 'language';

    public $incrementing = false;

    protected $dates = [self::CREATED_AT, self::UPDATED_AT];
}
