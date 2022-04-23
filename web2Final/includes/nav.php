<div id="spacer">
    <?php
    if(isset($_SESSION['users']) && $_SESSION['users']){
        echo '<div id="logInfo">Welcome ' . $_SESSION['users']['email'] .
            ' (<a href="index.php?logout"> Logout </a>)</div>';
    }else{
        echo '<div id="login"><a href="index.php">Login</a></div>';
    }
    ?>
</div>
<header>
    <div id="logo"></div>
    <nav><ul>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="availability.php">Availability</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="timeoff.php">Time Off</a></li>
            <li><a href="editedpunches.php">Edited Punches</a></li>
        </ul></nav>
</header>