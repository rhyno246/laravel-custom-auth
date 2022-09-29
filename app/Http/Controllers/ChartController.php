<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChartController extends Controller
{
    private $users;
    public function __construct(User $users)
    {
        $this->users = $users;
    }
    public function index () {
        // $data = $this->users->select(
        //     DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name")
        // )->whereYear('created_at', date('Y'))->groupBy('month_name')->get();

        $data = $this->users->select(
            DB::raw("COUNT(*) as count"), DB::raw("created_at as month_name")
        )->whereYear('created_at', date('Y'))->groupBy('month_name')->get();
        return view('chart', compact('data'));
    }
}
