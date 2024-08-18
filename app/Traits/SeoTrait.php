<?php

namespace App\Traits;

use App\Models\LinkList;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait SeoTrait
{
    protected $linkList;

    protected static function bootSeoTrait(): void
    {
        static::creating(function ($model) {
            $model->initializeLinkList();
            $model->mapSeoAttributes();
            $model->linkCreateOrUpdate();
        });

        static::updating(function ($model) {
            if ($model->isDirty($model->getSeoColumn())) {
                $model->initializeLinkList();
                $model->mapSeoAttributes();
                $model->linkCreateOrUpdate();
            }
        });

        static::deleting(function ($model) {
            $model->linkDelete();
        });
    }

    protected function link(): string
    {
        $column = $this->getSeoColumn();
        return Str::slug($this->getOriginal($column), "-", "tr");
    }

    protected function initializeLinkList(): void
    {
        $this->linkList = LinkList::query()->firstOrNew(['link' => $this->link()]);
    }

    private function mapSeoAttributes(): void
    {
        $column = $this->getSeoColumn();
        $newLink = Str::slug($this->$column, "-", "tr");

        if ($this->linkControl($newLink)) {
            $newLink .= "-" . rand(1, 1000);
        }

        $this->linkList->fill([
            'link' => $newLink,
            'seo_title' => $this->$column,
            'seo_description' => $this->$column,
            'seo_keywords' => $this->$column,
        ]);
    }

    private function getSeoColumn(): string
    {
        return Schema::hasColumn($this->getTable(), "title") ? "title" : "name";
    }

    public function linkControl($link): bool
    {
        return LinkList::query()->where("link", $link)->exists();
    }

    private function linkCreateOrUpdate(): void
    {
        $this->linkList->model = $this->getTable();
        $this->linkList->save();
    }

    private function linkDelete(): void
    {
        LinkList::query()->where("link", $this->link())->delete();
    }

    public function getLinkAttribute(): string
    {
        return $this->link();
    }
}
