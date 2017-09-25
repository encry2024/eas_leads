@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.management.call_dispositions.title'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.management.call_dispositions.title') }}
   <small>{{ trans('labels.backend.management.call_dispositions.availables') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.management.call_dispositions.availables') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.management.lead.includes.partials.lead-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="table-responsive">
         <table id="leads-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.management.call_dispositions.table.id') }}</th>
                  <th>{{ trans('labels.backend.management.call_dispositions.table.name') }}</th>
                  <th>{{ trans('labels.backend.management.call_dispositions.table.type') }}</th>
                  <th>{{ trans('labels.backend.management.call_dispositions.table.description') }}</th>
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
      {!! history()->renderType('CallDisposition') !!}
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
         url: '{{ route("admin.management.call_disposition.get") }}',
         type: 'post',
         data: {trashed: false}
      },
      columns: [
         {data: 'id', name: '{{config('management.call_dispositions_table')}}.id'},
         {data: 'name', name: '{{config('management.call_dispositions_table')}}.name'},
         {data: 'type', name: '{{config('management.call_dispositions_table')}}.type'},
         {data: 'description', name: '{{config('management.call_dispositions_table')}}.description'},
         {data: 'actions', name: 'actions', searchable: false, sortable: false}
      ],
      order: [[0, "asc"]],
      searchDelay: 500
   });
});
</script>
@endsection
