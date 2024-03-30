<?php
while($row = mysqli_fetch_array($res))
{
    $q_code=$row["q_code"];
    $question = $row["question"];
    $optionA = $row["optionA"];
    $optionB = $row["optionB"];
    $optionC = $row["optionC"];
    $optionD = $row["optionD"];
    $weight = $row["weight"];

}
?>
        <label for="question"><b>Question: <?php echo $q_code; ?></b></label>
        <textarea id="question" name="question" rows="4"  value= "" disabled><?php echo $question; ?></textarea>
        <br/>

        <label for="optionA">A:</label>
        <input type="radio" name="option" value="<?php echo $optionA; ?>" 
        onclick="radioclick(this.value,'<?php echo $q_code; ?>')"
        <?php
        if($ans==$optionA)
        {
            echo "checked";
        }
        ?>
        ><?php echo $optionA; ?>
        <br/>
        <label for="optionB">B:</label>
        <input type="radio" name="option" value="<?php echo $optionB; ?>"
        onclick="radioclick(this.value,'<?php echo $q_code; ?>')"
        <?php
        if($ans==$optionB)
        {
            echo "checked";
        }
        ?>
        ><?php echo $optionB; ?>
        <br/>
        <label for="optionC">C:</label>
        <input type="radio" name="option" value="<?php echo $optionC; ?>"
        onclick="radioclick(this.value,'<?php echo $q_code; ?>')"
        <?php
        if($ans==$optionC)
        {
            echo "checked";
        }
        ?>
        ><?php echo $optionC; ?>
        <br/>
        <label for="optionD">D:</label>
        <input type="radio" name="option" value="<?php echo $optionD; ?>"
        onclick="radioclick(this.value,'<?php echo $q_code; ?>')"
        <?php
        if($ans==$optionD)
        {
            echo "checked";
        }
        ?>
        ><?php echo $optionD; ?>

