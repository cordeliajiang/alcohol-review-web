<!-- specify master file in the layouts directory to inherit from -->
@extends('layouts.master')

<!-- the sections will overwrite its parent page -->
@section('title')
  Create New Item
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
    <h2>Create New Item</h2>
    <!-- after create form is submitted, we go to the store function -->
    <form method="post" action="{{url("item")}}">
      <!-- prevent cross site request forgery-->
      {{csrf_field()}}
      
      <!-- if invalid input is detected, the appropriate error message must be displayed, along with the previous entered value. -->
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Alcohol Name:</label>
        <div class="col-auto">
          <input type="text" name="alcoholName" value="{{old('alcoholName')}}" class="form-control" id="colFormLabel" placeholder="Enter item name here">
        </div>
      </div>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Business Name:</label>
        <div class="col-auto">
          <input type="text" name="businessName" value="{{old('businessName')}}" class="form-control" id="colFormLabel" placeholder="Enter business name here">
        </div>
      </div>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Description:</label>
        <div class="col-auto">
          <input type="text" name="description" value="{{old('description')}}" class="form-control" id="colFormLabel" placeholder="Enter description here">
        </div>
      </div>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Recommend Retail Price:</label>
        <div class="col-auto">
          <input type="text" name="recommendRetailPrice" value="{{old('recommendRetailPrice')}}" class="form-control" id="colFormLabel" placeholder="Enter recommend retail price here">
        </div>
      </div>
      <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">URL:</label>
        <div class="col-auto">
          <input type="text" name="url" value="{{old('url')}}" class="form-control" id="colFormLabel" placeholder="Enter url here (optional)">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
  </main>
@endsection