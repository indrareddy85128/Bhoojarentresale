<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Availableflats;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Lead;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Wish;
use Illuminate\Http\Request;

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

    public function resale()
    {
        return view('frontend.pages.resale');
    }

    public function rent()
    {
        return view('frontend.pages.rent');
    }

    public function loans()
    {
        return view('frontend.pages.loans');
    }

    public function insurance()
    {
        return view('frontend.pages.insurance');
    }

    public function used_cars()
    {
        return view('frontend.pages.used-cars');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function leadStore(Request $request)
    {
        $data = $request->all();
        $formData = [];
        foreach ($data as $key => $value) {
            if ($key !== '_token' && $key !== 'name' && $key !== 'email' && $key !== 'phone' && $key !== 'message' && $key !== 'lead_source' && $key !== 'lead_status' && $key !== 'authorise' && $key !== 'submit') {
                $formData[$key] = $value;
            }
        }
        $data['form_data'] = json_encode($formData);
        $lead = new Lead;
        $lead->name = $data['name'];
        $lead->email = $data['email'];
        $lead->phone = $data['phone'];
        $lead->message = $data['message'];
        $lead->lead_source = $data['lead_source'];
        $lead->form_data = $data['form_data'];
        $lead->save();

        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}
