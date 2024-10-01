<?php include './header.php' ; ?>
<div class="card mt-4">
    <div class="card-header">Create a Profile Book</div>
    <div class="card-body">
    <form method="GET" autocomplete="on">
        <div class="container">
            <!-- NAME -->
            <div class="row mb-3">
                <div class="col">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <div class= "error"><?php if (isset($error_name)) echo $error_name;?></div>
                </div>
            </div>

            <!-- NICKNAME -->
            <div class="row mb-3">
                <div class="col">
                    <label for="nickname">Nickname:</label>
                    <input type="text" class="form-control" id="nickname" name="nickname">
                    <div class= "error"><?php if (isset($error_nickname)) echo $error_nickname;?></div>
                </div>
            </div>

            <!-- ADDRESS -->
            <div class="row mb-3">
                <div class="col">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address"></textarea>
                    
                </div>
            </div>

            <!-- PHONE NUMBER -->
            <div class="row mb-3">
                <div class="col">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" oninput="validatePhoneNumber(this.value)">
                    <div id="message_phone_number"></div>
                </div>
            </div>

            <!-- BLOOD TYPE ID -->
            <div class="row mb-3">
                <div class="col">
                    <label for="blood_type_id">Blood Type:</label>
                    <select name="blood_type_id" id="blood_type_id" class="form-select" onfocus="hidrateBloodTypes()" required>
                    </select>
                </div>
            </div>

            <!-- HOBBY ID -->
            <div class="row mb-3">
                <div class="col">
                    <label for="hobby_id">Hobby:</label>
                    <select name="hobby_id" id="hobby_id" class="form-select" onfocus="hidrateHobbies()" required>
                    </select>
                </div>
            </div>

            <!-- BEST THREE -->
            <div class="row mb-3">
                <div class="col">
                    <label>Best 3:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">1.</span>
                        </div>
                        <input name="best_three_1" id="best_three_1" class="form-control" required>
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">2.</span>
                        </div>
                        <input name="best_three_2" id="best_three_2" class="form-control">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">3.</span>
                        </div>
                        <input name="best_three_3" id="best_three_3" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row mb-3">
                <div class="col ">
                    <button name="submit" type="button" class="btn btn-primary w-100" onclick="addProfileBook()">Create Profile Book</button>
                </div>
            </div>

            <!-- Response Container -->
            <div class="row mb-3">
                <div class="col">
                    <div id="message_id"></div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>

<?php include './footer.php'; ?>

