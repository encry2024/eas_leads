<?php

namespace App\Events\Backend\Management\Lead;

use Illuminate\Queue\SerializesModels;

/**
 * Class LeadRestored.
 */
class LeadRestored
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
