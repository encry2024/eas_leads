<?php

namespace App\Events\Backend\Management\Lead;

use Illuminate\Queue\SerializesModels;

/**
* Class LeadDeleted.
*/
class LeadDeleted
{
   use SerializesModels;

   /**
   * @var
   */
   public $lead;

   /**
   * @param $lead
   */
   public function __construct($lead)
   {
      $this->lead = $lead;
   }
}
