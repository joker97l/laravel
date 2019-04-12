@extends('layouts.app')

@section('content')

<div class="container">

  @component('components.breadcrumb')
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
      <th class="text-right">Годовая ставка</th>
    </thead>
    <tbody>
      @forelse ($bids as $bid)
        <tr>
          <td>{{$bid->slug}}</td>
          <td>{{$bid->created_at}}</td>
          <td>{{$bid->amount}}</td>
          <td>{{$bid->amount_refund}}</td>
          <td>{{$bid->term}}  @if ($bid->term_magnitude == 0)  Дн. @endif
                              @if ($bid->term_magnitude == 1)  Мес. @endif
                              @if ($bid->term_magnitude == 2)  Год. @endif

          </td>
          <td class="text-right">{{$bid->percent}}</td>
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
