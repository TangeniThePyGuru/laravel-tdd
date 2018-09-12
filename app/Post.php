<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    /**
     * @return string
     */
    public function createdAt()
    {
        return $this->created_at->toFormattedDateString();
    }
}
