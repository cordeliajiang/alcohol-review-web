<!-- specify master file in the layouts directory to inherit from -->
@extends('layouts.master')

<!-- the sections will overwrite its parent page -->
@section('title')
  Edit Review
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
    <h2>Edit Review</h2>

    <!-- form is submitted to item/$item->id, this form will be redirected to update function -->
    <form method="POST" action='{{url("review/$review->id")}}'>
      <!-- prevent cross site request forgery-->
      {{csrf_field()}}

      <!-- hidden form field for PUT, as edit suppose to submit with PUT according to risk convention -->
      {{method_field('PUT')}}
  
      <!-- existing values must be displayed in the edit form -->
      <!-- update item, existing values must be displayed in the edit form -->
      <input type="hidden" name="userId" value="{{Auth::user()->id}}"/>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Rating:</label>
        <div class="col-auto">
          <input type="text" name="rating" value="{{$review->rating}}" class="form-control" id="colFormLabel">
        </div>
      </div>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Review Content:</label>
        <div class="col-auto">
          <input type="text" name="reviewContent" value="{{$review->reviewContent}}" class="form-control" id="colFormLabel">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </main>
@endsection