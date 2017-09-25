<?php

namespace App\Listeners\Backend\Management\CallDisposition;

/**
* Class CallDispositionEventListener.
*/
class CallDispositionEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'CallDisposition';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->call_disposition->id)
      ->withText('trans("history.backend.management.call_disposition.created") <strong>{call_disposition}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'call_disposition_link' => ['admin.management.call_disposition.show', $event->call_disposition->name, $event->call_disposition->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onUpdated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->call_disposition->id)
      ->withText('trans("history.backend.management.call_disposition.updated") <strong>{call_disposition}</strong>')
      ->withIcon('save')
      ->withClass('bg-aqua')
      ->withAssets([
         'call_disposition_link' => ['admin.management.call_disposition.show', $event->call_disposition->name, $event->call_disposition->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->call_disposition->id)
      ->withText('trans("history.backend.management.call_disposition.deleted") <strong>{call_disposition}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'call_disposition_link' => ['admin.management.call_disposition.show', $event->call_disposition->name, $event->call_disposition->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onRestored($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->call_disposition->id)
      ->withText('trans("history.backend.management.call_disposition.restored") <strong>{call_disposition}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'call_disposition_link' => ['admin.management.call_disposition.show', $event->call_disposition->name, $event->call_disposition->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onPermanentlyDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->call_disposition->id)
      ->withText('trans("history.backend.management.call_disposition.permanently_deleted") <strong>{call_disposition}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'call_disposition_string' => $event->call_disposition->name,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->call_disposition->id)
      ->withAssets([
         'call_disposition_string' => $event->call_disposition->name,
      ])
      ->updateCallDispositionLinkAssets();
   }

   /**
   * Register the listeners for the subscriber.
   *
   * @param \Illuminate\Events\Dispatcher $events
   */
   public function subscribe($events)
   {
      $events->listen(
         \App\Events\Backend\Management\CallDisposition\CallDispositionCreated::class,
         'App\Listeners\Backend\Management\CallDisposition\CallDispositionEventListener@onCreated'
      );

      $events->listen(
         \App\Events\Backend\Management\CallDisposition\CallDispositionUpdated::class,
         'App\Listeners\Backend\Management\CallDisposition\CallDispositionEventListener@onUpdated'
      );

      $events->listen(
         \App\Events\Backend\Management\CallDisposition\CallDispositionDeleted::class,
         'App\Listeners\Backend\Management\CallDisposition\CallDispositionEventListener@onDeleted'
      );

      $events->listen(
         \App\Events\Backend\Management\CallDisposition\CallDispositionRestored::class,
         'App\Listeners\Backend\Management\CallDisposition\CallDispositionEventListener@onRestored'
      );

      $events->listen(
         \App\Events\Backend\Management\CallDisposition\CallDispositionPermanentlyDeleted::class,
         'App\Listeners\Backend\Management\CallDisposition\CallDispositionEventListener@onPermanentlyDeleted'
      );
   }
}
