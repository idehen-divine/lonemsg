<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Get the settings view.
     *
     * @return illuminate\view\view
     */
    public function index()
    {
        // Display the settings form or list
        return view('admin.settings.index');
    }

    /**
     * Put app in maintenace mode.
     *
     * @return mixed
     */
    public function putInMaintenanceMode(Request $request)
    {
        // Put the application in maintenance mode
        Artisan::call('down');

       // return response
        return $this->success('Application is now in maintenance mode', $request);
    }

    /**, $request
     * Bring the app out of maintenace mode.
     *
     * @return mixed
     */
    public function bringOutOfMaintenanceMode(Request $request)
    {
        // Bring the application out of maintenance mode
        Artisan::call('up');

       // return response
        return $this->success('Application is now out of maintenance mode', $request);
    }

    /**
     * Allow user registration.
     *
     * @return mixed
     */
    public function allowUserRegistration(Request $request)
    {
        // Allow user registration by updating the setting in the database
        Setting::setValue('allow_user_registration', true);

       // return response
        return $this->success('User registration is now allowed', $request);
    }

    /**
     * Stop user registration.
     *
     * @return mixed
     */
    public function stopUserRegistration(Request $request)
    {
        // Stop user registration by updating the setting in the database
        Setting::setValue('allow_user_registration', false);

       // return response
        return $this->success('User registration is now stopped', $request);
    }

    /**
     * Update app name.
     *
     * @return mixed
     */
    public function updateAppName(Request $request)
    {
        // Validate the request
        $request->validate([
            'app_name' => 'required|string|max:255',
        ]);

        // Update the application name in the database
        Setting::setValue('app_name', strtolower($request->input('app_name')));

        // return response
        return $this->success('Application name updated successfully', $request);
    }

    /**
     * Send success response.
     *
     * @param  mixed  $response
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function success($response, Request $request)
    {
        if ($request->wantsJson()) {
            // If the client wants JSON, return a JsonResponse
            return new JsonResponse(['message' => 'success', 'data' => $response], 204);
        }

        // If the client doesn't want JSON, return a redirect response
        return redirect()->back()->with(['message' => 'success', 'data' => $response]);
    }
}
