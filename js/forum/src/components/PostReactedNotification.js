import Notification from 'flarum/components/Notification';
import username from 'flarum/helpers/username';
import punctuateSeries from 'flarum/helpers/punctuateSeries';

export default class PostReactedNotification extends Notification {
  icon() {
    return 'smile-o';
  }

  href() {
    return app.route.post(this.props.notification.subject());
  }

  content() {
    const notification = this.props.notification;
    const user = notification.sender();

    return `${username(user).children} reacted to your post`;
  }

  excerpt() {
    return this.props.notification.subject().contentPlain();
  }
}
