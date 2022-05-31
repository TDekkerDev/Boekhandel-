<?php
?>
<div class="Chatbox-group">
        <div class="chatboxUser">
            <div class="chatboxForm">
                <?php
            if (isset($_SESSION['chatboxid'])) { ?>
            <form method="post" action="/php/ChatBox/UserChatBox.php">
                    <input type="submit" name="chatboxUserVerstuur" value="Verstuur">
            </form>
            <?php }else{ ?>
                <form method="post" action="/php/ChatBox/UserChatBoxsetup.php">
                    <br><br>
                    <input type="text" name="chatboxUserNaam" placeholder="Naam">
                    <br><br>
                    <input type="text" name="chatboxUserEmail" placeholder="Email">
                    <br><br>
                    <input type="text" name="chatboxUserTelefoon" placeholder="Telefoon">
                    <br><br>
                    <input type="submit" name="chatboxUserVerstuur" value="Verstuur">
                </form>
            <?php } ?>
            </div>
        </div>
        <div class="chatboxAdmin">
            <div class="chatboxForm">
                <form method="post" action="/php/ChatBox/AdminLogin.php">
                    <br><br><br>
                    <input type="text" name="uname" placeholder="Email">
                    <br><br>
                    <input type="password" name="password" placeholder="password">
                    <br><br>
                    <input type="submit" name="chatboxAdminVerstuur" value="Verstuur">
                </form>
            </div>
        </div>
</div>