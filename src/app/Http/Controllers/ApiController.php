<?php

namespace App\Http\Controllers;

use App\Http\Resources\TemperatureResource;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Room;

class ApiController extends Controller
{
    public static function getTemperatures()
    {
        $response = Http::get('192.168.1.132:8080/temperatures');
        return $response->body();
    }

    public static function getTemperaturesFromThisWeek(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/temperaturesFromThisWeek');
        return $response->body();
    }

    public static function getTemperaturesFromThisMonth(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/temperaturesFromThisMonth');
        return $response->body();
    }

    public static function getTemperaturesFromThisYear(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/temperaturesFromThisYear');
        return $response->body();
    }

    public static function getLatestTemperature(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/temperatures/latest');
        return $response->body();
    }

    public static function getHumidities()
    {
        $response = Http::get('192.168.1.132:8080/humidities');
        return $response->body();
    }

    public static function getHumiditiesFromThisWeek(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/humiditiesFromThisWeek');
        return $response->body();
    }

    public static function getHumiditiesFromThisMonth(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/humiditiesFromThisMonth');
        return $response->body();
    }

    public static function getHumiditiesFromThisYear(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/humiditiesFromThisYear');
        return $response->body();
    }

    public static function getLatestHumidity(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/humidities/latest');
        return $response->body();
    }

    public static function getSensors()
    {
        $response = Http::get('192.168.1.132:8080/sensors');
        return $response->body();
    }

    public static function getLux()
    {
        $response = Http::get('192.168.1.132:8080/lux');
        return $response->body();
    }

    public static function getLuxFromThisWeek(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/luxFromThisWeek');
        return $response->body();
    }

    public static function getLuxFromThisMonth(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/luxFromThisMonth');
        return $response->body();
    }

    public static function getLuxFromThisYear(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/luxFromThisYear');
        return $response->body();
    }

    public static function getPresencesHours(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/presences');
        $presences = $response->body();
        $times = self::hours_of_day();
        foreach ( $times as $key => $value ) {
            $result[$key . ':00'] = 0;
        }
        foreach(json_decode($presences, true) as $presence) {
            if ( date('H', strtotime($presence["created_at"])) == $times[date('H', strtotime($presence["created_at"]))] ) {
                $result[date('H', strtotime($presence["created_at"])) . ':00'] += 1;
            }
        }        
        return $result;
    }

    public static function getPresencesDays(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/presences');
        $presences = $response->body();
        $weekdays = self::days_of_week();
        $result = array_combine(array_values($weekdays), array_fill(0, count($weekdays), 0));
        foreach ( json_decode($presences, true) as $presence ) {
            if ( date('l', strtotime($presence["created_at"])) == $weekdays[date('l', strtotime($presence["created_at"]))] ) {
                $result[date('l', strtotime($presence["created_at"]))] += 1;
            }
        }  
        return $result;
    }

    public static function getPresencesMonths(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/presences');
        $presences = $response->body();
        $months = self::months_of_year();
        $result = array_combine(array_values($months), array_fill(0, count($months), 0));
        foreach ( json_decode($presences, true) as $presence ) {
            if ( date('F', strtotime($presence["created_at"])) == $months[date('F', strtotime($presence["created_at"]))] ) {
                $result[date('F', strtotime($presence["created_at"]))] += 1;
            }
        }
        return $result;
    }

    public static function getStatesHours(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/states');
        $states = $response->body();
        $times = self::hours_of_day();
        foreach ( $times as $key => $value ) {
            $result[$key . ':00'] = 0;
        }
        foreach(json_decode($states, true) as $state) {
            if ( date('H', strtotime($state["created_at"])) == $times[date('H', strtotime($state["created_at"]))] ) {
                $result[date('H', strtotime($state["created_at"])) . ':00'] += 1;
            }
        }
        return $result;
    }

    public static function getStatesDays(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/states');
        $states = $response->body();
        $weekdays = self::days_of_week();
        $result = array_combine(array_values($weekdays), array_fill(0, count($weekdays), 0));
        foreach ( json_decode($states, true) as $state ) {
            if ( date('l', strtotime($state["created_at"])) == $weekdays[date('l', strtotime($state["created_at"]))] ) {
                $result[date('l', strtotime($state["created_at"]))] += 1;
            }
        }  
        return $result;
    }

    public static function getStatesMonths(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/states');
        $states = $response->body();
        $months = self::months_of_year();
        $result = array_combine(array_values($months), array_fill(0, count($months), 0));
        foreach ( json_decode($states, true) as $state ) {
            if ( date('F', strtotime($state["created_at"])) == $months[date('F', strtotime($state["created_at"]))] ) {
                $result[date('F', strtotime($state["created_at"]))] += 1;
            }
        }
        return $result;
    }

    public static function getLatestState(Room $room)
    {
        $response = Http::get($room->device->ip.':8080/states/latest');
        return $response->body();
    }

    private static function days_of_week()
    {
        return [
            'Monday'    => 'Monday', 
            'Tuesday'   => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday'  => 'Thursday',
            'Friday'    => 'Friday',
            'Saturday'  => 'Saturday',
            'Sunday'    => 'Sunday',
        ];
    }

    private static function hours_of_day()
    {
        $startTime = strtotime('01:00');
        $endTime   = strtotime('24:00');
        $times = [];
        while($endTime >= $startTime){
            $times[date("H", $startTime)] = date("H", $startTime);
            //$times[date("H", $startTime)] = 0;
            $startTime = strtotime('+60 minutes', $startTime);
        }
        return $times;
    }

    private static function months_of_year()
    {
        return [
            'January'   => 'January', 
            'February'  => 'February',
            'March'     => 'March',
            'April'     => 'April',
            'May'       => 'May',
            'June'      => 'June',
            'July'      => 'July',
            'August'    => 'August',
            'September' => 'September',
            'October'   => 'October',
            'November'  => 'November',
            'December'  => 'December'
        ];
    }

    private static function binarySearchRec(Array $arr, $start, $end, $x) 
    {
        if ($end < $start) {
            return false;
        }
        $mid = floor(($end + $start)/2); 
        if ($arr[$mid] == $x)  
            //return true;
            $arr[$mid] += 1;
    
        elseif ($arr[$mid] > $x) { 
            // call binarySearch on [start, mid - 1] 
            self::binarySearchRec($arr, $start, $mid - 1, $x); 
        } 
        else { 
            // call binarySearch on [mid + 1, end] 
            self::binarySearchRec($arr, $mid + 1, $end, $x); 
        }
        return false;
    }

    public function getRooms()
    {
        return Room::all();
    }

    public function getEvents(Room $room)
    {
        return count($room->events);
    }

    public function getEventHours(Room $room)
    {
        $events = $room->events;
        $hours = 0;
        foreach($events as $event){
            $hours += $event->duration();
        }
        return $hours;
    }

    public function getGhostMeetings(Room $room)
    {
        $ghostMeetings = 0;
        $events = $room->events;
        $response = Http::get($room->device->ip.':8080/presences');
        $presences = json_decode($response->body());
        foreach( $events as $event ){
            foreach( $presences as $presence ){
                if( (strtotime($presence->created_at) >= strtotime($event->start)) && (strtotime($presence->created_at) <= strtotime($event->end)) ){
                    $ghostMeetings++;
                }
            }
        }
        return $ghostMeetings;
    }
}
