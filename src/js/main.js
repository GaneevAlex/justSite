import '../style/style.less';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap';

$('.__showUsersList').click(() => {
    $.ajax({
        url: "../src/server/index.php",
        type: "POST",
        data: {
            c: 'login',
            a: 'get',
        },

        success: function(response) {
            const list = JSON.parse(response);
            const $userList = $('.users__list');

            $userList.html(
                `<div class="row users__list_headers">
                            <div class="name col-6 text-center">Имя</div>
                            <div class="password col-6 text-center">Пароль</div>
                </div>`
            );

            Object.keys(list).forEach((key) => {
                $userList.append(`
                        <div class="row users__list_item">
                            <div class="name col-6">${key}</div>
                            <div class="password col-6">${list[key]}</div>
                        </div>
                `)
            });
        },

        error: function(response) {
            console.log('error');
        }
    });
});

$('.__signup').click(() => {
    const login = $('.form__login').val();
    const password = $('.form__password').val();

    if (login && password) {
        $.ajax({
            url: "../src/server/index.php",
            type: "POST",
            data: {
                c: 'login',
                a: 'save',
                login: login,
                password: password,
            },

            success: function(response) {
                console.log(response);
            },

            error: function(response) {
                console.log('error');
            }
        });

    } else {
        console.log("Поля логина и пароля должны быть заполнены");
    }
});