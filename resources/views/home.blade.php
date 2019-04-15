@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
<prop-component :urldata="{{json_encode($url_data)}}"></prop-component>
<ajax-component></ajax-component>
<chartline-component></chartline-component>
<chartrandom-component></chartrandom-component>
@endsection
