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
            ->withText('trans("history.backend.leads.created") <strong>{lead}</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->withAssets([
                'lead_link' => ['admin.access.lead.show', $event->lead->name, $event->lead->id],
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
            ->withText('trans("history.backend.leads.updated") <strong>{lead}</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->withAssets([
                'lead_link' => ['admin.access.lead.show', $event->lead->name, $event->lead->id],
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
            ->withText('trans("history.backend.leads.deleted") <strong>{lead}</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->withAssets([
                'lead_link' => ['admin.access.lead.show', $event->lead->name, $event->lead->id],
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
            ->withText('trans("history.backend.leads.restored") <strong>{lead}</strong>')
            ->withIcon('refresh')
            ->withClass('bg-aqua')
            ->withAssets([
                'lead_link' => ['admin.access.lead.show', $event->lead->name, $event->lead->id],
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
            ->withText('trans("history.backend.leads.permanently_deleted") <strong>{lead}</strong>')
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
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->lead->id)
            ->withText('trans("history.backend.leads.changed_password") <strong>{lead}</strong>')
            ->withIcon('lock')
            ->withClass('bg-blue')
            ->withAssets([
                'lead_link' => ['admin.access.lead.show', $event->lead->name, $event->lead->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->lead->id)
            ->withText('trans("history.backend.leads.deactivated") <strong>{lead}</strong>')
            ->withIcon('times')
            ->withClass('bg-yellow')
            ->withAssets([
                'lead_link' => ['admin.access.lead.show', $event->lead->name, $event->lead->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->lead->id)
            ->withText('trans("history.backend.leads.reactivated") <strong>{lead}</strong>')
            ->withIcon('check')
            ->withClass('bg-green')
            ->withAssets([
                'lead_link' => ['admin.access.lead.show', $event->lead->name, $event->lead->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->lead->id)
            ->withText('trans("history.backend.leads.confirmed") <strong>{lead}</strong>')
            ->withIcon('check')
            ->withClass('bg-green')
            ->withAssets([
                'lead_link' => ['admin.access.lead.show', $event->lead->name, $event->lead->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onUnconfirmed($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->lead->id)
            ->withText('trans("history.backend.leads.unconfirmed") <strong>{lead}</strong>')
            ->withIcon('times')
            ->withClass('bg-red')
            ->withAssets([
                'lead_link' => ['admin.access.lead.show', $event->lead->name, $event->lead->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onSocialDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->lead->id)
            ->withText('trans("history.backend.leads.deleted_social") <strong>'.$event->social->provider.'</strong> for <strong>{lead}</strong>')
            ->withIcon('times')
            ->withClass('bg-red')
            ->withAssets([
                'lead_link' => ['admin.access.lead.show', $event->lead->name, $event->lead->id],
            ])
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Management\Leads\LeadCreated::class,
            'App\Listeners\Backend\Management\Leads\LeadEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Management\Leads\LeadUpdated::class,
            'App\Listeners\Backend\Management\Leads\LeadEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Management\Leads\LeadDeleted::class,
            'App\Listeners\Backend\Management\Leads\LeadEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Management\Leads\LeadRestored::class,
            'App\Listeners\Backend\Management\Leads\LeadEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Management\Leads\LeadPermanentlyDeleted::class,
            'App\Listeners\Backend\Management\Leads\LeadEventListener@onPermanentlyDeleted'
        );
    }
}
