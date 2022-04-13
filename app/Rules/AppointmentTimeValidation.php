<?php

namespace App\Rules;

use App\Models\Appointment;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class AppointmentTimeValidation implements Rule
{

    public $errorMessage;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $doctorName = session('doctorname');
        $appointment = new Appointment();

        $checkTime =$appointment->checkDoctorTime($doctorName);
        $appointmentTime = $appointment->checkAppointment($doctorName,$value);
        $hasTime = $appointment->checkTime($value);

        if(count($hasTime) >0){
            Log::critical("appointme",[count($appointmentTime)]);
            if(count($appointmentTime) == 0){
                return true;
            }else{
                $this->errorMessage = "This Time has already appointment";
                return false;
            }
        }else{
            Log::critical("checktime",[$checkTime]);
            $this->errorMessage = 'From' . $checkTime[0]->start_time." | To " . $checkTime[0]->end_time;   
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage;
    }
}
