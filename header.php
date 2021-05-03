<header>
    <nav>
        <ul class="menu">
            <li class="logo"><a href="HomePage.php">Healthy Living</a></li>
            <li class="item"><a href="HomePage.php">Αρχική</a></li>
            <li class="item"><a href="Sport.php">Άθληση</a></li>
            <li class="item"><a href="Diet.php">Διατροφή</a></li>
            <li class="item"><a href="Calculators.php">Μετρητές υγείας</a></li>

            <?php
                if(isset($logged) && $logged) {
                    echo "
                    <li class='item button'><a href='#'>Γεία σου $user</a></li>
                    <li class='item button'><a href='profile.php'>Προφίλ</a></li>
                    <li class='item button secondary'><a href='logout.php'>Αποσύνδεση</a></li>
                    ";
                } else {
                    echo "
                    <li class='item button'><a href='Login.php'>Log In</a></li>
                    <li class='item button secondary'><a href='Register.php'>Sign Up</a></li>
                    ";
                }

            ?>
            <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
        </ul>
    </nav>
</header>