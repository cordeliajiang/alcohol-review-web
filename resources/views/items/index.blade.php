<!-- specify master file in the layouts directory to inherit from -->
@extends('layouts.master')

<!-- the sections will overwrite its parent page -->
@section('title')
  Alcohol Review
@endsection

@section('content')
  <!-- a page that lists all items, and allow user to click on an item to show the details page for that item. -->
  <main class="container">
    <h2>Home</h2>
      @if($items)
        <ul class="list-group">
          <div class="row">
            <!-- list all items in the database by their name, clicking on a item will bring up the details page of that item -->
            @foreach($items as $item)
              <li class="list-group-item"><a class="list-group-item list-group-item-action" href="{{url("item/$item->id")}}">{{$item->name}}</a></li>
            @endforeach
          </div>
        </ul><br>
        <!-- checking whether is an logged in user, if yes show create new item button -->
        @if(Auth::check())
        <form method="GET" action='{{url("item/create")}}'>
          {{csrf_field()}}
          <input type="submit" class="btn btn-primary" value="Create New Item">
        </form>
        @endif
      @else
        No item found
      @endif
  </main>
@endsection