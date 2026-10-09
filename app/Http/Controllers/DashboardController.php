<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::user();
        $tab = $request->query('tab', 'books');
        $books = $user->books()->orderByPivot('last_read_at', 'desc')->paginate(6);
        $pendingOrders = $user->orders()
            ->where('status', 'pending')
            ->with(['book', 'teachingMaterial'])
            ->latest()
            ->get();

        $allOrders = $user->orders()
            ->with(['book', 'teachingMaterial'])
            ->latest()
            ->get();

        $examAttempts = \App\Models\ExamAttempt::where('user_id', $user->id)
            ->with('exam.questions')
            ->latest()
            ->get();

        return view('dashboard', compact('books', 'pendingOrders', 'allOrders', 'examAttempts', 'user', 'tab'));
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'cropped_photo' => 'nullable|string',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('photo')) {
            if ($user->profile_photo_path && ! str_starts_with($user->profile_photo_path, 'http://') && ! str_starts_with($user->profile_photo_path, 'https://')) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        } elseif ($request->filled('cropped_photo') && str_starts_with($request->cropped_photo, 'data:image/')) {
            if ($user->profile_photo_path && ! str_starts_with($user->profile_photo_path, 'http://') && ! str_starts_with($user->profile_photo_path, 'https://')) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $data = $request->cropped_photo;
            if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
                $data = substr($data, strpos($data, ',') + 1);
                $type = strtolower($type[1]);
                if (! in_array($type, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                    $type = 'jpg';
                }
                $decoded = base64_decode($data);
                if ($decoded !== false) {
                    $fileName = 'profile-photos/'.uniqid('avatar_', true).'.'.$type;
                    Storage::disk('public')->put($fileName, $decoded);
                    $user->profile_photo_path = $fileName;
                }
            }
        } elseif ($request->boolean('remove_photo')) {
            if ($user->profile_photo_path && ! str_starts_with($user->profile_photo_path, 'http://') && ! str_starts_with($user->profile_photo_path, 'https://')) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $user->profile_photo_path = null;
        }

        $passwordChanged = false;
        if ($request->filled('password')) {
            $user->password = $request->password;
            $passwordChanged = true;
        }

        $user->save();

        // If password was changed, sign out from all other devices for security
        if ($passwordChanged && config('session.driver') === 'database') {
            \Illuminate\Support\Facades\DB::table('sessions')
                ->where('user_id', $user->id)
                ->where('id', '!=', request()->session()->getId())
                ->delete();
        }

        return redirect()->route('dashboard', ['tab' => 'profile'])->with('success', 'ព័ត៌មានផ្ទាល់ខ្លួនត្រូវបានកែប្រែដោយជោគជ័យ!');
    }
}
