<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Jadwal;
use App\Models\Result;
use App\Models\Question;
use App\Models\Responden;
use Illuminate\Http\Request;
use App\Repositories\HomeRepository;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    protected $repository;

    public function __construct(HomeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {//dd($this->getPegawai());
        $jadwal = Jadwal::all();

        $nilaiRata = $this->repository->nilaiRata();

        $konversiNilai = $this->repository->nilaiKonversi();

        
        return view('admin.home.index')
                ->with('ipnbk', $jadwal)
                ->withTotalResponden($this->totalResponden())
                ->withNilaiRata($nilaiRata)
                ->withNilaiKonversi($konversiNilai);
    }

    protected function totalResponden()
    {   
        return Result::countResponden()->get()->count();   
    }

    protected function totalQuestion()
    {   
        return Result::countQuestion()->get()->count();   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Responden $responden, int $year)
    {
        return view('admin.home.show')
                ->with(compact('responden', 'year'));
    }

    /**
     * Set default ipnbk id jika tidak ada yang terpilih
     *
     * @return int
     */
    private function setIpnbkId()
    {
        return Jadwal::active()->first() ?? 1;
    }

    public function getPegawai()
    {
        // Create a client with a base URI
        $client = new Client();
        // Send a request to https://foo.com/api/test
        //$response = $client->request('GET', 'http://localhost/users-management/public/api/pegawai/detail/' . auth()->id());
        // Send a request to https://foo.com/root
        //$response = $client->request('GET', '/root');

        $response = $client->get('http://localhost/users-management/public/api/pegawai/detail/' . 4);
        dd($response->getBody()->getContents());
    }
}
