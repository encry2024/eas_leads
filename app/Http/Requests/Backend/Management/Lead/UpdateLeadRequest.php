<?php

namespace App\Http\Requests\Backend\Management\Lead;

use App\Http\Requests\Request;

/**
* Class UpdateLeadRequest.
*/
class UpdateLeadRequest extends Request
{
   /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
   public function authorize()
   {
      return access()->allow('view-backend');
   }

   /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
   public function rules()
   {
      return [
         'name'                           => 'required|max:191',
         'company_name'                   => 'required|max:191',
         'additional_information'         => 'required|max:191',
         'email'                          => ['required', 'unique:leads,email,' . Request::get('lead_id')],
         'contact_person'                 => 'required',
         'mobile_number'                  => ['required_if:phone_number,""', 'regex:/(\+63|0)9+[0-9]{9}$/i', 'unique:leads,mobile_number,' . Request::get('lead_id'), 'nullable'],
         'phone_number'                   => ['required_if:mobile_number,""', 'regex:/([0-9]){2}[-]+[0-9]{3}[0-9]{2}[0-9]{2}$/i', 'unique:leads,phone_number,' . Request::get('lead_id'), 'nullable'],
         'nature_of_business'             => 'required',
         'overall_assessment'             => 'max:191',
         'reminder'                       => 'max:191',
         'note'                           => 'max:191',
         'appointment_schedule'           => 'date:Y-m-d'
      ];
   }
}
