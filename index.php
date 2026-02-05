<?php
require "db.php";
$staffname_stmt = $pdo->query("SELECT * FROM staff_name ORDER BY staff_id DESC");
$staffname_result = $staffname_stmt->fetchAll(PDO::FETCH_ASSOC);

$jobrolename_stmt = $pdo->query("SELECT * FROM jobroles ORDER BY id DESC");
$jobrolename_result = $jobrolename_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-4">
    <h2 class="mb-3">Users List</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <?php /*print_r($staffname_result); die;*/ if (!empty($staffname_result)): ?>
                        <?php foreach($staffname_result['staffname'] as $col): ?>
                            <th><?php echo htmlspecialchars($col); ?></th>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach($jobrolename_result['jobrole_name'] as $row): ?>
                    <tr>
                        <?php foreach($row as $value): ?>
                            <td><?php echo htmlspecialchars($value); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
?>
