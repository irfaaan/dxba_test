<script>

    $(document).ready(() => {
        getNextQuestion();
    });

    getNextQuestion = ()=>{
        $.ajax({
            type: 'GET',
            url: "{{ route('next.question') }}",
            success: function (response) {

                $('#question_no').text(response.answers.question_no);
                $('#question').text(response.question);
                $('#opt_1').text(response.answers.opt_1);
                $('#opt_2').text(response.answers.opt_2);
                $('#opt_3').text(response.answers.opt_3);
                $('#opt_4').text(response.answers.opt_4);
            }
        });
    }

    function checkResponse(response) {
        if (response.success) {
            if (!response.is_ended){
                $('#question-form').trigger("reset");;
                getNextQuestion();
            }
            else {
                window.location.href = "{{route('results')}}"
            }
        }
    }

    $('#question-form').submit((e)=>{
        e.preventDefault();

        $.ajax({
            type:'POST',
            url:"{{ route('submit.answer') }}",
            data:$("#question-form").serialize(),
            success:function(response){
                checkResponse(response);
            }
        });
    });

    $('#skip-btn').on("click",(e)=>{
        e.preventDefault();

        $.ajax({
            type:'POST',
            url:"{{ route('skip.question') }}",
            data:$("#question-form").serialize(),
            success:function(response){
                if(response.success){
                    checkResponse(response);
                }
            }
        });
    });
</script>