<?php

namespace App\Listeners\Backend\Management\Lead;

/**
* Class LeadEventListener.
*/
class LeadEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'Lead';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->lead->id)
      ->withText('trans("history.backend.management.lead.created") <strong>{lead}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'lead_link' => ['admin.management.lead.show', $event->lead->name, $event->lead->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onUpdated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->lead->id)
      ->withText('trans("history.backend.management.lead.updated") <strong>{lead}</strong>')
      ->withIcon('save')
      ->withClass('bg-aqua')
      ->withAssets([
         'lead_link' => ['admin.management.lead.show', $event->lead->name, $event->lead->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->lead->id)
      ->withText('trans("history.backend.management.lead.deleted") <strong>{lead}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'lead_link' => ['admin.management.lead.show', $event->lead->name, $event->lead->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onRestored($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->lead->id)
      ->withText('trans("history.backend.management.lead.restored") <strong>{lead}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'lead_link' => ['admin.management.lead.show', $event->lead->name, $event->lead->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onPermanentlyDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->lead->id)
      ->withText('trans("history.backend.management.lead.permanently_deleted") <strong>{lead}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'lead_string' => $event->lead->name,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->lead->id)
      ->withAssets([
         'lead_string' => $event->lead->name,
      ])
      ->updateLeadLinkAssets();
   }

   /**
   * Register the listeners for the subscriber.
   *
   * @param \Illuminate\Events\Dispatcher $events
   */
   public function subscribe($events)
   {
      $events->listen(
         \App\Events\Backend\Management\Lead\LeadCreated::class,
         'App\Listeners\Backend\Management\Lead\LeadEventListener@onCreated'
      );

      $events->listen(
         \App\Events\Backend\Management\Lead\LeadUpdated::class,
         'App\Listeners\Backend\Management\Lead\LeadEventListener@onUpdated'
      );

      $events->listen(
         \App\Events\Backend\Management\Lead\LeadDeleted::class,
         'App\Listeners\Backend\Management\Lead\LeadEventListener@onDeleted'
      );

      $events->listen(
         \App\Events\Backend\Management\Lead\LeadRestored::class,
         'App\Listeners\Backend\Management\Lead\LeadEventListener@onRestored'
      );

      $events->listen(
         \App\Events\Backend\Management\Lead\LeadPermanentlyDeleted::class,
         'App\Listeners\Backend\Management\Lead\LeadEventListener@onPermanentlyDeleted'
      );
   }
}
