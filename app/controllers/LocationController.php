<?php

class LocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $location = Location::get();
        return Response::json(array(
            'error' => false,
            'locations' =>$location->toArray()
        ), 200);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $postData = file_get_contents("php://input");
        $json = json_decode($postData, true);

        $location = new Location;
        $location->name = $json['name'];
        $location->city = $json['city'];
        $location->address = $json['address'];
        $location->max_persons = $json['max_persons'];
//		TODO: validate and filter
        $location->save();

        return Response::json(array(
            'error' => false,
            'urls' => $location->toArray()
        ), 200);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $location = Location::where('id', $id)
            ->take(1)
            ->get();

        return Response::json(array(
            'error' => false,
            'location' => $location->toArray()
        ), 200);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
//        $location = Location::find($id);
//
//        if ( Request::get('url') )
//        {
//            $location->url = Request::get('url');
//        }
//
//        if ( Request::get('description') )
//        {
//            $location->description = Request::get('description');
//        }
//
//        $location->save();
//
//        return Response::json(array(
//            'error' => false,
//            'message' => 'location updated'
//        ), 200);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
