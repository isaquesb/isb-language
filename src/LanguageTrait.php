<?php
namespace Isb\Language;

trait LanguageTrait
{
    protected function langCol()
    {
        $slit = explode('_', $this->getTable());
        return end($slit) . '_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(static::class . 'Lang', $this->langCol());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(static::class . 'Lang', 'id', $this->langCol());
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $langCode
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithLanguage($query, $langCode = null)
    {
        $query->with(['language' => function ($query) use ($langCode) {
            $query->select([$this->langCol(), 'name'])
                ->where('language_id', $langCode ?? app()->getLocale());
        }]);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $langCode
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLanguageJoin($query, $langCode = null)
    {
        $t = $this->getTable();
        $c = $this->langCol();
        $query
            ->join(sprintf('%s_lang as lang', $t), sprintf('%s.id', $t), '=', sprintf('lang.%1$', $c))
            ->where('lang.language_id', $langCode ?? app()->getLocale());
    }
}
