<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\DataRetriever;

class TransactionsController extends Controller
{
    /**
     *
     * @param  \App\Contracts\DataRetriever  $retriever
     * @return void
     */
    public function __construct(DataRetriever $retriever)
    {
        $this->retriever = $retriever;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $transactions = $this->retriever->retrieveData('transactions');
        
        return response()->json($transactions);
    }
    
}
