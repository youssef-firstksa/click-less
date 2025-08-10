<?php

namespace App\Services;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Log;

class ActivityLogger
{
    /**
     * Log activity in the database or file based on configuration.
     *
     * @param string $logName
     * @param string $description
     * @param array $properties
     * @return void
     */
    public static function log(string $logName, string $description, array $properties = [])
    {
        if (config('activitylog.enabled')) {
            // Logging to the database
            Activity::create([
                'log_name' => $logName,
                'description' => $description,
                'properties' => json_encode($properties),
                'causer_id' => auth()->id(),  // Add user ID who performed the action
                'causer_type' => get_class(auth()->user()),  // Class of the user model
            ]);
        } else {
            // Logging to a file if enabled in configuration
            Log::channel('activity')->info($description, $properties);
        }
    }
}
