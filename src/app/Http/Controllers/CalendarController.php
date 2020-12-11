<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use App\TokenStore\TokenCache;
use App\TimeZones\TimeZones;

class CalendarController extends Controller
{
    /**
     * The URL that will be called is /v1.0/me/calendarView.
     * The startDateTime and endDateTime parameters define the start and end of the view.
     * The $select parameter limits the fields returned for each events to just those the view will actually use.
     * The $orderby parameter sorts the results by the date and time they were created, with the most recent item being first.
     * The $top parameter limits the results to 25 events.
     * The Prefer: outlook.timezone="" header causes the start and end times in the response to be adjusted to the user's preferred time zone.
     */
    public function calendar()
    {
        $viewData = $this->loadViewData();

        $graph = $this->getGraph();

        // Get user's timezone
        $timezone = TimeZones::getTzFromWindows($viewData['userTimeZone']);

        // Get start and end of week
        $startOfWeek = new \DateTimeImmutable('sunday -1 week', $timezone);
        $endOfWeek = new \DateTimeImmutable('sunday', $timezone);

        $queryParams = array(
        'startDateTime' => $startOfWeek->format(\DateTimeInterface::ISO8601),
        'endDateTime' => $endOfWeek->format(\DateTimeInterface::ISO8601),
        // Only request the properties used by the app
        '$select' => 'subject,organizer,start,end',
        // Sort them by start time
        '$orderby' => 'start/dateTime',
        // Limit results to 25
        '$top' => 25
        );

        // Append query parameters to the '/me/calendarView' url
        $getEventsUrl = '/me/calendarView?'.http_build_query($queryParams);

        $events = $graph->createRequest('GET', $getEventsUrl)
        // Add the user's timezone to the Prefer header
        ->addHeaders(array(
            'Prefer' => 'outlook.timezone="'.$viewData['userTimeZone'].'"'
        ))
        ->setReturnType(Model\Event::class)
        ->execute();

        //return response()->json($events);

        $viewData['events'] = $events;
        return view('myCalendar', $viewData);
    }

    private function getGraph(): Graph
    {
        // Get the access token from the cache
        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();

        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);
        return $graph;
    }
}
