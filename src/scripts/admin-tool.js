$('#page h1, #page h2, #page h3, #page h4, #page h5, #page h6, #page p').hover(function () {
    $(this).append('<span class="displaytag">&lt;' + $(this).prop("tagName") + '&gt;</span>');
    $(this).css({
        'position': 'relative'
    }).addClass('displaytag-parent');
}, function () {
    $(this).find('.displaytag').remove();
    $(this).removeClass('displaytag-parent')
});

function getACount(tag) {
    if (document.getElementsByTagName(tag).length) {
        return $('#resultadmin').append('<li class="countag list-group-item list-group-item-action"><span>&lt;' + tag + '&gt;</span> ' + document.getElementsByTagName(tag).length + ' count</li>')
    } else {
        return $('#resultadmin').append('<li class="countag list-group-item list-group-item-action error">&lt;' + tag + '&gt;: No result</li>')
    }
}
function countIMGNoAlt() {
    var images = document.getElementsByTagName('img');
    var numImages = images.length;
    var urlcount = '';
    for (let i = 0; i < numImages; i++) {
        if(images[i].alt == '' || images[i].alt == undefined) {
            urlcount += '<p class="mb-0 small"><a href="' +images[i].src + '" target="_blank">' +images[i].src + '</a></p>';
        }
    }
    $('#resultadmin').append('<li class="countag list-group-item list-group-item-action error">IMG without ALT tag:<div>'+urlcount+'</div></li>')
}

function calljqueruUI() {
    var st = document.createElement("link");
    st.type = 'text/css';
    st.rel = 'stylesheet';
    st.href = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css";
    $("body").append(st);
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js";
    $("body").append(s);
}

$(document).ready(function () {
    calljqueruUI()
    $('.admintoolbar').append('<a href="javascript:void(0);" id="toggleadmintool">Admin Tool</a>')
    $('#toggleadmintool').on('click', function () {
        $('#toggleadmintool').toggleClass('active')
        $('#resultadmin').toggleClass('active')
        $( "#resultadmin" ).draggable({ handle:'#resultadminheader'});
    })
    $('#page').append('<ul id="resultadmin" class="list-group m-3"><li class="list-group-item-action list-group-item active" id="resultadminheader">Results</li></ul>')
    if ($('#resultadmin').length) {
        getACount('h1')
        getACount('h2')
        getACount('h3')
        getACount('h4')
        getACount('h5')
        getACount('h6')
        getACount('a')
        getACount('img')
        countIMGNoAlt()
    }
});



// TODO: working on this 