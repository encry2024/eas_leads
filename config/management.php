<?php

use App\Models\Management\Lead\Lead;
use App\Models\Management\CallDisposition\CallDisposition;


return [
   /*
   * Lead Table
   */
   'lead'         => Lead::class,
   'leads_table'  => 'leads',

   'call_disposition'         => CallDisposition::class,
   'call_dispositions_table'  => 'call_dispositions'

];
