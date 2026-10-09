<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'សូមបញ្ចូលអាសយដ្ឋានអ៊ីមែលរបស់អ្នក។',
            'email.email' => 'ទម្រង់អ៊ីមែលមិនត្រឹមត្រូវឡើយ។',
            'password.required' => 'សូមបញ្ចូលពាក្យសម្ងាត់របស់អ្នក។',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Sign out from old devices (if using database session driver)
            if (config('session.driver') === 'database') {
                \Illuminate\Support\Facades\DB::table('sessions')
                    ->where('user_id', Auth::id())
                    ->where('id', '!=', $request->session()->getId())
                    ->delete();
            }

            return redirect()->intended('/dashboard');
        }

        return back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'អ៊ីមែល ឬពាក្យសម្ងាត់មិនត្រឹមត្រូវឡើយ។ សូមព្យាយាមម្តងទៀត។',
            ]);
    }

    public function showRegistrationForm(): View
    {
        return view('register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'terms' => ['required', 'accepted'],
        ], [
            'name.required' => 'សូមបញ្ចូលឈ្មោះពេញរបស់អ្នក។',
            'email.required' => 'សូមបញ្ចូលអាសយដ្ឋានអ៊ីមែល។',
            'email.email' => 'ទម្រង់អ៊ីមែលមិនត្រឹមត្រូវឡើយ។',
            'email.unique' => 'អាសយដ្ឋានអ៊ីមែលនេះមានគណនីរួចហើយ។',
            'password.required' => 'សូមបញ្ចូលពាក្យសម្ងាត់។',
            'password.min' => 'ពាក្យសម្ងាត់ត្រូវមានយ៉ាងតិច ៨ តួអក្សរ។',
            'terms.accepted' => 'សូមយល់ព្រមតាមលក្ខខណ្ឌប្រើប្រាស់ និងគោលការណ៍ឯកជនភាព។',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'សូមស្វាគមន៍! គណនីរបស់អ្នកត្រូវបានបង្កើតដោយជោគជ័យ។');
    }
}
