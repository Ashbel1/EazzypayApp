<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function index()
    {
            return view('Transactions.show');
    }

    // fetch transaction using startdate and Enddate
    public function customSearch(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
         $client = new Client();
        $url = 'https://api.example.com/transactions';
        $data = [
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
        try {
            // Send the API request
            $response = $client->request('GET', $url, [
                'query' => $data,
            ]);
            // Process the API response
            $responseBody = $response->getBody()->getContents();
            $transactions = json_decode($responseBody, true);
            // Redirect back with transactions and success message
            return Redirect::back()->with([
                'transactions' => $transactions,
                'message' => 'Transactions retrieved successfully.',
            ]);
        } catch (\Exception $e) {
            // Redirect back with error message
            return Redirect::back()->with('error', 'Error retrieving transactions. Please try again.');
        }
    }

    function fetchTransactionsToday() {
       return $today = Carbon::today();
        $apiUrl = "https://example.com/api/transactions?date={$today}";
        $response = Http::get($apiUrl);
        if ($response->status() === 200) {
            $transactions = $response->json();
            return redirect()->back()->with(['transactions' => $transactions]);
        } else {
            return redirect()->back()->with(['error' => 'Failed to fetch transactions']);
        }
    }

    function fetchTransactionsLastSevenDays() {
        $today = Carbon::today();
        $startDate = $today->subDays(6);
        
        // Make API request with the start date and end date
        $apiUrl = "https://example.com/api/transactions?start_date={$startDate}&end_date={$today}";
        $response = Http::get($apiUrl);
    
        if ($response->status() === 200) {
            $transactions = $response->json();
            return redirect()->back()->with(['transactions' => $transactions]);
        } else {
            return redirect()->back()->with(['error' => 'Failed to fetch transactions']);
        }
    }

    function fetchTransactionsThisMonth() {
        $today = Carbon::today();
        return $startDate = $today->startOfMonth();
        
        // Make API request with the start date and end date
        $apiUrl = "https://example.com/api/transactions?start_date={$startDate}&end_date={$today}";
        $response = Http::get($apiUrl);
    
        if ($response->status() === 200) {
            $transactions = $response->json();
            return redirect()->back()->with(['transactions' => $transactions]);
        } else {
            return redirect()->back()->with(['error' => 'Failed to fetch transactions']);
        }
    }

    function fetchTransactionsLastMonth() {
        $today = Carbon::today();
        $startDate = $today->subMonth()->startOfMonth();
        $endDate = $today->subMonth()->endOfMonth();
        
        // Make API request with the start date and end date
        $apiUrl = "https://example.com/api/transactions?start_date={$startDate}&end_date={$endDate}";
        $response = Http::get($apiUrl);
    
        if ($response->status() === 200) {
            $transactions = $response->json();
            return redirect()->back()->with(['transactions' => $transactions]);
        } else {
            return redirect()->back()->with(['error' => 'Failed to fetch transactions']);
        }
    }

}

