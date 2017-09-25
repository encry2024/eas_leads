<table class="table table-striped">
   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.name') }}</th>
      <td>{{ $lead->name }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.company_name') }}</th>
      <td>{{ $lead->company_name }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.additional_information') }}</th>
      <td>{{ $lead->additional_information }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.nature_of_business') }}</th>
      <td>{{ $lead->nature_of_business }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.contact_person') }}</th>
      <td>{{ $lead->contact_person }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.email') }}</th>
      <td>{{ $lead->email }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.phone_number') }}</th>
      <td>{{ $lead->phone_number }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.mobile_number') }}</th>
      <td>{{ $lead->mobile_number }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.date_contacted') }}</th>
      <td>{{ date('F d, Y - l', strtotime($lead->date_contacted)) }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.appointment_schedule') }}</th>
      <td>{{ $lead->appointment_schedule }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.overall_assessment') }}</th>
      <td>{{ $lead->overall_assessment }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.reminder') }}</th>
      <td>{{ $lead->reminder }}</td>
   </tr>

   <tr>
      <th>{{ trans('validation.attributes.backend.management.lead.note') }}</th>
      <td>{{ $lead->note }}</td>
   </tr>
</table>
