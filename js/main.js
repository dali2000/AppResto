$(function(){

    function onChangeReveal ()
    {
        // if ($("#reveal").prop('checked')) {
        if ($("#chek").is(':checked')) {
            $("#pwde").attr('type', 'text');
        } else {
            $("#pwde").attr('type', 'password');
        }
    }


    $("#chek").on('change', onChangeReveal);
});
