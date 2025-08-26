<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportForm;
use App\Models\Status;
use App\Models\SupportSayForm;
use Illuminate\Support\Facades\Gate;

class SupportController extends Controller
{
    public function SupportPage() {
        $Status = Status::all();
        return view('supp.support', compact('Status'));
    }

    public function SupportStore(Request $request) {
        $data = $request->validate([
            'prichina' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        SupportForm::create([
            'prichina' => $data['prichina'],
            'description' => $data['description'],
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('index')->with('success', 'Вы успешно оставили, с вами свяжутся');
    }

    public function SupportPanel() {
         if (Gate::denies('Support', SupportForm::class)) {
             abort(403);
         }
        $SupportForms = SupportForm::all();
        return view('supp.panel', compact('SupportForms'));
    }

    public function SupportChange($SupportForm) {
        $SupportForm = SupportForm::find($SupportForm); // по брейну решил ошибку как масетр ваще просто лютый я силён
        $Status = Status::all();
        $SupportForm->load('messages.user');
        return view('supp.change', compact('SupportForm','Status'));
    }

    public function SupportChangeStore(Request $request, SupportForm $SupportForm) {
        $SupportForm->status = $request->input('status');
        $SupportForm->save();
        return redirect()->route('index');
    }

    public function MyssupportTickets() {
        $SupportForm = SupportForm::where('user_id', auth()->user()->id)->get();
        return view('supp.mysupport', compact('SupportForm'));
    }

    public function SupportSayUserForm(Request $request,SupportForm $SupportForm)
    {
        $SupportForm->load('messages.user');
        return view('supp.SuppSaySo', compact('SupportForm'));
    }

    public function SuppSayPost(Request $request, SupportForm $SupportForm)
    {
        $data = $request->validate([
            'description' => 'required|string|max:500',
        ]);
        SupportSayForm::create([
            'user_id' => auth()->user()->id,
            'suppform_id' => $SupportForm->id,
            'description' => $data['description'],
        ]);
        return redirect()->back();
    }



}
