<?php

namespace App\Http\Controllers\Backend\Management\CallDisposition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Management\CallDisposition\CallDispositionRepository;
use App\Http\Requests\Backend\Management\CallDisposition\ManageCallDispositionRequest;
use App\Http\Requests\Backend\Management\CallDisposition\StoreCallDispositionRequest;
// use App\Http\Requests\Backend\Management\CallDisposition\UpdateCallDispositionRequest;

class CallDispositionController extends Controller
{
   protected $call_dipositions;

   public function __construct(CallDispositionRepository $call_dipositions)
   {
      $this->call_dipositions = $call_dipositions;
   }
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(ManageCallDispositionRequest $request)
   {
      return view('backend.management.call_disposition.index');
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      //
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StoreCallDispositionRequest $request)
   {
      $this->leads->create([
         'data' => $request->only(
            'name',
            'type',
            'description'
            )
         ]
      );

      return redirect()->route('admin.management.call_disposition.index')->withFlashSuccess(trans('alerts.backend.management.call_disposition.created', ['lead' => $request->get('name')]));
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {
      //
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit($id)
   {
      //
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, $id)
   {
      //
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
      //
   }
}
