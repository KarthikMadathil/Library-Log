<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use App\logbook;
use Storage;
use Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function dashboard()
     {

    //  $today = "2019-07-18 00:00:00";
      $HoursVisits=NULL;
      $today = Carbon\Carbon::today();

      // get yesterday - 2015-12-18 00:00:00
      $yesterday = Carbon\Carbon::yesterday();

      $todaysVisits= logbook::whereDate('created_at', $today)->count();
      $yesterdaysVisits= logbook::whereDate('created_at', $yesterday)->count();
      $HoursVisits= logbook::where('created_at','>', Carbon\Carbon::now()->subHours(1)->toDateTimeString())->count();
      // code...report
      return view('dashboard',compact('todaysVisits','yesterdaysVisits', 'HoursVisits'));
     }

     public function report($data=NULL)
     {
      if(is_null($data)){
          $data=logbook::with(['students'])->latest()->paginate(15);
       }

         return view('report',compact('data'));
     }


     public function filtering(Request $request)
     {
        /*Here we filter the log data according to  date from - to ,class/rollnum/ etc...*/
        // return dd($request->all());
        //  $fromtime=$request->time_from;
        //  $totime=$request->time_to;
        // return  Carbon\Carbon::parse($fromtime)->toTimeString();
        $register_num =$request->reg_num;
        $records=NULL;
        $fromdate=NULL ;
        $todate=NULL;

        // if ($request->has(date_from)) {
        //   $fromdate = Carbon\Carbon::parse($request->date_from)->toDateString();
        // }
        // if ($request->has(date_to)) {
        //   $todate = Carbon\Carbon::parse($request->date_to)->toDateString(); 
        //   // $todate = $request->date_to ? Carbon\Carbon::parse($request->date_to)->toDateString() : Carbon\Carbon::now();
        // }
        $data=logbook::latest();
        // return $datas;
        if ($register_num!=NULL){
          // return $register_num;
          $data->whereHas('students',$stud=function ($query) use ($register_num) {

                        $query->where('reg_no', 'like', '%'.$register_num.'%');

                    })->with(['students' =>$stud]);
          }
        else {
              $data->with('students');
          }
          
        if ($request->has('date_from') && $request->has('date_to')) {
            $data->whereBetween('created_at', array($request->date_from, $request->date_to));
        }
        else{
            if ($request->has('date_from')) {
              $data->whereDate('created_at', '>=', Carbon\Carbon::parse($request->date_from)->toTimeString());
            }
            else if ($request->has('date_to')) {
              $data->whereDate('created_at', '<=', Carbon\Carbon::parse($request->date_to)->toTimeString());
            }
          }

          
          $export= $data;
          $data=$data->latest()->paginate(15);

          // $logDetails[]=['Date & Time','Name','Register Number','Duration in minutes'];
          // $export = $export->get();
          // foreach ($export as $row) { 
          //   $logDetails[]=array(
          //   'Date & Time'=>$row->created_at,
          //   'Name'=>$row->students->name, 
          //   'Register Number'=>$row->students->reg_no, 
          //   'Duration in minutes'=> Carbon \Carbon::parse($row->updated_at)->diffInMinutes($row->created_at),
          //   );
          //   }
          //     Excel::create('Students Library Log', function ($excel) use ($logDetails) {
          //       $excel->setTitle('Students Library Log');
          //       $excel->sheet('Students Library Log', function ($sheet) use ($logDetails) {
          //         $sheet->fromArray($logDetails, null, 'A1', false, false);
          //       });
          //     })->download('xlsx');
          // return $logDetails;
        return view('report', compact('data'));



        // return  $this->report($records);
     }




    public function index()
    {
      // return Storage::files('avatars');
      // return Storage::get('avatars/18pmc227.jpeg');
        $logs = logbook::where('updated_at',NULL)->with(['students'])
                ->latest()
                ->get();
        return view('log',compact('logs'));
        // return view('home');
    }


    public function public()
    {
      // return Storage::files('avatars');
      // return Storage::get('avatars/18pmc227.jpeg');
        $logs = logbook::where('updated_at',NULL)->with(['students'])
                ->latest()
                ->get();
        // return $logs;
        $count= sizeof($logs);
        return view('public',compact('logs','count'));
        // return view('home');
    }

    public function create(request $request)
    {
      // Validate the input user
      $user = students::where('reg_no',$request->reg_no)->first();

      if ($user) {
          // Check weather the student is loggedin now
        $log = logbook::where('student_id',$user->id)
                        ->where('updated_at',NULL)
                        ->with(['students'])
                        ->latest()
                        ->first();

          if ($log) {
            // Update Log as exit
            $log->update(['updated_at'=>now()]);
            return response()->json([
                    'data' => "LoggedOut",
                    'img_path'=>asset("storage/avatars/".$log->students->avatar),
                    'user' => $log,
                  ],200);
          }
          else{
            // insert new log
            $log = new logbook;
            $log->student_id=$user->id;
            $log->created_at=now();
            $log->save();
            return response()->json([
                    'data' => "LoggedIn",
                    'img_path'=>asset("storage/avatars/".$log->students->avatar),
                    'user' => $log,
                  ],200);
          }
      }
      return response()->json([
              'data' => "Code invalid, Try again",
            ],404);
        // return view('home');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\HttpMessage
     **/

    public function checkout(Request $request)
    {
        //
         $log = logbook::where('updated_at',NULL)
                          ->update(['updated_at'=>now()]);

        return "hellow";

    }

}
