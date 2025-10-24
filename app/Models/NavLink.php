<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavLink extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url' , 'view_file',  'is_active', 'deleted' , 'parent_id', 'position' , 'content'];

    public function scopeActive($query)
    {
        return $query->where('deleted', 0); 
    }
      // Children Relationship
      public function children()
      {
          return $this->hasMany(NavLink::class, 'parent_id');
      }
  
      // Parent Relationship (optional, if needed)
      public function parent()
      {
          return $this->belongsTo(NavLink::class, 'parent_id');
      }
}
