<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAccounts;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {

        $day1 = Carbon::now();
        $day2 = Carbon::now()->subDay();
        $day3 = Carbon::now()->subDay()->subDay();
        $day4 = Carbon::now()->subDay()->subDay()->subDay();
        $day5 = Carbon::now()->subDay()->subDay()->subDay()->subDay();
        $day6 = Carbon::now()->subDay()->subDay()->subDay()->subDay()->subDay();
        $day7 = Carbon::now()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay();
        $day8 = Carbon::now()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay();
        $day9 = Carbon::now()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay();
        $day10 = Carbon::now()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay();
        $day11 = Carbon::now()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay();
        $day12 = Carbon::now()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay();
        $day13 = Carbon::now()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay();
        $day14 = Carbon::now()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay()->subDay();


        $Weeks = [
            $day1,
            $day2,
            $day3,
            $day4,
            $day5,
            $day6,
            $day7,
            $day8,
            $day9,
            $day10,
            $day11,
            $day12,
            $day13,
            $day14,

        ];

        $twoWeeks = [
            $day14->format('m-d'),
            $day13->format('m-d'),
            $day12->format('m-d'),
            $day11->format('m-d'),
            $day10->format('m-d'),
            $day9->format('m-d'),
            $day8->format('m-d'),
            $day7->format('m-d'),
            $day6->format('m-d'),
            $day5->format('m-d'),
            $day4->format('m-d'),
            $day3->format('m-d'),
            $day2->format('m-d'),
            $day1->format('m-d'),

        ];

        $users = User::where('created_at', '>=', Carbon::now()->subDays(14))->orderBy('created_at', 'asc')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('m-d');
        });
        $topUsers = User::where('referred_by', '!=', null)->get()->groupBy(function ($data) {
            return $data->referred_by;
        });

        $Withdraws = UserAccounts::where('updated_at', '>=', Carbon::now()->subDays(14))->where('agreed', 'Accepted')->orderBy('updated_at', 'asc')->get()->groupBy(function ($data) {
            return Carbon::parse($data->updated_at)->format('m-d');
        });
        $Deposits = UserAccounts::where('created_at', '>=', Carbon::now()->subDays(14))->where('type', 'Deposit')->orderBy('created_at', 'asc')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('m-d');
        });
        $affiliates = User::where('created_at', '>=', Carbon::now()->subDays(14))->where('referred_by', '!=', null)->orderBy('created_at', 'asc')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('m-d');
        });
        $visitors = Visitor::where('created_at', '>=', Carbon::now()->subDays(14))->orderBy('created_at', 'asc')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('m-d');
        });

        $TotalWithdrawals = UserAccounts::where('created_at', '>=', Carbon::now()->subDays(14))->where('type', 'Withdraw')->orderBy('created_at', 'asc')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('m-d');
        });
    
      
      
        // return $TotalWithdrawals;

        $userCount = [];
        $WithdrawCount = [];
        $affiliateCount = [];
        $visitorsCount = [];
        $DepositsCount = [];
        $topUsersCount = [];
        $TotalWithdrawalsSum = [];
        foreach ($users as $day => $values) {
            // $twoWeeks[]= $day;
            $userCount[$day] = count($values);
        }
        //////////////////////////
        foreach ($Withdraws as $day => $values) {
            // $twoWeeks[]= $day;
            $WithdrawCount[$day] = count($values);
        }
        ///////////////////////////////////////////////////////
        foreach ($affiliates as $day => $values) {
            // $twoWeeks[]= $day;
            $affiliateCount[$day] = count($values);
        }
        ///////////////////////////////////////////////////////
        foreach ($visitors as $day => $values) {
            // $twoWeeks[]= $day;
            $visitorsCount[$day] = count($values);
        }
        ///////////////////////////////////////////////////////
        foreach ($Deposits as $day => $values) {
            // $twoWeeks[]= $day;
            $DepositsCount[$day] = count($values);
        }
        ///////////////////////////////////////////////////////
        foreach ($TotalWithdrawals as $day => $values) {
            // $twoWeeks[]= $day;
           
            $TotalWithdrawalsSum[$day] = ($values)->sum('Amount');
        }
        // return $TotalWithdrawalsSum;
        ///////////////////////////////////////////////////////
        // foreach ($topUsers as $id => $values) {
        //     // $twoWeeks[]= $day;
        //     $topUsersCount[$id] = count($values);
        // }

        // $top10 = collect($topUsersCount)->sortDesc();

        //  sort($topUsersCount);
        // $topAffiliateUsersCount = [];
        // foreach ($topUsersCount as $id => $val) {
        //     // echo $key;
        //     $topAffiliateUsersCount[] = array_push($topAffiliateUsersCount, 22);
        // }
        // return $DepositsCount;
        ///////////////////////////////////////////////////////
        // return $top10->take(10);
        $userNum = [];
        $WithdrawNum = [];

        $j = 0;
        foreach ($userCount as $key => $value) {
            // echo $value;
            for ($i = $j; $i < count($twoWeeks); $i++) {
                // echo "/". $twoWeeks[$i]. "/";
                // echo "userCount=>". $key . "/twoWeeks=>".  $twoWeeks[$i]."<br>".$value.'<br>'. "i=". $i. "<br>" ;

                if ($key == $twoWeeks[$i]) {
                    $userNum[$i] = $value;
                    $j = $i + 1;
                    break;
                    // echo $userCount[$twoWeeks[$i]];
                } else {
                    $userNum[$i] = 0;
                    // echo $userCount[$twoWeeks[$i]] .'<br>';
                }
                // echo "j=". $j .'<br>';
            }                    //   echo $day;

        }
        //////////////////////////////////////////////////////////////////////////////////////
        $WithdrawNum = [];
        $j = 0;
        foreach ($WithdrawCount as $key => $value) {
            // echo $value;
            for ($i = $j; $i < count($twoWeeks); $i++) {
                // echo "/". $twoWeeks[$i]. "/";
                // echo "userCount=>". $key . "/twoWeeks=>".  $twoWeeks[$i]."<br>".$value.'<br>'. "i=". $i. "<br>" ;
                //    if ($i < 14) {
                if ($key == $twoWeeks[$i]) {
                    $WithdrawNum[$i] = $value;
                    $j = $i + 1;
                    break;
                    // echo $userCount[$twoWeeks[$i]];
                } else {
                    $WithdrawNum[$i] = 0;
                    // echo $userCount[$twoWeeks[$i]] .'<br>';
                }
                //    }

                // echo "j=". $j .'<br>';
            }                    //   echo $day;

        }
        // return $WithdrawNum;
        //////////////////////////////////////////////////////////////////////////////////////
        $affiliatesNum = [];
        $j = 0;
        foreach ($affiliateCount as $key => $value) {
            // echo $value;
            for ($i = $j; $i < count($twoWeeks); $i++) {
                // echo "/". $twoWeeks[$i]. "/";
                // echo "userCount=>". $key . "/twoWeeks=>".  $twoWeeks[$i]."<br>".$value.'<br>'. "i=". $i. "<br>" ;
                //    if ($i < 14) {
                if ($key == $twoWeeks[$i]) {
                    $affiliatesNum[$i] = $value;
                    $j = $i + 1;
                    break;
                    // echo $userCount[$twoWeeks[$i]];
                } else {
                    $affiliatesNum[$i] = 0;
                    // echo $userCount[$twoWeeks[$i]] .'<br>';
                }
                //    }

                // echo "j=". $j .'<br>';
            }                    //   echo $day;

        }
        //////////////////////////////////////////////////////////////////////////////////////
        $visitorsNum = [];
        $j = 0;
        foreach ($visitorsCount as $key => $value) {
            // echo $value;
            for ($i = $j; $i < count($twoWeeks); $i++) {
                // echo "/". $twoWeeks[$i]. "/";
                // echo "userCount=>". $key . "/twoWeeks=>".  $twoWeeks[$i]."<br>".$value.'<br>'. "i=". $i. "<br>" ;
                //    if ($i < 14) {
                if ($key == $twoWeeks[$i]) {
                    $visitorsNum[$i] = $value;
                    $j = $i + 1;
                    break;
                    // echo $userCount[$twoWeeks[$i]];
                } else {
                    $visitorsNum[$i] = 0;
                    // echo $userCount[$twoWeeks[$i]] .'<br>';
                }
                //    }

                // echo "j=". $j .'<br>';
            }                    //   echo $day;

        }
        // return $visitorsNum;
        //////////////////////////////////////////////////////////////////////////////////////
        $DepositsNum = [];
        $j = 0;
        foreach ($DepositsCount as $key => $value) {
            // echo $value;
            for ($i = $j; $i < count($twoWeeks); $i++) {
                // echo "/". $twoWeeks[$i]. "/";
                // echo "userCount=>". $key . "/twoWeeks=>".  $twoWeeks[$i]."<br>".$value.'<br>'. "i=". $i. "<br>" ;
                //    if ($i < 14) {
                if ($key == $twoWeeks[$i]) {
                    $DepositsNum[$i] = $value;
                    $j = $i + 1;
                    break;
                    // echo $userCount[$twoWeeks[$i]];
                } else {
                    $DepositsNum[$i] = 0;
                    // echo $userCount[$twoWeeks[$i]] .'<br>';
                }
                //    }

                // echo "j=". $j .'<br>';
            }                    //   echo $day;

        }
        // return $DepositsNum;
        //////////////////////////////////////////////////////////////////////////////////////
        $WithdrawalsSumNum = [];
        $j = 0;
        foreach ($TotalWithdrawalsSum as $key => $value) {
            // echo $value;
            for ($i = $j; $i < count($twoWeeks); $i++) {
                // echo "/". $twoWeeks[$i]. "/";
                // echo "userCount=>". $key . "/twoWeeks=>".  $twoWeeks[$i]."<br>".$value.'<br>'. "i=". $i. "<br>" ;
                //    if ($i < 14) {
                if ($key == $twoWeeks[$i]) {
                    $WithdrawalsSumNum[$i] = $value;
                    $j = $i + 1;
                    break;
                    // echo $userCount[$twoWeeks[$i]];
                } else {
                    $WithdrawalsSumNum[$i] = 0;
                    // echo $userCount[$twoWeeks[$i]] .'<br>';
                }
                //    }

                // echo "j=". $j .'<br>';
            }                    //   echo $day;

        }
        // return $WithdrawalsSumNum;

        try {
            
            $maxWithdrawCount = max($WithdrawNum);
        } catch (\Throwable $th) {
            $maxWithdrawCount = 0;
        }
        try {
            $maxUserCount = max($userNum);
        } catch (\Throwable $th) {
            $maxUserCount = 0;

        }
        try {
            $maxAffiliatesCount = max($affiliatesNum);
        } catch (\Throwable $th) {
            $maxAffiliatesCount = 0;

        }
        try {
            $maxVisitorsCount = max($visitorsNum);
        } catch (\Throwable $th) {
            $maxVisitorsCount = 0;

        }
        try {
            $maxDepositsCount = max($DepositsNum);
        } catch (\Throwable $th) {
            $maxDepositsCount = 0;

        }
        try {
            $maxWithdrawalsSumNum = max($WithdrawalsSumNum);
        } catch (\Throwable $th) {
            $maxWithdrawalsSumNum = 0;

        }


        // return  $maxVisitorsCount;

        return view('admin.index', compact('affiliatesNum', 'maxAffiliatesCount', 
        'twoWeeks', 'userNum',
         'maxUserCount', 'WithdrawNum',
          'maxWithdrawCount','maxVisitorsCount','visitorsNum',
        'maxDepositsCount','DepositsNum','maxWithdrawalsSumNum','WithdrawalsSumNum'));
    }
}
