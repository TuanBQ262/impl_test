<div class="dashboard">
    <h2>Repos Save List</h2>
    <?php if (!$repos) : ?>
        <p>Nodata</p>
    <?php elseif ($repos != null): ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">OWNER</th>
                <th scope="col">NAME</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            foreach ($repos as $item):
                ?>
                <tr>
                    <th scope="row"><?php echo $count += 1; ?></th>
                    <td><?php echo $item->owner ?></td>
                    <td><?php echo $item->repos_name ?></td>
                    <th><a>FORK</a></th>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>



