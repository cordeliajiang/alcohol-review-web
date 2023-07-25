<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;    # need to use App\Models\Item for item controller to work
use App\Models\Review;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of alcohol items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the alcohol items and parse it to items.index view for display
        $items = Item::all();
        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new alcohol item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all the alcohol items and parse it to items.create_form view for display
        $items = Item::all();
        return view('items.create_form')->with('items', $items);
    }

    /**
     * Store a newly created alcohol item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    # store function is called when user submits create form
    # $request contains form data 
    public function store(Request $request)
    {
        # $this access parent instance of controller, and then call validate() to validate input
        # 1st para: contains form data, 2nd para: contains validation rule
        # if validation fails, the rest of the store() will not be executed, and the execution will be redirect to form page
        $this->validate($request, [
            'alcoholName' => 'required|max:50|unique:items,name', # item name must be unique, (note: should have no space in between items and name, otherwise unique won't work)
            'businessName' => 'required|max:100',
            'description' => 'required|max:500',
            'recommendRetailPrice' => 'required|numeric',
            'url' => 'nullable|url'    # an optional URL can be stored for an item. Only valid URL will be accepted.
        ]);

        # create new item and save
        $item = new Item();
        $item->name = $request->alcoholName;
        $item->businessName = $request->businessName;
        $item->description = $request->description;
        $item->recommendRetailPrice = $request->recommendRetailPrice;
        $item->URL = $request->url;
        $item->save();
        return redirect("item/$item->id");
    }

    /**
     * Display all information and reviews for that specific alcohol item. 
     * When displaying review, all information for that review should be displayed. 
     * In addition, the name of the user who posted that review must also be displayed.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find one specific alcohol item by its id
        $item = Item::find($id);

        // find reviews for that one item by Item id.
        $reviews = Item::find($id)->reviews;

        // where clause: sql query on Review table, chain with paginate to get 5 items on 1 page at a time
        $reviewPages = Review::where('itemId', $id)->paginate(5);

        // display imgs
        $imgs = $item->images;
        
        // parse $item, $reviews, and $reviewPages to client_details view for display
        return view('items.show_details')->with('item', $item)->with('reviews', $reviews)->with('reviewPages', $reviewPages)->with('imgs', $imgs);
    }

    /**
     * Show the form for editing the specified alcohol item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the id for that one item, and parse it to items.edit_form view for display
        $item = Item::find($id);
        return view('items.edit_form')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
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
            'alcoholName' => 'required|max:50|unique:items,name'.$id, # $id is checking primary key of the table and see whether it has same id in the table
            'businessName' => 'required|max:100',
            'description' => 'required|max:500',
            'recommendRetailPrice' => 'required|numeric',
            'url' => 'nullable|url'
        ]);

        # update information for one item by its id
        $item = Item::find($id);
        $item->name = $request->alcoholName;
        $item->businessName = $request->businessName;
        $item->description = $request->description;
        $item->recommendRetailPrice = $request->recommendRetailPrice;
        $item->URL = $request->url;
        $item->save();
        return redirect("item/$item->id");
    }

    /**
     * Remove the specified alcohol item from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the id for that one item, and delete it, then redirect to homepage
        $item = Item::find($id);
        $item->delete();
        return redirect("/");
    }
}
