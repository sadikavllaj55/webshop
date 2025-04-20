<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property mixed $name
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function slug(): string
    {
        return Str::slug($this->name);
    }

    public static function getTree(): array
    {
        $categories = Category::all()->keyBy('id');

        $cat_list = [];
        $cat_indexed = [];

        foreach ($categories as $category) {
            $category->children = [];
            $cat_indexed[$category->id] = $category;
        }

        foreach ($cat_indexed as $id => $category) {
            if ($category->parent_id == null) {
                $cat_list[$id] = $category;
            } else {
                $parent = $cat_indexed[$category->parent_id];
                $parent->children[$id] = $category;
            }
        }

        return $cat_list;
    }

    public function inTree(?int $id): bool
    {
        if ($id === null) {
            return false;
        }

        return $this->id == $id || $this->children()->pluck('id')->contains($id);
    }
}
