<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Models\Bank;
use App\Models\SystemNotification;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = SystemNotification::commonFilters([
            'search' => ['translation.title'],
            'status' => 'status',
        ])->commonPaginate();

        return view('dashboard.notifications.index', compact('notifications'));
    }

    public function create()
    {
        $bankOptions = Bank::whereActivated()->translatedPluck('title', 'id');
        return view('dashboard.notifications.create', compact('bankOptions'));
    }

    public function store(StoreNotificationRequest $request)
    {

        $notification = SystemNotification::create($request->validated());

        return redirect()->route('dashboard.notifications.index')->with('success', __('dashboard.messages.success.created', ['resource' => $notification->title]));
    }

    public function show(SystemNotification $notification) {}

    public function edit(SystemNotification $notification)
    {
        $bankOptions = Bank::whereActivated()->translatedPluck('title', 'id');
        return view('dashboard.notifications.edit', compact('notification', 'bankOptions'));
    }

    public function update(UpdateNotificationRequest $request, SystemNotification $notification)
    {
        $data = $request->validated();

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            if (isset($data[$localeCode]['title'])) {
                $translation = $notification->translations()->where('locale', $localeCode)->first();
                if ($translation) {
                    $translation->title = $data[$localeCode]['title'];
                    $translation->save();
                }
            }

            if (isset($data[$localeCode]['description'])) {
                $translation = $notification->translations()->where('locale', $localeCode)->first();
                if ($translation) {
                    $translation->description = $data[$localeCode]['description'];
                    $translation->save();
                }
            }
        }

        $notification->update($request->except(['ar', 'en']));

        return redirect()->route('dashboard.notifications.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $notification->title]));
    }

    public function destroy(SystemNotification $notification)
    {
        $notification->delete();
        return redirect()->route('dashboard.notifications.index')->with('success', __('dashboard.messages.success.deleted', ['resource' => $notification->title]));
    }

    public function getBanknotifications(Request $request)
    {
        $bankId = $request->get('id');

        if (!$bankId) {
            return response()->json([]);
        }

        $notifications = SystemNotification::where('bank_id', $bankId)
            ->whereActivated()
            ->translatedPluck('title', 'id')
            ->toArray();

        $results = [];
        foreach ($notifications as $id => $title) {
            $results[] = ['id' => $id, 'text' => $title];
        }

        return response()->json($results);
    }
}
