<div class="form-group">
    {!! Form::label('title','标题:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('content_raw','内容:') !!}
    {!! Form::textarea('content_raw',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at','发布时间:') !!}
    {!! Form::input('date','published_at',date('Y-m-d'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>