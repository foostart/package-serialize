<!------------------------------------------------------------------------------
| List of elements in serialize form
|------------------------------------------------------------------------------->

{!! Form::open(['route'=>['serialize.post', 'id' => @$item->id],  'files'=>true, 'method' => 'serialize'])  !!}

    <!--BUTTONS-->
    <div class='btn-form'>
        <!-- DELETE BUTTON -->
        @if($item)
            <a onclick="return confirm('Do you sure to delete ?')" href="{!! URL::route('serialize.delete',['id' => @$item->id, '_token' => csrf_token()]) !!}"
            class="btn btn-danger pull-right margin-left-5 delete">
                {!! trans($plang_admin.'.buttons.delete') !!}
            </a>
        @endif
        <!-- DELETE BUTTON -->

        <!-- SAVE BUTTON -->
        {!! Form::submit(trans($plang_admin.'.buttons.save'), array("class"=>"btn btn-info pull-right ")) !!}
        <!-- /SAVE BUTTON -->
    </div>
    <!--/BUTTONS-->

    <!--TAB MENU-->
    <ul class="nav nav-tabs">
        <!--BASIC-->
        <li class="active">
            <a data-toggle="tab" href="#menu_1">
                {!! trans($plang_admin.'.tabs.basic') !!}
            </a>
        </li>

        <!--ADVANCED-->
        <li>
            <a data-toggle="tab" href="#menu_2">
                {!! trans($plang_admin.'.tabs.advance') !!}
            </a>
        </li>

        <!--OTHER-->
        <li>
            <a data-toggle="tab" href="#menu_3">
                {!! trans($plang_admin.'.tabs.other') !!}
            </a>
        </li>
    </ul>
    <!--/TAB MENU-->

    <!--TAB CONTENT-->
    <div class="tab-content">

        <!--BASIC-->
        <div id="menu_1" class="tab-pane fade in active">

            <!--POST NAME-->
            @include('package-category::admin.partials.input_text', [
                'name' => 'serialize_name',
                'id' => 'serialize_name',
                'label' => trans($plang_admin.'.labels.name'),
                'value' => @$item->serialize_name,
                'description' => trans($plang_admin.'.descriptions.name'),
                'errors' => $errors,
            ])
            <!--/POST NAME-->

            <!--POST SLUG-->
            @include('package-category::admin.partials.input_slug', [
                'name' => 'serialize_slug',
                'id' => 'serialize_slug',
                'ref' => 'serialize_name',
                'label' => trans($plang_admin.'.labels.slug'),
                'value' => @$item->serialize_slug,
                'description' => trans($plang_admin.'.descriptions.slug'),
                'errors' => $errors,
            ])
            <!--/POST NAME-->

            <div class="row">

               <div class='col-md-6'>

                    <!-- LIST OF CATEGORIES -->
                    @include('package-category::admin.partials.select_single', [
                        'name' => 'category_id',
                        'label' => trans($plang_admin.'.labels.category'),
                        'items' => $categories,
                        'value' => @$item->category_id,
                        'description' => trans($plang_admin.'.descriptions.category', [
                                     'href' => URL::route('categories.list', ['_key' => $context->context_key])
                                     ]),
                        'errors' => $errors,
                    ])

               </div>
                <div class='col-md-6'>

                    <!-- LIST OF CATEGORIES -->
                    @include('package-category::admin.partials.select_single', [
                        'name' => 'serial_topic_id',
                        'label' => trans($plang_admin.'.labels.serial'),
                        'items' => $serials,
                        'value' => @$item->serial_topic_id,
                        'description' => trans($plang_admin.'.descriptions.category', [
                                     'href' => URL::route('categories.list', ['_key' => $context->context_key])
                                     ]),
                        'errors' => $errors,
                    ])

                </div>

                <div class='col-md-6'>

                    <!-- LIST OF CATEGORIES -->
                    @include('package-category::admin.partials.select_single', [
                        'name' => 'slideshow_id',
                        'label' => trans($plang_admin.'.labels.slideshow'),
                        'items' => $slideshow,
                        'value' => @$item->slideshow_id,
                        'description' => trans($plang_admin.'.descriptions.slideshow', [
                                     'href' => URL::route('slideshows.list')
                                     ]),
                        'errors' => $errors,
                    ])

               </div>

                <div class='col-md-6'>
                    <!--STATUS-->
                    @include('package-category::admin.partials.select_single', [
                        'name' => 'status',
                        'label' => trans($plang_admin.'.form.status'),
                        'value' => @$item->serialize_status,
                        'items' => $status,
                        'description' => trans($plang_admin.'.descriptions.status'),
                    ])
                </div>

                <div class="col-sm-6">
                    <div class="form-group">

                    <?php
                            $name = 'sequence';
                    ?>
                        <!--element-->
                    {!! Form::label($name, trans($plang_admin.'.labels.sequence')) !!}
                    {!! Form::number($name, @$item->sequence, [ 'class' => 'form-control']) !!}

                    <!--description-->
                        @if(trans($plang_admin.'.sequence.name'))
                            <span class='input-text-description'>
                                <blockquote class="quote-card">
                                    <p>{!! trans($plang_admin.'.sequence.name') !!}</p>
                                </blockquote>
                            </span>
                            @endif

                        <!--errors-->
                            @if ($errors->has($name))
                                <ul class='alert alert-danger error-item'>
                                    @foreach($errors->get($name) as $error)
                                        @if($error)
                                            <li>
                                                <span class='input-text-error'>{!! $error !!}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                    </div>
                <!--/Sequence-->

                </div>

            </div>

            <!--POST DESCRIPTION-->
            @include('package-category::admin.partials.textarea', [
                'name' => 'serialize_description',
                'label' => trans($plang_admin.'.labels.description'),
                'value' => @$item->serialize_description,
                'description' => trans($plang_admin.'.descriptions.description'),
                'rows' => 70,
                'tinymce' => true,
                'errors' => $errors,
            ])
            <!--/POST DESCRIPTION-->

        </div>

        <!--ADVANCED-->
        <div id="menu_2" class="tab-pane fade">
            <!--POST OVERVIEW-->
            @include('package-category::admin.partials.textarea', [
            'name' => 'serialize_overview',
            'label' => trans($plang_admin.'.labels.overview'),
            'value' => @$item->serialize_overview,
            'description' => trans($plang_admin.'.descriptions.overview'),
            'tinymce' => false,
            'errors' => $errors,
            ])
            <!--/POST OVERVIEW-->

        </div>

        <!--OTHER-->
        <div id="menu_3" class="tab-pane fade">
            <!--POST IMAGE-->
            @include('package-category::admin.partials.input_image', [
            'name' => 'serialize_image',
            'label' => trans($plang_admin.'.labels.image'),
            'value' => @$item->serialize_image,
            'description' => trans($plang_admin.'.descriptions.image'),
            'errors' => $errors,
            ])
            <!--/POST IMAGE-->

            <!--POST FILES-->
            @include('package-category::admin.partials.input_files', [
                'name' => 'files',
                'label' => trans($plang_admin.'.labels.files'),
                'value' => @$item->serialize_files,
                'description' => trans($plang_admin.'.descriptions.files'),
                'errors' => $errors,
            ])
            <!--/POST FILES-->
        </div>

    </div>
    <!--/TAB CONTENT-->

    <!--HIDDEN FIELDS-->
    <div class='hidden-field'>
        {!! Form::hidden('id',@$item->id) !!}
        {!! Form::hidden('context',$request->get('context',null)) !!}
    </div>
    <!--/HIDDEN FIELDS-->

{!! Form::close() !!}
<!------------------------------------------------------------------------------
| End list of elements in serialize form
|------------------------------------------------------------------------------>