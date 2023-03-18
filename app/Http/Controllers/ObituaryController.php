<?php

namespace App\Http\Controllers;

use App\CondolenceDesign;
use App\ObituaryPayments;
use App\Obituaries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;
use DB;

class ObituaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obituaries['all']           =   Obituaries::where('created_by',auth()->id())->get();
        $obituaries['draft']         =   collect($obituaries['all'])->whereNull('status')->all();
        $obituaries['pending']       =   collect($obituaries['all'])->where('status',0)->all();
        $obituaries['approved']      =   collect($obituaries['all'])->where('status',1)->all();
        $obituaries['rejected']      =   collect($obituaries['all'])->where('status',2)->all();

        return view('obituary.index',compact('obituaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('obituary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        minWidth: 530,
//        minHeight: 252


        $uid = Str::random(40);
        $todayDate = date('Y-m-d');
        $request->validate([
            //'uid'               => 'required|string|uid|unique:obituaries',
            'deceased_first_name'   => 'required|string|max:191',
            'deceased_last_name'    => 'required|string|max:191',
            'nric'                  => 'required|string|max:191',
            'date_of_birth'         => 'required|date|date_format:Y-m-d|before_or_equal:'.$todayDate,
            'date_of_death'         => 'required|date|date_format:Y-m-d H:i|after:date_of_birth',
            'wake_location'         => 'required|string|max:191',
            'wake_period'           => 'required|integer|min:1',
            'default_amount'        => 'required|integer|min:1',
            'funeral_date'          => 'required|date|date_format:Y-m-d H:i|after_or_equal:date_of_death',
            'funeral_location'      => 'required|string|max:191',
            'surviving_family_relation_title.*'         => 'required|string',
            'surviving_family_relation_name.*'          => 'required|string',
            'surviving_family_relation_description.*'   => 'required|string',
            //'deceased_picture'    => 'required|image','mimes:jpeg,png,jpg,gif',
            'deceased_picture'      => 'required',
            'death_certificate'     => 'required|mimes:pdf',
            //'poa_wills'             => 'required|string',
            'message'               => 'required|string',
        ]);
        //dd($request->all());
        $dpfileName          =   auth()->id() . '_' . str_replace(' ','-', $request->deceased_name) . '_' . time() . '.'. $request->deceased_picture->extension();
        $request->deceased_picture->move(storage_path('app/public/deceased_picture'), $dpfileName);
        $dcfileName         =   auth()->id() . '_' . str_replace(' ','-', $request->deceased_name) . '_' . time() . '.'. $request->death_certificate->extension();
        $request->death_certificate->move(storage_path('app/public/death_certificate'), $dcfileName);
        $data                       =   $request->except(['deceased_picture','death_certificate']);
        $data['deceased_picture']   =   $dpfileName;
        $data['death_certificate']  =   $dcfileName;
        $data['uid']                =   $uid;
        $data['created_by']         =   auth()->id();
        $surviving_family           =   [];
        foreach($request->surviving_family_relation_title as $key=>$val){
            if(trim($val) != ''){
                $surviving_family[]     =   [
                    'surviving_family_relation_title'       =>  @$request->surviving_family_relation_title[$key],
                    'surviving_family_relation_name'        =>  @$request->surviving_family_relation_name[$key],
                    'surviving_family_relation_description' =>  @$request->surviving_family_relation_description[$key],
                ];
            }
        }
        $data['surviving_family']         =   json_encode($surviving_family);



        $compaign = new Obituaries($data);
        $compaign->save();
        //dd(route('obituary.show',['id'=>$compaign->uid]));
        return response()->json([
            'status'   => 'redirect',
            'url'      =>  route('obituary.show',['id'=>$compaign->uid]),
            'msg'      =>  'Obituary created successfully.',
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uid
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        $obituary =   Obituaries::where('uid',$uid)->where('created_by',auth()->id())->first();
        return view('obituary.create',compact('uid','obituary'));
    }
    /**
     * Display the specified resource.
     *
     *@param  string  $uid
     * @return \Illuminate\Http\Response
     */
    public function get($uid)
    {
        $obituary =   Obituaries::where('uid',$uid)->where('created_by',auth()->id())->first();
        return response()->json($obituary);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($uid)
    {
        $obituary   =   Obituaries::where('uid',$uid)->first();
        if($obituary){
            $obituary_id =   $obituary->id;
            $payments    =   DB::select(" SELECT 
                                            SUM(obituary_payments.amount) as ttl_amount,
                                            users.name as user_name 
                                         FROM 
                                            obituary_payments 
                                         JOIN users on users.id = obituary_payments.user_id 
                                         where obituary_id = $obituary_id
                                         GROUP BY  obituary_payments.user_id
                                         ORDER BY SUM(obituary_payments.amount) DESC 
                                         LIMIT 25
                                        ");

            $designs    =   json_encode(CondolenceDesign::all(),true);
            return view('obituary.details',compact('uid','obituary','payments','designs'));
        }
        else{
            abort(404);
        }
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
    public function update(Request $request, $uid)
    {
        //
        $todayDate = date('Y-m-d');
        $request->validate([
            //'uid'               => 'required|string|uid|unique:obituaries',
            'deceased_first_name'=> 'required|string|max:191',
            'deceased_last_name'=> 'required|string|max:191',
            'nric'              => 'required|string|max:191',
            'date_of_birth'     => 'required|date|date_format:Y-m-d|before_or_equal:'.$todayDate,
            'date_of_death'     => 'required|date|date_format:Y-m-d H:i|after:date_of_birth',
            'wake_location'     => 'required|string|max:191',
            'wake_period'       => 'required|integer|min:1',
            'default_amount'    => 'required|integer|min:1',
            'funeral_date'      => 'required|date|date_format:Y-m-d H:i|after_or_equal:date_of_death',
            'funeral_location'  => 'required|string|max:191',
            'surviving_family_relation_title.*'         => 'required|string',
            'surviving_family_relation_name.*'          => 'required|string',
            'surviving_family_relation_description.*'   => 'required|string',
            'message'           => 'required|string',
        ]);
        $compaign                   =  Obituaries::where('uid',$uid)->where('created_by',auth()->id())->whereRaw(" ( status IS NULL OR status = 0) ")->first();
        if($compaign){
            $compaign->deceased_first_name  =  $request->deceased_first_name;
            $compaign->deceased_last_name   =  $request->deceased_last_name;
            $compaign->nric                 =  $request->nric;
            $compaign->date_of_birth        =  $request->date_of_birth;
            $compaign->date_of_death        =  $request->date_of_death;
            $compaign->wake_location        =  $request->wake_location;
            $compaign->wake_location_json   =  $request->wake_location_json;
            $compaign->wake_period          =  $request->wake_period;
            $compaign->funeral_date         =  $request->funeral_date;
            $compaign->public_donation      =  (int)@$request->public_donation;
            $compaign->funeral_location     =  $request->funeral_location;
            $compaign->default_amount       =  (float)$request->default_amount;
            $compaign->funeral_location_json=  $request->funeral_location_json;
            $compaign->surviving_family     =  $request->surviving_family;
            $compaign->poa_wills            =  $request->poa_wills;
            $compaign->message              =  $request->message;
            if($request->hasFile('deceased_picture')){
                $dpfileName          =   auth()->id() . '_' . str_replace(' ','-', $request->deceased_name) . '_' . time() . '.'. $request->deceased_picture->extension();
                $request->deceased_picture->move(storage_path('app/public/deceased_picture'), $dpfileName);
                $compaign->deceased_picture     =  $dpfileName;
            }
            if($request->hasFile('death_certificate')){
                $dcfileName         =   auth()->id() . '_' . str_replace(' ','-', $request->deceased_name) . '_' . time() . '.'. $request->death_certificate->extension();
                $request->death_certificate->move(storage_path('app/public/death_certificate'), $dcfileName);
                $compaign->death_certificate    =  $dcfileName;
            }
            $surviving_family         =   [];
            //dd($request->surviving_family_relation_title);
            foreach($request->surviving_family_relation_title as $key=>$val){
                if(trim($val) != ''){
                    $surviving_family[]     =   [
                                                    'surviving_family_relation_title'       =>  @$request->surviving_family_relation_title[$key],
                                                    'surviving_family_relation_name'        =>  @$request->surviving_family_relation_name[$key],
                                                    'surviving_family_relation_description' =>  @$request->surviving_family_relation_description[$key],
                                                ];
                }
            }
            $compaign->surviving_family   =   json_encode($surviving_family);
            $compaign->updated_at         =   date('Y-m-d H:i:s');
            $compaign->save();
            return response()->json([
                'status'   => 'redirect',
                'url'      =>  route('obituary.show',['id'=>$compaign->uid]),
                'msg'      =>  'Obituary updated successfully.',
            ],200);
        }
        else{
            return response()->json([
                'status'   =>  'error',
                'msg'      =>  'Invalid request.',
            ],400);
        }

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


    public function submitForApproval(Request $request, $uid)
    {
        //
        $compaign               =  Obituaries::where('uid',$uid)->where('created_by',auth()->id())->whereRaw(" ( status IS NULL OR status = 0) ")->first();
        if($compaign) {
            $compaign->status = 0;
            $compaign->updated_at = date('Y-m-d H:i:s');
            $compaign->save();
            return response()->json([
                'status' => 'redirect',
                'url' => route('obituary.show', ['id' => $compaign->uid]),
                'msg' => 'Obituary submitted successfully for approval.',
            ], 200);
        }
        else{
            return response()->json([
                'status'   =>  'error',
                'msg'      =>  'Invalid request.',
            ],400);
        }
    }
}
