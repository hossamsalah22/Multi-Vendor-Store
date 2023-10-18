<a class="nav-link" data-toggle="dropdown" href="#">
    <i class="far fa-bell"></i>
    @if($count)
        <span id="notification-count" class="badge badge-warning navbar-badge">{{$count}}</span>
    @endif
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}">
    <span id="notification-count-dropdown" class="dropdown-header">{{$count}} {{ __("Notifications") }}</span>
    <div class="dropdown-divider"></div>
    <div id="notification-list">
        @foreach($notifications as $notification)
            <a href="{{ $notification->data['action_url'] }}?notification_id={{$notification->id}}"
               class="dropdown-item {{ $notification->read() ? "" : "text-bold" }}">
                <i class="{{$notification->read() ? "fas fa-envelope-open" : $notification->data['icon'] }} mr-2"></i> {{$notification->data['body']}}
                <span
                    class="float-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} text-muted text-sm">{{$notification->created_at->shortAbsoluteDiffForHumans()}}</span>
            </a>
        @endforeach
    </div>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item dropdown-footer">{{ __("See All Notifications") }}</a>
</div>
