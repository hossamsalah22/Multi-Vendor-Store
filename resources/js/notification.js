import './bootstrap';

var channel = Echo.private(`App.Models.User.${userId}`);

function updateNotificationCount(newCount) {
    var notificationCountElement = document.getElementById('notification-count');
    var notificationCountDropdownElement = document.getElementById('notification-count-dropdown');

    if (notificationCountElement && notificationCountDropdownElement) {
        notificationCountElement.textContent = newCount;
        notificationCountDropdownElement.textContent = newCount + ' Notifications';
    }
}

function appendNotification(data) {
    var notificationList = document.getElementById('notification-list');
    if (notificationList) {
        // Create a new notification item
        var notificationItem = document.createElement('a');
        notificationItem.href = data.action_url + '?notification_id=' + data.id;
        notificationItem.className = 'dropdown-item ' + (data.read ? '' : 'text-bold');

        // Build the HTML content for the notification item
        notificationItem.innerHTML = `
            <i class="${data.read ? 'fas fa-envelope-open' : data.icon} mr-2"></i>
            ${data.body}
            <span class="float-right text-muted text-sm">1s</span>
        `;

        // Add the new notification to the top of the list
        notificationList.insertBefore(notificationItem, notificationList.firstChild);
    }
}

channel.notification(function (data) {
    var currentCount = parseInt(document.getElementById('notification-count').textContent);
    updateNotificationCount(currentCount + 1);
    appendNotification(data);
});
