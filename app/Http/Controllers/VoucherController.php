<?php
/**
 * A REST HTTP controller to handle CRUD operations
 * related with each voucher created from OCR-ing
 * an invoice PDF.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return $data;
        //return view('vouchers.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * view() method searches for a create.blade.php template
         * which needs to be present in resources/views folder
         */
        return view('vouchers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
        ]);

        $voucher = new Voucher([
            'user_id'=>$request->get('user_id'),
            'file_loc'=>$request->get('file_loc'),
            'total_value'=>$request->get('total_value'),
            'from_name'=>$request->get('from_name'),
            'from_city'=>$request->get('from_city'),
            'to_name'=>$request->get('to_name'),
            'to_city'=>$request->get('to_city')
        ]);
        $voucher->save();
        return redirect('/vouchers')->with('success','Voucher Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
