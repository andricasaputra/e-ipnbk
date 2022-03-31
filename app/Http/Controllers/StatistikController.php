<?php 

namespace App\Http\Controllers;

use App\Repositories\HomeRepository;

class StatistikController extends Controller
{
    protected $repository;

    public function __construct(HomeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $respondens = $this->repository->totalNilaiPerPertanyaan();

        return view('admin.statistik.index')->withRespondens($respondens);
    }
}
