<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Daftar</title>
</head>
<body>


    <div class="sidenav">
         <div class="login-main-text">
            <h2>Student/Staff Login</h2>
            <p>Register as / Daftar sebagai:</p>
            <div class="form-group">
                <label>Pelajar</label>
                <input type="radio" name="register" id="studRegister" checked>
                <label>Staff</label>
                <input type="radio" name="register" id="staffRegister">
            </div><hr>
            <button class="btn btn-info mb-5" onclick="login();">Log Masuk</button>
            
         </div>
         
    </div>
    <div class="main">
        <?php include('student_form.php'); ?>
        <?php include('staff_form.php'); ?>
    </div>

</body>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    $(document).ready(function(){

        var radio = [
            document.getElementById('studRegister'),
            document.getElementById('staffRegister')
        ];

        function determineForm() {
            var studForm = document.getElementById('studForm');
            var staffForm = document.getElementById('staffForm');
            if (radio[0].checked) {
                studForm.style.display = "block";
                staffForm.style.display = "none";
            } else {
                studForm.style.display = "none";
                staffForm.style.display = "block";
            }
        }

        determineForm();

        for (var i=0; i<2; i++) {
            radio[i].addEventListener('change', function() {
                determineForm();
            });
        }

    	$('#formRegisterStudent').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "ajax/register_student.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(data){
                    // $('#mesej').html(data);
                    console.log(data);
                    $('#formRegisterStudent')[0].reset();
                    Swal.fire({
                      icon: 'success',
                      title: 'success',
                      text: data
                    })
                },
                error: function(err) {
                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: err
                    })
                    // alert('error handling here');
                }
            });
        }) 

        
        // $('#no_matrik').on('focusout', function(){
        //     var val = $(this).val();
        //     console.log(val);
        //     // $('#validate_matrik').text(val);
        //     // alert(val);
        // });

        // $('#formRegisterStudent').on('submit', function(e){
        //     e.preventDefault();

        //     var password = $('#password').val();
        //     var password2 = $('#password2').val();

        //     if (password !== password2) {
        //         // console.log('password not matching');
        //          $('#mesej').text('Kata Laluan Tidak Sama');
        //     } else {
        //         // console.log(password+password2);
        //         var data = $(this).serialize();
        //         $.ajax({
        //             url: "processRegStud.php",
        //             method: "POST",
        //             data: data,
        //             success: function(data){
        //                 $('#mesej').html(data);
        //             },
        //             error: function() {
        //                 alert('error handling here');
        //             }
        //         });
        //         $('#password').val('');
        //         $('#password2').val('');
        //         $('#fakulti').val('');
        //         $('#formRegisterStudent').trigger("reset");

        //     }
           

            

        // });
    });

    function login() {
            window.location.href = 'login.php';
        }
</script>
<style>
    .bg-danger{
        color: red;
    }
</style>
</html>




