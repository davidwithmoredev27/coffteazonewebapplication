<?php require("template/session.php"); ?>
<!DOCTYPE html>
<html>
<?php require("template/head.php"); ?>
<body>
    <?php require("template/header.php"); ?>
    <main>
        <!-- Main -->
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <div>
                    <!-- Subscribers' List -->
                    <table>
                        <thead>
                            <tr>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query="SELECT* from tbl_mailing";
                            require("template/feedbacktable.php");
                            showemails($query);
                            ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <!-- Composer -->
                   <form action="" method="post">
                       <div>
                           <textarea name="" id=""></textarea>
                       </div>
                       <button type="submit">Send</button>
                   </form>         
                </div>
            </div>
        </div>
    </main>
    <?php require("template/footer.php"); ?>
    <!-- Initialize Quill editor -->
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.5/quill.js"></script>
    <script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
    </script>
</body>
</html>