@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.management.leads.title') . ' | ' . trans('labels.backend.management.leads.edit_title'))

@section('page-header')
<h1>
   {{ trans('labels.backend.management.leads.title') }}
   <small>{{ trans('labels.backend.management.leads.edit_title') }}</small>
</h1>
@endsection

@section('content')
{{ Form::model($lead, ['route' => ['admin.management.lead.update', $lead], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}
{{ Form::hidden('lead_id', $lead->id) }}

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.management.leads.edit', ['lead' => $lead->name]) }}</h3>

      <div class="box-tools pull-right">
         @include('backend.management.lead.includes.partials.lead-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <table class="table table-striped">
         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.name') }}</th>
            <td>{{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.management.lead.name')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.company_name') }}</th>
            <td>{{ Form::text('company_name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.management.lead.company_name')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.additional_information') }}</th>
            <td>{{ Form::text('additional_information', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.management.lead.additional_information')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.nature_of_business') }}</th>
            <td>{{ Form::text('nature_of_business', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.management.lead.nature_of_business')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.contact_person') }}</th>
            <td>{{ Form::text('contact_person', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.management.lead.contact_person')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.email') }}</th>
            <td>{{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.management.lead.email')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.phone_number') }}</th>
            <td>{{ Form::text('phone_number', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.management.lead.phone_number')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.mobile_number') }}</th>
            <td>{{ Form::text('mobile_number', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.management.lead.mobile_number')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.date_contacted') }}</th>
            <td>{{ Form::text('date_contacted', date('F d, Y - l'), ['class' => 'form-control', 'maxlength' => '191', 'readOnly' => 'true', 'placeholder' => trans('validation.attributes.backend.management.lead.date_contacted')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.appointment_schedule') }}</th>
            <td>{{ Form::text('appointment_schedule', null, ['class' => 'form-control', 'maxlength' => '191', 'placeholder' => trans('validation.attributes.backend.management.lead.appointment_schedule')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.overall_assessment') }}</th>
            <td>{{ Form::text('overall_assessment', null, ['class' => 'form-control', 'maxlength' => '191', 'placeholder' => trans('validation.attributes.backend.management.lead.overall_assessment')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.reminder') }}</th>
            <td>{{ Form::text('reminder', null, ['class' => 'form-control', 'maxlength' => '191', 'placeholder' => trans('validation.attributes.backend.management.lead.reminder')]) }}</td>
         </tr>

         <tr>
            <th>{{ trans('validation.attributes.backend.management.lead.note') }}</th>
            <td>{{ Form::text('note', null, ['class' => 'form-control', 'maxlength' => '191', 'placeholder' => trans('validation.attributes.backend.management.lead.note')]) }}</td>
         </tr>
      </table>
   </div><!-- /.box-body -->
</div><!--box-->

<div class="box box-info">
   <div class="box-body">
      <div class="pull-left">
         {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
      </div><!--pull-left-->

      <div class="pull-right">
         {{ Form::submit(trans('buttons.general.crud.edit'), ['class' => 'btn btn-success btn-xs']) }}
      </div><!--pull-right-->

      <div class="clearfix"></div>
   </div><!-- /.box-body -->
</div><!--box-->

{{ Form::close() }}
@endsection
