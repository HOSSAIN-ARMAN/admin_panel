<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegistrationEvent;
use App\Mail\WelcomeCustomerMail;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
//           $activeCustomers = Customer::where('active', 1)->get();
//           $inActiveCustomers = Customer::where('active', 0)->get();

//        $activeCustomers = Customer::active()->get();
//        $inActiveCustomers = Customer::inActive()->get();
//        $companies = Company::all();

//           return view('bladeFile.customer.customer', [
//               'activeCustomers' => $activeCustomers,
//               'inActiveCustomers' => $inActiveCustomers,
//               'companies'   => $companies
//           ]);

//        $customers = Customer::all();
//        dd($customers);
//        $customers = Customer::with('company')->get();
        $customers = Customer::with('company')->paginate(15);
//        dd($customers->toArray());

        return view('bladeFile.customer.customer', compact('customers'));
    }
    public function create(){



        $companies = Company::all();
        $customer = new Customer(); // this model sent to fix error Undefined variable: customer
        return view('bladeFile.customer.create', compact('companies', 'customer'));
    }
    public function store(){
//        $data = request()->validate([
//            'name' => 'required',
//            'email' => 'required|email',
//            'active' => 'required',
//            'company_id' => 'required',
//        ]);
//       Customer::create($data);


        $this->authorize('create', Customer::class);

       $customer = Customer::create($this->validateRequest());
       $this->storeImage($customer);

       event(new NewCustomerHasRegistrationEvent($customer));

//       return redirect('customers');
    }

//    this is the best way to show data using laravel model binding
    public function show(Customer $customer) {
        $this->authorize('view', $customer);

        return view('bladeFile.customer.show', compact('customer'));
    }

//    public function show($customer) {
////        $customer = Customer::find($customer);
//        $customer = Customer::where('id',$customer)->firstOrFail();
//        return view('bladeFile.customer.show', compact('customer'));
//    }

     public function edit(Customer $customer){

         $companies = Company::all();
         return view('bladeFile.customer.edit', compact('customer', 'companies'));
     }
     public function update(Customer $customer){
         $customer->update($this->validateRequest());
         $this->storeImage($customer);
//         return redirect('customer/'.$customer->id);
         return redirect('customers');
     }

     private function validateRequest() {
         return request()->validate([
             'name' => 'required',
             'email' => 'required|email',
             'active' => 'required',
             'company_id' => 'required',
             'image' => 'sometimes|file|image|max:5000'
         ]);

//         return tap(request()->validate([
//             'name' => 'required',
//             'email' => 'required|email',
//             'active' => 'required',
//             'company_id' => 'required',
//
//         ]), function () {
//
//             if (request()->hasFile('image')){
//                 request()->validate([
//                     'image' => 'file|image|max:5000'
//                 ]);
//             }
//
//         });

     }

     private function storeImage($customer) {
        if (request()->hasFile('image')){
            $customer->update([
                'image' => request()->image->store('uploads', 'public') //uploades:directory, public:location directory
            ]);
            $image = Image::make(public_path('storage/'.$customer->image))->crop(300, 600);
            $image->save();
        }
     }

     public function destroy(Customer $customer){
         $customer->delete();
         return redirect('customers');
     }

}
