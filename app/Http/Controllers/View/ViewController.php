<?php

namespace App\Http\Controllers\View;

use App\Models\Bet;
use App\Models\subscriptionPlan;
use Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory as ViewFactory;

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
		$pagination=Bet::with('subscriptionPlan')->where('status', 'pending')->count();
		return $this->viewFactory->make('bets.index', ['bets' => $bets, 'pagination' => $pagination]);
	}

	public function render_results() {
		$pagination=Bet::with('subscriptionPlan')->where('status', "!=", 'pending')->count();
		$results = Bet::with('subscriptionPlan')->where('status', "!=", 'pending')->orderBy('created_at', 'desc')->paginate(10)->toArray();
		return $this->viewFactory->make('bets.results', ['results' => $results,'pagination'=> $pagination]);
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