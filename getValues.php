<?php
echo "
<form action='update.php?table={$_GET["table_name"]}' method='post'>
    <span>UPDATE {$_GET['table_name']} SET</span>
    <input type='text' name='cols_vals' id='' style='width:100%' placeholder='Column=value' required>
    <label for='where' class='_where'>
        <input type='text' name='where' id='' placeholder='Condition'>
    </label>
    <button type='submit' name='Update'>Update</button>
</form>";
?>
