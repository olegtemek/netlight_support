<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'site_id';
    protected $fillable = ['site_name', 'site_admin', 'site_ftp', 'site_host'];
}
