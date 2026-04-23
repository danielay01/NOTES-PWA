<!DOCTYPE html>
<html>
<head>
    <title>Name Page</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        .back-btn { 
            padding: 10px 20px; 
            font-size: 16px; 
            cursor: pointer; 
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .back-btn:hover { background-color: #ddd; }
    </style>
</head>
<body>

    <h1>Ma. Daniela B. Tambong 3-G</h1>
    <div class= "d-flex justify-content-end">
        <a href =" {{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-3">
            BACK
</a>
</div> 

</body>
</html>
