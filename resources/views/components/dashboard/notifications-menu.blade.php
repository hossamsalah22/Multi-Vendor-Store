<a class="nav-link" data-toggle="dropdown" href="#">
    <i class="far fa-bell"></i>
    @if($count)
        <span class="badge badge-warning navbar-badge">{{$count}}</span>
    @endif
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <span class="dropdown-header">{{$count}} Notifications</span>
    <div class="dropdown-divider"></div>
    @foreach($notifications as $notification)
        <a href="{{ $notification->data['action_url'] }}?notification_id={{$notification->id}}"
           class="dropdown-item {{ $notification->read() ? "" : "text-bold" }}">
            <i class="{{$notification->read() ? "fas fa-envelope-open" : $notification->data['icon'] }} mr-2"></i> {{$notification->data['body']}}
            <span
                class="float-right text-muted text-sm">{{$notification->created_at->shortAbsoluteDiffForHumans()}}</span>
        </a>
    @endforeach
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
</div>
