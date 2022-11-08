@extends('../../../welcome')

@section('title') Add currency @endsection

@section('content')
<h1>Add currency</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('currency.index') }}"> Back</a>
</div>
<form action="{{ route('currency.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency code:</strong>
                <input type="text" name="code" class="form-control" placeholder="currency code">
                @error('code')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency rate:</strong>
                <input type="text" name="rate" class="form-control" placeholder="currency rate">
                @error('rate')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection