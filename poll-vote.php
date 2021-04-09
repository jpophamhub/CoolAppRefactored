<?php
require 'config.php';

// Connect to MySQL
$pdo = pdo_connect_mysql();
$msg = '';

//If the GET request "id" exists (poll id)...
if (isset($_GET['id'])) {
    //MySQL query that selects the poll records by the GET request "id"
    $stmt = $pdo->prepare('SELECT * FROM polls WHERE id = ?');
    $stmt->execute([$_GET['id']]);

    //fetch the record
    $poll = $stmt->fetch(PDO::FETCH_ASSOC);

    //Check if the poll record exists with the id specified

    if($poll){
        //MySQL query that selects the poll answers
        $stmt = $pdo->prepare('SELECT * FROM poll_answers WHERE poll_id = ?');
        $stmt->execute([$_GET['id']]);
        //Fetch all the answers
        $poll_answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //If the user clicked the vote button
        if(isset($_POST['poll_answer'])) {
            //update the vote answer by 1
            $stmt = $pdo->prepare('UPDATE poll_answers SET votes = votes + 1 where id = ?');
            $stmt->execute([$_POST['poll_answer']]);
            header('Location: poll-result.php?id=' . $_GET['id']);
            exit;
        }
    }else {
        redirect('polls.php', 'Poll with that ID does not exist.', 'danger');
    }
}else{
    redirect('polls.php', 'No ID Specified', 'danger');
}


?>

<?= template_header('Poll Vote') ?>
<?= template_nav() ?>

    <!-- START PAGE CONTENT -->
    <h1 class="title"><?= $poll['title'] ?></h1>
    <h2 class="subtitle"><?= $poll['desc'] ?></h2>
    <div class="section">
        <form action="poll-vote.php?id=<?= $_GET['id'] ?>" method="post">
            <div class="field">
                <div class="control">
                    <?php for ($i = 0; $i < count($poll_answers); $i++) : ?>
                        <label class="radio">
                            <input type="radio" name="poll_answer" value="<?= $poll_answers[$i]['id'] ?>" <?= $i == 0 ? ' checked' : '' ?>>
                            <?=$poll_answers[$i]['title']?>
                    </label>
                <?php endfor; ?>
                </div>
            </div>
            <div class="field">
                <div class= "control">
                    <button class= "button" value="Vote" type="submit">Vote</button>
                </div>
            </div>
        </form>
    </div>



    <!-- END PAGE CONTENT -->

<?= template_footer() ?>
