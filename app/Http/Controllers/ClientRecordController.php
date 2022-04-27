<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientRecord;

class ClientRecordController extends Controller
{
    public function clientRecord(int $page, int $itemsPerPage)  
    {
        $clients = ClientRecord::all();
        if($page != 1)
        {
            $skip = ($itemsPerPage*$page)-$itemsPerPage;
            $take = $itemsPerPage;
            $clients = $clients->skip($skip)->take($take);
        }
        else
        {
            $skip = (0);
            $take = $itemsPerPage;
            $clients = $clients->take($take);
        }
        return $clients->toJson(JSON_PRETTY_PRINT);
    }

    public function clientCount()
    {
        return ClientRecord::all()->count();
    }
}
