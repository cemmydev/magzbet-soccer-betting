<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory as ViewFactoy;

class BetsController extends Controller
{
    //
    private ViewFactory $viewFactory;
    private array $betsData;

    public function __construct(ViewFactory $viewFactory) {
        $this->betsData = [];

		$this->viewFactory = $viewFactory;
    }
    /**
	 * Display the bets view.
	 *
	 * @return View
	 */
    public function home(): View
	{
		return $this->viewFactory->make('bets.index');
	}
}
