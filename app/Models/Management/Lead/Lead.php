<?php

namespace App\Models\Management\Lead;

use Illuminate\Database\Eloquent\Model;
use App\Models\Management\Lead\Traits\Relationships\LeadRelationship;
use App\Models\Management\Lead\Traits\Attribute\LeadAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
   //
   use LeadRelationship, LeadAttribute, SoftDeletes;

   protected $table;

   protected $fillable = [
      'name',
      'company_name',
      'nature_of_business',
      'additional_information',
      'appointment_schedule',
      'contact_person',
      'email',
      'phone_number',
      'note',
      'reminder',
      'overall_assessment'
   ];

   protected $appends = ['appointed_schedule'];

   public function __construct(array $attributes = [])
   {
      parent::__construct($attributes);
      $this->table = config('management.leads_table');
   }
}
