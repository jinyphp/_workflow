/**
 * jiny 계시판 스크립트
 */
window.addEventListener("load", function(){
    var form = document.querySelector("form");
    form[0].addEventListener('submit',editSubmit);

    function editSubmit(e)
    {
        e.preventDefault();
        // alert("서브밋 버튼 클릭동작");
        console.log("ajax 호출");
        console.log(form[0]);
        var formdata = new FormData(form[0]);       
        console.log(formdata);

        var queryString = $("form").serialize() ;
        console.log(queryString);

        $.ajax({
            type : 'post',
            uri: document.location.href,
            data : queryString,
            success : function(data){
                console.log(data);
                window.location.href = '/admin/members';
            }
        });
        




        /*
        // console.log($(formdata).serializeObject());

        var object = {};
        formdata.forEach(function(value, key){
            console.log(typeof value);
            object[key] = value;
        });
        var jsondata = JSON.stringify(object);
        console.log(jsondata);

        $.ajax({
            uri: document.location.href,
            type:"put",
            contentType: "application/json",
            data: jsondata,
            success: function(data) {
                // alert("성공");
                // $('#main').html(data);
                console.log(data);
            }
        });
        */
    }

    


    
});

/**
 * 계시판 내용추가
 */
function board_new()
{
    var endpoint = document.location.href + '/' + 'new';
    alert(endpoint);
    $.ajax({
        uri: endpoint,
        type:"get",
        headers: {"CSRF" : '<?= $csrf; ?>'},
        ///contentType: "application/json",
        success: function(data) {
            // $('#main').html(data);
            console.log(data);
        }
    });
    
    /*
    const params = {
        mode: 'new',
        csrf: '<?= $csrf; ?>'
    }
    post(document.location.href, params);
    */
}

//계시판 내용수정
function board_edit(id){

    const params = {
        id: id,
        mode: 'edit',
        csrf: '<?= $csrf; ?>'
    }
    post(document.location.href+"/"+id, params);
}




function ajax_form_submit()
{
    //var formData = $("form")[0].serialize();
    //console.log(formData);
    alert("form_submit");

    /*
    $.ajax({
        url : document.location.href, 
        type : 'POST', 
        data : formData, 
        success : function(data) {
            var jsonObj = JSON.parse(data);
        }, // success 

        error : function(xhr, status) {
            alert(xhr + " : " + status);
        }
    }); 
    */
}


/**
 * 페이지네이션 호출
 * 
 */
function post_pagenation($limit)
{
    const params = {
        limit: limit
    }
    post(document.location.href, params);
}

function board_page(limit)
{
    var data = { limit: limit };
    $.ajax({
        uri: document.location.href,
        type:"post",
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function(data) {
            // alert("성공");
            $('#main').html(data);
            // console.log(data);
        }
    });
}

/**
 * 동적 post 요청
 */
function post(path, params, method='post') {

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    const form = document.createElement('form');
    form.method = method;
    form.action = path;
  
    for (const key in params) {
      if (params.hasOwnProperty(key)) {
        const hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = key;
        hiddenField.value = params[key];
  
        form.appendChild(hiddenField);
      }
    }
  
    document.body.appendChild(form);
    form.submit();
}