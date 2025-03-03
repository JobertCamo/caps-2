<?php

use App\Models\User;
use Livewire\Volt\Volt;
use App\Mail\JobApplied;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\ValidationException;


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    return redirect('/');
});

Volt::route('/application/{job}', 'guest.app-form');
Volt::route('/job-result/{tag}', 'guest.job-result')->name('job-result');

Route::middleware('auth')->group(function() {
    Route::view('/create-job', 'pages-hr.job-creation')->can('view-page');                        
    Volt::route('/edit-job/{job}', 'hr.job-edit')->can('view-page');
    Route::view('/candidate-list', 'pages-hr.all-applicant')->can('view-page');
    Route::view('/applicants', 'pages-hr.priority-applicant')->can('view-page');
    Volt::route('/employees', 'hr.employee-list')->can('view-page');
    Route::view('/hr-task', 'pages-hr.task-management');
    Route::view('/offboarding', 'pages-hr.offboarding')->can('view-page');
    Volt::route('/profile/{applicant}', 'hr.applicant-profile')->can('view-page');
    Route::view('/wall', 'pages-employee.freedom-wall');
    Route::view('/task-list', 'pages-employee.task-list')->can('view-page-employee');
    Route::view('/employee-dashboard', 'pages-employee.dashboard')->can('view-page-employee');
    Volt::route('/profile', 'employee.profile')->can('view-page-employee');
    Route::view('/token', 'token')->can('view-page');
    // Route::view('/employee-task', 'julsfolder.hr-portal');
    Volt::route('/resignation', 'employee.resignation-form');
});
Volt::route('/jobpost', 'guest.job-post');
// Route::middleware('guest')->group(function() {
//     Route::view('/', 'user.login')->name('login');
// });

Route::get('/', function () {
    if (auth()->check()) {
        if(Auth::user()->role === 'hr'){
            return redirect('/candidate-list');
        }elseif(Auth::user()->role === 'emp'){
            return redirect('/employee-dashboard');
        }
    }
    return view('user.login');
})->name('login');

Route::view('/docs', 'api-docs');

Route::get('/test', function(){

    // $email = "bordassesdawqsgol@gmail.com";
    // $password = "#hrGWA";

    // $response = Http::post('https://admin.gwamerchandise.com/api/auth', [
    //     'email' => $email,
    //     'password' => $password,
    // ]);

    // $userData = $response->json();

    // if ($response->successful()) {
    //     $userdatas = $userData['user'];

    //     $user = User::where('external_user_id', $userdatas['id'])->first();
    //     if($user){
    //         Auth::login($user);
    //         return $user->role !== 'HR' ? redirect('/employee-dashboard') : redirect('/candidate-list');
    //     }else{
    //         $data = User::create([
    //             'name' => $userdatas['name'],
    //             'email' => $userdatas['email'],
    //             'password' => Hash::make('defaultpassword'),
    //             'role' =>  $userdatas['role'],
    //             'department' => fake()->randomElement(['IT Department', 'Sales Department']),
    //             'external_user_id' => $userdatas['id'],
    //         ]);
    //         Auth::login($data);
    //         return $data->role !== 'HR' ? redirect('/employee-dashboard') : redirect('/candidate-list');
    //     }
        
    // }
    $requirements = 'PHP, laravel, HTML5, Javascript';
    $text = 'PHP, laravel, HTML5';

    $res = "Analyze the following resume skills:
              " .$text . " Compare them with the job requirements: " . $requirements ." 
             Calculate the percentage match between the skills and requirements. Return your evaluation and *put the percentage number at the end of your sentence just like this 'the percentage is percentage_number' dont add percentage sign*";

        // $result = Gemini::geminiPro()->generateContent($res);

        $client = new \GuzzleHttp\Client();
        $response = $client->post("https://generativelanguage.googleapis.com/v1/models/gemini-1.5-pro:generateContent", [
            'query' => ['key' => 'AIzaSyAFvDKsq3H1Qbkj2iyWR7QPGNEdlHY0clk'],
            'json' => ['contents' => [['parts' => [['text' => $res]]]]],
            'timeout' => 30,
        ]);

        $data = json_decode($response->getBody(), true);

    $result2 = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'No response';
    
    $string = "this applicant has potential in this role *evaluation* 60";
    preg_match('/\d+$/', $result2, $matches);

    echo $result2;
    
    $number = $matches[0] ?? null;
    // $num = Str::remove('%',$number);
    echo $number; // Output: 50
    
    // echo "error";
    
    

    


    // return back()->withErrors(['message' => 'Invalid credentials']);
    // echo "error";

});

Route::get('/tast', function(){
    echo url('/');
});


                     