
@include('BO/header') 

@include('BO/nav')
<form action="{{ route('updateByid') }}" method="get">
    @csrf

    <div class="form-group">
        <input type="hidden" name="id_category" id="id_category" class="form-control" value="{{ $id }}">
        <input type="hidden" name="variable" id="variable" class="form-control" value="{{ $ref }}" >
    </div>

    <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" name="category" id="category" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="subscribing_price">Subscribing Price:</label>
        <input type="text" name="subscribing_price" id="subscribing_price" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
