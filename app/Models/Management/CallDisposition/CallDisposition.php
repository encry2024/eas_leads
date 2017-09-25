<?php

namespace App\Models\Management\CallDisposition;

use Illuminate\Database\Eloquent\Model;

class CallDisposition extends Model
{
   protected $table;

   protected $fillable = [
      'name',
      'type',
      'description'
   ];

   public function __construct(array $attributes = [])
   {
      parent::__construct($attributes);
      $this->table = config('management.call_dispositions_table');
   }
}
