<?php

namespace App\Repositories\Backend\Management\CallDisposition;

use App\Models\Management\CallDisposition\CallDisposition;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Management\CallDisposition\CallDispositionCreated;
use App\Events\Backend\Management\CallDisposition\CallDispositionDeleted;
use App\Events\Backend\Management\CallDisposition\CallDispositionUpdated;
use App\Events\Backend\Management\CallDisposition\CallDispositionRestored;
use App\Events\Backend\Management\CallDisposition\CallDispositionPermanentlyDeleted;

/**
* Class CallDispositionRepository.
*/
class CallDispositionRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = CallDisposition::class;

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
         config('management.call_dispositions').'.id',
         config('management.call_dispositions').'.name',
         config('management.call_dispositions').'.type',
         config('management.call_dispositions').'.description',
         config('management.call_dispositions').'.created_at',
         config('management.call_dispositions').'.updated_at',
         config('management.call_dispositions').'.deleted_at'
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

      $call_disposition = $this->createCallDispositionStub($data);

      DB::transaction(function () use ($call_disposition, $data) {
         if ($call_disposition->save()) {
            event(new CallDispositionCreated($call_disposition));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.management.call_dispositions.create_error'));
      });
   }

   public function update(Model $call_disposition, array $input)
   {
      $data = $input['data'];

      $call_disposition->name = $data['name'];
      $call_disposition->type = $data['type'];
      $call_disposition->description = $data['description'];

      DB::transaction(function () use ($call_disposition, $data) {
         if ($call_disposition->save()) {
            event(new CallDispositionUpdated($call_disposition));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.management.call_dispositions.update_error'));
      });
   }

   protected function createCallDispositionStub($input)
   {
      $call_disposition = self::MODEL;
      $call_disposition = new $call_disposition;
      $call_disposition->name = $input['name'];
      $call_disposition->type = $input['type'];
      $call_disposition->description = $input['description'];

      return $call_disposition;
   }

   public function delete(Model $call_disposition)
   {
      if ($call_disposition->delete()) {
         event(new CallDispositionDeleted($call_disposition));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.management.call_dispositions.delete_error'));
   }

   public function forceDelete(Model $call_disposition)
   {
      if (is_null($call_disposition->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.management.call_dispositions.delete_first'));
      }

      DB::transaction(function () use ($call_disposition) {
         if ($call_disposition->forceDelete()) {
            event(new CallDispositionPermanentlyDeleted($call_disposition));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.management.call_dispositions.delete_error'));
      });
   }

   public function restore(Model $call_disposition)
   {
      if (is_null($call_disposition->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.management.call_dispositions.cant_restore'));
      }

      if ($call_disposition->restore()) {
         event(new CallDispositionRestored($call_disposition));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.management.call_dispositions.restore_error'));
   }
}
