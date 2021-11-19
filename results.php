<?php include 'includes/header.php'; ;?>
<?php include 'includes/nav.php'; ;?>
    
    <div class="title">
        <img src="images/logo.jpg" class="img-thumbnail" height="500px" width="300px" alt="School Logo">
        <span> <h1>KAPTEMBWO STUDENT GRADING MANAGEMENT SYSTEM </h1></span>
    </div>

    <div class="main">
            <form action="./student.php" method="get">
                <fieldset>
                    <legend style="color: red; font-size: 18px">Provide Correct Details To View Results!</legend>

                    <?php
                        include('init.php');

                        $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                            echo '<select name="class">';
                            echo '<option selected disabled>--Select Class--</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>

                    <input type="text" name="rn" placeholder="Roll Number" style="width: 600px; height: 100px; background-color: lightblue">
                        <input type="submit" value="Get Result">
                </fieldset>
            </form>
        </div>
    </div>
   

<?php include 'includes/footer.php'; ;?>
