<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summoner;
use Illuminate\Support\Facades\Http;

class SummonerController extends Controller
{
    protected $riotApiKey;

    public function __construct()
    {
        $this->riotApiKey = config('app.riot_api_key');
    }

    public function searchSummoner(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'server' => 'required|string',
        ]);

        // Get the summoner name and server from the request
        $name = $request->input('name');
        $server = $request->input('server');

        // Use Riot API to fetch summoner data
        $response = Http::get("https://$server.api.riotgames.com/lol/summoner/v4/summoners/by-name/$name", [
            'X-Riot-Token' => $this->riotApiKey,
        ]);

        // Check if the API request was successful
        if ($response->successful()) {
            $summonerData = $response->json();

            // Create or update the summoner in the database
            $summoner = Summoner::updateOrCreate([
                'name' => $summonerData['name'],
                'server' => $server,
            ], [
                'level' => $summonerData['summonerLevel'],
                // Add other fields as needed from the API response
            ]);

            // Return the summoner data as a JSON response
            return response()->json([
                'success' => true,
                'summoner' => $summoner,
            ]);
        } else {
            \Log::error('Summoner API Error: ' . $response->body());

            // Return an error response if the API request failed
            return response()->json([
                'success' => false,
                'message' => 'Summoner not found or API error.',
            ], 404);
        }
    }
}
