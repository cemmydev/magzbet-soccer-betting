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
		$latest_bets = Bet::with('subscriptionPlan')->where('status', 'pending')->limit(10)->get()->sortByDesc('created_at')->toArray();
		return $this->viewFactory->make('dashboard.index', ['latest_bets' => $latest_bets]);
	}

	public function render_bets() {
		$bets = Bet::with('subscriptionPlan')->where('status', 'pending')->paginate(10)->sortByDesc('created_at')->toArray();
		$pagination=Bet::with('subscriptionPlan')->where('status', 'pending')->count();
		return $this->viewFactory->make('bets.index', ['bets' => $bets, 'pagination' => $pagination]);
	}
	
	public function render_results() {
		$pagination=Bet::with('subscriptionPlan')->where('status', "!=", 'pending')->count();
		$results = Bet::with('subscriptionPlan')->where('status', "!=", 'pending')->paginate(10)->sortByDesc('created_at')->toArray();
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
}