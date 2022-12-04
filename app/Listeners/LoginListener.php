<?php

namespace App\Listeners;

use App\Models\Device;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;
        $input = request()->userAgent();
        $start_pos = strpos($input, '(') + 1;
        $length = strpos($input, ')', $start_pos) - ($start_pos);
        $device_type = substr($input, $start_pos, $length);
        $b_string = explode(' ', $input)[12];
        $browser = substr($b_string, 0, strpos($b_string, '/'));
        $oldDevice = Device::where('user_id', $user->id)->first();
        if ($oldDevice) {
            if (!($oldDevice->browser == $browser && $oldDevice->device_type == $device_type)) {
                if($oldDevice->verified) {
                    Auth::guard('web')->logout();
                    request()->session()->invalidate();
                    session(['dialog' => 'true']);
                }else{
                    $oldDevice->update(['browser' => $browser,'device_type' => $device_type,'verified'=>true]);
                }
            }
        } else {
            $device = new Device([
                'user_id' => $user->id,
                'browser' => $browser,
                'device_type' => $device_type,
            ]);
            $device->save();
        }
    }
}
