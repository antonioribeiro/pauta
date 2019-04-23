<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Data\Repositories\Users as UsersRepository;
use App\Http\Requests\UserUpdate as UserUpdateRequest;
use App\Http\Requests\UserStore as UserStoreRequest;
use Silber\Bouncer\Database\Role as BouncerRole;
use App\Services\Authentication\Service as AuthenticationService;

class Users extends Controller
{
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * Users constructor.
     *
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.form')
            ->with('assignableRoles', \Auth::user()->assignable_roles)
            ->with('user', $this->usersRepository->new())
            ->with('mode', 'create')
            ->with('formDisabled', true);
    }

    //protected $appends = ['roles', 'abilities', 'roles_string'];

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $user = app(UsersRepository::class)->findById($id);

        return view('admin.users.form')
            ->with('assignableRoles', \Auth::user()->assignable_roles)
            ->with('mode', 'edit')
            ->with('user', $user->append('roles'))
            ->with('formDisabled', true);
    }

    public function normalizeUserInfoFromRequest(UserStoreRequest $request)
    {
        //Get the user info from remote
        preg_match('/(.*?)@(.*)/', $request->get('email'), $output_array);
        if (isset($output_array[1])) {
            $userResponse = app(
                AuthenticationService::class
            )->userInfoByUsername($output_array[1]);

            $request->merge([
                'email' => strtolower($userResponse['email'][0]),
                'name' => $userResponse['name'][0],
                'username' => strtolower($output_array[1]),
            ]);

            return $request;
        }
    }

    /**
     * @param UserStoreRequest     $request
     * @param UsersRepository $repository
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(
        UserStoreRequest $request,
        UsersRepository $repository
    ) {
        $user = app(UsersRepository::class)->storeFromArray($request->all());

        $user->syncRoles($request->get('roles_array'));

        return redirect()->route('users.index');
    }

    /**
     * @return $this
     */
    public function index()
    {
        return view('admin.users.index')->with(
            'users',
            $this->usersRepository
                ->allWithoutPagination()
                ->appends('roles_string')
        );
    }

    /**
     * @param UserUpdateRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = app(UsersRepository::class)->update($id, $request->all());

        $user->syncRoles($request->get('roles_array'));

        return redirect()->route('users.index');
    }
}
