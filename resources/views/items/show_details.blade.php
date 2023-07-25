<!-- specify master file in the layouts directory to inherit from -->
@extends('layouts.master')

<!-- the sections will overwrite its parent page -->
@section('title')
  Alcohol Details
@endsection

@section('content')
  <!-- only member and moderator can upload photos for the alcohol item-->
  @if(Auth::check())
       <div class="row">
          <!-- if imgs are not empty, then display all imgs in a row -->
          @if(count($imgs)>0)
              <!-- for each img, also display the name of the user who uploaded the img -->
              @foreach($imgs as $img)
                  <div class="col-md-4 col-sm-4 text-center">
                      <img class="img img-responsive center-block" src="{{url($img->URL)}}" alt="{{$item->name}}">
                      <div class="caption"><p>Uploaded by {{$img->user->name}}</p></div>
                  </div>
              @endforeach
          @endif
      </div>
      <!-- upload imgs for item -->
      <form method="POST" action='{{url("image")}}' enctype="multipart/form-data">
          {{csrf_field()}}
          <a class="btn btn-default btn-md btn-block" role="button" data-toggle="modal" data-target="#uploadPhotoConfirmation-{{$item->id}}">Upload Photos</a>
          <div class="modal fade" id="uploadPhotoConfirmation-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="modalLabel">Upload photo for <i>{{$item->name}}? </i></h4>
                      </div>
                      <div class="modal-body">
                          <input type="file" class="form-control-file" name="img">
                          <input type="hidden" name="itemId" value="{{$item->id}}">
                          <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                      </div>
                      <div class="modal-footer">
                          <button type="submit" value="Create" class="btn btn-default">Confirm</button>
                      </div>
                  </div>
              </div>
          </div>
      </form>
  @endif

  <main class="container">
    <h2>Alcohol Details</h2>
    <table class="table">
      <tbody>
        <!-- display all the information for that alcohol item -->
        <tr><th class="col-md-3">Alcohol Id:</th><td>{{$item->id}}</td></tr>
        <tr><th class="col-md-3">Alcohol Name:</th><td>{{$item->name}}</td></tr>
        <tr><th class="col-md-3">Business Name:</th><td>{{$item->businessName}}</td></tr>
        <tr><th class="col-md-3">Description:</th><td>{{$item->description}}</td></tr>
        <tr><th class="col-md-3">Recommend Retail Price:</th><td>{{$item->recommendRetailPrice}}</td></tr>
        <tr><th class="col-md-3">URL:</th><td class="text-break">{{$item->URL}}</td></tr> <!-- prevent long strings of text from breaking layout (text-break set overflow-wrap: break-word (and word-break: break-word for IE & Edge compatibility) -->
      </tbody>
    </table>
    <!-- checking whether a user is logged in -->
    @if(Auth::check())
      <!-- checking whether a logged in user is a moderator, if is a moderator, show edit and delete item buttons,
      otherwise if is a member, don't show edit and delete item buttons -->
      @if(Auth::user()->type == "Moderator")
        <div class="row">
          <!-- edit button -->
          <div class="col-1">
            <form method="GET" action='{{url("item/$item->id/edit")}}'>
              {{csrf_field()}}
              <input type="submit" class="form-control btn btn-primary" value="Edit">
            </form>
          </div>

          <!-- delete button -->
          <div class="col-1">
            <form method="POST" action='{{url("item/$item->id")}}'>
              {{csrf_field()}}

              <!-- generate hidden method field to indicate delete action to be executed -->
              {{method_field('DELETE')}}
              <input type="submit" class="form-control btn btn-primary" value="Delete">
            </form>
          </div>
        </div><br><br>
      @endif

      <h2>Alcohol Review</h2>
      @if(Auth::user()->type == "Moderator")
        <!-- create button -->
        <div class="col-1">
          <form method="GET" action='{{url("review/create")}}'>
            {{csrf_field()}}
            <input type="hidden" name="itemId" value="{{$item->id}}"/>
            <input type="submit" class="form-control btn btn-primary" value="Create">
          </form>
        </div>
      @endif
      <!-- store user entered review information in database and display it in show_details view -->
      <!-- for every review check it against every user in the user table to get the information of the user(owner) of the review-->
      <!-- pagination: $reviewPages -->
      @foreach($reviewPages as $review)
        <table class="table">
          <tbody>
            <tr><th class="col-md-3">User Id:</th><td>{{$review->user->id}}</td></tr>
            <tr><th class="col-md-3">Username:</th><td>{{$review->user->name}}</td></tr>
            <tr><th class="col-md-3">Creation Date:</th><td>{{$review->created_at}}</td></tr>
            <tr><th class="col-md-3">Rating:</th><td>{{$review->rating}}</td></tr>
            <tr><th class="col-md-3">Review Content:</th><td>{{$review->reviewContent}}</td></tr>
            <tr><th class="col-md-3">Likes:</th><td>{{$review->likes}}</td></tr>
            <tr><th class="col-md-3">Dislike:</th><td>{{$review->dislikes}}</td></tr>
          </tbody>
        </table><br><br>
        @if(Auth::user()->type == "Moderator")
          <div class="row">
            <div class="col-1">
              <!-- edit button -->
              <form method="GET" action='{{url("review/$review->id/edit")}}'>
                  {{csrf_field()}}
                <input type="submit" class="form-control btn btn-primary value=" value="Edit">
              </form>
            </div>
          
            <div class="col-1">
              <!-- delete button -->
              <form method="POST" action='{{url("review/$review->id")}}'>
                {{csrf_field()}}

                <!-- generate hidden method field to indicate delete action to be executed -->
                {{method_field('DELETE')}}
                <input type="submit" class="form-control btn btn-primary" value="Delete">
              </form><br><br>
            </div>
          </div>
        @endif
      @endforeach

      <!-- checking whether a logged in user is a member or a moderator, if is a member, show only create review button 
      otherwise, show create, update, and delete review buttons for moderator -->
      @if(Auth::user()->type == "Member")
        <div class="col-1">
          <form method="GET" action='{{url("review/create")}}'>
            {{csrf_field()}}
            <input type="hidden" name="itemId" value="{{$item->id}}"/>
            <input type="submit" class="form-control btn btn-primary" value="Create">
          </form><br><br>
        </div>
        @foreach($reviewPages as $review)
          <div class="row">
            <!-- member is only allowed to edit and delete their own review -->
            @if(Auth::user()->id == $review->user->id)
              <div class="col-1">
                <!-- edit button -->
                <form method="GET" action='{{url("review/$review->id/edit")}}'>
                    {{csrf_field()}}
                  <input type="submit" class="form-control btn btn-primary" value="Edit">
                </form>
              </div>

              <div class="col-1">
                <!-- delete button -->
                <form method="POST" action='{{url("review/$review->id")}}'>
                  {{csrf_field()}}

                  <!-- generate hidden method field to indicate delete action to be executed -->
                  {{method_field('DELETE')}}
                  <input type="submit" class="form-control btn btn-primary" value="Delete">
                </form><br><br>
              </div>
            @endif
          </div>
        @endforeach
      @endif
    @else
      <h2>Alcohol Review</h2>
      @foreach($reviewPages as $review)
        <table class="table">
          <tbody>
            <tr><th class="col-md-3">User Id:</th><td>{{$review->user->id}}</td></tr>
            <tr><th class="col-md-3">Username:</th><td>{{$review->user->name}}</td></tr>
            <tr><th class="col-md-3">Creation Date:</th><td>{{$review->created_at}}</td></tr>
            <tr><th class="col-md-3">Rating:</th><td>{{$review->rating}}</td></tr>
            <tr><th class="col-md-3">Review Content:</th><td>{{$review->reviewContent}}</td></tr>
            <tr><th class="col-md-3">Likes:</th><td>{{$review->likes}}</td></tr>
            <tr><th class="col-md-3">Dislike:</th><td>{{$review->dislikes}}</td></tr>
          </tbody>
        </table><br><br>
      @endforeach
    @endif
  </main>
<!-- pagination link -->
{{$reviewPages->links()}}
@endsection