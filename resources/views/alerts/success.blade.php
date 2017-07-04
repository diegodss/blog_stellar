@if (!empty($success))
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-success">
            <p>{{ $success }}</p>

        </div>
    </div>
</div>
@endif
@if(session()->has('message'))
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-success" >
            {{ session()->get('message') }}
        </div>
    </div>
</div>
@endif