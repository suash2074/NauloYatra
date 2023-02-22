<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{

    protected $medicine = null;
    public function __construct(Medicine $medicine)
    {
        $this->medicine = $medicine;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $this->medicine = $this->medicine->orderBy('id', 'DESC')->where('Illness_name', 'LIKE', "%$search%")->orWhere("medicine_name", 'LIKE', "%$search%")->paginate(6);
        } else {
            $this->medicine = $this->medicine->orderBy('id', 'DESC')->paginate(6);
        }
        return view('admin.medicine.medicine')->with('medicine_data', $this->medicine)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medicine.medicineForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->medicine->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->medicine->fill($data);
        $status = $this->medicine->save();
        if ($status) {
            notify()->success('Medicine added successfully !');
        } else {
            notify()->error('Sorry! There was problem while adding medicine.');
        }

        return redirect()->route('medicine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->medicine = $this->medicine->find($id);
        if (!$this->medicine) {
            //message
            notify()->error('This medicine doesnot exists !!');
            return redirect()->route('healthKit.index');
        }
        return view('admin.medicine.medicineView')->with('medicine_data', $this->medicine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->medicine = $this->medicine->find($id);
        if (!$this->medicine) {
            //message
            notify()->error('This medicine doesnot exists !!');
            return redirect()->route('healthKit.index');
        }
        return view('admin.medicine.medicineForm')->with('medicine_data', $this->medicine);
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
        $this->medicine = $this->medicine->find($id);
        if (!$this->medicine) {
            //message
            notify()->error('This medicine doesnot exists !!');
            return redirect()->route('healthKit.index');
        }
        $rules = $this->medicine->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->medicine->fill($data);
        $status = $this->medicine->save();
        if ($status) {
            notify()->success('Medicine added successfully !');
        } else {
            notify()->error('Sorry! There was problem in adding medicine.');
        }

        return redirect()->route('medicine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->medicine = $this->medicine->find($id);
        if (!$this->medicine) {
            notify()->error('This medicine doesnot exists !!');
            return redirect()->route('about.index');
        }
        $del = $this->medicine->delete();
        if ($del) {
            //message
            notify()->success('Medicine deleted successfully !');
        } else {
            //message
            notify()->error('Sorry! there was problem in deleting data.');
        }

        return redirect()->route('medicine.index');
    }
}
