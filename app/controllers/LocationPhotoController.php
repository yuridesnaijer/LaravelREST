<?php

class LocationPhotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($locationId)
	{
        $photos = Photo::where('location_id', $locationId)->get();
        return Response::json(array(
            'error' => false,
            'photos' =>$photos->toArray()
        ), 200);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
//      TODO: get location id from url
        $postData = file_get_contents("php://input");
        $json = json_decode($postData, true);

        $photo = new Photo;
        $photo->location_id = $json['location_id'];
        $photo->alt = $json['alt'];
        $photo->url = $json['url'];
//		TODO: validate and filter
        $photo->save();

        return Response::json(array(
            'error' => false,
            'urls' => $photo->toArray()
        ), 200);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($locationId, $photoId)
	{
        $photos = Photo::where('location_id', $locationId)
            ->where('id', $photoId)
            ->take(1)
            ->get();

        return Response::json(array(
            'error' => false,
            'photos' =>$photos->toArray()
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
		//
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
