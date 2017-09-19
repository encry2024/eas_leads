<?php


Route::group([
   'prefix'    => 'management',
   'as'        => 'management.',
   'namespace' => 'Management'
], function() {

   Route::group([
      'prefix'    => 'lead',
      'as'        => 'lead.',
      'namespace' => 'Lead'
   ], function() {
      Route::post('get', 'LeadTableController')->name('get');

      // Route::get('lead/deleted', 'LeadStatusController@getDeleted')->name('deleted');

      Route::resource('/', 'LeadController');
   });


});
