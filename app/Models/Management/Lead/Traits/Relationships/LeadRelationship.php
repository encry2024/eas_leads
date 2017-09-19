<?php

namespace App\Models\Management\Lead\Traits\Relationships;

/**
 * Lead Relationship
 */
trait LeadRelationship
{
   public function last_disposition()
   {
      return $this->belongsTo(config('management.last_disposition'));
   }
}
