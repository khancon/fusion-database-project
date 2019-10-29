<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from Listener where full_name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchFullName'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($username, $password, $full_name);
                echo "<table border=1><th>Username</th><th>Name</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$username</td><td>$full_name</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>