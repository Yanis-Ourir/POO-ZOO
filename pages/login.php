<?php
require_once '../utils/connexion_db.php';

include_once '../partials/header.php';
?>

<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Create Employee</h4>

        <form action="../process/register.php" method="post">
            <div class="form-group">
                <label for="pseudo">Pseudo : </label>
                <input name="pseudo" class="form-control" placeholder="Enter pseudo" type="text">
            </div>

            <div class="form-group">
                <label for="age">Age : </label>
                <input name="age" class="form-control" placeholder="20" type="number">
            </div>

            <div class="form-group">
                <label for="gender">Gender : </label>
                <select class="form-select" name="gender" style="max-width: 120px;">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </div>

        </form>
    </article>
</div>

</div>

<?php include_once '../partials/footer.php'; ?>

