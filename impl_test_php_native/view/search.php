<div class="dashboard">
    <h2>Search</h2>
    <?php if (!$data) : ?>
        <p>Nodata</p>
    <?php elseif ($data != null): ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">NAME</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
            $count = 0;
            foreach ($data as $item):
        ?>
        <tr>
            <th scope="row"><?php echo $count += 1; ?></th>
            <td><?php echo $item->name ?> | <?php echo $item->stargazers_count ?> stargazers</td>
            <?php
                $is_clone = $this->model->get_a_record("select * from repos_clone where repos_name= '".$item->name."' and owner='".$search_key."'");
            ?>

            <?php if ($is_clone == null): ?>
            <td><a type="button" href="/controller/clone_repos.php?owner=<?php echo $search_key?>&repos_name=<?php echo $item->name ?>" class="btn btn-success">Clone</a></td>
            <?php else: ?>
            <td><a type="button" style="cursor: default;" class="btn btn-warning">Saved</a></td>
            <?php endif; ?>
        </tr>
        <?php
            endforeach;
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th>Hiển thị <?php echo $per_page ?>/ <?php echo $numberRepos?> Repos </th>
            <?php if($per_page != $numberRepos) : ?>
            <th colspan="2"><a href="index.php?controller=search&search_key=<?php echo $search_key?>&per_page=<?php echo $per_page_next ?>">ViewMore</a></th>
            <?php else: ?>
            <th colspan="2"></th>
            <?php endif; ?>
        </tr>
        </tfoot>
    </table>
    <?php endif; ?>
</div>



