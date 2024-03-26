<?php

namespace App\Http\Controllers\View;

use App\Models\Bet;
use App\Models\subscriptionPlan;
use App\Models\User;
use App\Models\UserLogin;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory as ViewFactory;
use Illuminate\Session\SessionManager;

class ViewController
{
	private ViewFactory $viewFactory;

	private string $routeName;

	public function __construct(ViewFactory $viewFactory)
	{
		$this->viewFactory = $viewFactory;

		$this->routeName = Route::currentRouteName();
	}

	/**
	 * @return View
	 */
	public function builder(): View
	{
		$dottedPath = $this->routeName . (! str_contains($this->routeName, '.') ? '.index' : '');

		return $this
			->viewFactory
			->make(
				$dottedPath,
				array_merge(Route::current()->parameters(), ['routeName' => $this->routeName])
			);
	}

	public function render_admin() {
		$to=date('Y-m-d');
		$yest = date('Y-m-d', strtotime('-1 Days'));
		$from = date('Y-m-d', strtotime('-14 Days'));
		$this_month=date('Y-m');
		$prev_month=date('Y-m', strtotime('-1 Months'));
		$logins = UserLogin::with('user')->where('created_at', '>=', $from)->get()->groupBy(function($item) {
			return Carbon::parse($item->created_at)->format('Y-m-d');
		})->toArray();
		$latest_logins=[];
		foreach($logins as $item) {
			array_push($latest_logins, count($item));
		}
		$today_login_count = UserLogin::with('user')->where('created_at', '>=', $to)->get()->count();
		$yesterday_login_count = UserLogin::with('user')->where('created_at', '>=', $yest)->get()->count() - $today_login_count;
		$total_users = User::all()->count();
		$registered_users = User::where('created_at', '>=', $to)->get()->count();
		$orders_count = DB::table('subscription_plan_user')->select('*')->count();
		$orders_today_count = DB::table('subscription_plan_user')->where('created_at', '>=', $to)->count();
		$income = [DB::table('subscription_plan_user')->where('created_at', '>=', $this_month)->count()];
		array_push($income, DB::table('subscription_plan_user')->where('created_at', '>=', $prev_month)->count());
		$paid_users = User::with('subscriptionPlans')->get()->filter(function($item) {
			if($item->unexpiredSubscription()) return true;
			return false;
		})->count();
		$unpaid_users = User::all()->count() - $paid_users;
		return $this->viewFactory->make('admin.index', ['latest_logins' => $latest_logins, 'today_logged' => $today_login_count, 'yesterday_logged' => $yesterday_login_count, 'total_users' => $total_users, 'registered_users' => $registered_users, 'total_orders' => $orders_count, 'orders_today' => $orders_today_count, 'income' => $income, 'paid' => $paid_users, 'unpaid' => $unpaid_users ]);
	}

	public function render_dashboard() {
		$total_bets = Bet::all()->count();
		$total_num = Bet::where('status', '!=', 'pending')->count();
		$win_num = Bet::where('status', 'won')->count();
		$total_profit=Bet::where('status', 'won')->sum('profit');
		$total_stake=Bet::where('status', '!=', 'pending')->sum('stake');
		$win_ratio = $total_num == 0 ? 0 : round($win_num * 100 / $total_num);
		$ROI = $total_stake == 0 ? 0 : round($total_profit * 100 / $total_stake);
		$latest_bets = Bet::with('subscriptionPlan')->where('status', 'pending')->limit(10)->get()->sortByDesc('created_at')->toArray();
		return $this->viewFactory->make('dashboard.index', ['latest_bets' => $latest_bets, 'total_bets' => $total_bets, 'win_ratio' => $win_ratio, 'ROI' => $ROI]);
	}

	public function render_bets() {
		$bets = Bet::with('subscriptionPlan')->where('status', 'pending')->orderBy('created_at', 'desc')->paginate(10)->toArray();
		return $this->viewFactory->make('bets.index', ['bets' => $bets]);
	}

	public function render_results() {
		$results = Bet::with('subscriptionPlan')->where('status', "!=", 'pending')->orderBy('created_at', 'desc')->paginate(10)->toArray();
		return $this->viewFactory->make('bets.results', ['results' => $results]);
	}

	public function render_abet($id) {
		$bet=Bet::with('subscriptionPlan')->find($id);
		if($bet == null) return $this->viewFactory->make('errors.404');
		$bet = $bet->toArray();
		return $this->viewFactory->make('bets.single', ['bet'=> $bet]);
	}

	public function render_account() {
		$subscrptions = Auth::user()->unexpiredSubscription();
		return $this->viewFactory->make('account.index', ['mySubscriptions'=> $subscrptions]);
	}
	public function render_subscriptions() {
		$subscrptions=subscriptionPlan::all()->toArray();
		$mySubscriptions = Auth::user()->subscriptionPlans()->get()->toArray();
		return $this->viewFactory->make('account.subscriptions', ['subscriptions' => $subscrptions, 'mySubscriptions' => $mySubscriptions]);
	}

	public function render_stats(){
		$stats=Bet::with('subscriptionPlan')->where('status', '!=', 'pending')->get()->groupBy('subscriptionPlan.*.name')->toArray();
		$subscrptions=subscriptionPlan::all()->toArray();
		foreach($subscrptions as $sub){
			if(!isset($stats[$sub['name']])) $single_stat = [];
			else $single_stat = $stats[$sub['name']];
			$data[$sub['name']] = [
				'total' => count($single_stat),
				'won' => count(array_filter($single_stat, function($stat) { return $stat['status'] == 'won'; })),
				'lost' => count(array_filter($single_stat, function($stat) { return $stat['status'] == 'lost'; })),
				'stake' => array_sum(array_column($single_stat, 'stake')),
				'profit' => array_sum(array_column($single_stat, 'profit')),
			];
		}
		foreach($subscrptions as $sub) {
			if(!$data[$sub['name']]['stake']) $data[$sub['name']]['roi'] = 0;
			else $data[$sub['name']]['roi'] = round($data[$sub['name']]['profit'] * 100 / $data[$sub['name']]['stake']);
		}

		return $this->viewFactory->make('stats.index', ['subscriptions'=>$subscrptions, 'data' => $data]);
	}

	public function profile(Request $request){
		$request->validate([
			'email' => 'required|email',
			'name'=>'required',
		]);

		Auth::user()->update([
			'email'=> $request->email,
			'name'=> $request->name,
		]);

		return redirect()->route('account.index');
	}
 }