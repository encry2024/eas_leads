<?php

namespace App\Http\Controllers\Backend\Management\Lead;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\Lead\Lead;
use App\Repositories\Backend\Management\Lead\LeadRepository;
use App\Http\Requests\Backend\Management\Lead\ManageLeadRequest;
use App\Http\Requests\Backend\Management\Lead\StoreLeadRequest;
use App\Http\Requests\Backend\Management\Lead\UpdateLeadRequest;

class LeadController extends Controller
{
   protected $leads;

   public function __construct(LeadRepository $leads)
   {
      $this->leads = $leads;
   }

   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(ManageLeadRequest $request)
   {
      return view('backend.management.lead.index');
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view('backend.management.lead.create');
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StoreLeadRequest $request)
   {
      $this->leads->create([
         'data' => $request->only(
            'name',
            'company_name',
            'contact_person',
            'email',
            'mobile_number',
            'phone_number',
            'additional_information',
            'appointment_schedule',
            'date_contacted',
            'overall_assessment',
            'nature_of_business',
            'note',
            'reminder'
            )
         ]
      );

      return redirect()->route('admin.management.lead.index')->withFlashSuccess(trans('alerts.backend.management.lead.created', ['lead' => $request->get('name')]));
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show(Lead $lead, ManageLeadRequest $request)
   {
      return view('backend.management.lead.show')->withLead($lead);
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit(Lead $lead, ManageLeadRequest $request)
   {
      return view('backend.management.lead.edit')->withLead($lead);
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Lead $lead, UpdateLeadRequest $request)
   {
      $this->leads->update($lead, [
         'data' => $request->only(
            'name',
            'company_name',
            'contact_person',
            'email',
            'mobile_number',
            'phone_number',
            'additional_information',
            'appointment_schedule',
            'date_contacted',
            'overall_assessment',
            'nature_of_business',
            'note',
            'reminder'
            )
         ]
      );

      return redirect()->back()->withFlashSuccess(trans('alerts.backend.management.lead.updated', ['lead' => $lead->name]));
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy(Lead $lead, ManageLeadRequest $request)
   {
      $this->leads->delete($lead);

      return redirect()->route('admin.management.lead.deleted')->withFlashSuccess(trans('alerts.backend.management.lead.deleted', ['lead' => $lead->name]));
   }
}
