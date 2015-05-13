{{ Form::label('type_id', 'Type ID:')}}
{{ Form::select('type_id', $data, '', ['class' => 'form-control', 'id'=> 'typeId']) }}