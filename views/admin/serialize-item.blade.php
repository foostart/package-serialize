@if(!empty($items) && (!$items->isEmpty()) )
<?php
    $withs = [
        'checkbox'=>'7%',
        'order' => '14%',
        'name' => '40%',
        'serial_name' => '20%',
        'status' => '10%',
        'updated_at' => '25%',
        'operations' => '15%',
    ];

    global $counter;
    $nav = $items->toArray();
    $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
?>

<div class="caption">
    <span>
         @if($nav['total'] == 1)
            {!! trans($plang_admin.'.descriptions.counter', ['number' => $nav['total']]) !!}
        @else
            {!! trans($plang_admin.'.descriptions.counters', ['number' => $nav['total']]) !!}
        @endif
    </span>
    <div class="button-group">

        {!! Form::button(trans($plang_admin.'.buttons.update-sequence'), array(
                                                                "class"=>"btn btn-danger update-sequence",
                                                                "title"=> trans($plang_admin.'.hint.update-sequence'),
                                                                'id'=>'btnSaveSequence',

                                                                'name'=>'update-sequence'))
    !!}
        {!! Form::submit(trans($plang_admin.'.buttons.delete-in-trash'), array(
                                                                    "class"=>"btn btn-danger delete btn-delete-all del-trash",
                                                                    "title"=> trans($plang_admin.'.hint.delete-in-trash'),
                                                                    'name'=>'del-trash'))
        !!}
        {!! Form::submit(trans($plang_admin.'.buttons.delete-forever'), array(
                                                                    "class"=>"btn btn-warning delete btn-delete-all del-forever",
                                                                    "title"=> trans($plang_admin.'.hint.delete-forever'),
                                                                    'name'=>'del-forever'))
        !!}
    </div>
</div>

<table class="table table-hover">

    <thead>
        <tr style="height: 50px;">

            <!--ORDER-->
            <th style='width:{{ $withs['checkbox'] }}'>
                {{ trans($plang_admin.'.columns.id') }}
                <span class="del-checkbox pull-right">
                    <input type="checkbox" id="selecctall" />
                    <label for="del-checkbox"></label>
                </span>
            </th>
            <!-- NAME -->
            <?php $name = 'sequence' ?>
            <th style='width:{{ $withs['order'] }}'>
                {!! trans($plang_admin.'.columns.sequence') !!}
                <a href='{!! $sorting["url"][$name] !!}' class='tb-id' data-order='asc'>
                    @if($sorting['items'][$name] == 'asc')
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    @elseif($sorting['items'][$name] == 'desc')
                        <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    @endif
                </a>
            </th>

            <!-- NAME -->
            <?php $name = 'serialize_name' ?>

            <th class="hidden-xs" style='width:{{ $withs['name'] }}'>{!! trans($plang_admin.'.columns.name') !!}
                <a href='{!! $sorting["url"][$name] !!}' class='tb-id' data-order='asc'>
                    @if($sorting['items'][$name] == 'asc')
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    @elseif($sorting['items'][$name] == 'desc')
                        <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    @endif
                </a>
            </th>

            <th class="hidden-xs" style='width:{{ $withs['serial_name'] }}'>{!! trans($plang_admin.'.columns.serial_name') !!}
                <a href='{!! $sorting["url"][$name] !!}' class='tb-id' data-order='asc'>
                    @if($sorting['items'][$name] == 'asc')
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    @elseif($sorting['items'][$name] == 'desc')
                        <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    @endif
                </a>
            </th>


            
            <!--STATUS-->
            <?php $name = 'serialize_status' ?>

            <th class="hidden-xs" style='width:{{ $withs['status'] }}'>{!! trans($plang_admin.'.columns.serialize-status') !!}
                <a href='{!! $sorting["url"][$name] !!}' class='tb-id' data-order='asc'>
                    @if($sorting['items'][$name] == 'asc')
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    @elseif($sorting['items'][$name] == 'desc')
                        <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    @endif
                </a>
            </th>

            <!-- UPDATE -->
            <?php $name = 'updated_at' ?>

            <th class="hidden-xs" style='width:{{ $withs['updated_at'] }}'>
                {!! trans($plang_admin.'.columns.updated_at') !!}
                <a href='{!! $sorting["url"][$name] !!}' class='tb-id' data-order='asc'>
                    @if($sorting['items'][$name] == 'asc')
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    @elseif($sorting['items'][$name] == 'desc')
                        <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    @endif
                </a>
            </th>

            <!--OPERATIONS-->
            <th style='width:{{ $withs['operations'] }}'>
                <span class='lb-delete-all'>
                    {{ trans($plang_admin.'.columns.operations') }}
                </span>

            </th>


        </tr>

    </thead>

    <tbody>
        @foreach($items as $item)
            <tr>
                <!--COUNTER-->
                <td>
                    <?php echo $counter; $counter++ ?>
                    <span class='box-item pull-right'>
                        <input type="checkbox" id="<?php echo $item->id ?>" name="ids[]" value="{!! $item->id !!}">
                        <label for="box-item"></label>
                    </span>
                </td>

                <td class="text-center">
                    <div class='input-group'>
                        <input type="number" size="3" id="<?php echo $item->id ?>" name="sequence[{{ $item->id}}]" data-original="{{ $item->sequence}}" class="sequence-input" value="{!!  $item->sequence !!}" style="width: 40px">
                    </div>
                </td>


                <!--NAME-->
                <td> {!! $item->serialize_name !!} </td>
                <!--NAME-->
                <td> {!! $item->serial_name !!} </td>
                
                <!--STATUS-->
                <td style="text-align: center;">

                    <?php $status = config('package-category.status'); ?>
                    @if($item->serialize_status && (isset($status['list'][$item->serialize_status])))
                        <i class="fa fa-circle" style="color:{!! $status['color'][$item->serialize_status] !!}" title='{!! $status["list"][$item->serialize_status] !!}'></i>
                    @else
                    <i class="fa fa-circle-o red" title='{!! trans($plang_admin.".labels.unknown") !!}'></i>
                    @endif
                </td>

                <!--UPDATED AT-->
                <td> {!! date('d-m-Y H:i',strtotime($item->updated_at)) !!} </td>

                <!--OPERATOR-->
                <td>
                    <!--comment-->
                    @if(Route::has('comments.by_context'))
                    <a href="{!! URL::route('comments.by_context', [   'id' => $item->id,
                                                                       'context' => 'serialize',
                                                                       '_token' => csrf_token()
                                                            ])
                            !!}">
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                    </a>&nbsp;
                    @endif

                    <!--edit-->
                    <a href="{!! URL::route('serialize.edit', [   'id' => $item->id,
                                                                '_token' => csrf_token()
                                                            ])
                            !!}">
                        <i class="fa fa-edit f-tb-icon"></i>
                    </a>&nbsp;


                    <!--copy-->
                    <a href="{!! URL::route('serialize.copy',[    'cid' => $item->id,
                                                                '_token' => csrf_token(),
                                                            ])
                             !!}"
                        class="margin-left-5">
                        <i class="fa fa-files-o f-tb-icon" aria-hidden="true"></i>
                    </a>&nbsp;

                </td>

            </tr>

        @endforeach

    </tbody>

</table>
<div class="paginator">
    {!! $items->appends($request->except(['page']) )->render() !!}
</div>
@else
    <!--SEARCH RESULT MESSAGE-->
    <span class="text-warning">
        <h5>
            {{ trans($plang_admin.'.descriptions.not-found') }}
        </h5>
    </span>
    <!--/SEARCH RESULT MESSAGE-->
@endif
<script>
    var urlUpdateSequence = '<?= route('serialize.updatesequence') ?>';
</script>
@section('footer_scripts')
    @parent
    {!! HTML::script('packages/foostart/js/form-table.js')  !!}
    {!! HTML::script('packages/foostart/package-serialize/js/serialize-scripts.js')  !!}
    {!! HTML::style('packages/foostart/package-serialize/css/serialize-styles.css')  !!}
@stop

