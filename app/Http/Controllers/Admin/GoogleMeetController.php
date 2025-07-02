<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class GoogleMeetController extends Controller
{
    public function getClient()
    {
        $client = new Google_Client();
        $client->setAuthConfig(storage_path('app/google/credentials.json'));
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setAccessType('offline');

        $tokenPath = storage_path('app/google/token.json');
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        return $client;
    }

    public function index()
    {
        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $events = $service->events->listEvents('primary', [
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => now()->startOfDay()->toRfc3339String(),
        ]);

        return view('meet.index', ['events' => $events->getItems()]);
    }

    public function create()
    {
        return view('meet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'summary' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'meeting_type' => 'required|in:online,offline',
        ]);

        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $event = new Google_Service_Calendar_Event([
            'summary' => $request->summary,
            'start' => [
                'dateTime' => Carbon::parse($request->start_time)->toRfc3339String(),
                'timeZone' => 'Europe/Moscow',
            ],
            'end' => [
                'dateTime' => Carbon::parse($request->end_time)->toRfc3339String(),
                'timeZone' => 'Europe/Moscow',
            ],
            'description' => $request->meeting_type == 'online' ? 'Встреча онлайн' : 'Встреча офлайн',
            'conferenceData' => $request->meeting_type == 'online' ? [
                'createRequest' => [
                    'requestId' => uniqid(),
                    'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
                ]
            ] : null,
        ]);

        $service->events->insert('primary', $event, ['conferenceDataVersion' => 1]);

        return redirect()->route('meet.index')->with('success', 'Встреча создана');
    }

    public function edit($id)
    {
        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);
        $event = $service->events->get('primary', $id);

        return view('meet.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'summary' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'meeting_type' => 'required|in:online,offline',
        ]);

        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $event = $service->events->get('primary', $id);

        $event->setSummary($request->summary);
        $event->setStart([
            'dateTime' => Carbon::parse($request->start_time)->toRfc3339String(),
            'timeZone' => 'Europe/Moscow'
        ]);
        $event->setEnd([
            'dateTime' => Carbon::parse($request->end_time)->toRfc3339String(),
            'timeZone' => 'Europe/Moscow'
        ]);

        $event->setDescription($request->meeting_type == 'online' ? 'Встреча онлайн' : 'Встреча офлайн');
        $event->setConferenceData($request->meeting_type == 'online' ? [
            'createRequest' => [
                'requestId' => uniqid(),
                'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
            ]
        ] : null);

        $service->events->update('primary', $event->getId(), $event);

        return redirect()->route('meet.index')->with('success', 'Встреча обновлена');
    }

    public function destroy($id)
    {
        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);
        $service->events->delete('primary', $id);

        return redirect()->route('meet.index')->with('success', 'Встреча удалена');
    }
}
