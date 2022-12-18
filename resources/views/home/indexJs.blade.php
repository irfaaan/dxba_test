<script>

    $("#user-form").submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: "{{ route('set.user') }}",
            data: $("#user-form").serialize(),
            success: function (response) {
                if (response.success)
                    window.location.href = "{{route('test')}}"
            }
        });

    });

</script>