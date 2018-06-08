<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;

    /**
     * 索引的字段
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->only('id', 'sorts','title', 'content');
    }
}
