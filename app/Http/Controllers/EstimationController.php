<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Selled;
class EstimationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = \Session::get('brand');
        //$selledcars=Selled::all();
        //$models= Selled::select('brand',)->where('model',$model)->paginate(3);
       // $brandss=Selled::select('brand')->where('model',$model)
               //  ->groupBy('brand')
               //  ->get();
                // return $brandss;
 $result = \DB::collection('Sell')->raw(function($collection) use ($model)
{
    return $collection->aggregate(array(
        array(
            '$match' => array(
                'model' => $model
            )
            ),
        array(
            
            '$group' => array(
                '_id' => '$brand',
                'count' => array(
                    '$sum' => 1
                )
                )
            
        ) ,array ('$sort' => array('count' => -1))
        ,array ('$limit' => 5)
        /*array(
            '$sortByCount'=>'$brand' 
        )  */
    ));
});
foreach($result as $document) {
   $json= json_encode( $document->getArrayCopy() );
    //print($json);
    $properties = json_decode($json, true);
    $data = array_filter($properties);
    //return $data['_id'];
foreach ($properties as $doc) {
   // echo '<strong></strong> '.$value.'<br>';
  //return $doc["count"];
}
return view('estimation', compact('result'));
}
//return view('estimation', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
