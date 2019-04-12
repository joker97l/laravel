@extends('layouts.app')

@section('content')

<div class="container">


  <hr />

  <form class="form-horizontal" action="{{route('bid.store')}}" method="post">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('bids.partials.form')

      <input type="hidden" name="created_by" value="{{Auth::id()}}">
  </form>
</div>

@endsection
