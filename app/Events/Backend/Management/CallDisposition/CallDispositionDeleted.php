<?php

namespace App\Events\Backend\Management\CallDisposition;

use Illuminate\Queue\SerializesModels;

/**
* Class CallDispositionDeleted.
*/
class CallDispositionDeleted
{
   use SerializesModels;

   /**
   * @var
   */
   public $call_disposition;

   /**
   * @param $call_disposition
   */
   public function __construct($call_disposition)
   {
      $this->call_disposition = $call_disposition;
   }
}
