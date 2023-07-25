<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Item;    # need to use App\Models\Item for item controller to work

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new review for an item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // get the item id saved in form data, and parse it to reviews.create_form view for display
        $item = Item::find($request->itemId);
        return view('reviews.create_form')->with('item', $item);
    }

    /**
     * Store a newly created review in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # $this access parent instance of controller, and then call validate() to validate input
        # 1st para: contains form data, 2nd para: contains validation rule
        # if validation fails, the rest of the store() will not be executed, and the execution will be redirect to form page
        $this->validate($request, [
            'userId' => 'unique:reviews,userId,NULL,reviews,itemId,' . $request->itemId,
            'itemId' => 'unique:reviews,itemId,NULL,reviews,userId,' . $request->userId,
            'rating' => 'required|integer|between:1,5',    # a number between 1 to 5
            'reviewContent' => 'required|min:5'   # must be more than 5 characters
        ],
        [
            'userId.unique' => 'One user can only post one review per item'   # a user can only post at most one review per item 
        ]);

        # create new review and save
        $review = new Review();
        $review->userId = $request->userId;
        $review->itemId = $request->itemId;
        $review->rating = $request->rating;
        $review->reviewContent = $request->reviewContent;
        $review->save();

        # after a new review is posted, the user will be redirected to the page containing the newly posted review.
        return redirect()->action([ItemController::class, 'show'], ['item' => $review->itemId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the id for that one review, and the item for that review, and parse it to reviews.edit_form view for display
        $review = Review::find($id);
        $Item = $review->item;

        // parse $item, and $reviews to reviews.edit_form view for display
        return view('reviews.edit_form')->with('Item', $Item)->with('review', $review);
    }

    /**
     * Update the specified review in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        # $this access parent instance of controller, and then call validate() to validate input
        # 1st para: contains form data, 2nd para: contains validation rule
        # if validation fails, the rest of the store() will not be executed, and the execution will be redirect to form page
        $this->validate($request, [
            'rating' => 'required|integer|between:1,5',    # rating must be a number between 1 to 5
            'reviewContent' => 'required|min:5'     # must be more than 5 characters
        ]);
        
        # create new review and save
        $review = Review::find($id);
        $review->rating = $request->rating;
        $review->reviewContent = $request->reviewContent;
        $review->save();

        # after a new review is updated, the user will be redirected to the item detail page containing the newly posted review.
        return redirect()->action([ItemController::class, 'show'], ['item' => $review->item->id]);
    }

    /**
     * Remove the specified review from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the id for that one review, and delete it, then redirect to item detail page
        $review = Review::find($id);
        $review->delete();

        return redirect()->action([ItemController::class, 'show'], ['item' => $review->item->id]);
    }
}
