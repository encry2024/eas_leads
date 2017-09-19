<?php

namespace App\Http\Requests\Backend\Management\Lead;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
* Class StoreLeadRequest.
*/
class StoreLeadRequest extends Request
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
         'email'                          => ['required', 'email', 'max:191', Rule::unique('leads')],
         'contact_person'                 => 'required',
         'phone_number'                   => 'required',
         'nature_of_business'             => 'required',
         'overall_assessment'             => 'max:191',
         'reminder'                       => 'max:191',
         'note'                           => 'max:191',
         'appointment_schedule'           => 'date:Y-m-d'
      ];
   }
}
