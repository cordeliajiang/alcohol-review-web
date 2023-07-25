<!-- specify master file in the layouts directory to inherit from -->
@extends('layouts.master')

<!-- the sections will overwrite its parent page -->
@section('title')
  Vehicle Details
@endsection

@section('content')
  <main class="container">
    <h2>Documentation</h2>
    <h4>1. ER Diagram</h4>
    <img src="images/AS2_ERD.jpg" alt="2703ICT_AS2_ERD"><br><br>
    <p>Entity Relationships: 1 user can make 0 or many reviews. 1 item can have 0 or many reviews. 1 user can upload 0 or many images. 1 item can have 0 or many images. </p><br>
    <h4>2. What you were able to complete, what you were not able to complete?</h4>
    <p>Added ER diagram, description of tasks completed or not completed in documentation. Created database tables using migration and inserted required initial data using
     seeder. Email, password, name, and type will be stored for user once they registered. Email and password are used for login, and user can login and logout from any page.
      An item contains item name (unique), business name, description, and URL (optional, and only valid URL will be accepted). A review contains creation date, rating (between 1 to 5), 
      review content (more than 5 characters), a user can only post 1 review per item, and user will be redirected to the page containing the newly posted review. 
      There is a page that lists all items that allows user to click on and shows the detail page for that item. The detail page shows all information and reviews 
      for that item (username for whom posted that review will also be displayed). Items and reviews can be updated (update form contains old value). Items and reviews 
      can be deleted (when an item is deleted, all reviews for that item are also deleted). Input validations are performed, an error message will be prompt once an error 
      is detected. Access control is implemented for both front and back-end. Reviews are paginated (where there are more than 5 reviews for an item). User can upload images of an item, 
      and an item may have many images uploaded by different users in the details page, username of whom uploaded that image will be displayed, and only logged in user can upload images. 
      There are still a lot of requirements not fulfilled (like and dislikes, follow and unfollow, recommendation).</p><br>
    <h4>3. Reflect on the process you have applied to develop your solution</h4>
    <p>Before I start coding, I have sketched up some wireframes according to requirements and rubrics. During coding, I test very 
    often (for every function, get code in function and test whether they work before moving onto writing another function). 
    When I come across a problem, I often use the combination of commenting, dd(), and reading errors in console (using comments 
    to try to figure the part that is not working and dd() to see whether the data is parsed in).</p><br>
  </main>
@endsection