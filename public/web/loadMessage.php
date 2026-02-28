<?php
require __DIR__ . '/../config.php';
$getMessages = $db->query('SELECT * FROM messages');
while ($message = $getMessages->fetch()) {
    ?>
    <div id="message">
        <h4 id="pseudo"><?= $message['pseudo']; ?></h4>
        <p id="msg"><?= $message['msg']; ?></p>
    </div>
    <?php
}
?>