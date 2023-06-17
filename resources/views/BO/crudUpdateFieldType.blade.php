@include('BO/header') 

@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/category.css') }}">
<div class="contenu">
    <form action="{{ route('updateByid') }}" method="get">
        @csrf

        <div class="form-group">
            <input type="hidden" name="id_field_type" id="id_field_type" class="form-control" value="{{ $model->id_field_type }}">
            <input type="hidden" name="variable" id="id_field_type" class="form-control" value="{{ $ref }}" >
        </div>

        <div class="form-group">
            <label for="field_type">Field Type:</label>
            <input type="text" name="field_type" id="field_type" class="form-control" value="{{ $model->field_type }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>