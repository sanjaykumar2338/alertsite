<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Configuration\Configuration;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\PrintfulOrder;
use App\Models\Tracks;

class TrackController extends Controller
{
    public function track_list()
    {
        $id = auth()->user()->id;
        $tracks = Tracks::join('users', 'users.id', '=', 'tracks.user_id')->where('tracks.user_id',$id)->paginate(10);
        return view('frontend.track.index')->with('activeLink', 'track')->with('tracks', $tracks);
    }

    public function add(Request $request){
        //$this->getstorewithname(); die;
        return view('frontend.track.add')->with('activeLink', 'track');
    }

    public function getstorewithname(){

        $storeIds = [];
        for ($i = 0; $i < 40; $i++) { 
           $data = \DB::table('stores')->offset($i * 100)->limit(100)->pluck('store_id')->toArray();
           $storeIds = [];
           $storeIds = array_merge($storeIds, $data);

           echo "<pre>"; 
           print_r($storeIds); 
           die;
        }

        $data = \DB::table('stores')->limit(10)->get();
        //$storeIds = $data->pluck('store_id')->toArray();

        $storeIds = [];
        \DB::table('stores')->orderBy('id')->chunk(10, function ($data) {
            $storeIds[] = $data->pluck('store_id')->toArray();
        });

        echo "<pre>"; print_r($storeIds); die;

        $url = "https://api.engager.ecbsn.com/datagrid/rest/v1/data";
        $name = "button_domain_batch_v1";
        $variables = json_encode(["storeIds" => $storeIds]);

        $queryParams = http_build_query([
            "name" => $name,
            "variables" => $variables
        ]);

        $requestUrl = "$url?$queryParams";

        $headers = array(
            'Client-Agent: button',
            'Cookie: AWSALB=gQohOefAFs4jwe/MaeO8F1XYpacK1MPTm9aNk0uHr8q8dFr8XLRDOXocDDuapu7sdDGDIdujWLDCo5Xdzw8fdT15rCscBiG09lnBLjEezyJOYsjt1MihuE3jt2nw; AWSALBCORS=gQohOefAFs4jwe/MaeO8F1XYpacK1MPTm9aNk0uHr8q8dFr8XLRDOXocDDuapu7sdDGDIdujWLDCo5Xdzw8fdT15rCscBiG09lnBLjEezyJOYsjt1MihuE3jt2nw'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $requestUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            //echo 'Error: ' . curl_error($ch);
        } else {
            //echo $response;
        }

        curl_close($ch);
        $data = json_decode($response,true);
        echo "<pre>"; print_r($data); die;
    }

    public function getallstore(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.engager.ecbsn.com/datagrid/rest/v1/data?name=button_reward_v1&variables=%7B%22storeIds%22%3A%5B%22all%22%5D%7D',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Client-Agent: button',
            'Cookie: AWSALB=BQuQp35zF6Z4088PbnOs0/uN+fhXh+64uiTH7TcdcYEV1IeGuTekWe6BwxSwigER03VWiuPmmUyIygS6j/vYJ48KgaB8X6aUgsfg/oBnr3tJlsXuk1GpGvQSLANK; AWSALBCORS=BQuQp35zF6Z4088PbnOs0/uN+fhXh+64uiTH7TcdcYEV1IeGuTekWe6BwxSwigER03VWiuPmmUyIygS6j/vYJ48KgaB8X6aUgsfg/oBnr3tJlsXuk1GpGvQSLANK'
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response,true);
        //echo count($data['data']['stores']);
        //echo $response;

        foreach($data['data']['stores'] as $row){
            \DB::table('stores')->insert(['store_id'=>$row['id'],'amount'=>$row['reward']['amount'],'display'=>$row['reward']['display']]);
            //echo "<pre>"; print_r($row); die;
        }
        //echo "<pre>"; print_r($response); 
    }
}