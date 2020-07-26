<div class="dashboard">
    <h2>Dashboard</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Value</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td><?php echo $data->id ?></td>
        </tr>
        <tr>
            <th scope="row">Username</th>
            <td><?php echo $data->login ?></td>
        </tr>
        <tr>
            <th scope="row">Avatar</th>
            <td> <img width="50" src="<?php echo $data->avatar_url ?>"> </td>
        </tr>
        <tr>
            <th scope="row">Public repos</th>
            <td> <?php echo $data->public_repos ?> </td>
        </tr>
        <tr>
            <th scope="row">Public gists</th>
            <td> <?php echo $data->public_gists ?> </td>
        </tr>
        <tr>
            <th scope="row">Following</th>
            <td> <?php echo $data->following ?> </td>
        </tr>
        </tbody>
    </table>
</div>


