<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $record = $user ? Record::where('user_id', $user->id)->first() : null; // Get the record for the authenticated user
        $department = Department::all();
        
        return view('frontend.index', compact('user', 'department', 'record')); // Pass the single record instead of all records
    }
}
