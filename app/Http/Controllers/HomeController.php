<?php

namespace App\Http\Controllers;

use App\Mail\AvailableflatsEmail;
use App\Mail\ContactEmail;
use App\Mail\InsuranceEmail;
use App\Mail\LoanEmail;
use App\Mail\RentEmail;
use App\Models\Resale;
use App\Mail\ResaleEmail;
use App\Mail\UsedcarEmail;
use App\Models\About;
use App\Models\Availableflatfrom;
use App\Models\Availableflats;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Insurance;
use App\Models\Loan;
use App\Models\Rent;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Usedcar;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Attachment;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {

        $sliders = Slider::all();
        $abouts = About::all();
        $faqs = Faq::all();
        $galleries = Gallery::all();
        $reviews = Review::all();
        $wishes = Wish::all();
        return view('frontend.pages.index', compact('sliders', 'abouts', 'faqs', 'galleries', 'reviews', 'wishes'));
    }

    public function about()
    {
        $abouts = About::all();
        return view('frontend.pages.about', compact('abouts'));
    }

    public function available_flats()
    {
        $available_flats = Availableflats::all();
        return view('frontend.pages.available-flats', compact('available_flats'));
    }

    public function available_flats_details($id)
    {
        $available_flat = Availableflats::where('id', $id)->first();
        $available_flats = Availableflats::all();
        return view('frontend.pages.available-flats-details', compact('available_flat', 'available_flats'));
    }

    public function available_flats_store(Request $request)
    {

        $to = 'indrareddy85128@gmail.com';
        $subject = 'Request From Available Flats Form';


        try {
            $Availableflatfrom = new Availableflatfrom();
            $Availableflatfrom->name = $request->name;
            $Availableflatfrom->phone = $request->phone;
            $Availableflatfrom->email = $request->email;
            $Availableflatfrom->subject = $request->subject;
            $Availableflatfrom->authorise = $request->authorise;
            $Availableflatfrom->save();

            Mail::to($to)->send(new AvailableflatsEmail($subject, $Availableflatfrom));

            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Failed to send email: ' . $e->getMessage());
        }
    }

    public function resale()
    {
        return view('frontend.pages.resale');
    }
    public function resale_store(Request $request)
    {
        $to = 'indrareddy85128@gmail.com';
        $subject = 'Request From Resale Form';
        try {
            $resale = new Resale();
            $resale->resale_options = $request->resale_options;
            $resale->select_flat_size = $request->select_flat_size;
            $resale->furnished = $request->furnished;
            $resale->name = $request->name;
            $resale->phone = $request->phone;
            $resale->email = $request->email;
            $resale->message = $request->message;
            $resale->authorise = $request->authorise;
            $resale->save();
            Mail::to($to)->send(new ResaleEmail($subject, $resale));

            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Failed to send email: ' . $e->getMessage());
        }
    }


    public function rent()
    {
        return view('frontend.pages.rent');
    }

    public function rent_store(Request $request)
    {
        $to = 'indrareddy85128@gmail.com';
        $subject = 'Request From Rent Form';

        try {
            $rent = new Rent();
            $rent->rent_options = $request->rent_options;
            $rent->select_flat_size = $request->select_flat_size;
            $rent->furnished = $request->furnished;
            $rent->name = $request->name;
            $rent->phone = $request->phone;
            $rent->email = $request->email;
            $rent->message = $request->message;
            $resumePath = $request->file('resume')?->store('resumes', 'public');
            $rent->resume = $resumePath;
            $rent->authorise = $request->authorise;
            $rent->save();

            Mail::to($to)->send(new RentEmail($subject, $rent));

            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Failed to send email: ' . $e->getMessage());
        }
    }


    public function loans()
    {
        return view('frontend.pages.loans');
    }

    public function loans_store(Request $request)
    {

        $to = 'indrareddy85128@gmail.com';
        $subject = 'Request From Loans Form';

        try {
            $loan = new Loan();
            $loan->loan = $request->loan;
            $loan->loan_options = $request->loan_options;
            $loan->options = $request->options;
            $loan->name = $request->name;
            $loan->phone = $request->phone;
            $loan->email = $request->email;
            $loan->car_number = $request->car_number;
            $loan->salary_per_month = $request->salary_per_month;
            $loan->loan_amount = $request->loan_amount;
            $loan->message = $request->message;
            $rc_copy_Path = $request->file('rc_copy')?->store('rccopys', 'public');
            $loan->rc_copy = $rc_copy_Path;
            $loan->authorise = $request->authorise;
            $loan->save();
            Mail::to($to)->send(new LoanEmail($subject, $loan));

            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Failed to send email: ' . $e->getMessage());
        }
    }


    public function insurance()
    {
        return view('frontend.pages.insurance');
    }

    public function insurance_store(Request $request)
    {
        $to = 'indrareddy85128@gmail.com';
        $subject = 'Request From Loans Form';
        try {
            $insurance = new Insurance();
            $insurance->insurance = $request->insurance;
            $insurance->name = $request->name;
            $insurance->phone = $request->phone;
            $insurance->email = $request->email;
            $insurance->car_number = $request->car_number;
            $insurance->message = $request->message;
            $previous_policy_Path = $request->file('previous_policy')?->store('previouspolicys', 'public');
            $insurance->previous_policy = $previous_policy_Path;
            $insurance->authorise = $request->authorise;
            $insurance->save();
            Mail::to($to)->send(new InsuranceEmail($subject, $insurance));

            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Failed to send email: ' . $e->getMessage());
        }
    }





    public function used_cars()
    {
        return view('frontend.pages.used-cars');
    }

    public function used_cars_store(Request $request)
    {
        $to = 'indrareddy85128@gmail.com';
        $subject = 'Request From Contact Form';

        try {
            $usedcar = new Usedcar();
            $usedcar->car_make_model = $request->car_make_model;
            $usedcar->manufacturing_year = $request->manufacturing_year;
            $usedcar->kilometers = $request->kilometers;
            $usedcar->car_number = $request->car_number;
            $usedcar->name = $request->name;
            $usedcar->phone = $request->phone;
            $usedcar->email = $request->email;
            $usedcar->message = $request->message;
            $rc_copy_Path = $request->file('rc_copy')?->store('rccopys', 'public');
            $usedcar->rc_copy = $rc_copy_Path;
            $usedcar->authorise = $request->authorise;
            $usedcar->save();

            Mail::to($to)->send(new UsedcarEmail($subject, $usedcar));

            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Failed to send email: ' . $e->getMessage());
        }
    }


    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function contact_store(Request $request)
    {
        $to = 'indrareddy85128@gmail.com';
        $subject = 'Request From Contact Form';

        try {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->authorise = $request->authorise;
            $contact->save();

            Mail::to($to)->send(new ContactEmail($subject, $contact));

            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
