<div class="container">
    <form method="post" class="mt-5 pt-5">
        <div id="error"><?php echo $error; ?>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="" name="email">
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">mobile No:</label>
            <input type="text" class="form-control" id="" name="mobile">
        </div>
        <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
    </form>
</div>