<?php

namespace App\Events\Backend\Management\Lead;

use Illuminate\Queue\SerializesModels;

/**
 * Class LeadUpdated.
 */
class LeadUpdated
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
