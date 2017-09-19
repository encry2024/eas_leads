<?php

namespace App\Models\Management\Lead\Traits\Attributes;

/**
* Class LeadAttribute.
*/
trait LeadAttribute
{
   /**
   * @return string
   */
   public function getShowButtonAttribute()
   {
      return '<a href="'.route('admin.management.lead.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getEditButtonAttribute()
   {
      return '<a href="'.route('admin.management.lead.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getDeleteButtonAttribute()
   {
      if ($this->id != access()->id() && $this->id != 1) {
         return '<a href="'.route('admin.management.lead.destroy', $this).'"
         data-method="delete"
         data-trans-button-cancel="'.trans('buttons.general.cancel').'"
         data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
         data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
         class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i></a> ';
      }

      return '';
   }

   /**
   * @return string
   */
   public function getRestoreButtonAttribute()
   {
      return '<a href="'.route('admin.management.lead.restore', $this).'" name="restore_lead" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.management.leads.restore_lead').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getDeletePermanentlyButtonAttribute()
   {
      return '<a href="'.route('admin.management.lead.delete-permanently', $this).'" name="delete_lead_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.management.leads.delete_permanently').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getActionButtonsAttribute()
   {
      if ($this->trashed()) {
         return $this->restore_button.$this->delete_permanently_button;
      }

      return
      $this->show_button.
      $this->edit_button.
      $this->delete_button;
   }
}
