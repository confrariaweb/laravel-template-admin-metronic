@notifications(['notifications' => $user->notifications])
@slot('title')
    {{ trans('meridien.notifications.from', ['name' => $user->name]) }}
@endslot

Notificações Da Pessoa
@endnotifications

