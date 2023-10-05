import './bootstrap';

var channel = Echo.private(`App.Models.User.${userId}`);
channel.notification(function (data) {
    console.log(data);
    alert(data.body);
});
