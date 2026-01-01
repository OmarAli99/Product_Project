<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class RateController extends Controller
{

                public function rate(Request $request)
                {
                    $data = $request->validate([
                        'product_id' => 'required|exists:products,id', // التأكد إن المنتج موجود
                        'name'    => 'required|string|max:255',
                        'email'   => 'required|email',
                        'rate'    => 'required|integer|min:1|max:5', // تأكيد أن القيمة رقم بين 1 و 5
                        'message' => 'required|string|max:1000',
                    ]);

                    Rate::create($data);

                    // تغيير الرسالة لتكون معبرة أكتر
                    return back()->with('statusrate', 'Thank you! Your rating has been submitted successfully.');
                }
}
