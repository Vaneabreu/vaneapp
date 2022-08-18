<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\employees;
use App\Models\branches;
use App\Models\pays;
use App\Models\bills;
use App\Models\User;
use App\Models\contacts;
use App\Models\cars;
use App\Models\expenses;
use App\Models\bill_detail;
use App\Models\notes;
use illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            $this->user = auth()->user();

            if(!($this->user->can_view)){
                abort(403, 'user is not admin');
            }

            return $next($request);
        }); 
    }

    public function getCustomer(Request $request)
    {
        $Customer = new Customer;
        return  $Customer->all();
    }

    public function getCustomerFilter(Request $request)
    {
        $Customer = new Customer;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $Customer = $Customer->where($key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $Customer->orderBy('id', 'asc')->get();
    }

    public function getCustomerFilterAll(Request $request)
    {
        $Customer = new Customer;
        $data = $request->all();

        foreach($data as $key => $val){
            
            if($val != null && $val != ""){
                //dd($key);
                $Customer = $Customer->orwhere($key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $Customer->orderBy('id', 'asc')->get();
    }

    public function deleteEmployeesRegister($id)
    {
        return employees::find($id)->delete();
    }

    public function getEmployeesRegister($id)
    {
        $employees = employees::find($id);
        // dd($employees->branches); 
        return response()->json($employees);
    }

    public function updateOrCreateEmployeesRegister(Request $request)
    {
        
        $request->validate([

            "employee_name"=> 'required|string',
            "position"=> 'required|string',
            "phone"=> 'regex:/(\d{3})[-](\d{3})[-](\d{4})/i|required'

        ]);

        
        return employees::updateOrCreate(['id'=> $request->id],$request->all());
    }

    public function getEmployees(Request $request)
    {
        $Employees = new employees;
        return  $Employees->all();
    }

    public function getEmployeesFilter(Request $request)
    {
        $employees = new Employees;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $employees = $employees->where($key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $employees->orderBy('id', 'asc')->get();
    }

    public function getEmployeesFilterAll(Request $request)
    {
        $employees = new Employees;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $employees = $employees->orwhere("employees.".$key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $employees->orderBy('id', 'asc')->get();
    }

    public function deleteBranchesBranch(Branches $id)
    {
        $id->delete();

        return response()->json([]);
    }

    public function getBranchesBranch (Branches $branch)
    {
        $branch = Branches::where('address', ['Moca', 'La Vega'])->orWhere('coordinate_y', 55)->get();
        dd($branch->toArray());
        return response()->json($branch);
    }

    public function updateOrCreateBranchesBranch (Request $request)
    {
        $data=$request->all();
        return branches::updateOrCreate(['id'=> $data['id']], $data);
    }

    public function getBranches(Request $request)
    {
        $Branches = new Branches;
        return  $Branches->all();
    }

    public function getBranchesFilter(Request $request)
    {
        $branches = new Branches;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $branches = $branches->where($key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $branches->orderBy('id', 'asc')->get();
    }

    public function getBranchesFilterAll(Request $request)
    {
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $branches = Branches::orwhere("branches.".$key, 'LIKE', '%'.$val.'%');
            }
        }

        // dd($branches->get()->toArray());

        $branch = Branches::where('id', 23)->first(); // one to many relationship
        $bills = $branch->bills->toArray();

        return  $branches->orderBy('id', 'asc')->get();
    } 

    public function deletePaysPay(Pays $id) //Route model binding 
    {
        $id->delete();
        return response()->json($id);
    }

    public function getPaysPay (Pays $id)
    {
        return response()->json($id);
    }

    public function updateOrCreatePaysPay (Request $request)
    {
        $data=$request->all();
        return pays::updateOrCreate(['id'=> $data['id']], $data);
    }

    public function getPays()
    {
        return  pays::all();
    }

    public function getPaysFilter(Request $request)
    {
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $pays = pays::where($key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $pays->orderBy('id', 'asc')->get();
    }

    public function getPaysFilterAll(Request $request)
    {
        $pays = new Pays;
        $data = $request->all();
        

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $pays = $pays->orwhere("pays.".$key, 'LIKE', '%'.$val.'%');
            }
        }
        
        return  $pays->leftjoin("customers","customers.id", "=" , "pays.customer_id")
        ->leftJoin("branches", "branches.id", "=", "pays.branch_id") 
        ->select('pays.*', 'customers.customer_name', 'branches.branch_name')->orderBy('pays.id', 'asc')->get();
    }

    public function deleteBillsBill($id)
    {
        return bills::where('id','=', $id)->delete();
    }

    public function getBillsBill (bills $bill)
    {
        $branch = optional($bill->branch)->toArray() ?? null; // belongs to relationship

        return response()->json($bill);
    }

    public function updateOrCreateBillsBill (Request $request) 
    {


        $data=$request->all();
        return bills::updateOrCreate(['id'=> $data['id']], $data);
    }
    public function getBills()
    {
        return Bills::all();
    }

    public function getBillsFilter(Request $request)
    {
        $bills = new Bills;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $bills = $bills->where($key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $bills->orderBy('id', 'asc')->get();
    }

    public function getBillsFilterAll(Request $request)
    {
        $bills = new Bills;
        $data = $request->all();
      
        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $bills = $bills->orwhere("bills.".$key, 'LIKE', '%'.$val.'%');
            }
        }

        return  $bills->leftJoin("customers", "customers.id", "=", "bills.customer_id")
        ->leftJoin("branches", "branches.id", "=", "bills.branche_id")
        ->leftJoin("users", "users.id", "=", "bills.user_id")
        ->leftJoin("contacts", "contacts.id", "=", "bills.contact_id")
        ->select('bills.*', 'customers.customer_name','branches.branch_name', 'users.name', 'contacts.contact_name')->orderBy('bills.id', 'asc')->get();

    }

    public function deleteUserUsers(User $user)
    {
        return response()->json($user);
    }

    public function getUser(User $user) //Route model binding
    {
        return response()->json($user);
    }

    public function updateOrCreateUserUsers (Request $request)
    {
        

        $data=$request->all();
        return user::updateOrCreate(['id'=> $data['id']], $data);
    }

    public function getUsers()
    {
        return  User::all();
    }

    public function getUsersFilter(Request $request)
    {
        $user = new User;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $user = $user->where($key, 'LIKE', '%'.$val.'%');
            }
        }
        //return  $user->leftjoin("employees","employees.id", "=" , "user.employee_id") 
        //->select('user.*', 'employees.employee_name')->orderBy('user.id', 'asc')->get();

        $user = User::where('id', 22)->first(); // one to many relationship
        $employees = $user->employees->toArray();

        return  $user->orderBy('id', 'asc')->get();

    }

    public function getUsersFilterAll(Request $request)
    {
        $user = new User;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $user = $user->orwhere("user.".$key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $user->leftjoin("employees","employees.id", "=" , "users.employee_id") 
        ->select('users.*', 'employees.employee_name')->orderBy('users.id', 'asc')->get();

        
    }

    public function deleteContactsContact(Contacts $contact) //Route model binding
    {
        return response()->json($contact);
    }


    public function getContactsContact(Contacts $contact)
    {
        return response()->json($contact);
    }

    public function updateOrCreateContactsContact(Request $request)
    {

        $request->validate([ 
            'contact_name'=> 'required|string',
            'phone'=> 'regex:/(\d{3})[-](\d{3})[-](\d{4})/i|required'
        ]);

        
        return contacts::updateOrCreate(['id'=> $request->id],$request->all());
    }

    public function getContacts(Request $request)
    {
        $Contacts = new Contacts;
        return  $Contacts->all();
    }

    
    public function getContactsFilter(Request $request)
    {
        $Contacts = new Contacts;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $Contacts = $Contacts->where($key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $Contacts->orderBy('id', 'asc')->get();
    }

    public function getContactsFilterAll(Request $request)
    {
        $Contacts = new Contacts;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $Contacts = $Contacts->orwhere("contacts.".$key, 'LIKE', '%'.$val.'%');
            }
        }

        $contact= Contacts::where('id', 25)->first(); // one to many relationship
        $bills = $contact->bills->toArray();

        
        return  $Contacts->orderBy('id', 'asc')->get();
    }


    public function deleteCars(Cars $cars)
    {
        return response()->json($cars);
    }

    public function getCars($id)
    {
        $cars = cars::where('id', $id)->first();
        $category = $cars->category; // has many thourgh

        return response()->json($cars);
    }

    public function updateOrCreateCars(Request $request)
    {
        $request->validate([ 
            'car_name'=> 'required|string',
            'year'=> 'required|max:4'
        ]);
        
        return cars::updateOrCreate(['id'=> $request->id], $request->all());
    }

    public function getCarss(Request $request)
    {
        $Cars = new cars;
        return  $Cars->all();
    }

    public function getCarsFilter(Request $request)
    {
        $Cars = new cars;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $Cars = $Cars->where($key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $Cars->orderBy('id', 'asc')->get();
    }
     
    public function getCarsFilterAll(Request $request)
    {
        $cars = new Cars;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $cars = $cars->orwhere("cars.".$key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $cars->leftJoin("customers", "customers.id", "=", "cars.customer_id")
        ->leftJoin("users", "users.id", "=", "cars.user_id")
        ->select('cars.*', 'customers.customer_name', 'users.name')->orderBy('cars.id', 'asc')->get();
    }
    
    public function deleteExpenses(Expenses $expenses)
    {
        return response()->json($expenses);
    }

    public function getExpenses(Expenses $expenses) 
    {
        return response()->json($expenses);
    }

    public function updateOrCreateExpenses(Request $request)
    {
        $data=$request->all();
        return expenses::updateOrCreate(['id'=> $data['id']], $data);
    }

    public function getExpensess(Request $request)
    {
        $Expenses = new expenses;
        return  $Expenses->all();
    }

    public function getExpensesFilter(Request $request)
    {
        $Expenses = new expenses;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $Expenses = $Expenses->where($key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $Expenses->orderBy('id', 'asc')->get();
    }

    public function getExpensesFilterAll(Request $request)
    {
        $Expenses = new expenses;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $Expenses = $Expenses->orwhere("expenses.".$key, 'LIKE', '%'.$val.'%');
            }
        }

        return  $Expenses->leftJoin("users", "users.id", "=", "expenses.user_id")
        ->select('Expenses.*', 'users.name', 'users.email')->orderBy('expenses.id', 'asc')->get();
    
    }
    public function deleteBill_detail(Bill_detail $bill_detail)
    {
        return response()->json($bill_detail);
    }

    public function getBill_detail(Bill_detail $bill_detail)
    {
        return response()->json($bill_detail);
    }

    public function updateOrCreateBill_detail(Request $request)
    {
        $data=$request->all();
        return bill_detail::updateOrCreate(['id'=> $data['id']], $data);
    }

    public function getBill_details(Request $request)
    {
        $bill_detail = new bill_detail;
        return  $bill_detail->all();
    }

    public function getBill_detailFilterAll(Request $request)
    {
        $bill_detail = new bill_detail;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $bill_detail = $bill_detail->orwhere($key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $bill_detail->orderBy('id', 'asc')->get();
    }

    public function deleteNotes($id)
    {
        return notes::where('id','=', $id)->delete();
    }

    public function getNotes(Notes $id)
    {
        return response()->json($id);
    }

    public function updateOrCreateNotes(Request $request)
    {
        $data=$request->all();
        return notes::updateOrCreate(['id'=> $data['id']], $data);
    }

    public function getNotess(Request $request)
    {
        $notes = new notes;
        return  $notes->all();
    }

    public function getNotesFilterAll(Request $request)
    {
        $notes = new notes;
        $data = $request->all();

        foreach($data as $key => $val){
            if($val != null && $val != ""){
                $notes = $notes->orwhere("notes.".$key, 'LIKE', '%'.$val.'%');
            }
        }
        return  $notes->leftJoin("customers", "customers.id", "=", "notes.customer_id")
        ->select('notes.*', 'customers.customer_name')->orderBy('notes.id', 'asc')->get();

    }

    public function updateOrCreateCustomerDashboard (Request $request)
    {

        $id = $request->id;
        $itbis = $request->itbis;
        $pending_debt = $request->pending_debt;
        $transfer = $request->transfer;
     

        $itbis1 = (($pending_debt - $transfer)*$itbis/100);
        $total1 = ($pending_debt - $transfer);
        $total3 = ($total1 + $itbis1); 

        

        $request->validate([ 
            'customer_name'=> 'required|string',
            'phone'=> 'regex:/(\d{3})[-](\d{3})[-](\d{4})/i|required',
            'cedula'=> 'regex:/(\d{3})[-](\d{7})[-](\d{1})/i|required'
        ]);

       Customer::where('id', '=', $id)->update(['total' => $total3]);
       return Customer::updateOrCreate(['id'=> $request->id], $request->all());
        
        
        
    }



    public function deleteCustomerDashboard ($id)
    {
     return Customer::where('id','=', $id)->delete();
    }
    

    public function getCustomerDashboard ($id)
    {
        $customer = customer::find($id);
        return response()->json($customer);

        
    }

    public function updateTransfer(Request $request)
    {


        $id = $request->id;
        $itbis = $request->itbis;
        $pending_debt = $request->pending_debt;
        $transfer = $request->transfer;
        $id2 = $request->id2;

        $itbis1 = (($pending_debt - $transfer)*$itbis/100);
        $total1 = ($pending_debt - $transfer);
        $total3 = ($total1 + $itbis1); 

        //dump($itbis);
        //dump($itbis1);
        //dump($total1);
        //dump($total3);
        //dd("dum");

        $cust = Customer::where('id', '=', $id2)->first();
     
        $itbis2 = $cust->itbis; 
        $pending_debt2 = $cust->pending_debt; 
        
        $itbis2 = (($pending_debt2 + $transfer)*$itbis2/100);
        $total2 = ($pending_debt2 + $transfer);
        $total4 = ($total2 + $itbis2);
        
       Customer::where('id', '=', $id)->update(['pending_debt' => $total1]);
       Customer::where('id', '=', $id)->update(['total' => $total3]);
       Customer::where('id', '=', $id2)->update(['total' => $total4]);
       
       return Customer::where('id', '=', $id2)->update(['pending_debt' =>  $total2]);
        
    }
   
    
    
}
