@include('BO/header') 

@include('BO/nav')
<form action="{{ route('updateByid') }}" method="get">
    @csrf

    <div class="form-group">
        <input type="hidden" name="id_field_type" id="id_field_type" class="form-control" value="{{ $id }}">
        <input type="hidden" name="variable" id="id_field_type" class="form-control" value="{{ $ref }}" >
    </div>

    <div class="form-group">
        <label for="field_type">Field Type:</label>
        <input type="text" name="field_type" id="field_type" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>