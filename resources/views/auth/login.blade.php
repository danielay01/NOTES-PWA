<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body{
            background-color: #f7fbfb;
            justify-content: center;
            align-items: center;
            height: 80vh;
            display: flex;
        }

        .login-container{
            background-color: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 12px;
            max-width:320px;
            width: 70%;
        }

        .text-center{
            text-align: center;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            font-size: 30px;
            height: 40px;
            margin-top: -10px;
            margin-bottom: 50px;
        }

        .input-group{
            position: relative;
            margin-bottom: 20px;
        }

        .input-group .label{
            position: absolute;
            top: -17px;
            left: 1px;
            color: #000000;
            font-size: 14px;
            font-weight: 600;
        }

        .input-group .input-field{
            width: 275px;
            padding: 10px 2px;
            border: 1px solid #ccc;
            background-color: #f6f0f0;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .input-group .input-field:focus{
            border-color: #56a5fe;
            box-shadow: 0 0 5px rgba(86, 165, 254, 0.5);
            outline: none;
        }

        .btn{
            text-align: center;
            background-color: #56a5fe;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 12px;
            width: 250px;
            position: relative;
            left: 13px;
            outline: none;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #000000;
            font-weight: 600;
            font-size: 16px;
        }

        .btn:hover{
            background-color: #8eeaff;
            box-shadow: 0 0 10px rgba(142, 234, 255, 0.7);
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h2 class ="text-center">Login</h2>
        <form method="POST" action="/">
            @csrf
            
            <div class="input-group">
                <label class="label" for="email">Email:</label> 
                <input class="input-field" id="email" type="email" name="email"  >
            </div>

            <div class="input-group">
                <label class="label" for="password">Password:</label>
                <input class="input-field" id="password" type="password" name="password" >
            </div>

            <button class="btn" type="submit">Login</button>
            <center>
            <br></br>
            <a href="{{route('register')}}"> Create an Account </a>
</center>
        </form>
</body>
</html>