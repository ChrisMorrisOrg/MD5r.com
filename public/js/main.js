 $(document).ready(function() {
    // Turn off caching
    $.ajaxSetup({cache:false});

    // If there's a text input available, focus on it.
    $("input:text").focus();

    // If there's a textarea available, focus on it.
    $("textarea").focus();


    $("textarea").keyup(function(){
        $.ajax({
            type: 'POST',
            url: 'http://md5r.com/ajax/hash.php',
            data: {
                string: $("textarea").val()
            },
            dataType: 'json',
            success: function(data) {
                $("#result").html(data.hash);
                $("#statistics").html(data.statistics);
            },
            error: function(data){
                // Post the form manually if something fails.
                $("#hash").submit();
            }
        });
    });
 });
