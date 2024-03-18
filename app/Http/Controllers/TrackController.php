<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Jobs\SendSMSJob;
use App\Jobs\UpdateStoresJob;
use App\Models\Tracks;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    public function track_list() {
        $id = auth()->user()->id;
        $tracks = Tracks::join('users', 'users.id', '=', 'tracks.user_id')->join('stores', 'stores.store_id', '=', 'tracks.store_id')->where('tracks.user_id', $id)->select('tracks.*', 'stores.store_name')->paginate(10);
        return view('frontend.track.index')->with('activeLink', 'track')->with('tracks', $tracks);
    }

    public function add(Request $request) {
        $stores = DB::table('stores')->get();
        return view('frontend.track.add')->with('activeLink', 'track')->with('stores', $stores);
    }

    public function edit(Request $request, $id) {
        $track = Tracks::find($id);
        $stores = DB::table('stores')->get();
        return view('frontend.track.edit')->with('activeLink', 'track')->with('track', $track)->with('stores', $stores);
    }

    public function destroy(Request $request, $id) {
        try {
            Tracks::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Track deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    public function getstorewithname() {

        $url = "https://api.engager.ecbsn.com/datagrid/rest/v1/data";
        $name = "button_domain_batch_v1";

        for ($i = 0; $i < 40; $i++) {
            $data = \DB::table('stores')->offset($i * 100)->limit(100)->pluck('store_id')->toArray();
            $variables = json_encode(["storeIds" => $data]);

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
            $data = json_decode($response, true);
            //echo "<pre>"; print_r($data); die;

            foreach ($data['data']['stores'] as $row) {
                \DB::table('stores')->where('store_id', $row['storeId'])->update(['store_name' => $row['storeName'], 'site_url' => $row['siteUrl'], 'shopping_url' => $row['shoppingURL']]);
            }
        }
    }

    public function update(Request $request, $id) {
        try {
            $this->validate($request, [
                'store' => 'required',
                'discount_type' => 'required',
                'operator' => 'required',
                'price' => 'required',
                'status' => 'required'
            ]);

            $track = Tracks::find($id);
            $track->user_id = \Auth::id();
            $track->store_id = $request->store;
            $track->discount_type = $request->discount_type;
            $track->operator = $request->operator;
            $track->price = $request->price;
            $track->alert_email = $request->alert_email;
            $track->alert_text = $request->alert_text;
            $track->status = $request->status;
            $track->save();
            return redirect()->route('track.list')->with('success', 'Track updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
        //echo "<pre>"; print_r($request->all()); die;
    }

    public function save(Request $request) {
//        try {
        $this->validate($request, [
            'store' => 'required',
            'discount_type' => 'required',
            'operator' => 'required',
            'price' => 'required',
        ]);

        $status = $request->has('status') ? 1 : 0;

        $alert_email = null;
        $alert_text = null;

        if ($request->alert_type === "email") {
            $alert_email = "email";
        } elseif ($request->alert_type === "text") {
            $alert_text = "text";
        } elseif ($request->alert_type === "both") {
            $alert_email = "email";
            $alert_text = "text";
        }

        $track = new Tracks;
        $track->user_id = Auth::id();
        $track->store_id = $request->store;
        $track->discount_type = $request->discount_type;
        $track->operator = $request->operator;
        $track->price = $request->price;
        $track->alert_email = $alert_email;
        $track->alert_text = $alert_text;
        $track->status = $status;
        $track->save();
        return redirect()->route('track.list')->with('success', 'Track saved successfully');
//        } catch (\Exception $e) {
//            return redirect()->back()->with('success', $e->getMessage());
//        }
        //echo "<pre>"; print_r($request->all()); die;
    }

    public function sendSMSToUsers() {

        $usersWithSpecificTracks = User::whereHas('tracks', function ($query) {
            $query->where('status', 1)
                ->where('alert_text', 'text')
                ->whereHas('store', function ($storeQuery) {
                    $storeQuery->whereRaw('tracks.discount_type = stores.display')
                        ->whereRaw('(
                        (tracks.operator = "==" AND tracks.price = stores.amount)
                        OR
                        (tracks.operator = ">" AND stores.amount > tracks.price)
                    )');
                });
        })->with(['tracks' => function ($query) {
            $query->where('status', 1)
                ->where('alert_text', 'text')
                ->whereHas('store', function ($storeQuery) {
                    $storeQuery->whereRaw('tracks.discount_type = stores.display')
                        ->whereRaw('(
                        (tracks.operator = "==" AND tracks.price = stores.amount)
                        OR
                        (tracks.operator = ">" AND stores.amount > tracks.price)
                    )');
                });
        }])->get();

//        dd($usersWithSpecificTracks);

        $smsData = [];

        foreach ($usersWithSpecificTracks as $user) {
            foreach ($user->tracks as $track) {
                $store = $track->store;
                if ($store) {
                    $smsData[] = [
                        'name' => $track->user->first_name . $track->user->last_name,
                        'phone_number' => $track->user->phone_number,
                        'storeName' => $store->store_name,
                        'discountType' => $track->discount_type,
                        'amount' => $store->amount,
                        'shoppingUrl' => $store->shopping_url,
                        'operator' => $track->operator
                    ];
                }
            }
        }

        foreach (array_chunk($smsData, 50) as $batch) {
            foreach ($batch as $data) {
                SendSMSJob::dispatch(
                    $data['name'],
                    $data['phone_number'],
                    $data['storeName'],
                    $data['discountType'],
                    $data['amount'],
                    $data['shoppingUrl'],
                    $data['operator']
                );
            }
        }


    }

    public function sendEmailToUsersWithTracks() {

        $usersWithSpecificTracks = User::whereHas('tracks', function ($query) {
            $query->where('status', 1)
                ->where('alert_email', 'email')
                ->whereHas('store', function ($storeQuery) {
                    $storeQuery->whereRaw('tracks.discount_type = stores.display')
                        ->whereRaw('(
                        (tracks.operator = "==" AND tracks.price = stores.amount)
                        OR
                        (tracks.operator = ">" AND stores.amount > tracks.price)
                    )');
                });
        })->with(['tracks' => function ($query) {
            $query->where('status', 1)
                ->where('alert_email', 'email')
                ->whereHas('store', function ($storeQuery) {
                    $storeQuery->whereRaw('tracks.discount_type = stores.display')
                        ->whereRaw('(
                        (tracks.operator = "==" AND tracks.price = stores.amount)
                        OR
                        (tracks.operator = ">" AND stores.amount > tracks.price)
                    )');
                });
        }])->get();

        $emailData = [];

        foreach ($usersWithSpecificTracks as $user) {
            foreach ($user->tracks as $track) {
                $store = $track->store;
                if ($store) {
                    $emailData[] = [
                        'email' => $track->user->email,
                        'name' => $track->user->first_name . $track->user->last_name,
                        'storeName' => $store->store_name,
                        'discountType' => $track->discount_type,
                        'amount' => $store->amount,
                        'shoppingUrl' => $store->shopping_url,
                    ];
                }
            }
        }

        foreach (array_chunk($emailData, 50) as $batch) {
            foreach ($batch as $data) {
                SendEmailJob::dispatch(
                    $data['email'],
                    $data['name'],
                    $data['storeName'],
                    $data['discountType'],
                    $data['amount'],
                    $data['shoppingUrl']
                );
            }
        }

    }

    public function getallstore() {
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
        $data = json_decode($response, true);
        //echo count($data['data']['stores']);
        //echo $response;

        foreach ($data['data']['stores'] as $row) {
            $count = \DB::table('stores')->where('store_id', $row['id'])->count();
            if ($count) {
                \DB::table('stores')->where('store_id', $row['id'])->update(['amount' => $row['reward']['amount'], 'display' => $row['reward']['display']]);
            } else {
                \DB::table('stores')->insert(['store_id' => $row['id'], 'amount' => $row['reward']['amount'], 'display' => $row['reward']['display']]);
            }
        }
    }
}
