@include('BO/header') 

@include('BO/nav')
<div class="contenu">
    <form action="{{ route('updateByid') }}" method="get">
        @csrf

        <div class="form-group">
            <input type="hidden" name="id_subscription_state" id="id_subscription_state" class="form-control" value="{{ $model->id_subscription_state}}">
            <input type="hidden" name="variable" id="id" class="form-control" value="{{ $ref }}" >
        </div>

        <div class="form-group">
            <label for="subscription_state">Subscription State:</label>
            <input type="text" name="subscription_state" id="subscription_state" class="form-control" value="{{$model->subscription_state}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
