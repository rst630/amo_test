<?php

namespace App\Http\Controllers;

use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Collections\Leads\LeadsCollection;
use App\Models\Company;
use App\Models\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class AppController extends Controller
{
    protected $apiClient;

    public function __construct()
    {
        $this->apiClient = new AmoCRMApiClient(
            config('amo.client_id'),
            config('amo.secret'),
            config('amo.callback')
        );
    }

    public function index()
    {
        if ($token = Cache::get('amotoken'))
        {
            return $this->fetchData($token);
        }

        return redirect($this->apiClient->getOAuthClient()->getAuthorizeUrl());
    }

    public function callback(Request $request)
    {
        $this->apiClient->setAccountBaseDomain($request->referer);

        $accessToken = $this->apiClient->getOAuthClient()->getAccessTokenByCode($request->code);

        $seconds = now()->diffInSeconds(Carbon::parse($accessToken->getExpires()));

        Cache::put('amotoken',$accessToken,$seconds);

        return redirect('/');
    }

    public function fetchData($token)
    {
        $this->apiClient->setAccountBaseDomain(config('amo.domain'));
        $this->apiClient->setAccessToken($token);
        $leads = $this->apiClient->leads()->get() ?? [];

        $this->storeData($leads);

        $leads = Lead::with('company')->get();

        return view('index',compact('leads'));
    }

    public function storeData(LeadsCollection $data)
    {
        foreach ($data as $item)
        {
            $arr = $item->toArray();

            $lead = Arr::except($arr,'company');

            if (isset($arr['company']))
            {
                $company = $arr['company'];
                Company::updateOrCreate(['id' => $company['id']],$company);
            }

            Lead::updateOrCreate(['id' => $lead['id']],$lead + ['company_id' => $arr['company']['id'] ?? null]);

        }
    }
}
