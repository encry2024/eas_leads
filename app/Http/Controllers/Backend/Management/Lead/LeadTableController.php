<?php

namespace App\Http\Controllers\Backend\Management\Lead;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Management\Lead\LeadRepository;
use App\Http\Requests\Backend\Management\Lead\ManageLeadRequest;

/**
* Class LeadTableController.
*/
class LeadTableController extends Controller
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
   public function __invoke(ManageLeadRequest $request)
   {
      return Datatables::of(
         $this->leads->getForDataTable($request->get('trashed')))
         ->escapeColumns(['name', 'company_name', 'email'])
         ->addColumn('actions', function ($lead) {
            return $lead->action_buttons;
         })
         ->withTrashed()
         ->make(true);
      }
   }
