<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#0f172a">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100dvh;
            background: linear-gradient(135deg, #eaf7ff, #f7fbfb);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .page-wrapper {
            width: 100%;
            max-width: 380px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .weather-card,
        .login-container {
            width: 100%;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.7);
        }

        .weather-card {
            padding: 18px;
            text-align: center;
        }

        .weather-card h5 {
            font-size: 16px;
            margin-bottom: 6px;
        }

        .weather-temp {
            font-size: 30px;
            font-weight: 700;
            color: #1f2937;
        }

        .weather-desc {
            font-size: 14px;
            text-transform: capitalize;
            color: #555;
            margin-top: 4px;
        }

        .login-container {
            padding: 30px 24px;
        }

        .text-center {
            text-align: center;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 1.5px;
            font-size: 28px;
            margin-bottom: 35px;
            color: #1f2937;
        }

        .input-group {
            margin-bottom: 22px;
        }

        .label {
            display: block;
            color: #111827;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .input-field {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
            border-radius: 10px;
            font-size: 15px;
            transition: 0.3s ease;
        }

        .input-field:focus {
            border-color: #56a5fe;
            box-shadow: 0 0 0 4px rgba(86, 165, 254, 0.18);
            outline: none;
            background-color: #fff;
        }

        .btn {
            width: 100%;
            background: linear-gradient(135deg, #56a5fe, #8eeaff);
            color: #111827;
            padding: 12px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s ease;
            font-weight: 700;
            font-size: 16px;
            margin-top: 5px;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(86, 165, 254, 0.35);
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 22px;
            color: #2563eb;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 420px) {
            body {
                padding: 16px;
                align-items: center;
            }

            .page-wrapper {
                max-width: 100%;
            }

            .login-container {
                padding: 28px 20px;
            }

            .text-center {
                font-size: 25px;
                margin-bottom: 30px;
            }

            .weather-temp {
                font-size: 27px;
            }
        }
    </style>
</head>
<body>

    <div class="page-wrapper">

        <div class="weather-card">
            <div id="weather">
                @if(isset($weather))
                    <h5>{{ $weather['city'] }}</h5>
                    <div class="weather-temp">
                        {{ $weather['temp'] }}°C
                    </div>
                    <div class="weather-desc">
                        {{ $weather['description'] }}
                    </div>
                @else
                    <div class="weather-desc">Loading weather...</div>
                @endif
            </div>
        </div>

        <div class="login-container">
            <h2 class="text-center">Login</h2>

            <form method="POST" action="/">
                @csrf

                <div class="input-group">
                    <label class="label" for="email">Email</label>
                    <input class="input-field" id="email" type="email" name="email" required>
                </div>

                <div class="input-group">
                    <label class="label" for="password">Password</label>
                    <input class="input-field" id="password" type="password" name="password" required>
                </div>

                <button class="btn" type="submit">Login</button>


                <a class="register-link" href="{{ route('register') }}">
                    Create an Account
                </a>

              <button id="installBtn"
        type="button"
        class="btn btn-secondary w-100 mt-3 fw-semibold"
        style="display:none;">
    Install App
</button>




            </form>
        </div>

    </div>

    <script>
        async function loadWeather() {
            try {
                const res = await fetch('/weather');

                if (!res.ok) return;

                const data = await res.json();

                document.getElementById('weather').innerHTML = `
                    <h5>${data.name}</h5>
                    <div class="weather-temp">
                        ${data.main.temp}°C
                    </div>
                    <div class="weather-desc">
                        ${data.weather[0].description}
                    </div>
                `;
            } catch (error) {
                console.error("Weather load failed", error);
            }
        }

        loadWeather();
        setInterval(loadWeather, 60000);
    </script>

</body>
</html>