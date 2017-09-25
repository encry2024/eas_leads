<?php


Route::group([
   'prefix'    => 'management',
   'as'        => 'management.',
   'namespace' => 'Management'
], function() {

   Route::group([
      'namespace' => 'Lead'
   ], function() {
      Route::post('lead/get', 'LeadTableController')->name('lead.get');

      Route::get('lead/deleted', 'LeadStatusController@getDeleted')->name('lead.deleted');

      Route::resource('lead', 'LeadController');

      Route::group(['prefix' => 'lead/{deletedLead}'], function () {
         Route::get('delete', 'LeadStatusController@delete')->name('lead.delete-permanently');
         Route::get('restore', 'LeadStatusController@restore')->name('lead.restore');
      });
   });

   Route::group([
      'namespace' => 'CallDisposition'
   ], function() {
      Route::post('call_disposition/get', 'CallDispositionTableController')->name('call_disposition.get');
      //
      // Route::get('lead/deleted', 'LeadStatusController@getDeleted')->name('lead.deleted');

      Route::resource('call_disposition', 'CallDispositionController');

      // Route::group(['prefix' => 'lead/{deletedLead}'], function () {
      //    Route::get('delete', 'LeadStatusController@delete')->name('lead.delete-permanently');
      //    Route::get('restore', 'LeadStatusController@restore')->name('lead.restore');
      // });
   });
});
