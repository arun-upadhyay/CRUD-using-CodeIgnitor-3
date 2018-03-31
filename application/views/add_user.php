<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Add new record</h2>

            <span class="text-danger"><?= validation_errors() ?></span>


            <form name= "userinput" method="post" action="<?= !isset($user->id) ? base_url() . "usercontroller/save_data" : base_url() . "usercontroller/edit_data" ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name ="name" value ="<?= isset($user->id) ? $user->name : "" ?>">
                    <span class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value ="<?= isset($user->id) ? $user->address : "" ?>">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="phoneno">Phone number:</label>
                    <input type="text" class="form-control" id="phoneno" name="phoneno" value ="<?= isset($user->id) ? $user->phoneno : "" ?>">
                    <span class="text-danger"></span>
                </div>
                <input type="hidden" class="form-control" id="id" name="id"  value ="<?= isset($user->id) ? $user->id : "" ?>">
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <?php if (!isset($user->id)) { ?>
                <h2>Database records</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user->name; ?></td>
                                <td><?php echo $user->address; ?></td>
                                <td><?php echo $user->phoneno; ?></td>
                                <td><a href="<?php echo base_url() . "UserController/fill_data/$user->id"; ?>">Edit</a></td>
                                <td><a href="<?php echo base_url() . "UserController/delete_data/$user->id"; ?>">Delete</a></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>

    </body>
</html>
