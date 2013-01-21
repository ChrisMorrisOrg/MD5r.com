alert("main loaded");
if(jQuery){
    alert("jQuery loaded.");
}

$(document).ready(function(){
    # If there's a text input available, focus on it.
    $("input:text").focus();
});
