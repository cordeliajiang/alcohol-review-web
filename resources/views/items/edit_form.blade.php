<!-- specify master file in the layouts directory to inherit from -->
@extends('layouts.master')

<!-- the sections will overwrite its parent page -->
@section('title')
  Edit Item
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
    <h2>Edit Item</h2>

    <!-- form is submitted to item/$item->id, this form will be redirected to update function -->
    <form method="post" action="{{url("item/$item->id")}}">
      <!-- prevent cross site request forgery-->
      {{csrf_field()}}

      <!-- hidden form field for PUT, as edit suppose to submit with PUT according to risk convention -->
      {{method_field('PUT')}}
  
      <!-- update item, existing values must be displayed in the edit form -->
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Alcohol Name:</label>
        <div class="col-auto">
          <input type="text" name="alcoholName" value="{{$item->name}}" class="form-control" id="colFormLabel">
        </div>
      </div>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Business Name:</label>
        <div class="col-auto">
          <input type="text" name="businessName" value="{{$item->businessName}}" class="form-control" id="colFormLabel">
        </div>
      </div>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Description:</label>
        <div class="col-auto">
          <input type="text" name="description" value="{{$item->description}}" class="form-control" id="colFormLabel">
        </div>
      </div>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Recommend Retail Price:</label>
        <div class="col-auto">
          <input type="text" name="recommendRetailPrice" value="{{$item->recommendRetailPrice}}" class="form-control" id="colFormLabel">
        </div>
      </div>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">URL:</label>
        <div class="col-auto">
          <input type="text" name="url" value="{{$item->URL}}" class="form-control" id="colFormLabel">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </main>
@endsection