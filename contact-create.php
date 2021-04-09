<?php
require 'config.php';

//Connect to MySQL
$pdo = pdo_connect_mysql();
$msg = "";

//Check if POST data is not empty
if(!empty($_POST)) {
    //check to see if the data from the form is set
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');

    $contact_id = $pdo->lastInsertId();
    //insert the new contact into the contacts table
    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (NULL, ?, ?, ?, ?, ?)');
    $stmt->execute([$name, $email, $phone, $title, date('Y-m-d H:i:s')]);

    

    redirect('contacts.php', 'Contact created successfully!', 'right');
}

?>

<?= template_header('Create Contact') ?>
<?= template_nav() ?>

    <!-- START PAGE CONTENT -->
    <h1 class="title">Create Contact</h1>
    <!-- message sent confirmation goes here -->
    <?php if ($msg) : ?>
    <div class="notification is-success">   
        <h2 class ="title is-2"><?php echo $msg; ?></h2>
    </div>    <!-- END PAGE CONTENT -->
<?php endif; ?>

<form action="" method="post">
        <div class="field">
            <label class="label">Name</label>
                <div class="control">
                    <input class="input" type = "text" name="name" placeholder="Name">
                </div>
        </div>
        <div class="field">
            <label class="label">E-mail</label>
                <div class="control">
                    <input class="input" type = "text" name="email" placeholder="E-mail">
                </div>
        </div>
        <div class="field">
            <label class="label">Phone</label>
                <div class="control">
                    <input class="input" type = "text" name="phone" placeholder="Phone">
                </div>
        </div>
        <div class="field">
            <label class="label">Title</label>
                <div class="control">
                    <input class="input" type = "text" name="title" placeholder="Title">
                </div>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-link">Submit</button>
            </div>
        </div>
</form>
    
    <!-- END PAGE CONTENT -->

<?= template_footer() ?>
