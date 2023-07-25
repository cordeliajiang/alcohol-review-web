<!-- specify master file in the layouts directory to inherit from -->
@extends('layouts.master')

<!-- the sections will overwrite its parent page -->
@section('title')
  Create New Review
@endsection

@section('content')
  <!-- display error message if validation fails -->
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <main class="container">
    <h2>Create New Review</h2>
    <!-- after create form is submitted, we go to the store function -->
    <form method="POST" action='{{url("review")}}'>
      <!-- prevent cross site request forgery-->
      {{csrf_field()}}
      
      <!-- if invalid input is detected, the appropriate error message must be displayed, along with the previous entered value. -->
      <input type="hidden" name="itemId" value="{{$item->id}}"/>
      <input type="hidden" name="userId" value="{{Auth::user()->id}}"/>
      
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Rating:</label>
        <div class="col-auto">
          <input type="text" name="rating" value="{{old('rating')}}" class="form-control" id="colFormLabel" placeholder="Enter rating here">
        </div>
      </div>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Review Content:</label>
        <div class="col-auto">
          <input type="text" name="reviewContent" value="{{old('reviewContent')}}" class="form-control" id="colFormLabel" placeholder="Enter review content here">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Add Review</button>
    </form>
  </main>
@endsection