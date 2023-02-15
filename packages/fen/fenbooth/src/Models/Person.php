<?php

namespace Fen\Fenbooth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;
use Fen\Fenbooth\Models\PersonTag;

class Person extends Model
{
    use HasFactory, Translatable, Resizable;
    
    protected $table = 'person';

    public const STATUS_ACTIVE = 'ACTIVE';
    public const STATUS_INACTIVE = 'INACTIVE';

    protected $guarded = [];

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        // if (!$this->author_id && Auth::user()) {
        //     $this->author_id = Auth::user()->id;
        // }

        parent::save();
    }
    
    // public function person_tag()
    // {
    //     return $this->belongsToMany(PersonTag::class, 'person_person_tag');
    // }

    public function personTagId()
    {
        return $this->belongsToMany(PersonTag::class, 'person_person_tag');
    }
}
