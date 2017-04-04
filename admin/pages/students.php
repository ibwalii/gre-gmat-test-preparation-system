<!--Body Starts Here-->
        <div class="main">
            <div class="content">
                <div class="report">
                    <h2>Student Manager</h2>
                    
                    <a href="<?php echo SITEURL; ?>admin/index.php?page=add_student"><button type="button" class="btn-add">Add Student</button></a>
                    <?php
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if(isset($_SESSION['update']))
                        {
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }
                    ?>
                    <table>
                        <tr>
                            <th>S.N.</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Faculty</th>
                            <th>Is Active?</th>
                            <th>Actions</th>
                        </tr>
                    <!--Displaying All Data From Database-->
                    <?php 
                        $tbl_name="tbl_student ORDER BY student_id DESC";
                        $query=$obj->select_data($tbl_name);
                        $sn=1;
                        $res=$obj->execute_query($conn,$query);
                        $count_rows=$obj->num_rows($res);
                        if($count_rows>0)
                        {
                            while($row=$obj->fetch_data($res))
                            {
                                $student_id=$row['student_id'];
                                $first_name=$row['first_name'];
                                $last_name=$row['last_name'];
                                $full_name=$first_name.' '.$last_name;
                                $email=$row['email'];
                                $contact=$row['contact'];
                                $faculty=$row['faculty'];
                                $is_active=$row['is_active'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?> </td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $contact; ?></td>
                                    <td><?php echo $faculty; ?></td>
                                    <td><?php echo $is_active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/index.php?page=update_student&student_id=<?php echo $student_id; ?>"><button type="button" class="btn-update">UPDATE</button></a> 
                                        <a href="#"><button type="button" class="btn-delete">DELETE</button></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='7'><div class='error'>No Students Added Yet.</div></tr></td>";
                        }
                    ?>
                        
                    </table>
                </div>
            </div>
        </div>
        <!--Body Ends Here-->