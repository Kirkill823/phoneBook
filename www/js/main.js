//Получение данных по идентификатору
function getData(obj_form){
    let hData = {};
    $('input, textarea, select', obj_form).each(function (){
        if(this.name && this.name!=''){
            hData[this.name] = this.value;
             console.log('hData[' + this.name +']= = ' + hData[this.name]);
        }
    });
    return hData;
}

//Регистрация
function registerNewUser() {
    let postData = getData('#reg');
    $.ajax({
        type: 'POST',
        async: true, 
        url: '../controller/UserController.php',
        data: {
            action: 'create',
            name: postData['name'],
            phone: postData['phone']
        },
        dataType: 'json',
        success: function(data) {
            alert(data['message']);
            if (data['success']) {
                location.reload();
            }
        }
    });
}

//Список пользователей
    function selectAllUsers(){
        $.ajax({
            type: 'POST',
            async: true, 
            url: '../controller/UserController.php', 
            data: {
                action: 'select'
            },
            dataType: 'json',
            success: function(data) {
                var ulElement = document.createElement('ul');
                ulElement.id = 'usersList'; // Уникальный идентификатор для списка
    
                data.forEach(function(user, index) {
                        var liElement = document.createElement('li');
                        var buttonElement = document.createElement('button');
        
                        liElement.textContent = user.name + ' ' + user.phone;
                        buttonElement.textContent = 'Удалить ';
                        buttonElement.addEventListener('click', function() {
                            console.log('Button ' + index + ' clicked!');
                            deleteThis(user.id);
                            
                        });
                        liElement.appendChild(buttonElement);
                        ulElement.appendChild(liElement);
                });
                // Добавляем созданный список на страницу
                document.body.appendChild(ulElement);
                
            }
        });
    }




function deleteThis(id){
    let postData = getData('#myTable');
    console.log(id);
    $.ajax({
        type: 'POST',
        async: true, 
        url: '../controller/UserController.php',
        data: {
            action: 'del',
            id: id,
        },
        dataType: 'json',
        success: function(data) {
            alert(data['message']);
            if (data['success']) {
                location.reload();
            }
        }
    });
}
