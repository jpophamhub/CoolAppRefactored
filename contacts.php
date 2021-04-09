<?php
require 'config.php';
// Connect to MySQL
$pdo = pdo_connect_mysql();

//query that selects all the polls from our database
$stmt = $pdo->query('SELECT * FROM contacts');
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?= template_header('Contacts') ?>
<?= template_nav() ?>

<?php
if (isset($_GET['type'])) {
    $_GET['type'] = 'right' ? (right($_GET['msg'])) : (danger($_GET['msg']));
}
?>

    <!-- START PAGE CONTENT -->
    <h1 class="title">Contacts</h1>
    <p>Welcome, view our contacts below.</p>
    
    <a href="contact-create.php" class="button is-primary is-small">
        <span class="icon"><i class ="fas fa-plus-square"></i></span> 
        <span>Create Contact</span>
    </a>
    <p>&nbsp;</p>
    <div class="container">
        <table class="table is-bordered is-hoverable">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Title</td>
                <td>Created</td>
            </tr>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td>
                    <?= $contact['id'] ?>
                </td>
                <td>
                    <?= $contact['name'] ?>
                </td>
                <td>
                    <?= $contact['email'] ?>
                </td>
                <td>
                    <?= $contact['phone'] ?>
                </td>
                <td>
                    <?= $contact['title'] ?>
                </td>
                <td>
                    <?= $contact['created'] ?>
                </td>
                <td>
                    <a href="contact-update.php?id=<?= $contact['id']?>" class="button is-link is-small" title="View Contact">
                        <span class="icon"><i class="fas fa-eye"></i></span>
                    </a>
                    <a href="contact-delete.php?id=<?= $contact['id']?>" class="button is-link is-small">
                        <span class="icon"><i class="fas fa-trash-alt"></i></span>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </thead>
        </table>
    
    </div>
    <!-- END PAGE CONTENT -->

<?= template_footer() ?>
