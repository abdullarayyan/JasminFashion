window.addEventListener('DOMContentLoaded', (event) => {
    if (window.innerWidth >= 768) {
        document.body.className += ' menu-open';
    }
});
const toggleNav = () => {
    if (document.body.className.includes('menu-open')) {
        document.body.className = document.body.className.replace('menu-open', '').replace(/\s+/g, " ");
    } else {
        document.body.className += ' menu-open';
    }
}

const toggleTooltip = () => {
    if (document.body.className.includes('show-tooltip')) {
        document.body.className = document.body.className.replace('show-tooltip', '').replace(/\s+/g,
            " ");
    } else {
        document.body.className += ' show-tooltip';
    }
}

Echo.channel('private-yatem-added')
    .listen('NewYatemAdded', (data) => {
        console.log(data);
        $('header .bx-bell').removeClass('hide_new');
    });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ajaxStart(function () {
    showLoading();
});

$(document).ajaxComplete(function () {
    hideLoading();
});

function showSpinner() {
    document.querySelector('#loading').classList.add('loading');
    document.querySelector('#loading-content').classList.add('loading-content');
}


$(document).ready(()=>{
    $('.hidden_file_input').change(function (e) {
        let filename = e.target.files[0].name
        $('.filename').text(filename)

    });
})
