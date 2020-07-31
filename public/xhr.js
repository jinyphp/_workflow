/**
 * XMLHttpReques AJAX
 */
function xhr_ajax() {
    // XMLHttpRequest객체 생성
    const xhr = new XMLHttpRequest(); 

    // onreadystatechange는 서버와의 통신이 끝났을 때 호출
    xhr.onreadystatechange = function() {
        // readyState(0) = 초기화 되지 않음. open 메소드가 아직 호출되지 않았음
        // readyState(1) = open 메소드가 호출되었으나 send 메소드는 호출되지 않았음
        // readyState(2) = 송신완료. send 메소드가 호출되었음. 요청이 시작되었음
        // readyState(3) = 수신 중, 서버가 응답을 보내는 중임.
        // readyState(4) = 통신완료
        if (xhr.readyState === 4) {

            if (xhr.status === 200) {
                // 200 : 통신성공
        
        
                console.log("작업내용 작성");
                show("작업내용 작성");
            } else 
            // 302 : Moved Temporarily,요청한 리소스가 임시적으로 이동, 클라이언트가 리소스에 접근하기 위해 
            //       현재의 URI를 반환해야 함을 나타냄. 라이언트는 자동으로 GET또는 HEAD 요청을 리다이렉트 할것이다.
            if (xhr.status === 302) {
            }

            // 400 : Bad Request, 클라이언트의 요청이 부정확한 형태이며 서버가 요청을 처리 할 수 없음
        // 401 : Unauthorized, 클라이언트가 제공되지 않은 사용자 인증이 필요한 리소스를 요청했거나 인증에 실패했음.
        // 403 : Forbidden, 서버가 클라이언트의 요청을 이해하지만 클라이언트가 요청한 리소스의 접근을 거절.
        // 404 : Not Found, 요청된 URI에 리소스를 위치시킬수 없는 웹서버가 사용한다. (파일없음)
        // 405 : 메서드 허용 안함
        // 500 : Internal Server Error, 예기치 않은 에러가 발생(문법오류이거나 Exception이 대부분)

        }
    };

    // 세팅, post와 get방식 선택 / URL / true(비동기적), false(동기적)
    xhr.open("POST", "/todo/TodoTypeServlet", true);

    // 서버로 전송할 데이터 타입의 형식(MIME)을 지정, POST방식에서만 사용, open다음에 사용해야함
    // xhr.setRequestHeader('Content-Type', "application/x-www-form-urlencoded"); - &으로 분리되고, 
    // "=" 기호로 값과 키를 연결하는 key-value 형태 전송시 사용
    xhr.setRequestHeader("Content-Type", "application/json"); //- JSON전송시 사용
    // xhr.setRequestHeader("Content-Type", "text/plain; charset=UTF-8");
    // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    // send method가 호출될 때 XMLHttpRequest객체가 통신을 시작하게 된다
    // 데이터는 문자열로 raw하게 날라가므로 반드시 본인이 타입에 맞게 인코딩 해야함 ex) xhr.send(JSON.parse(data));
    xhr.send(null);
}

function show(output)
{
    document.getElementById('output').innerHTML += '<p>'+output+'</p>';
}

xhr_ajax();