<?php

use App\Models\Management\Lead\Lead;
use App\Models\Management\Lead\ContactPersonLead;
use App\Models\Management\Lead\ContactPersonEmail;
use App\Models\Management\Lead\ContactPersonPhoneNumber;

return [
   /*
   * Lead Table
   */
   'lead'         => Lead::class,
   'leads_table'  => 'leads',

   /*
   * Contact Person Leads Table
   */
   'contact_person_leads'              => ContactPersonLead::class,
   'contact_person_leads_table'       => 'contact_person_leads',

   /*
   * Contact Person Email Table
   */
   'contact_person_emails'        => ContactPersonEmail::class,
   'contact_person_emails_table' => 'contact_person_emails',

   /*
   * Contact Person Phone Number Table
   */
   'contact_person_phone_numbers'          => ContactPersonPhoneNumber::class,
   'contact_person_phone_numbers_table'   => 'contact_person_phone_numbers'
];
