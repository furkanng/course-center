<?php

namespace App\Traits;

use App\Models\LinkList;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait SeoTrait
{
    private array $linklist ;

    public function bootSeoTrait(): void
    {
        static::creating(function ($model) {
            self::seoLinkMapper($model);
            self::seoTitleMapper($model);
            self::seoDescriptionMapper($model);
            self::seoKeywordsMapper($model);
            self::linkCreate();
        });

        static::updating(function ($model) {
            self::seoLinkUpdateMapper($model);
            self::linkCreate();
        });

        static::deleting(function ($model) {
            self::linkDelete($model);
        });
    }

    private function seoLinkMapper($model): void
    {
        if (Schema::hasColumn($model->table, "title")) {
            $newLink = Str::slug($model->title, "-", "tr");
            $control = self::linkControl($newLink);
            if ($control) {
                $this->linkList->link = $newLink;
            } else {
                $randLink = $newLink . "-" . rand(1, 500);
                $this->linkList->link = $randLink;
            }
        } elseif (Schema::hasColumn($model->table, "name")) {
            $newLink = Str::slug($model->name, "-", "tr");
            $control = self::linkControl($newLink);
            if ($control) {
                $this->linkList->link = $newLink;
            } else {
                $randLink = $newLink . "-" . rand(1, 500);
                $this->linkList->link = $randLink;
            }
        }
    }

    private function seoTitleMapper($model): void
    {
        if (Schema::hasColumn($model->table, "title")) {
            $this->linkList->seo_title = $model->title;
        } elseif (Schema::hasColumn($model->table, "name")) {
            $this->linkList->seo_title = $model->name;
        }

    }

    private function seoKeywordsMapper($model): void
    {
        if (Schema::hasColumn($model->table, "title")) {
            $this->linkList->seo_keywords = $model->title;
        } elseif (Schema::hasColumn($model->table, "name")) {
            $this->linkList->seo_keywords = $model->name;
        }
    }

    private function seoDescriptionMapper($model): void
    {
        if (Schema::hasColumn($model->table, "title")) {
            $this->linkList->seo_description = $model->title;
        } elseif (Schema::hasColumn($model->table, "name")) {
            $this->linkList->seo_description = $model->name;
        }

    }

    public static function linkControl($link): bool
    {
        $dataLink = LinkList::query()->where("link", $link)->first();

        if ($dataLink == null) {
            return true;
        } else {
            return false;
        }
    }

    private function linkCreate(): void
    {
        $this->linkList->where("link", $this->linkList->link)->delete();
        #$hasLink = LinkList::query()->where("link", $this->linkList->link)->first();

        #if ($hasLink) {
        #    $hasLink->delete();
        #}

        (new $this->linkList)->save();

        #$builder->link = ($model->seo_link);
        #$builder->seo_title = ($model->seo_title);
        #$builder->seo_description = ($model->seo_description);
        #$builder->seo_keywords = ($model->seo_keywords);
        #$builder->type = $model->table;

        #$builder->save();

    }

    public static function seoLinkUpdateMapper($model): void
    {
        if (Schema::hasColumn($model->table, "seo_link")) {
            $originalLink = $model->getOriginal("seo_link");
            $attributesLink = $model->getAttribute("seo_link");

            if ($originalLink !== $attributesLink) {
                $newLink = Str::slug($attributesLink, "-", "tr");
                $control = self::linkControl($newLink);
                if ($control) {
                    $model->seo_link = $newLink;
                } else {
                    $model->seo_link = $originalLink;
                }
            }
        }
    }

    public static function linkDelete($model): void
    {
        if (isset($model->seo_link)) {
            LinkList::query()->where("link", $model->seo_link)->delete();
        }
    }


}
