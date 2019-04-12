@extends('layouts.app')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Список запросов @endslot
    @slot('parent') Главная @endslot
    @slot('active') Запросы @endslot
  @endcomponent

  <hr>

  <a href="{{route('bid.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Создать запрос</a>
  <table class="table table-striped">
    <thead>
      <th>ID заявки</th>
      <th>Дата</th>
      <th>Сумма</th>
      <th>Сумма возврата</th>
      <th>Срок</th>
      <th >Годовая ставка</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($bids as $bid)
        <tr>
          <td>{{$bid->slug}}</td>
          <td>{{$bid->created_at}}</td>
          <td>{{$bid->amount}}</td>
          <td>{{$bid->amount_refund}}</td>
          <td>{{$bid->term}} {{$bid->term_magnitude}}</td>
          <td>{{$bid->percent}}</td>
          <td class="text-right">
            <form onsubmit="if(confirm('Удалить?')){ return true}else{ return false}" action="{{route('bid.destroy',$bid)}}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}

              <a class="btn btn-default" href="{{route('bid.edit', $bid)}}"><i class="fa fa-edit"></i></a>

              <button type="sumbit" class="btn"><i class="fa fa-trash-o"></i></button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center"><h2>Данные отсутствуют</h2></td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td colspan="6">
          <ul class="pagination pull-right">
            {{$bids->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

@endsection
