{{-- <label for="">Статус</label> --}}
<select class="form-control" name="published">
  @if (isset($bid->id))
  <option value="0" @if ($bid->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($bid->published == 1) selected="" @endif>Опубликовано</option>
      @else
      <option value="0">Не опубликовано</option>
      <option value="1">Опубликовано</option>
      @endif
</select>

<label for="">Дата запроса</label>
<input class="form-control" type="text" name="created_at" placeholder="" value="{{$bid->created_at or \Carbon\Carbon::now()->format('d.m.y H:i')}}" readonly="">

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Укажите в кратце цель вашего заёма, причину, либо что посчитаете важным" value="{{$bid->title or ""}}" required>

<label for="">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="{{$bid->slug or ""}}" readonly="">

<label for="">Сумма займа</label>
<input type="number" class="form-control" name="amount" placeholder="Сумма займа" value="{{$bid->amount or ""}}" required>

<label for="">Сумма возрата</label>
<input type="number" class="form-control" name="amount_refund" placeholder="Сумма возврата" value="{{$bid->amount_refund or ""}}" required>

<label for="">Годовой процент</label>
<input type="number" class="form-control" name="percent" placeholder="Годовой процент" value="{{$bid->percent or ""}}">

<label for="">Срок займа </label>
<input type="number" class="form-control" name="term" placeholder="Срок займа" value="{{$bid->term or ""}}" required>

<select class="form-control" name="term_magnitude">
  @if (isset($bid->id))
  <option value="0" @if ($bid->term_magnitude == 0) selected="" @endif>Дн.</option>
    <option value="1" @if ($bid->term_magnitude == 1) selected="" @endif>Мес.</option>
      <option value="2" @if ($bid->term_magnitude == 2) selected="" @endif>Год.</option>
        @else
        <option value="0">Дн.</option>
        <option value="1">Мес.</option>
        <option value="2">Год.</option>
        @endif
</select>


<label for="">Описание</label>
<textarea id="description_bid" class="form-control" name="description">{{$bid->description or ""}}</textarea>

<label for="">Залог</label>
<input type="text" class="form-control" name="pledge" placeholder="Залог" value="{{$bid->pledge or ""}}">


<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
