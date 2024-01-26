<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Customers::all();

        return view('customers.index', [
            "title" => "Customers",
            'customers' => Customers::latest()->filter(request(['keyword']))->paginate(12)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create', [
            "title" => "Customers",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        $validatedData = $request->validate([
            'nik' => 'required|size:16|unique:customers',
            'name' => 'required',
            'gender' => 'required',
            'telepon' => 'required|unique:customers',
            'ttl' => 'required',
            'alamat' => 'required',
        ]);

        Customers::create($validatedData);

        return redirect('/customers')->with('success', 'Data customer baru berhasil ditambakan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customer)
    {
        // return $customer;
 
        return view('customers.show', [
            'title' => 'Customers',
            'customers' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customers $customer)
    {
        return view('customers.edit', [
            'title' => 'Customers',
            'customers' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customers $customer)
    {
        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'ttl' => 'required',
            'alamat' => 'required'
        ];

        if($request->nik != $customer->nik){
            $rules['nik'] = 'required|size:16';
        }

        if($request->telepon != $customer->alamat){
            $rules['telepon'] = 'required';
        }

        $validatedData = request()->validate($rules);

        // return $validatedData;

        Customers::where('id', $customer->id)->update($validatedData);

        return redirect('/customers')->with('success', 'Data customer berhasil diubah !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customers)
    {
        // return $customers->id;

        DB::table('customers')->delete($customers);

        return redirect('/customers')->with('success', 'Data customer berhasil dihapus !');
    }


    // public function liveSearch(Request $request) Berhasil 
    // {
    //     if($request->ajax())
    //     {
    //         $output = '';
    //         $query = $request->get('query');
    //         if($query != '') {
    //             $data = Customers::where('name', 'like', '%'.$query.'%')
    //                              ->orWhere('nik', 'like', '%'.$query.'%')
    //                              ->orderBy('id', 'asc')
    //                              ->get();
    //         } else {
    //             $data = Customers::orderBy('id', 'asc')->get();
    //         }
             
    //         $total_row = $data->count();
    //         if($total_row > 0){
    //             foreach($data as $row)
    //             {
    //                 $output .= '
    //                 <tr>
    //                 <th scope="row">' . $row->id . '</th>
    //                 <td>'.$row->name.'</td>
    //                 <td>'.$row->gender.'</td>
    //                 <td>'.$row->telepon.'</td>
    //                 <td>'.$row->ttl.'</td>
    //                 </tr>
    //                 ';
    //             }
    //         } else {
    //             $output = 
    //             '<tr>
    //                 <td align="center" colspan="5">No Data Found</td>
    //             </tr>';
    //         }
    //         $data = array(
    //             'table_data'  => $output,
    //         );
    //         echo json_encode($data);
    //     }
    // }
}
