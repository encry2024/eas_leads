@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.management.leads.title'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.management.leads.title') }}
   <small>{{ trans('labels.backend.management.leads.availables') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.management.leads.availables') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.management.lead.includes.partials.lead-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="table-responsive">
         <table id="leads-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.management.leads.table.id') }}</th>
                  <th>{{ trans('labels.backend.management.leads.table.company_name') }}</th>
                  <th>{{ trans('labels.backend.management.leads.table.contact_person') }}</th>
                  <th>{{ trans('labels.backend.management.leads.table.email') }}</th>
                  <th>{{ trans('labels.backend.management.leads.table.phone_number') }}</th>
                  <th>{{ trans('labels.backend.management.leads.table.appointment_schedule') }}</th>
                  <th>{{ trans('labels.backend.management.leads.table.reminder') }}</th>
                  <th>{{ trans('labels.general.actions') }}</th>
               </tr>
            </thead>
         </table>
      </div><!--table-responsive-->
   </div><!-- /.box-body -->
</div><!--box-->

<div class="box box-info">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
      <div class="box-tools pull-right">
         <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div><!-- /.box tools -->
   </div><!-- /.box-header -->
   <div class="box-body">
      {!! history()->renderType('Lead') !!}
   </div><!-- /.box-body -->
</div><!--box box-success-->
@endsection

@section('after-scripts')
{{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
{{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
<script>
$(function () {
   $('#leads-table').DataTable({
      dom: 'lfrtip',
      processing: true,
      serverSide: true,
      autoWidth: false,
      ajax: {
         url: '{{ route("admin.management.lead.get") }}',
         type: 'post',
         data: {trashed: false}
      },
      columns: [
         {data: 'id', name: '{{config('management.leads_table')}}.id'},
         {data: 'company_name', name: '{{config('management.leads_table')}}.company_name'},
         {data: 'contact_person', name: '{{config('management.leads_table')}}.contact_person'},
         {data: 'email', name: '{{config('management.leads_table')}}.email'},
         {data: 'phone_number', name: '{{config('management.leads_table')}}.phone_number'},
         {data: 'appointment_schedule', name: '{{config('management.leads_table')}}.appointment_schedule'},
         {data: 'reminder', name: '{{config('management.leads_table')}}.reminder'},
         {data: 'actions', name: 'actions', searchable: false, sortable: false}
      ],
      order: [[0, "asc"]],
      searchDelay: 500
   });
});
</script>
@endsection
