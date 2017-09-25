<?php

namespace App\Repositories\Backend\Management\Lead;

use App\Models\Management\Lead\Lead;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Management\Lead\LeadCreated;
use App\Events\Backend\Management\Lead\LeadDeleted;
use App\Events\Backend\Management\Lead\LeadUpdated;
use App\Events\Backend\Management\Lead\LeadRestored;
use App\Events\Backend\Management\Lead\LeadPermanentlyDeleted;

/**
* Class LeadRepository.
*/
class LeadRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = Lead::class;

   /**
   * @param        $permissions
   * @param string $by
   *
   * @return mixed
   */
   public function getForDataTable($trashed = false)
   {
      /**
      * Note: You must return deleted_at or the User getActionButtonsAttribute won't
      * be able to differentiate what buttons to show for each row.
      */
      $dataTableQuery = $this->query()
      ->select([
         config('management.leads_table').'.id',
         config('management.leads_table').'.name',
         config('management.leads_table').'.company_name',
         config('management.leads_table').'.contact_person',
         config('management.leads_table').'.email',
         config('management.leads_table').'.phone_number',
         config('management.leads_table').'.mobile_number',
         config('management.leads_table').'.appointment_schedule',
         config('management.leads_table').'.date_contacted',
         config('management.leads_table').'.nature_of_business',
         config('management.leads_table').'.additional_information',
         config('management.leads_table').'.reminder',
         config('management.leads_table').'.overall_assessment',
         config('management.leads_table').'.appointment_schedule',
         config('management.leads_table').'.created_at',
         config('management.leads_table').'.updated_at',
         config('management.leads_table').'.deleted_at'
      ]);

      if ($trashed == 'true') {
         return $dataTableQuery->onlyTrashed();
      }

      // active() is a scope on the UserScope trait
      return $dataTableQuery;
   }

   public function create($input)
   {
      $data = $input['data'];

      $lead = $this->createLeadStub($data);

      DB::transaction(function () use ($lead, $data) {
         if ($lead->save()) {
            event(new LeadCreated($lead));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.management.leads.create_error'));
      });
   }

   public function update(Model $lead, array $input)
   {
      $data = $input['data'];

      $lead->name = $data['name'];
      $lead->company_name = $data['company_name'];
      $lead->contact_person = $data['contact_person'];
      $lead->email = $data['email'];
      $lead->phone_number = $data['phone_number'];
      $lead->mobile_number = $data['mobile_number'];
      $lead->nature_of_business = $data['nature_of_business'];
      $lead->additional_information = $data['additional_information'];
      $lead->note = $data['note'];
      $lead->reminder = $data['reminder'];
      $lead->overall_assessment = $data['overall_assessment'];
      $lead->date_contacted = date('Y-m-d');
      $lead->appointment_schedule = $data['appointment_schedule'];

      DB::transaction(function () use ($lead, $data) {
         if ($lead->save()) {
            event(new LeadUpdated($lead));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.management.leads.update_error'));
      });
   }

   protected function createLeadStub($input)
   {
      $lead = self::MODEL;
      $lead = new $lead;
      $lead->name = $input['name'];
      $lead->company_name = $input['company_name'];
      $lead->contact_person = $input['contact_person'];
      $lead->email = $input['email'];
      $lead->phone_number = $input['phone_number'];
      $lead->mobile_number = $input['mobile_number'];
      $lead->nature_of_business = $input['nature_of_business'];
      $lead->additional_information = $input['additional_information'];
      $lead->note = $input['note'];
      $lead->reminder = $input['reminder'];
      $lead->overall_assessment = $input['overall_assessment'];
      $lead->date_contacted = date('Y-m-d');
      $lead->appointment_schedule = $input['appointment_schedule'];

      return $lead;
   }

   public function delete(Model $lead)
   {
      if ($lead->delete()) {
         event(new LeadDeleted($lead));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.management.leads.delete_error'));
   }

   public function forceDelete(Model $lead)
   {
      if (is_null($lead->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.management.leads.delete_first'));
      }

      DB::transaction(function () use ($lead) {
         if ($lead->forceDelete()) {
            event(new LeadPermanentlyDeleted($lead));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.management.leads.delete_error'));
      });
   }

   public function restore(Model $lead)
   {
      if (is_null($lead->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.management.leads.cant_restore'));
      }

      if ($lead->restore()) {
         event(new LeadRestored($lead));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.management.leads.restore_error'));
   }
}
