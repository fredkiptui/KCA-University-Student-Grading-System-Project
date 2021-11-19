<?php include 'includes/header.php';?>
<?php include 'includes/nav.php'; ?>
<?php include 'includes/intro.php'; ?>  
    <?php
        include("init.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        <!-- <div class="details">
            <span>Name:</span> <?php echo $name ?> <br>
            <span>Class:</span> <?php echo $class; ?> <br>
            <span>Roll No:</span> <?php echo $rn; ?> <br>
        </div>

        <div class="main">
            <div class="s1">
                <p>Subjects</p>
                <p>Paper 1</p>
                <p>Paper 2</p>
                <p>Paper 3</p>
                <p>Paper 4</p>
                <p>Paper 5</p>
            </div>
            <div class="s2">
                <p>Marks</p>
                <?php echo '<p>'.$p1.'</p>';?>
                <?php echo '<p>'.$p2.'</p>';?>
                <?php echo '<p>'.$p3.'</p>';?>
                <?php echo '<p>'.$p4.'</p>';?>
                <?php echo '<p>'.$p5.'</p>';?>
            </div>
        </div>

        <div class="result">
            <?php echo '<p>Total Marks:&nbsp'.$mark.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$percentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div> -->


        <div class="main2">
            <table>
                <thead>
                  <tr>
                    <td> S.N </td>
                    <td colspan="10">Subjects </td>
                    <td rowspan="2"> Obtained Marks </td>
                  </tr>   
                </thead>
                <tbody>
                  <tr>
                    <td> 1 </td>
                    <td colspan="10">Maths </td>
                    <td> <?php echo '<p>'.$p1.' / 100</p>';?> </td>
                  </tr>
                
                  <tr>
                    <td> 2 </td>
                    <td colspan="10">English </td>
                    <td> <?php echo '<p>'.$p2.' / 100</p>';?></td>
                  </tr>
            
                  <tr>
                    <td> 3 </td>
                    <td colspan="10">Kiswahili </td>
                    <td> <?php echo '<p>'.$p3.' / 100</p>';?> </td>
                  </tr>
            
                  <tr>
                    <td> 4 </td>
                    <td colspan="10">Science </td>
                    <td> <?php echo '<p>'.$p4.' / 100</p>';?> </td>
                  </tr>
            
                  <tr>
                    <td> 5 </td>
                    <td colspan="10">Social Studies </td>
                    <td> <?php echo '<p>'.$p5.' / 100</p>';?> </td>
                  </tr>
                </tbody>
            
                
                <tfoot>
                    
                    <tr>
                    <td>#</td>
                    <td colspan="10" class="footer">Total Marks Obtained</td>
                    <td colspan="2"> <?php echo $mark;?> / 500 </td>
                    </tr>
                    
                    <tr>
                    <td colspan="10" class="footer">Percentage</td>
                    <td colspan="2"><?php echo $percentage;?>% </td>
                    </tr>

                    <tr>
                        <td colspan="10" class="footer">Student's Name</td>
                        <td colspan="2"><?php echo $name;?> </td>
                        </tr>

                    <tr>
                        <td colspan="10" class="footer">Class</td>
                        <td colspan="2"><?php echo $class;?> </td>
                        </tr>
                
                        <tr>
                        <td colspan="10" class="footer">Roll</td>
                        <td colspan="2"><?php echo $rn;?> </td>
                        </tr>
                </tfoot>
              </table>

              <div class="row">
                  <div class="container">
                  <div class="button">
                    <button class="button" onclick="window.print()">Print Result</button>
        </div>
                  </div>
              </div>
        </div>
    </div>
<?php include 'includes/footer.php';?>
