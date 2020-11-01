@push('css')
    <link
        href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css"
        rel="stylesheet"
    />

    <style>
        .drag-list {
            width: 100%;
            margin: 0 auto;
        }

        .drag-list > li {
            list-style: none;
            background: rgb(255, 255, 255);
            border: 1px solid rgb(196, 196, 196);
            margin: 5px 0;
            font-size: 14px;
        }

        .drag-list .title {
            display: inline-block;
            width: 90%;
            padding: 6px 6px 6px 12px;
            vertical-align: top;
        }

        .drag-list .drag-area {
            display: inline-block;
            background: rgb(158, 211, 179);
            width: 8%;
            height: 34px;
            vertical-align: center;
            float: right;
            cursor: move;
            text-align: center;
            padding-top: 5px;
        }
        .drag-list .VIDEO {
            background: #b21f2d;
        }
        .drag-list .SECTION {
            background: #9e9e9e;
        }
        .drag-list .ZIP {
            background: #1d1d1d;
        }
    </style>
@endpush

<section class="courses-section spad">
    <div class="section-title mb-3">
        <h2>{{ $title }}</h2>
        <a href="{{ route('teacher.courses') }}" class="site-btn">
            {{ __("Volver al listado de cursos") }}
        </a>
    </div>
    <div class="container">
    @include('partials.form_errors')
        {{ Form::model($unit, $options) }}
        @isset($update)
            @method("PUT")
        @endisset

        <div class="form-group">
            {!! Form::label('title', __("Título")) !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('course_id', __("Selecciona el curso")) !!}
            {!! Form::select('course_id', $courses->pluck("title", "id"), null, ["class" => "form-control"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('free', __("¿Unidad gratuita?")) !!}
            {!! Form::select('free', [
                    0 => __("No"),
                    1 => __("Sí"),
                ], null, ["class" => "form-control"])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('unit_type', __("Tipo de unidad")) !!}
            {!! Form::select('unit_type', [
                    \App\Models\Unit::VIDEO => __("Vídeo"),
                    \App\Models\Unit::ZIP => __("Archivo comprimido"),
                    \App\Models\Unit::SECTION => __("Sección")
                ], null, ["class" => "form-control"])
            !!}
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                    </div>
                </div>
                {!! Form::number('unit_time', null, ['class' => 'form-control', 'placeholder' => __("Duración de la unidad si es vídeo")]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('content', __("Añade el contenido, por ejemplo, el iframe de Vimeo")) !!}
            {!! Form::textarea('content', old('content') ?? $unit->content, ['id' => 'summernote']) !!}
        </div>
        <div class="custom-file">
            {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'file']) !!}
            {!! Form::label('file', __("Escoge un archivo"), ['class' => 'custom-file-label']) !!}
        </div>
        {!! Form::submit($textButton, ['class' => 'site-btn mt-2 float-right']); !!}

        {{ Form::close() }}


    </div>
</section>

@push("js")
    <script src="/js/drag-arrange.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        jQuery(document).ready(function () {
            $('#summernote').summernote({
                height: 300,
            });


        });
    </script>
@endpush

