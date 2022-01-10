$('#mySidepanel').hide();

$(Document).ready(function(){
    $('#mySidepanel').hide();
    $('#openbtn1').click(function(){
        $('#mySidepanel').show();

        
    });



    $('#recentNotice').show();
    $('#managePost').hide();
    $('#postNotice').show();
    $('#manageStudent').hide();
    
    $('#dashSB').click(function(){
        $('#recentNotice').show();
        $('#managePost').show();
        $('#postNotice').show();
        $('#manageStudent').show();
    });
    $('#manageSB').click(function(){
        $('#recentNotice').hide();
        $('#managePost').show();
        $('#postNotice').hide();
        $('#manageStudent').show();
    });
})