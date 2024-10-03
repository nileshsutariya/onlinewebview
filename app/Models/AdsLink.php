<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsLink extends Model
{
    use HasFactory;
    protected $table = 'ads_links';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'link'];

}
