/**
 * jiny Forms script
 */
window.addEventListener("load", function(){
    var form = document.querySelector("form");
    let formTabs = form.getElementsByClassName("form-tab");
    var currentTab = 0; // 처음 스탭

    indicatorInit();
    showTab(currentTab); // 선택한 탭만 출력

    function indicatorInit()
    {
        let indicator = form.querySelector(".indicator");
        for(let span, i=0; i<formTabs.length; i++) {
            span = document.createElement("span");
            span.classList.add("step");
            indicator.append(span);
        }
    }  
    
    
    // tab화면 출력
    function showTab(n) {        
        var x = form.getElementsByClassName("form-tab");
        x[n].style.display = "block";

        isFirstTab(n);
        isLastTab(n, x);        
        indicator(n);
    }

    
    let prevBtn = document.querySelector("#prevBtn");
    prevBtn.addEventListener("click", function (e) {
        e.preventDefault();
        nextPrev(-1);
    });

    // 첫음 버튼 표시여부
    function isFirstTab(n)
    {
        var prevBtn = document.getElementById("prevBtn");
        if (n == 0) {
            prevBtn.style.display = "none";
        } else {
            prevBtn.style.display = "inline";
        }
    }
    
    let nextBtn = document.querySelector("#nextBtn");
    nextBtn.addEventListener("click", function (e) {
        e.preventDefault();
        nextPrev(1);
    });

    // 마지막버튼 처리
    function isLastTab(n, x)
    {
        var nextBtn = document.getElementById("nextBtn");
        if (n == (x.length - 1)) {
            nextBtn.innerHTML = "Submit";
        } else {
            nextBtn.innerHTML = "Next";
        }
    }

    // 인디케이터 이동
    function indicator(n) {
        // 인디케이터 전체 비활성화
        var x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }

        // 선택한 tab 활성화
        x[n].className += " active";
    }

    

    

    // 다음 버튼
    function nextPrev(n) {
        var x = document.getElementsByClassName("form-tab");
        if (n == 1 && !validateForm()) return false;

        x[currentTab].style.display = "none"; // 현재탭 숨김
        currentTab = currentTab + n;    
        if (currentTab >= x.length) { // 마지막 버튼, 서브밋 동작
            formSubmit();
            return false;
        } else {
            showTab(currentTab); // 다음텝 화면 표시
        }
    }

    function formSubmit()
    {
        form.addEventListener("click",function (e) {
            e.preventDefault();
            // alert("submit");
            var data = new FormData(form);

            $.ajax({
                type : "POST",
                uri: document.location.href,
                data: data,
                contentType:false,
                processData:false,
                beforeSend: function (xhr) {
                    var main = document.querySelector("#jiny-main");
                    main.innerHTML = "가입을 요청하고 있습니다. 잠시만 기다려 주세요.";
                },
                success : function(data) {
                    console.log(data);
                    var main = document.querySelector("#jiny-main");
                    main.innerHTML = data;
                }
            });
        });
    }


    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("form-tab");
        y = x[currentTab].getElementsByTagName("input"); // 현재텝 선택
        // 현재 탭의 input 요소의 유효성 검사
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
            }
        }

        // 유효성이 통과된 경우 finish 클래스 속성을 부여
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

});



        