<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function lesson_time()
    {
        return now()->hour - 8;
    }

    public function getSalary()
    {
        $user = Auth::user();

        $total = 0;
        $bonus = 0;
        $fine = 0;

        $left_lessons = $user->lessons()->whereMonth('lesson_date', now()->format('m'))->whereDate('lesson_date', '<', now()->addDay(1))->get()->count();
        $lesson_number = $user->lessons()->whereMonth('lesson_date', now()->format('m'))->get()->count();

        $bonus += $user->lessons()->whereMonth('lesson_date', now()->format('m'))->where('bonus1', true)->get()->count();
        $bonus += $user->lessons()->whereMonth('lesson_date', now()->format('m'))->where('bonus2', true)->get()->count();
        $fine += $user->lessons()->whereMonth('lesson_date', now()->format('m'))->where('fine1', true)->get()->count();
        $fine += $user->lessons()->whereMonth('lesson_date', now()->format('m'))->where('fine2', true)->get()->count();

        $total += $lesson_number * 3500;
        $total += $user->lessons()->whereMonth('lesson_date', now()->format('m'))->where('bonus1', true)->get()->count() * 1000;
        $total += $user->lessons()->whereMonth('lesson_date', now()->format('m'))->where('bonus2', true)->get()->count() * 500;
        $total -= $user->lessons()->whereMonth('lesson_date', now()->format('m'))->where('fine1', true)->get()->count() * 1000;
        $total -= $user->lessons()->whereMonth('lesson_date', now()->format('m'))->where('fine2', true)->get()->count() * 500;


        foreach ($user->groups as $group)
        {
            $kpiModel = $group->getCurrentKPI->first();
            $kpi1 = $kpiModel->bought_amount/$kpiModel->trial_amount * 100;
            $left = $kpiModel->left_amount - $kpiModel->bought_amount - $kpiModel->trial_amount;
            $kpi2 = $left/$kpiModel->start_amount * 100;

            if ($kpi1 >= 70) $total += 500;
            if ($kpi2 < 25) $total += 500;
        }

        return response()->json([
            'total'  => $total,
            'lesson' => (int) ($left_lessons/$lesson_number * 100),
            'bonus'  => (int) ($bonus/($lesson_number*2) * 100),
            'fine'   => (int) ($fine/($lesson_number*2) * 100)
        ]);
    }
}