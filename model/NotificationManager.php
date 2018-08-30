<?php

class NotificationManager extends Manager
{
    public function getNotifications($commentId)
    {
        $db = $this->dbConnect();
        $notifications = $db->prepare('SELECT id, notification_reason, content, email, DATE_FORMAT(notification_date, \'%d/%m/%Y à %Hh%imin%ss\') AS notification_date_fr FROM notifications WHERE notification_id = ? ORDER BY notification_date DESC');
        $notifications->execute(array($commentId));

        return $notifications;
    }

    public function postNotification($commentId, $content, $notificationReason)
    {
        $db = $this->dbConnect();
        $notifications = $db->prepare('INSERT INTO reporting(comment_id, notification_reason, content, email, notification_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $notifications->execute(array($commentId, $content, $notificationReason));

        return $affectedLines;
    }

}
