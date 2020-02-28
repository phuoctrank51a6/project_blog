<?php
function showError($error,$name){
    if($errors->has($name))
    return '
    <div class="alert alert-danger">
        <strong>'.$errors->first($name) .'</strong>
    </div>
    ';
}