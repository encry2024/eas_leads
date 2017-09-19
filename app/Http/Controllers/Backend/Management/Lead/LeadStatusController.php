<?php

namespace App\Http\Controllers\Backend\Management\Lead;

use App\Models\Management\Lead\Lead;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Management\Lead\LeadRepository;
use App\Http\Requests\Backend\Management\Lead\ManageLeadRequest;

/**
* Class LeadStatusController.
*/
class LeadStatusController extends Controller
{
   /**
   * @var LeadRepository
   */
   protected $leads;

   /**
   * @param LeadRepository $leads
   */
   public function __construct(LeadRepository $leads)
   {
      $this->leads = $leads;
   }

   /**
   * @param ManageLeadRequest $request
   *
   * @return mixed
   */
   public function getDeleted(ManageLeadRequest $request)
   {
      return view('backend.management.lead.deleted');
   }

   /**
   * @param User              $deletedUser
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function delete(Lead $deleteLead, ManageLeadRequest $request)
   {
      $this->leads->forceDelete($deleteLead);

      return redirect()->route('admin.management.lead.deleted')->withFlashSuccess(trans('alerts.backend.management.leads.deleted_permanently'));
   }

   /**
   * @param User              $deleteLead
   * @param ManageUserRequest $request
   *
   * @return mixed
   */
   public function restore(Lead $deleteLead, ManageLeadRequest $request)
   {
      $this->leads->restore($deleteLead);

      return redirect()->route('admin.management.lead.index')->withFlashSuccess(trans('alerts.backend.inventory.leads.restored'));
   }
}
