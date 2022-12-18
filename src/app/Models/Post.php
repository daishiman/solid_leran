<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 *
 * @mixin Eloquent
 */
final class Post extends Model
{
    use HasFactory;

    /**
     * @var string テーブル名 指定
     */
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
    ];
}
