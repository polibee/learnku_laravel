<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class StatusesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:140'
        ]);

        Auth::user()->statuses()->create([
            'content' => $validated['content']
        ]);

        session()->flash('success', '发布成功！');
        return redirect()->back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', '微博已被成功删除！');
        return redirect()->back();
    }
}
