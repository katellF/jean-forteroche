<?php

class NotificationManager extends Manager
{

    public function getAllNotifications()
    {
        $db = $this->dbConnect();
        $notifications = $db->prepare('SELECT id, reason, content, comment_id, email, status, DATE_FORMAT(submission_date, \'%d/%m/%Y à %Hh%imin%ss\') AS notification_date_fr FROM notifications ORDER BY notification_date_fr DESC');
        $notifications->execute(array());

        return $notifications;
    }

    public function getNotificationByStatus($status)
    {
        $db = $this->dbConnect();
        $notifications = $db->prepare('SELECT id, reason, content, comment_id, email, status, DATE_FORMAT(submission_date, \'%d/%m/%Y à %Hh%imin%ss\') AS notification_date_fr FROM notifications WHERE status=:status ORDER BY notification_date_fr DESC');
        $notifications->execute(array('status' => $status));

        return $notifications;

    }

    public function insertNotification($commentId, $content, $notificationReason, $email)
    {
        $db = $this->dbConnect();
        $notifications = $db->prepare('INSERT INTO notifications(comment_id, reason, content, email, submission_date) VALUES(?,?, ?, ?, NOW())');
        $affectedLines = $notifications->execute(array($commentId, $content, $notificationReason, $email));

        return $affectedLines;
    }

    public function setStatus($notificationId, $status)
    {
        $db = $this->dbConnect();
        $updateStatus = $db->prepare('UPDATE notifications SET  status=:status WHERE id=:id ');
        $modifyStatus = $updateStatus->execute(array('id' => $notificationId, 'status' => $status));

        return $modifyStatus;
    }

    public function delete($notificationId)
    {
        $db = $this->dbConnect();
        $deleteNotification = $db->prepare('DELETE FROM notifications WHERE  id=:id ');

        return $deleteNotification->execute(array('id' => $notificationId));

    }

    public function getCountNotification($args)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT count(id) AS num_unreadNotifications FROM notifications WHERE status=:status');
        $req->execute(array('status' => $args['status']));
        $countNotifications = $req->fetch();

        return $countNotifications;
    }
}
