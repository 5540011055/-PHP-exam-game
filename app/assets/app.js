startGame(document.getElementById("txt_game").textContent);

function startGame(num_game) {
    var param = {
        game: num_game
    }
    var request = new XMLHttpRequest();
    var sendparam = convertParam(param);
    var url = base_url + 'index/start_game';
    request.open('POST', url, true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            document.getElementById("id").value = data.id;
            if (data.globle_best.score != "") {
                document.getElementById("txt_globle_best").textContent = data.globle_best.score;
            }
            if (data.my_best.score != "") {
                document.getElementById("txt_my_best").textContent = data.my_best.score;
            }
        } else {
            console.log(this.status);
        }
    }
    request.onerror = function () {
    };

    request.send(sendparam);

}

function openCard(index) {

    var click = document.getElementById("click").value;
    var num_click = parseInt(click) + 1;
    var coup = document.getElementById("check").value;
    var http = new XMLHttpRequest();
    var url = base_url + 'index/select_card';

    var game = document.getElementById("txt_game").textContent;
    var param = {
        index: index,
        click: num_click,
        id: document.getElementById("id").value,
        couple: coup,
        game: game
    };

    var chk_txt_num = document.getElementById("num_" + index).textContent;
    if (chk_txt_num != "") {
        console.log('double click card');
        return;
    }

    var sendparam = convertParam(param);
    http.open('POST', url, true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            console.log(http.responseText);
            var res = JSON.parse(http.responseText);
            console.log(res);

            if (coup == 1) {
                document.getElementById("num_" + res.data.index).textContent = res.data.number;
                document.getElementById("box_" + res.data.index).classList.add("open");
                document.getElementById("box_" + res.data.index).classList.remove("close");
            } else {
                if (res.data.match == 1) {
                    document.getElementById("num_" + res.data.index).textContent = res.data.number;
                    document.getElementById("box_" + res.data.index).classList.add("open");
                    document.getElementById("box_" + res.data.index).classList.remove("close");
                } else {


                    disableDoSomething();
                    document.getElementById("num_" + res.data.index).textContent = res.data.number;
                    document.getElementById("box_" + res.data.index).classList.add("open");
                    document.getElementById("box_" + res.data.index).classList.remove("close");

                    setTimeout(function () {
                        document.getElementById("num_" + res.data.index).textContent = '';
                        document.getElementById("box_" + res.data.index).classList.add("close");
                        document.getElementById("box_" + res.data.index).classList.remove("open");

                        document.getElementById("num_" + res.data.old_index).textContent = '';
                        document.getElementById("box_" + res.data.old_index).classList.add("close");
                        document.getElementById("box_" + res.data.old_index).classList.remove("open");
                        enableDoSomething();
                    }, 1500);

                }
                if (res.my_best.res == 1) {
                    var my_best = res.my_best.data.score;
                    document.getElementById("txt_my_best").textContent = my_best;
                }
                if (res.globle.res == 1) {
                    var globle = res.globle.data.score;
                    document.getElementById("txt_globle_best").textContent = globle;
                }
            }
            document.getElementById("check").value = res.chk_coup;
            document.getElementById("click").value = num_click;
            document.getElementById("txt_click").textContent = num_click;
        }
    }
    http.send(sendparam);
}

var functionHolder;
function disableDoSomething() {
    if (!functionHolder)
        functionHolder = window.openCard;
    window.openCard = function () {};
}

function enableDoSomething() {
    window.openCard = functionHolder;
}

function convertParam(params) {
    let query = new URLSearchParams(params);
    decodeURIComponent(query.toString());
    return query.toString();
}

function newGameClick() {
    var slides = document.getElementsByClassName("grid-item");
    for (var i = 0; i < slides.length; i++) {
        slides[i].classList.add("close");
        slides[i].classList.remove("open");
    }

    var slides = document.getElementsByClassName("txt");
    for (var i = 0; i < slides.length; i++) {
        slides[i].textContent = '';
    }

    var game = document.getElementById("txt_game").textContent;
    var new_game = parseInt(game) + 1;
    document.getElementById("txt_game").textContent = new_game;
    newGame(new_game);
}

function newGame(num_game) {
    var param = {
        game: num_game,
        id: document.getElementById("id").value
    }
    var request = new XMLHttpRequest();
    var sendparam = convertParam(param);
    var url = base_url + 'index/new_game';
    request.open('POST', url, true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            if (data.globle_best.score != "") {
                document.getElementById("txt_globle_best").textContent = data.globle_best.score;
            }
            if (data.my_best.score != "") {
                document.getElementById("txt_my_best").textContent = data.my_best.score;
            }
             document.getElementById("txt_click").textContent = "-";
             document.getElementById("click").value = 0;
             document.getElementById("check").value = 1;
        } else {
            console.log(this.status);
        }
    }
    request.onerror = function () {
    };

    request.send(sendparam);

}