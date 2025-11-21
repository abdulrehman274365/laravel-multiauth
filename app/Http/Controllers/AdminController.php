<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\ContactUs;


class AdminController extends Controller
{
    public function dashboardView()
    {
        return view('admin.dashboard');
    }

    public function BuyerAndSellerView()
    {
        $total_count=DB::table('users')->count();
        $sellers_count=DB::table('purchased_websites')->distinct('owner_id')->count();
        $buyers_count=DB::table('purchased_websites')->distinct('customer_id')->count();
       // dd($buyers_count);
        return view('admin.users.BuyerAndSeller',compact('sellers_count','buyers_count','total_count'));
    } 
    public function UsersListView()
    {
        return view('admin.users.UsersList');
    }
    public function BuyersListView()
    {
        return view('admin.users.buyers.BuyerList');
    }

    public function BuyerPurchaseListView($user_id)
    {
        $user=DB::table('users')->where('id',$user_id)->first();
        return view('admin.users.buyers.BuyerPurchaseList',compact('user'));
    }


    public function getUsers(Request $request)
    {
        $websites = DB::table('purchased_websites')
        ->join('users','users.id','=','purchased_websites.owner_id')
            ->select('users.*')
            ->distinct()
            ->get();
        return DataTables::of($websites)
            ->addColumn('action', function ($websites) {
                return;
            })
            ->make(true);
    }
    public function getFormList(Request $request)
    {
        $data = DB::table('contact_us')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return;
            })
            ->make(true);
    }

    public function getBuyers(Request $request)
    {
        $websites = DB::table('purchased_websites')
        ->join('users','users.id','=','purchased_websites.customer_id')
            ->select('users.*')
            ->distinct()
            ->get();
        return DataTables::of($websites)
            ->addColumn('action', function ($websites) {
                return;
            })
            ->make(true);
    }

    public function getAllPurchases(Request $request)
    {
        $websites = DB::table('purchased_websites')
        ->where('customer_id',$request->user_id)
        ->where('purchase_status',1)
        ->join('users','users.id','=','purchased_websites.customer_id')
        ->join('websites','websites.id','=','purchased_websites.website_id')
            ->select('purchased_websites.purchase_status','users.*','websites.name as website_name','websites.category','websites.price','websites.website')
            ->get();
        return DataTables::of($websites)
            ->make(true);
    }


    public function getUserWebsitesView($user_id)
    {
        $user=DB::table('users')->where('id',$user_id)->first();
        $websites = DB::table('websites')
            ->where('user_id', $user_id)
            ->join('users', 'users.id', '=', 'websites.user_id')
            ->select('websites.*','websites.id as website_id', 'users.name as user_name')
            ->orderBy('websites.id', 'desc')
            ->get();
        return view('admin.users.UserWebsites',compact('user_id','user','websites'));
    }

    public function userWebsiteDetails($user_id,$website_id)
    {
        $total_earning=DB::table('purchased_websites')
        ->where('owner_id',$user_id)
        ->where('website_id',$website_id)
        ->where('purchase_status',1)
        ->sum('amount');
        $purchased_websites=DB::table('purchased_websites')
        ->where('owner_id',$user_id)
        ->where('website_id',$website_id)
        ->where('purchase_status',1)
        ->join('websites','websites.id','=','purchased_websites.website_id')
        ->join('users','users.id','=','purchased_websites.customer_id')
        ->select('purchased_websites.*','websites.*','users.name as user_name')
        ->get();
        return view('admin.users.websiteDetails',compact('purchased_websites','total_earning'));
    }


    public function leadFormsView()
    {
        return view('admin.users.LeadForms.leadforms');
    }

    public function submitFormOne(Request $request)
    {
        $contact = new ContactUs();
        $contact->firstName = $request->firstName;
        $contact->lastName = $request->lastName;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->businessType = $request->businessType;
        $contact->message = $request->message;
        $contact->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully!'
        ]);
    }
}
