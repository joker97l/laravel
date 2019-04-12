<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bid extends Model
{
  // Mass assigned
  protected $fillable = ['title', 'slug', 'goal',
  'pledge', 'amount', 'amount_refund', 'percent', 'term',
  'term_magnitude', 'description', 'published', 'created_by'];

  // Mutators
  public function setSlugAttribute($value) {
    $this->attributes['slug'] = Str::slug( mb_substr($this->title,
    0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
  }
}
