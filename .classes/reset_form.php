<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-md-6">
            <form id="resetForm" action="Reset.php?email=<?php echo $_GET['email']?>&code=<?php echo $_GET['code']?>"
                class="p-4 my-3 bg-white text-black text-center border needs-validation" novalidate
                style="border-radius:12px;" method="post">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Ο κωδικός πρέπει να περιέχει τουλάχιστον έναν αριθμό, έναν κεφαλαίο χαρακτήρα, έναν μικρό χαρακτήρα, και να είναι 8 οι περισσότερα γράμματα μεγάλος."
                            placeholder="Κωδικός πρόσβασης" id="pwd" required>
                        <input type="password" name="confirmPassword" class="form-control"
                            title="Must match password" placeholder="Επιβεβαίωση κωδικού" id="rpwd" required>
                        <div class="invalid-feedback">Πρέπει να περιέχει τουλάχιστον έναν αριθμό, εναν κεφαλαίο
                            και εναν μικρό χαρακτήρα. Ο κωδικός πρέπει να περιέχει τουλάχιστον 8 ή
                            περισσότερους χαρακτήρες.
                        </div>
                        <div id="pass-invalid-feedback" class="invalid-feedback">Οι κωδικοί πρόσβασης δεν
                            ταιριάζουν.</div>
                    </div>
                </div>
                </br>
                <?php
                    password_attempt_status();
                ?>
                </br>
                <button type="submit" name="submit" class="btn btn-lg btn-green btn-block">ΑΠΟΣΤΟΛΗ</button><br />
            </form>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>