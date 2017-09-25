<?php

namespace App\Http\Controllers\Backend\Management\CallDisposition;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Management\CallDisposition\CallDispositionRepository;
use App\Http\Requests\Backend\Management\CallDisposition\ManageCallDispositionRequest;

/**
* Class CallDispositionTableController.
*/
class CallDispositionTableController extends Controller
{
   /**
   * @var LeadRepository
   */
   protected $call_dispositions;

   /**
   * @param LeadRepository $call_dispositions
   */
   public function __construct(CallDispositionRepository $call_dispositions)
   {
      $this->call_dispositions = $call_dispositions;
   }

   /**
   * @param ManageLeadRequest $request
   *
   * @return mixed
   */
   public function __invoke(ManageCallDispositionRequest $request)
   {
      return Datatables::of(
         $this->call_dispositions->getForDataTable($request->get('trashed')))
         ->escapeColumns(['name', 'company_name', 'email'])
         ->addColumn('actions', function ($call_disposition) {
            return $call_disposition->action_buttons;
         })
         ->withTrashed()
         ->make(true);
      }
   }
