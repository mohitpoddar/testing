<?php
namespace App\Http\Controllers\Auth;
use App\Notifications\UserRegisteredSuccessfully;
use App\SO\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\ListvalueRepository as Listvalue;

class RegisterController extends Controller
{
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
    * @var Listvalue
    */
    private $listvalue;


    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Listvalue $listvalue)
    {
        $this->middleware('guest');
        $this->listvalue = $listvalue;
    }
    /**
     * Register new account.
     *
     * @param Request $request
     * @return User
     */
    protected function register(Request $request)
    {
        /** @var User $user */
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'group'    => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        try {
            $validatedData['password']        = bcrypt(array_get($validatedData, 'password'));
            $validatedData['activation_code'] = str_random(30).time();
            $user                             = app(User::class)->create($validatedData);
            $user->on_behalf_id               = $user->id;
            $user->save();
        } catch (Exception $exception) {
            //dd($exception);
            logger()->error($exception);
            return redirect()->back()->with('message', __('Unable to create new user.')); 
        }
        $user->notify(new UserRegisteredSuccessfully($user)); // notifications when registered
        return redirect()->back()->with('message', __('Successfully created new account.') . __('Please check your email and activate your account.'));
    }
    /**
     * Activate the user with given activation code.
     * @param string $activationCode
     * @return string
     */
    public function activateUser(string $activationCode)
    {
        try {
            $user = app(User::class)->where('activation_code', $activationCode)->first();
            if (!$user) {
                return __("The activation code does not exist for any user in our system.");
            }
            $user->status          = 1;
            $user->activation_code = null;
            $user->save();
            auth()->login($user);
        } catch (\Exception $exception) {
            logger()->error($exception);
            return __("Whoops! something went wrong.");
        }
        return redirect()->to('/home');
    }

    // Override the default Auth controller for showing the registration form
    // \vendor\laravel\framework\src\Illuminate\Foundation\Auth\RegistersUsers.php
    public function showRegistrationForm() {
        $groups=$this->listvalue->findWhere(['table' => 'users','field' => 'group'],['value'])->pluck('value');
        return view('auth.m-register', compact('groups'));
    }
}