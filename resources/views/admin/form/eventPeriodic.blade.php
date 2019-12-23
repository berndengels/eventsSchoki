
@extends('layouts.admin')

@section('extra-headers')
    <script type="text/javascript" src="{{ asset('vendor/dropzone/js/dropzone.min.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('vendor/tinymce/tinymce.min.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
    <script type="text/javascript" src="{{ asset('js/admin.js') }}" charset="UTF-8"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/dropzone/css/dropzone.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
@endsection

@section('content')
    @include('components.back')
    {!! form_start($form) !!}
    {!! form_until($form, 'links') !!}

    <button id="btnImageCollapse" class="btn btn-primary col-12 text-left" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="collapseImages collapseDropzoneTarget">
        Bilder @if(!$form->images) hinzufügen @else anzeigen @endif
    </button>

    @if ($form->images)
    <div class="collection-container">
        {!! form_row($form->images) !!}
    </div>
    @endif

    @include('admin.templates.newImages')
    @include('admin.templates.dropzoneTarget', ['items' => $form->images])
    @include('admin.templates.imageEditorInline')

    {!! form_rest($form) !!}
    {!! form_end($form) !!}
    @include('components.back')

    <script>
    let cropper;
    var ID = {{ $id ?? 'null' }},
        uploadWebPath = "{!! config('filesystems.disks.image_upload.webRoot') !!}",
        maxImageHeight = {!! config('event.maxImageHeight') !!},
        cropperMaxFilesize = {!! config('event.maxImageFileSize') !!},
        periodicDates = [{!! $dates !!}],
        dropzoneOptions = {
            type: 'Image',
            paramName: 'image',
            maxFilesize: {!! config('event.maxImageFileSize') !!},
            dictInvalidFileType: 'Falscher Datei-Typ! Erlaubt sind folgende Typen: .mp3, .m4a',
            acceptedFiles: ".jpeg,.jpg",
            url: "/admin/file/upload",
        };

    initDropzone(dropzoneOptions);

    $('.multi-collapse').on('shown.bs.collapse', function () {
        $('html, body').animate({ scrollTop: ($('#btnImageCollapse').offset().top)}, 'slow');
    });

    var tinymceOptions = {
        selector: '#tinymce',
        plugins: 'preview code advlist autolink link paste lists charmap media preview help',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link autolink media code preview help',
        image_advtab: true,
        width: 800,
        height: 600,
        paste_as_text: false,
        images_upload_base_path: "{!! config('filesystems.disks.upload.webRoot') !!}",
    };

    initEditor(tinymceOptions);
    var datepickerOptions = {
        weekStart: 1,
        startDate: new Date(),
        autoclose: true,
        todayBtn: false,
        todayHighlight: true,
        language: "de-DE",
    };

    initDatepicker(datepickerOptions, periodicDates);
    </script>

@endsection
